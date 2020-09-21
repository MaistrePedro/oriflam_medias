<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('confirmPassword', PasswordType::class, [
                'label' => 'Confirmation du mot de passe*',
                'attr' => [
                    'class' => 'form-control',
                ],
                'mapped' => false
            ])
            ->add('civility', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'mt-2 form-check d-inline-block',
                ],
                'choices' => [
                    'Madame' => User::MRS,
                    'Monsieur' => User::MR
                ],
                'choice_attr' => function() {
                    return ['class' => 'mr-1'];
                },
                'expanded' => true,
                'multiple' => false
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance*',
                'attr' => [
                    'class' => '',
                ],
                'widget' => 'choice'
            ])
            ->add('mobileNumber', TextType::class, [
                'label' => 'Numéro de mobile*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('newsletter', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-check',
                ],
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'choice_attr' => function() {
                    return ['class' => 'mr-1'];
                },
                'expanded' => true,
                'multiple' => false
            ])
            ->add('cgu', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-check',
                ],
                'choices' => [
                    'J\'ai lu et j\'accepte les Conditions Générales de Vente' => true,
                    '' => \false
                ],
                'choice_attr' => function() {
                    return ['class' => 'mr-1'];
                },
                'expanded' => true,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
