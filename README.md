Symfony Techtalk Edition
========================


This is a fork of the Symfony Standard Edition that adds various Bundles
and configuration options that I use for demo purposes.

You can read the original README.md here:
https://github.com/symfony/symfony-standard/blob/master/README.md

Make sure to switch to the ``techtalk`` branch

```
git checkout techtalk
```

Then following the installation instructions at the above url.

Make sure to ensure that the ``app/cache`` and ``app/logs`` directories are
write-able for the web server (and also for the CLI):
http://symfony.com/doc/current/book/installation.html#configuration-and-setup

Please also make the ``web`` dir writeable if you want to try out the
LiipImagineBundle.

Install the FOSUserBundle schema:
```
app/console doctrine:schema:create
```

And the PHPCR Doctrine DBAL schema:
```
app/console doctrine:phpcr:init:dbal
```

List of additional bundles and libs:

    * doctrine-phpcr-odm, jackalope, jackalope-doctrine-dbal, phpcr, phpcr-utils

    * DoctrinePHPCRBundle
    * DoctrineFixturesBundle

    * FOSUserBundle
    * FOSFacebookBundle (and facebook PHP SDK)
    * FOSRestBundle (and FOSRest)

    * LiipContainerWrapperBundle
    * LiipCacheControlBundle
    * LiipHelloBundle
    * LiipHyphenatorBundle (and OrgHeiglHyphenator)
    * LiipThemeBundle
    * LiipImagineBundle (and imagine lib)
    * LiipDoctrineCacheBundle
    * LiipFunctionalTestBundle

    * JMSAopBundle (and cg-library)
    * JMSSerializerBundle
    * JMSDebuggingBundle

    * BehatBundle (and behat, buzz)
    * MinkBundle

    * NelmioApiDocBundle

The key Bundle in this list is LiipHelloBundle as it provides usage examples
for most of the above mentioned Bundles:
https://github.com/liip/LiipHelloBundle