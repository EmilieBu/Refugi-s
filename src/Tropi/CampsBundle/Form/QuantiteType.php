<?php

namespace Tropi\CampsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuantiteType extends AbstractType
{
    private $qrDist = false; // Quantite Requise Disabled
    
    public function __construct($qrd)
    {
        $this->qrDis = $qrd;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite','number',array('label' => 'Quantité'))
            ->add('quantiteRequired','number',array('label' => 'Quantité requise','disabled'=> $this->qrDis))
            ->add('camp','entity', array('class'=>'TropiCampsBundle:Camp', 'disabled'=>true))
            ->add('produit','entity', array('class'=>'TropiCampsBundle:Produit', 'disabled'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tropi\CampsBundle\Entity\Quantite'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tropi_campsbundle_quantite';
    }
}
