<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),

			// CCDN 3rd Pary Dependencies.
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new EWZ\Bundle\RecaptchaBundle\EWZRecaptchaBundle(),
            new FOS\UserBundle\FOSUserBundle(),

            // CCDN Main Bundles.
            new CCDNComponent\CommonBundle\CCDNComponentCommonBundle(),
            new CCDNComponent\CrumbTrailBundle\CCDNComponentCrumbTrailBundle(),
            new CCDNComponent\BBCodeBundle\CCDNComponentBBCodeBundle(),
            new CCDNComponent\DashboardBundle\CCDNComponentDashboardBundle(),
            new CCDNComponent\AttachmentBundle\CCDNComponentAttachmentBundle(),

            new CCDNUser\SecurityBundle\CCDNUserSecurityBundle(),
            new CCDNUser\UserBundle\CCDNUserUserBundle(),
            new CCDNUser\ProfileBundle\CCDNUserProfileBundle(),
            new CCDNUser\MemberBundle\CCDNUserMemberBundle(),
            new CCDNUser\AdminBundle\CCDNUserAdminBundle(),

            new CCDNForum\ForumBundle\CCDNForumForumBundle(),
            new CCDNForum\AdminBundle\CCDNForumAdminBundle(),
			
			// CCDN Child Bundles
//            new SubCCDNComponent\CommonBundle\SubCCDNComponentCommonBundle(),
//            new SubCCDNComponent\DashboardBundle\SubCCDNComponentDashboardBundle(),
//            new SubCCDNComponent\AttachmentBundle\SubCCDNComponentAttachmentBundle(),
//
//            new SubCCDNUser\ProfileBundle\SubCCDNUserProfileBundle(),
//            new SubCCDNUser\MemberBundle\SubCCDNUserMemberBundle(),
//            new SubCCDNUser\AdminBundle\SubCCDNUserAdminBundle(),
//
//            new SubCCDNForum\ForumBundle\SubCCDNForumForumBundle(),
//            new SubCCDNForum\AdminBundle\SubCCDNForumAdminBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
