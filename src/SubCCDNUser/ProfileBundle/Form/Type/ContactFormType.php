<?php

/*
 * This file is part of the CCDNUser ProfileBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SubCCDNUser\ProfileBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 *
 * @category CCDNUser
 * @package  ProfileBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNUserProfileBundle
 *
 */
class ContactFormType extends AbstractType
{
    /**
     *
     * @access protected
     * @var string $profileClass
     */
    protected $profileClass;

    /**
     *
     * @access public
     * @param string $profileClass
     */
    public function __construct($profileClass)
    {
        $this->profileClass = $profileClass;
    }

    /**
     *
     * @access public
     * @param FormBuilder $builder, array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('msn', null,
                array(
                    'label'              => 'form.label.msn',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('msn_is_public', 'checkbox',
                array(
                    'required'           => false,
                    'label'              => 'form.label.msn_is_public',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('yahoo', null,
                array(
                    'label'              => 'form.label.yahoo',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('yahoo_is_public', 'checkbox',
                array(
                    'required'           => false,
                    'label'              => 'form.label.yahoo_is_public',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('aim', null,
                array(
                    'label'              => 'form.label.aim',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('aim_is_public', 'checkbox',
                array(
                    'required'           => false,
                    'label'              => 'form.label.aim_is_public',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('icq', null,
                array(
                    'label'              => 'form.label.icq',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('icq_is_public', 'checkbox',
                array(
                    'required'           => false,
                    'label'              => 'form.label.icq_is_public',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
        ;
    }

	/**
	 * 
	 * @access public
	 * @param  \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
	 */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
	    $resolver->setDefaults(array(
            'data_class' 			=> $this->profileClass,
            'csrf_protection' 		=> true,
            'csrf_field_name' 		=> '_token',
            // a unique key to help generate the secret token
            'intention'       		=> 'profile_item_contact',
            'validation_groups' 	=> array('update_contact'),
        ));
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'ProfileContact';
    }
}
