<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PortageConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('tauxJournalierMoyen', NumberType::class, [
            'label' => 'Taux de journalier moyen',
            'scale' => 2,
        ])
        ->add('joursTravailMois', NumberType::class, [
            'label' => 'Jours de travail par mois',
            'scale' => 2,
        ])
        ->add('tauxChargesSociales', NumberType::class, [
            'label' => 'Taux de charge sociales',
            'scale' => 2,
        ])
        ->add('fraisGestion', NumberType::class, [
            'label' => 'Frais de gestion',
            'scale' => 2,
        ])
        ->add('disponibleConsultant', NumberType::class, [
            'label' => 'Disponible consultant',
            'scale' => 2,
        ])
        ->add('disponibleMasseSalariale', NumberType::class, [
            'label' => 'Disponible masse salariale',
            'scale' => 2,
        ])
        ->add('chargesPatronales', NumberType::class, [
            'label' => 'charges patronales',
            'scale' => 2,
        ])
        ->add('chargesSalariales', NumberType::class, [
            'label' => 'Charges salariales',
            'scale' => 2,
        ])
        ->add('salairesBrut', NumberType::class, [
            'label' => 'Salaires brut',
            'scale' => 2,
        ])
        ->add('salairesNet', NumberType::class, [
            'label' => 'Salaires net',
            'scale' => 2,
        ])
        ->add('salaireAnuelleBrut', NumberType::class, [
            'label' => 'Salaires annuel brut',
            'scale' => 2,
        ]); 
        

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
