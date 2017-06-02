<?php
// src/AppBundle/Form/RegistrationType.php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'Last name',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'Last name',)))
            ->add('prenom', 'text', array('label' => 'First name',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'First name',)))
            // ->add('username', null, array('label' => 'username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'email',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'Email',)))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Password','attr' => array('class' => 'input-medium search-query form-control','placeholder' => 'Password',)),
                'second_options' => array('label' => 'Confirmation','attr' => array('class' => 'input-medium search-query form-control','placeholder' => 'Password confirmation',)),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('submit','submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\User'
        ));
    }
    public function getName()
    {
        return 'app_user_registration';
    }
}