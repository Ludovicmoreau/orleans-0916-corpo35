<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RpresseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', TextType::class, [
                    'attr' => [
                        'placeholder' => 'Example : type de parution (magazine, presse etc.)'
                    ]
                ])
                ->add('source', TextType::class, [
                    'attr' => [
                        'placeholder' => 'Si lien internet, ne pas oublier http ou https://www.example.fr'
                    ]
                ])
                ->add('date', DateType::class)
                ->add('document', FileType::class, array(
                'data_class' => null,
                ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Rpresse'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_rpresse';
    }


}
