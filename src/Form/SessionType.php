<?php

namespace App\Form;

use App\Entity\Session;
use App\Entity\Spot;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datetime')
            ->add('description')
            ->add('spot', EntityType::class, [
                'class' => Spot::class,
        'choice_label' => 'spotName',
            ])
            ->add('surfer', EntityType::class, [
                'class' => User::class,
        'choice_label' => 'firstname',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
