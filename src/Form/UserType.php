<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Structure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email')
        ->add('roles', ChoiceType::class, [
            'choices' => [
                'User' => 'ROLE_ADMIN',
                'CLLAJ' => 'ROLE_CLLAJ',
                'FJT' => 'ROLE_FJT',
                'URHAJ' => 'ROLE_URHAJ',

            ],
            'multiple' => true, // Si vous souhaitez permettre la sélection multiple
            'expanded' => true, // Si vous souhaitez afficher les rôles sous forme de cases à cocher au lieu d'une liste déroulante
        ])
        ->add('password')
        ->add('structure', EntityType::class, [
            'class' => Structure::class,
            'choice_label' => 'nom',
            'placeholder' => ' ',
            'required' => false, // Si vous souhaitez que le champ soit facultatif
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
