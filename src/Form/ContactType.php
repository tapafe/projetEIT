<?php

namespace App\Form;

use App\Entity\Departement;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Message', TextareaType::class)
            ->add('Departement', EntityType::class, [
                'class' => Departement::class,
            
                // uses the Departement.nom property
                'choice_label' => 'nom',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure form options here
        ]);
    }
}
