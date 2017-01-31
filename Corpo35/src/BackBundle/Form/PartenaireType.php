<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartenaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class, [
            'label' => 'Nom du partenaire'
        ])
                ->add('logo', FileType::class)
                ->add('resume', TextareaType::class, array(
                    'required' => false,
                    'label' => 'Courte description'
                    ))
                ->add('resumeEn', TextareaType::class, array(
                    'required' => false,
                    'label' => 'Courte description (pour la version anglaise)'
                    ))
                ->add('contenu', TextareaType::class, array(
                    'required' => false,
                    'label' => 'Description complète'
                    ))
                ->add('contenuEn', TextareaType::class, array(
                    'required' => false,
                    'label' => 'Description complète (pour la version anglaise'
                    ))
                ->add('website', UrlType::class, [
                    'label' => 'Site internet',
                    'attr' => [
                        'placeholder' => 'http ou https://www.example.com'
                        ]
                ])
                ->add('email', EmailType::class, array(
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'example@gmail.com'
                    ]
                    ))
                ->add('phone', TextType::class, [
                    'label' => 'Numéro de téléphone'
                ])
            ;
        }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Partenaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_partenaire';
    }


}
