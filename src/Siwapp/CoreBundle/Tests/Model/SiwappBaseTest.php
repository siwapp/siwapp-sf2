<?php
namespace Siwapp\CoreBundle\Tests;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class SiwappBaseTest extends \PHPUnit_Framework_TestCase
{
    protected $_application;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setUp()
    {
        $kernel = new \AppKernel("test", true);
        $kernel->boot();
        $this->em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->_application = new Application($kernel);
        $this->_application->setAutoExit(false);
        $this->runConsole("doctrine:schema:create");
        $this->runConsole("doctrine:schema:drop", array("--force" => true));
        $this->runConsole("doctrine:schema:create");
        $this->runConsole("cache:warmup");
        //        $this->runConsole("doctrine:fixtures:load", array("--fixtures" => __DIR__ . "/../DataFixtures"));
        $this->runConsole("doctrine:fixtures:load");
    }

    protected function runConsole($command, Array $options = array())
    {
        $options["-e"] = "test";
        $options["-q"] = null;
        $options = array_merge($options, array('command' => $command));
        return $this->_application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }

    public function testDummy()
    {
    }
}