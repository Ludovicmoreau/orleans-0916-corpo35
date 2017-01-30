<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReglementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paragrapheun', TextareaType::class, [
                    'label' => 'Article 1 - Objet / Paragraphe 1',
                    'required' => false
                ])
                ->add('paragraphedeux', TextareaType::class, [
                    'label' => 'Article 2 - Modalités de participation au concours',
                    'required' => false
                ])
                ->add('paragraphetrois', TextareaType::class, [
                    'label' => 'Article 3 - Déroulement du concours Corpo 35 / 3.1 sélection des dossiers',
                    'required' => false
                ])
                ->add('paragraphequatre', TextareaType::class, [
                    'label' => 'Article 3 / 3.2 journée d\'intégration des candidats sélectionnés',
                    'required' => false
                ])
                ->add('paragraphecinq', TextareaType::class, [
                    'label' => 'Article 3 / 3.3 phase de recherche et de création',
                    'required' => false
                ])
                ->add('paragraphesix', TextareaType::class, [
                    'label' => 'Article 3 / 3.4 finale, désignation des lauréats',
                    'required' => false
                ])
                ->add('paragraphesept', TextareaType::class, [
                    'label' => 'Article 3 / 3.5 prix, récompenses',
                    'required' => false
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Reglement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_reglement';
    }


}
