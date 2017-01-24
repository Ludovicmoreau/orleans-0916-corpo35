<?php

namespace BackBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType;
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
use FOS\UserBundle\Entity\User;

class CandidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Nom'
                )
            ))
            ->add('prenom', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre Prénom'
                )
            ))
            ->add('date_naissance', BirthdayType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'aria-label'=> 'Votre date de naissance'
                )
            ))
            ->add('photo', FileType::class, array(
                'label'=> 'Photo*',
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'center-block',
                    'aria-label'=> 'photo'
                )
            ))
            ->add('cv', FileType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'center-block',
                    'aria-label'=> 'CV'
                )
            ))
            ->add('numrue', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'numéro de rue'


                )
            ))
            ->add('adresse', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre adresse'
                )
            ))
            ->add('ville', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre ville'
                )
            ))
            ->add('cp', TextType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre code postal'
                )
            ))
            ->add('tel', TextType::class, array(

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
                'required'=>false,
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('competence', TextareaType::class, array(
                'required'=>false,
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre formation'
                )
            ))
            ->add('profession', TextType::class, array(

                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=> 'Votre profession'
                )
            ))
            ->add('blog', TextType::class, array(
                'required'=>false,
                'data_class'=>null,
                'attr'=>array(
                    'placeholder'=>'http://www.monblog;fr',
                    'class'=>'form-control',
                    'aria-label'=> 'Votre blog'
                )
            ))
            ->add('presentation', TextareaType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Votre présentation'
                )
            ))
            ->add('motivation', TextareaType::class, array(
                'data_class'=>null,
                'attr'=>array(
                    'class'=>'form-control',
                    'aria-label'=>'Vos motivations'
                )
            ))
            ->add('documents', CollectionType::class, array(
                'data_class'=>null,
                'entry_type'=>DocumentType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false,
                'required'=>false,
            ))

//            ->add('fos_user', CollectionType::class, array(
//                'entry_type'=>RegistrationFormType::class,
//            ))
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
