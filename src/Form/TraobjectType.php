<?php
namespace App\Form;
use App\Entity\Category;
use App\Entity\Departement;
use App\Entity\Traobject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TraobjectType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state', null,['label' => 'Etat'])
            ->add('label', TextType::class, array('label' => 'Titre'))
            ->add('descritption', TextareaType::class, array('label' => 'Description'))
            ->add('pictureFile', VichImageType::class, ['label'=>'Image', 'required'=>false ])
            ->add('eventAt', DateType::class, ['widget' => 'single_text', 'label' => 'Date évenement'])
            ->add('ville', TextType::class, array('label' => 'Ville'))
            ->add('adress', TextType::class, array('label' => 'Adresse'))
            ->add('category', EntityType::class, array('class' => Category::class, 'label' => 'Categorie'))
            ->add('departement', EntityType::class, array('class' => Departement::class, 'label' => 'Département'))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}