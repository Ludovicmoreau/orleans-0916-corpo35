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
                'label'=>'Nom*',
                'attr'=>array(
                    'placeholder'=>'Votre Nom',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Nom'
                )
            ))
            ->add('prenom', TextType::class, array(
                'label'=>'Prénom*',
                'attr'=>array(
                    'placeholder'=>'Votre Prénom',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Prénom'
                )
            ))
            ->add('date_naissance', BirthdayType::class, array(
                'label'=>'Date de Naissance*',
                'attr'=>array(
                    'aria-label'=> 'Votre date de naissance'
                )
            ))
            ->add('photo', FileType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'center-block'
                )
            ))
            ->add('cv', FileType::class, array(
                'label'=>'CV* (au format pdf)',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'center-block'
                )
            ))
            ->add('numrue', TextType::class, array(
                'label'=>'Numéro de rue*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'placeholder'=>'Votre n° de rue'
                )
            ))
            ->add('adresse', TextType::class, array(
                'label'=>'Adresse*',
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'Votre adresse',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre adresse'
                )
            ))
            ->add('ville', TextType::class, array(
                'label'=>'Ville*',
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'Votre ville',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre ville'
                )
            ))
            ->add('cp', TextType::class, array(
                'label'=>'Code Postal*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre code postal'
                )
            ))
            ->add('tel', TextType::class, array(
                'label'=>'Telephone*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre n° de telephone'
                )
            ))
            ->add('mail', EmailType::class, array(
                'label'=>'Email*',
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'mail@monmail.com',
                    'class'=>'form-control',
                    'aria-label'=>'Votre mail'
                )
            ))
            ->add('formation', TextareaType::class, array(
                'label'=>'Parcours de formation dans le secteur de la parfumerie le cas échéant',
                'required'=>false,
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'Votre formation',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('competence', TextType::class, array(
                'label'=>'Autres formations ou compétences',
                'required'=>false,
                'data_class'=>null,
                'attr'=>array('placeholder'=>'Vos compétences',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('profession', TextType::class, array(
                'label'=>'Profession* (ou étudiant le cas échéant)',
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'Votre profession',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre profession'
                )
            ))
            ->add('blog', TextType::class, array(
                'label'=>'Blog/site perso ou autre',
                'required'=>false,
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'http://www.monblog;fr',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre blog'
                )
            ))
            ->add('presentation', TextareaType::class, array(
                'label'=>'Présentation générale*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Votre présentation'
                )
            ))
            ->add('motivation', TextareaType::class, array(
                'label'=>'Vos motivations pour le concours*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Vos motivations'
                )
            ))
            ->add('promotion', EntityType::class, array(
                'class'=>'BackBundle\Entity\Promotion',
                'choice_label'=>'year',
            ))

//            ->add('validations', EntityType::class, array(
//              'label'=>'Validez-vous la candidature de ce candidat ?',
//              'required'=>false,
//              'class'=>'BackBundle\Entity\Validation',
//              'attr'=>array(
//                  'class'=>'form-control')
//                 ))
            ->add('documents', CollectionType::class, array(
                'data_class'=>null,
                'entry_type'=>DocumentType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false,
                'required'=>false,
            ))

            ->add('decision', ChoiceType::class, array(
                'label'=>'Cocher pour valider le candidat',
                'data_class'=>null,
                'required' => false,
                'choices' => array(
                    0 => 'Oui',
                    1 => 'Non',

            )))
        ;
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
