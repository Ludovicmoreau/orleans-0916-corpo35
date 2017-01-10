<?php

namespace BackBundle\Form;

use BackBundle\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DecisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('decision', ChoiceType::class, array(
            'label'=>'Cocher pour valider le candidat',
            'data_class'=>null,
            'required' => false,
            'choices' => array(
                1 => 'Oui',
                0 => 'Non',

            )))
            ->setMethod('GET');
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Candidat',
        ));
    }

    public function getName()
    {
        return 'back_bundle_decision_type';
    }
}
