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
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new FOS\FacebookBundle\FOSFacebookBundle(),
            new FOS\RestBundle\FOSRestBundle(),

            new FSC\HateoasBundle\FSCHateoasBundle(),

            new Liip\ContainerWrapperBundle\LiipContainerWrapperBundle(),
            new Liip\CacheControlBundle\LiipCacheControlBundle(),
            new Liip\HelloBundle\LiipHelloBundle(),
            new Liip\HyphenatorBundle\LiipHyphenatorBundle(),
            new Liip\ThemeBundle\LiipThemeBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Liip\DoctrineCacheBundle\LiipDoctrineCacheBundle(),
            new Liip\MonitorBundle\LiipMonitorBundle(),

            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),

//            new SimpleThings\FormSerializerBundle\SimpleThingsFormSerializerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            if ('test' === $this->getEnvironment()) {
                $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
            } else {
                $bundles[] = new JMS\DebuggingBundle\JMSDebuggingBundle($this);
            }
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    protected function getContainerBaseClass()
    {
        if ($this->isDebug()) {
            return '\JMS\DebuggingBundle\DependencyInjection\TraceableContainer';
        }

        return parent::getContainerBaseClass();
    }
}
