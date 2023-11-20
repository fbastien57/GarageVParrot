<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\CallbackTransformer;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email' , EmailType::class , ['attr'=>['class'=> 'form-control'] , 'label'=>'Adresse e-mail'])
            ->add('firstname', TextType::class , ['attr'=>['class'=> 'form-control'] , 'label'=>'Prenom'])
            ->add('lastname' , TextType::class , ['attr'=>['class'=> 'form-control'] , 'label'=>'Nom'])
            ->add('picture', FileType::class , ['attr'=>['class'=> 'form-control'], 'label' => 'Images'  , 'mapped'=>false , 'required' => false])
            ->add('roles', CollectionType::class, [
                    'label'=>'Role',
                    'entry_type' => ChoiceType::class,
                    'entry_options' =>[
                        'label' => false,
                        'choices' => [
                            'Administrateur' => 'ROLE_ADMIN',
                            'utilisateur' => 'ROLE_USER',
                        ],   
                    ],
                ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class'=>'form-control'],
                'label'=> 'Mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
