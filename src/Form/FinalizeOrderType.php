<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class FinalizeOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', FileType::class, [
                'label' => 'Image à ajouter',
                'label_attr' => [
                    'class' => 'custom-file-label'
                ],
                'attr' => [
                    'class' => 'custom-file-input'
                ],
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '10240k',
                        'minSize' => '10240k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'application/pdf'
                        ],
                        'minSizeMessage' => 'Le fichier est trop petit',
                        'maxSizeMessage' => 'Le fichier est trop lourd',
                        'mimeTypesMessage' => 'Merci de charger un fichier en JPG ou PNG',
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}