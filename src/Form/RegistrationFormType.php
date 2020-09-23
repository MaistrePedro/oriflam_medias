<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'd-none'
                ],
                'attr' => [
                    'class' => 'form-check',
                ],
                'choices' => [
                    'Particulier' => User::INDIVIDUAL,
                    'Professionnel' => User::PROFESSIONAL
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('email', TextType::class, [
                'label' => 'E-mail*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('cgu', CheckboxType::class, [
                'label' => 'J\'ai lu et j\'accepte les Conditions Générales de Vente',
                'label_attr' => [
                    'class' => 'm-0 order-2'
                ],
                'attr' => [
                    'class' => 'form-check order-1',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les Conditions Générales de Ventes pour continuer'
                    ])
                ],
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un mot de passe',
                    ]),
                ],
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
                'choice_attr' => function () {
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
                'widget' => 'choice',
                'years' => range(date('Y') - 100, date('Y'))
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code Postal*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville*',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('activityArea', TextType::class, [
                'label' => 'Secteur d\'activité*',
                'attr' => [
                    'class' => 'form-control ',
                ],
                'required' => false
            ])
            ->add('siren', TextType::class, [
                'label' => 'N° de Siren*',
                'attr' => [
                    'class' => 'form-control ',
                ],
                'required' => false
            ])
            ->add('company', TextType::class, [
                'label' => 'Nom de société*',
                'attr' => [
                    'class' => 'form-control ',
                ],
                'required' => false
            ])
            ->add('contact', TextType::class, [
                'label' => 'Nom du contact*',
                'attr' => [
                    'class' => 'form-control ',
                ],
                'required' => false
            ])
            ->add('optAddress', TextType::class, [
                'label' => 'Adresse*',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
            ])
            ->add('optPostal', TextType::class, [
                'label' => 'Code Postal*',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
            ])
            ->add('optCity', TextType::class, [
                'label' => 'Ville*',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
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
                'choice_attr' => function () {
                    return ['class' => 'mr-1'];
                },
                'expanded' => true,
                'multiple' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
