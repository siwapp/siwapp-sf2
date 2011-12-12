<?php
namespace Siwapp\RecurringInvoiceBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice;
use SIwapp\RecurringInvoiceBundle\SiwappRecurringInvoiceBundle;
use Symfony\Component\Yaml\Parser;
use Doctrine\Common\Util\Inflector;

class LoadRecurringInvoiceData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
  private $container;

  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

    public function load($manager)
    {

      $yaml = new Parser();
      // TODO: find a way of obtainin Bundle's path with the help of $this->container
      $bpath = $this->container->get('kernel')->getBundle('SiwappRecurringInvoiceBundle')->getPath();
      $value = $yaml->parse(file_get_contents($bpath.'/DataFixtures/recurring_invoices.yml'));
      
      foreach($value['RecurringInvoice'] as $ref => $values)
      {
          $recurring_invoice = new RecurringInvoice();
          foreach($values as $fname => $fvalue)
          {
              $method = 'set'.Inflector::camelize($fname);
              if(is_callable(array($recurring_invoice, $method)))
              {
                  call_user_func(array($recurring_invoice, $method), $fvalue);
              }
          }
          $manager->persist($recurring_invoice);
          $manager->flush();
          $this->addReference($ref, $recurring_invoice);
      }

    }

    public function getOrder()
    {
      return '2';
    }
}