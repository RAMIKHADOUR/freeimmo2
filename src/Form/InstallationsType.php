<?php

namespace App\Form;

use App\Entity\Installations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstallationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('internet')
            ->add('climatisation')
            ->add('balcon')
            ->add('garage')
            ->add('salle_sport')
            ->add('parking')
            ->add('animaux_accepte')
            ->add('piscine')
            ->add('bar')
            ->add('television')
            ->add('heater')
            ->add('cuisine')
            ->add('security_cam')
            ->add('properties')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Installations::class,
        ]);
    }
}
