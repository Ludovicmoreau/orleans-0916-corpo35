<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresentationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', TextType::class)
                ->add('title', TextType::class, [
                    'label' => 'Title (pour la version anglaise)'
                ])
                ->add('soustitreun', TextType::class, [
                    'label' => 'Sous-titre un',
                ])
                ->add('subtitleone', TextType::class, [
                    'label' => 'Subtitle one (pour la version anglaise)'
                ])
                ->add('paragrapheun', TextareaType::class, [
                    'label' => 'Paragraphe un'
                ])
                ->add('sectionone', TextareaType::class, [
                    'label' => 'Section one (pour la version anglaise)'
                ])
                ->add('soustitredeux', TextType::class, [
                    'label' => 'Sous-titre deux'
                ])
                ->add('subtitletwo', TextType::class, [
                    'label' => 'Subtitle two (pour la version anglaise)'
                ])
                ->add('paragraphedeux', TextareaType::class, [
                    'label' => 'Paragraphe deux'
                ])
                ->add('sectiontwo', TextareaType::class, [
                    'label' => 'Section two (pour la version anglaise)'
                ])
                ->add('paragraphetrois', TextareaType::class, [
                    'label' => 'Paragraphe trois'
                ])
                ->add('sectionthree', TextareaType::class, [
                    'label' => 'Section three (pour la version anglaise)'
                ])
                ->add('soustitretrois', TextType::class, [
                    'label' => 'Sous-titre trois'
                ])
                ->add('subtitlethree', TextType::class, [
                    'label' => 'Subtitle three (pour la version anglaise)'
                ])
                ->add('paragraphequatre', TextareaType::class, [
                    'label' => 'Paragraphe quatre'
                ])
                ->add('sectionfour', TextareaType::class, [
                    'label' => 'Section four (pour la version anglaise)'
                ])
                ->add('paragraphecinq', TextareaType::class, [
                    'label' => 'Paragraphe cinq'
                ])
                ->add('sectionfive', TextareaType::class, [
                    'label' => 'Section five (pour la version anglaise)'
                ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Presentation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_presentation';
    }


}
