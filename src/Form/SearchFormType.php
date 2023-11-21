<?php

namespace App\Form;

use App\Data\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType  extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("minPrice", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Prix min',
                ]
            ])
            ->add("maxPrice", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Prix max',
                ]
            ])
            ->add("minKilometers", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Kilomètres min',
                ]
            ])
            ->add("maxKilometers", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Kilomètres max',
                ]
            ])
            ->add("minYear", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Année min',
                ]
            ])
            ->add("maxYear", IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'placeholder'=> 'Année max',
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class"=> SearchData::class,
            'method' =>'GET',
            'csrf_protection' => false,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}

