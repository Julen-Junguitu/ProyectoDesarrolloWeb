<?php

namespace App\Form;

use App\Entity\Dispositivo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DispositivoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Modelo')
            ->add('Marca')
            ->add('Coste')
            ->add('Imagen')
            ->add('Categoria')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dispositivo::class,
        ]);
    }
}
