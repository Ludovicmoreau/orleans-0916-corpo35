<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PartenaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image', FileType::class)
                ->add('resume', TextareaType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Résumé')))
                ->add('website', UrlType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Site Web')))
                ->add('email', EmailType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Email')))
                ->add('phone', NumberType::class, array('label'=>false,'attr'=>array('placeholder'=>'Téléphone')))
                ->add('contenu1', TextareaType::class, array('required' => false, 'label'=>false, 'attr'=>array('placeholder'=>'contenu 1')))
                ->add('contenu2', TextareaType::class, array( 'required' => false, 'label'=>false,'attr'=>array('placeholder'=>'contenu 2')))
                ->add('contenu3', TextareaType::class, array( 'required' => false, 'label'=>false,'attr'=>array('placeholder'=>'contenu 3')))
                ->add('contenu4', TextareaType::class, array( 'required' => false, 'label'=>false,'attr'=>array('placeholder'=>'contenu 4')))
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
