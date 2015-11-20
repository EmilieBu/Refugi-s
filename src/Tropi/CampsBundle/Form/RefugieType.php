<?php

namespace Tropi\CampsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RefugieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('poids')
            ->add('taille')
            ->add('cheveux')
            ->add('yeux')
            ->add('paysOrigine')
            ->add('villeOrigine')
            ->add('dateArr')
            ->add('etatSante')
            ->add('contamine')
            ->add('camp')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tropi\CampsBundle\Entity\Refugie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tropi_campsbundle_refugie';
    }
}
