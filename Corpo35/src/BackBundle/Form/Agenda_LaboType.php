<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class Agenda_LaboType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date', DateType::class)
                ->add('heureDebutAM', TimeType::class, [
                    'label' => 'Heure de début (AM/matin)'
                ])
                ->add('heureFinAM', TimeType::class, [
                    'label' => 'Heure de fin (AM/matin)'
                ])
                ->add('heureDebutPM', TimeType::class, [
                    'label' => 'Heure de début (PM/après-midi)'
                ])
                ->add('heureFinPM', TimeType::class, [
                    'label' => 'Heure de fin (PM/après-midi)'
                ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Agenda_Labo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_agenda_labo';
    }


}
