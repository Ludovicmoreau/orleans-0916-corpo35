<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maRecherche', ChoiceType::class, array(
                'required'=>false,
                'choices' => array(
                    1 => 'candidat validé',
                    0 => 'candidat non-validé',
                ),
                'label'=> 'Rechercher par validation/non-validation',
                'attr'=>array(
                    'class'=>'center-block'
                )
            ))
            ->add('classement', ChoiceType::class, array(
                'required'=>false,
                'choices' => array(
                    1 => '1er',
                    2 => '2eme',
                    3 => '3eme',
                    4 => '4eme',
                    5 => '5eme',
                ),
                'label'=> 'Rechercher par classement',
                'attr'=>array(
                    'class'=>'center-block'
                )
            ))
            ->add('nom', SearchType::class,[
                'required'=>false,
                'label'=>'Nom',
                'attr'=>array(
                'class'=>'center-block'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

    public function getName()
    {
        return 'back_bundle_recherche_type';
    }
}
