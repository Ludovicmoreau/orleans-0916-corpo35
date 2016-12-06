<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use BackBundle\Entity\Candidat;
use BackBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CandidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('label'=>'Nom', 'attr'=>array('placeholder'=>'Votre Nom *', 'class'=>'form-control', 'aria-label'=> 'Votre Nom')))
            ->add('prenom', TextType::class, array('label'=>'Prénom', 'attr'=>array('placeholder'=>'Votre Prénom *', 'class'=>'form-control', 'aria-label'=> 'Votre Prénom')))
            ->add('numrue', IntegerType::class, array('label'=>'Numéro', 'attr'=>array('class'=>'form-control')))
            ->add('adresse', TextType::class, array('label'=>'Adresse', 'attr'=>array('placeholder'=>'Votre adresse *', 'class'=>'form-control', 'aria-label'=> 'Votre adresse')))
            ->add('ville', TextType::class, array('label'=>'Ville', 'attr'=>array('placeholder'=>'Votre ville *', 'class'=>'form-control', 'aria-label'=> 'Votre ville')))
            ->add('cp', IntegerType::class, array('label'=>'Code Postal', 'attr'=>array('class'=>'form-control', 'aria-label'=> 'Votre code postal' )))
            ->add('formation', TextType::class, array('label'=>'Formation', 'attr'=>array('placeholder'=>'Votre formation *', 'class'=>'form-control', 'aria-label'=> 'Votre formation')))
            ->add('profession', TextType::class, array('label'=>'Profession','attr'=>array('placeholder'=>'Votre profession *', 'class'=>'form-control', 'aria-label'=> 'Votre profession')))
            ->add('presentation', TextareaType::class, array('label'=>'Présentation', 'attr'=>array('class'=>'form-control input-lg', 'aria-label'=>'Vitre présentation')))
            ->add('mail', EmailType::class, array('label'=>'Email', 'attr'=>array('placeholder'=>'toto@monmail.com', 'class'=>'form-control', 'aria-label'=>'Votre mail')))
            ->add('promotion')
            ->add('decision', CheckboxType::class, array('label'=>'Cocher pour valider le candidat', 'required' => false))
        ;
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
