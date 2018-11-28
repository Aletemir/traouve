<?php

namespace App\Form;

use App\Entity\Traobject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraobjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state')
            ->add('label', TextType::class, array('label' =>'Titre'))
            ->add('image', FileType::class, ['label'=>'Image'])
            ->add('ville', TextType::class, ['label' => 'Ville '])
            ->add('descritption', TextareaType::class, ['label' => 'Description'] )
            ->add('eventAt', DateTimeType::class, ['label'=> 'Moment de l\'événement'])
            ->add('adress', TextType::class, ['label'=> 'Adresse'])
            ->add('category', ChoiceType::class, ['label'=>'Catégorie'])
            ->add('departement', ChoiceType::class, ['label' => 'Département'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}
