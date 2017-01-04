<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use BackBundle\Entity\Candidat;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'label'=>'Type de document',
//                'data_class'=>null,
                'required'=>false,
                'choices' => array(
                    'vidéo' => 'vidéo',
                    'musique' => 'musique',
                    'image' => 'image',
                    'pdf' => 'pdf',
                ),
                ))

            ->add('contenu', FileType::class, array(
//                'multiple'=>'true',
                'data_class'=>null,
                'label'=>'Contenu',
                'required'=>false,
                ))

            ->add('lien', TextType::class, array(
                'label'=>'Lien externe',
//                'data_class'=>null,
                'required'=>false,
                'attr'=>array(
                    'placeholder'=>'http://...',
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
            'data_class' => 'BackBundle\Entity\Document'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_document';
    }


}
