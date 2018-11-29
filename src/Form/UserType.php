<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, ['label'=>'Prénom'])
            ->add('firstname', TextType::class, ['label'=>'Nom'])
            ->add('email', EmailType::class, ['label'=>'Email'])
            ->add('picture', FileType::class, ['label'=>'Photo'])
            ->add('plainPassword', RepeatedType::class,  array(
                'first_options'  => array('label' => 'Entrez votre mot de passe'),
                'second_options' => array('label' => 'Entrez de nouveau votre mot de passe')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
