<?php

namespace App\Form;

use App\Entity\GarageHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mondayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Lundi'])
            ->add('tuesdayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Mardi'])
            ->add('wednesdayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Mercredi'])
            ->add('thursdayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Jeudi'])
            ->add('fridayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Vendredi'])
            ->add('saturdayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Samedi'])
            ->add('sundayHours'  , TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Horaires d\'ouverture de Dimanche'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GarageHours::class,
        ]);
    }
}
