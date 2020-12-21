<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('cost', TextType::class, [
                'label' => 'Prix du produit',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('features', CollectionType::class, [
                'entry_type'   => ProductDescriptionType::class,
                'prototype'    => true,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required'     => false,
                'label'        => false,
                'mapped'       => false
            ])
            ->add('image', ImageType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'mapped' => false
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                'attr' => [
                    'class' => 'form-control'
                ],
                'class' => Category::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.label', 'ASC');
                },
                'choice_label' => 'label',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
