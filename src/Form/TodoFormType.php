<?php

namespace App\Form;

use App\Entity\Todo;
use App\Form\TaskFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TodoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('is_public', CheckboxType::class)
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'divers' => 'divers',
                    'courses' => 'courses', 
                    'administratif' => 'administratif', 
                    'factures' => 'factures', 
                    'sorties' => 'sorties', 
                    'anniversaire' => 'anniversaire', 
                    'urgent' => 'urgent', 
                    'ménage' => 'ménage', 
                    'déménagement' => 'déménagement',
                    'business' => 'business',
                    'travail' => 'travail',
                    'voyage' => 'voyage',
                    'sport' => 'sport',
                    'santé' => 'santé',
                    'rdv' => 'rdv',
                    'culture' => 'culture'
                ],
            ])
            ->add('tasks', CollectionType::class, [
                'entry_type' => TaskFormType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
