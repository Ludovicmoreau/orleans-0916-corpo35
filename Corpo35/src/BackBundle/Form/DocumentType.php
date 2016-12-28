<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('type', TextType::class, array(
                'label'=>'Type de document',
                'required'=>'false',
                ))
            ->add('contenu', FileType::class, array(
                'label'=>'Contenu',
                'required'=>'false',
                ))
            ->add('lien', TextType::class, array(
                'label'=>'Lien externe',
                'required'=>'false',
                'attr'=>array(
                    'placeholder'=>'http://...',
                )
                ))
           // ->add('candidat', HiddenType::class)
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
