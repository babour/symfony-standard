<?php

namespace Acme\DemoBundle\Tests\Functional;

use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;

use Symfony\Component\BrowserKit\Client;

use Doctrine\ODM\PHPCR\Tools\Console\Command\RegisterSystemNodeTypesCommand;

use Jackalope\Session;
use Jackalope\Transport\DoctrineDBAL\Client AS DoctrineDBALClient;
use Jackalope\Transport\DoctrineDBAL\RepositorySchema;

abstract class WebTestCase extends BaseWebTestCase
{
    static protected $fixturesLoaded = false;

    public function setUp()
    {
        if (self::$fixturesLoaded) {
            return;
        }

        $this->loadFixtures(array(
            'Acme\DemoBundle\DataFixtures\ORM\LoadUserData',
        ), null, 'doctrine');

        self::$fixturesLoaded = true;
    }

    /**
     * Callback function to be executed after Schema Execution.
     * Use this to execute acl:init or other things necessary.
     */
    protected function postFixtureSetup()
    {
        if (self::$fixturesLoaded) {
            return;
        }

        $session = $this->getContainer()->get('doctrine_phpcr')->getConnection();
        if ($session instanceof Session && $session->getTransport() instanceof DoctrineDBALClient) {
            $connection = $this->getContainer()->get('doctrine')->getConnection();
            $schema =  new RepositorySchema($connection);
            $schema->reset();

            $command = new RegisterSystemNodeTypesCommand();
            $command->registerSystemNodeTypes($session);
        }
    }

    protected function login(Client $client)
    {
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form(array(
            '_username'  => 'admin',
            '_password'  => 'admin',
        ));

        $client->submit($form);
    }
}
