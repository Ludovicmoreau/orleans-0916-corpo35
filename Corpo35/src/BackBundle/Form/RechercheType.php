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
                    'class'=>'center-block',
                    'aria-label'=> 'Rechercher par validation/non-validation'
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
                    'class'=>'center-block',
                    'aria-label'=> 'Rechercher par classement'
                )
            ))
            ->add('promo', ChoiceType::class, array(
                'required'=>false,
                'choices' => array(
                    4 => '2016',
                    5 => '2017',
                    6 => '2018',
                    7 => '2019',
                ),
                'label'=> 'Rechercher par promotion',
                'attr'=>array(
                    'class'=>'center-block'
                )
            ))
//            ->add('nom', SearchType::class, array(
//                'required'=>false,
//            ))
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
