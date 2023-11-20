<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Nom'])
            ->add('firstname', TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Prénom'])
            ->add('email', EmailType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'E-mail'])
            ->add('phoneNumber', TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Téléphone'])
            ->add('message', TextType::class ,  ['attr'=>['class'=> 'form-control'] , 'label'=>'Message'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
