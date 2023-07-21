<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    if ($options['email'])
    {
      $builder
        ->add('email')
      ;
    }

    if ($options['nom'])
    {
      $builder
        ->add('nom')
      ;
    }

    if ($options['prenom'])
    {
      $builder
        ->add('prenom')
      ;
    }

    if ($options['city'])
    {
      $builder
        ->add('city')
      ;
    }
    if ($options['state'])
    {
      $builder
        ->add('state')
      ;
    }
    if ($options['zipCode'])
    {
      $builder
        ->add('zipCode')
      ;
    }

    if ($options['agreeTerms'])
    {
      $builder
        ->add('agreeTerms', CheckboxType::class, [
          'mapped' => false,
          'constraints' => [
            new IsTrue([
              'message' => 'You should agree to our terms.',
            ]),
          ],
        ])
      ;
    }

    if ($options['plainPassword'])
    {
      $builder
        ->add('plainPassword', PasswordType::class, [
          // instead of being set onto the object directly,
          // this is read and encoded in the controller
          'mapped' => false,
          'attr' => ['autocomplete' => 'new-password'],
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


    if ($options['roles'])
    {
      $builder
        ->add('roles', ChoiceType::class,[
          'choices' => [
             'Admin' => 'ROLE_ADMIN',
             'User' => 'ROLE_USER',
          ],
          'multiple' => true,
          'expanded' => true
        ])
      ;
    }

  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => User::class,
      'email' => false,
      'nom' => false,
      'prenom' => false,
      'city' => false,
      'state' => false,
      'zipCode' => false,
      'agreeTerms' => false,
      'plainPassword' => false,
      'roles' => false,
    ]);
  }
}
