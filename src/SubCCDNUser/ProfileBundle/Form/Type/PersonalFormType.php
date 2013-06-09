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
class PersonalFormType extends AbstractType
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
            ->add('website', null,
                array(
                    'label'              => 'form.label.website',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
            ->add('location', null,
                array(
                    'label'              => 'form.label.location',
                    'translation_domain' => 'CCDNUserProfileBundle',
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param array $options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' 			=> $this->profileClass,
            'csrf_protection' 		=> true,
            'csrf_field_name' 		=> '_token',
            // a unique key to help generate the secret token
            'intention'       		=> 'profile_item_personal',
            'validation_groups'		=> array('update_personal'),
        );
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'ProfilePersonal';
    }
}
