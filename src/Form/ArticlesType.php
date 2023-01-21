<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('articleFilename', FileType::class,[
                'attr'=> ['class' => 'upload_photo flex center lightgrey'],
                'mapped'=>false,
                'required'=>true,
                'constraints'=>[
                    new File([
                        'maxSize'=>'5M',
                        'mimeTypes'=> ['image/jpeg', 'image/png','image/jpg'
                        ]
                    ])
                ],
            ])
            ->add('time')
            ->add('desciption')
            ->add('Defauts', TextareaType::class)
            ->add('Qualite')
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'save lightgrey menuA'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
