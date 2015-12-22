<?php

namespace Tropi\CampsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampType extends AbstractType
{
    private $centrales = array('1' => 'Auchan',
                             '2' => 'Carrefour',
                             '3' => 'Cora');
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('lieu')
            ->add('createdDate')
            ->add('lat')
            ->add('lon')
            ->add('description')
            ->add('centraleid','choice',array('mapped' => false,'choices'=> $this->centrales ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tropi\CampsBundle\Entity\Camp'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tropi_campsbundle_camp';
    }
}
