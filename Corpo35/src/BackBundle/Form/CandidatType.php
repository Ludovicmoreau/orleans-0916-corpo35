<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CandidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('attr'=>array('placeholder'=>'Votre Nom *', 'class'=>'form-control input-lg', 'aria-label'=> 'Votre Nom')))
            ->add('prenom')
            ->add('numrue')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('formation')
            ->add('profession')
            ->add('presentation')
            ->add('mail')
            ->add('decision')
            ->add('promotion')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Candidat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_candidat';
    }


}
