<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;



class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        $builder
            ->add('search', 'text', array('label' => false,
                'attr' => array('class' => 'input-medium search-query form-control  mr-sm-2',
                    'placeholder' => 'Search',)));
    }

    public function getName()
    {
        return 'main_mainbundle_search';
    }
}