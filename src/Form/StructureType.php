<?php

namespace App\Form;

use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Departement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('departement', EntityType::class, [
                'class' => Departement::class,
                'choice_label' => 'name',
                'placeholder' => ' ',
                'required' => false, // Si vous souhaitez que le champ soit facultatif
            ])
            ->add('ville')
            ->add('numeroTel')
            ->add('animateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
