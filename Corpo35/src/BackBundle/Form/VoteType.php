<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VoteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => false,
                'choices' => array(
                    1 => 'voter pour',
                    0 => 'indécis',
                    -1 => 'voter contre',
                ),
            ))
//            ->add('candidat')
//            ->add('jury')
            ->add('commentaire', TextareaType::class, array(
                'label'=>'Commentaire*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Commentaire',
                    'placeholder'=>'Expliqué votre choix'

                )
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Vote'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_vote';
    }


}
