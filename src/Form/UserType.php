<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,
            [
              'label' => "Votre Email : ",
              'attr' => [
                "class" => "form-control"
              ]
            ])
            // ->add('roles')
            ->add('password' , RepeatedType::class,
            [
              'type' => PasswordType::class,
              'first_option' => [
                "label" => "Votre mot de passe: ",
                'attr' =>[
                  "class" =>"form-control"
                ],
              ],
              'second_option' => [
                "label" => "Repeter votre mon de passe:",
                'attr'=>[
                  "class"=>"form-control"
                ],
              ],
              'invalid_message' => 'Les deux mots de passe sont differents'
            ])
            ->add('nom')
            ->add('prenom')
            ->add('city')
            ->add('state')
            ->add('zipCode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
