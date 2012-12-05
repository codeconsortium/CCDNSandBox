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
        new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
        new Symfony\Bundle\AsseticBundle\AsseticBundle(),
        new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
        
        new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
        new EWZ\Bundle\RecaptchaBundle\EWZRecaptchaBundle(),
        new FOS\UserBundle\FOSUserBundle(),
        new FOS\FacebookBundle\FOSFacebookBundle(),
        
        new CCDNComponent\CommonBundle\CCDNComponentCommonBundle(),
        new CCDNComponent\CrumbTrailBundle\CCDNComponentCrumbTrailBundle(),
        new CCDNComponent\DashboardBundle\CCDNComponentDashboardBundle(),	
        new CCDNComponent\BBCodeBundle\CCDNComponentBBCodeBundle(),
        new CCDNComponent\AttachmentBundle\CCDNComponentAttachmentBundle(),
        new CCDNComponent\MenuBundle\CCDNComponentMenuBundle(),
        
        new CCDNUser\UserBundle\CCDNUserUserBundle(),
        new CCDNUser\SecurityBundle\CCDNUserSecurityBundle(),
        new CCDNUser\ProfileBundle\CCDNUserProfileBundle(),
        new CCDNUser\MemberBundle\CCDNUserMemberBundle(),
        new CCDNUser\AdminBundle\CCDNUserAdminBundle(),
        
        new CCDNMessage\MessageBundle\CCDNMessageMessageBundle(),	
        
        new CCDNForum\ForumBundle\CCDNForumForumBundle(),
        new CCDNForum\KarmaBundle\CCDNForumKarmaBundle(),
        new CCDNForum\AdminBundle\CCDNForumAdminBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
