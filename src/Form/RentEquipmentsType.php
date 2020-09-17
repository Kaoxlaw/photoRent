<?php

namespace App\Form;

use App\Entity\RentEquipments;
use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RentEquipmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand')
            ->add('type')
            ->add('model')
            ->add('number_id')
            ->add('availible')
            ->add('price')
            ->add('imageFile', VichImageType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RentEquipments::class,
        ]);
    }
}
