<?php

namespace App\Form;

use App\Entity\Equipments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class EquipmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand')
            ->add('type')
            ->add('model')
            ->add('numberId')
            ->add('price')
            ->add('imageFile', VichImageType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipments::class,
        ]);
    }
}