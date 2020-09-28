<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('company', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Société'
                ]
            ])
            ->add('email', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Email'
                ]
            ])
            ->add('address', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Adresse professionnelle'
                ]
            ])
            ->add('postalCode', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ville'
                ]
            ])
            ->add('country', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Pays'
                ]
            ])
            ->add('tvaNumber', TextType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'N° de TVA'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Message'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
