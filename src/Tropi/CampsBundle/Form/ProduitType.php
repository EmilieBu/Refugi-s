<?php

namespace Tropi\CampsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
    private $typeProduit = array('med' => 'Médical',
                        'ali' => 'Alimentaire',
                        'mob' => 'Mobilier',
                        'div' => 'Divers');
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('type','choice',array('label' => 'Type de produit',
                                           'choices' => $this->typeProduit ))
            ->add('unit','text',array('label'=> 'Unité'))
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tropi\CampsBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tropi_campsbundle_produit';
    }
}
