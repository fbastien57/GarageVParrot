<?php

namespace App\Form;

use App\Entity\Cars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name' , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Nom'])
            ->add('fuelType' , ChoiceType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'carburant' , 'choices'=>['Essence' => 'Essence', 'Diesel' => 'Diesel' , 'hybide' => 'Hybide' , 'Electrique' => 'Electrique']])
            ->add('year' , IntegerType::class ,  ['attr'=>['class'=> 'form-control']])
            ->add('gearbox', ChoiceType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'boite de vitesse' , 'choices'=>['Manuelle' => 'Manuelle', 'Automatique' => 'Automatique']])
            ->add('kilometers', IntegerType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'kilomètres'])
            ->add('fiscalPower', IntegerType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Puissance fiscale'])
            ->add('power', IntegerType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'puissance'])
            ->add('price', IntegerType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'prix'])
            ->add('description', TextType::class ,  [ 'attr'=>['class'=> 'form-control'], 'label'=>'description'])
            ->add('picture', FileType::class , ['attr'=>['class'=> 'form-control'],'label' => 'Images'  , 'mapped'=>false , 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' =>  Cars::class
        ]);
    }
}
