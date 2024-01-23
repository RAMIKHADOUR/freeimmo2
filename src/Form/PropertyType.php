<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surface')
            ->add('status')
            ->add('description')
            ->add('price')
            ->add('num_rooms')
            ->add('num_bathrooms')
            ->add('num_parkings')
            ->add('num_stage')
            ->add('nomero_stage')
            ->add('image')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('annonceid')
            ->add('categoryid')
            ->add('typeid')
            ->add('locationid')
            ->add('installationid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
