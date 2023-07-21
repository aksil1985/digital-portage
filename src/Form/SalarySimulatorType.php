<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalarySimulatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('field_name')
            ->add('Facturation_encaissée')
            ->add('Frais_professionnels')
            ->add('Taux de frais de gestion(min.3%)')
            ->add('Frais de gestion')
            ->add('Disponible consultant')
            ->add('Disponible masse salariale')
            ->add('Charges patronales')
            ->add('Charges salariales')
            ->add('Salaires brut')
            ->add('Salaires net')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
