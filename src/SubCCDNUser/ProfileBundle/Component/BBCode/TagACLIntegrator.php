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

namespace SubCCDNUser\ProfileBundle\Component\BBCode;

/**
 *
 * @category CCDNUSer
 * @package  ProfileBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNUserProfileBundle
 *
 */
class TagACLIntegrator
{
	protected $acl;
	
	public function __construct($acl)
	{
		$this->acl = $acl;
	}
	
    /**
     *
     * @access public
     */
    public function build()
    {
		return $this->acl;
	}
}