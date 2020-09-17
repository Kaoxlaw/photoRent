<?php

namespace App\Form;

use App\Entity\SellEquipments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SellEquipmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand')
            ->add('type')
            ->add('model')
            ->add('number_id')
            ->add('available')
            ->add('price')
            ->add('imageFile', VichImageType::class, ['required' => false])
            ->add('user');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SellEquipments::class,
        ]);
    }
}
