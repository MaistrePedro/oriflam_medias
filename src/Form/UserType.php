<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'E-mail*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('confirmPassword', TextType::class, [
                'label' => 'Confirmation du mot de passe*',
                'attr' => [
                    'class' => 'form-control',
                ],
                'mapped' => false
            ])
            ->add('civility', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('birthDate')
            ->add('mobileNumber')
            ->add('newsletter')
            ->add('cgu')
            ->add('lastAcceptedCgu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
