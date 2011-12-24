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

    protected $_tax_repo;
    protected $_invoice_repo;
    protected $_recurring_invoice_repo;
    protected $_estimate_repo;
    protected $_invoice_item_repo;
    protected $_recurring_inovice_item_repo;
    protected $_estimate_item_repo;

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

    protected function getRepo($repo_name)
    {
        switch($repo_name)
        {
            case 'tax':
                if(!$this->_tax_repo)
                {
                    $this->_tax_repo = $this->em->getRepository('SiwappCoreBundle:Tax');
                }
                return $this->_tax_repo;
                break;
            case 'invoice':
                if(!$this->_invoice_repo)
                {
                    $this->_invoice_repo = $this->em->getRepository('SiwappInvoiceBundle:Invoice');
                }
                return $this->_invoice_repo;
                break;
            case 'recurring_invoice':
                if(!$this->_recurring_invoice_repo)
                {
                    $this->_recurring_invoice_repo = $this->em->getRepository('SiwappRecurringInvoiceBundle:RecurringInvoice');
                }
                return $this->_recurring_invoice_repo;
                break;
            case 'estimate':
                if(!$this->_estimate_repo)
                {
                    $this->_estimate_repo = $this->em->getRepository('SiwappEstimateBundle:Estimate');
                }
                return $this->_estimate_repo;
                break;
            case 'invoice_item':
                if(!$this->_invoice_item_repo)
                {
                    $this->_invoice_item_repo = $this->em->getRepository('SiwappInvoiceBundle:Item');
                }
                return $this->_invoice_item_repo;
                break;
            case 'recurring_invoice_item':
                if(!$this->_recurring_invoice_item_repo)
                {
                    $this->_recurring_invoice_item_repo = $this->em->getRepository('SiwappRecurringInvoiceBundle:Item');
                }
                return $this->_recurring_invoice_item_repo;
                break;
            case 'estimate_item':
                if(!$this->_estimate_item_repo)
                {
                    $this->_estimate_item_repo = $this->em->getRepository('SiwappEstimateBundle:Item');
                }
                return $this->_estimate_item_repo;
                break;
        }
    }

    public function testDummy()
    {
    }

}