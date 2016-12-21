<?php

namespace BackBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use BackBundle\Entity\Candidat;
use BackBundle\Entity\Document;
use BackBundle\Entity\Validation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\Choice;

class CandidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom', TextType::class, array(
                'label'=>'Nom',
                'attr'=>array(
                    'placeholder'=>'Votre Nom *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Nom'
                )
            ))
            ->add('prenom', TextType::class, array(
                'label'=>'Prénom',
                'attr'=>array(
                    'placeholder'=>'Votre Prénom *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Prénom'
                )
            ))
            ->add('date_naissance', BirthdayType::class, array(
                'label'=>'Date de Naissance',
                'attr'=>array(
                    'placeholder'=>'Votre Prénom *',
                    'aria-label'=> 'Votre date de naissance'
                )
            ))
            ->add('photo', FileType::class)
            ->add('cv', FileType::class, array(
                'label'=>'CV (au format pdf)'
            ))
            ->add('numrue', IntegerType::class, array(
                'label'=>'Numéro de rue',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('adresse', TextType::class, array(
                'label'=>'Adresse',
                'attr'=>array(
                    'placeholder'=>'Votre adresse *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre adresse'
                )
            ))
            ->add('ville', TextType::class, array(
                'label'=>'Ville',
                'attr'=>array(
                    'placeholder'=>'Votre ville *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre ville'
                )
            ))
            ->add('cp', IntegerType::class, array(
                'label'=>'Code Postal',
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre code postal'
                )
            ))
            ->add('tel', IntegerType::class, array(
                'label'=>'Telephone',
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre n° de telephone'
                )
            ))
            ->add('mail', EmailType::class, array(
                'label'=>'Email',
                'attr'=>array(
                    'placeholder'=>'toto@monmail.com',
                    'class'=>'form-control',
                    'aria-label'=>'Votre mail'
                )
            ))
            ->add('formation', TextareaType::class, array(
                'label'=>'Parcours de formation dans le secteur de la parfumerie',
                'attr'=>array(
                    'placeholder'=>'Votre formation *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('competence', TextType::class, array(
                'label'=>'Autres formations ou compétences',
                'attr'=>array('placeholder'=>'Votre formation *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('profession', TextType::class, array(
                'label'=>'Profession',
                'attr'=>array(
                    'placeholder'=>'Votre profession *',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre profession'
                )
            ))
            ->add('blog', TextType::class, array(
                'label'=>'Blog/site perso ou autre',
                'attr'=>array(
                    'placeholder'=>'http://www.monblog;fr',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre profession'
                )
            ))
            ->add('presentation', TextareaType::class, array(
                'label'=>'Présentation générale',
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Votre présentation'
                )
            ))
            ->add('motivation', TextareaType::class, array(
                'label'=>'Vos motivations pour le concours',
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Vos motivations'
                )
            ))
            ->add('promotion', EntityType::class, array(
                'class'=>'BackBundle\Entity\Promotion',
                'choice_label'=>'year'
            ))

//            ->add('validations', EntityType::class, array(
//              'label'=>'Validez-vous la candidature de ce candidat ?',
//              'class'=>'BackBundle\Entity\Validation',
//              'attr'=>array(
//                  'class'=>'form-control')
//                 ))
            ->add('documents', CollectionType::class, array(
                'entry_type'=>DocumentType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false,
            ))

            ->add('decision', CheckboxType::class, array('label'=>'Cocher pour valider le candidat', 'required' => false))
            ->add('miseEnAvant', ChoiceType::class, array(
                'choices' => array(
                    1=> 1,
                    0=> 0),
                'required' => false));


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Candidat',
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
