<?php
namespace Siwapp\EstimateBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Siwapp\EstimateBundle\Entity\Estimate;
use Siwapp\EstimateBundle\Entity\Item;


use Symfony\Component\Yaml\Parser;
use Doctrine\Common\Util\Inflector;

class LoadItemData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
      $bpath = $this->container->get('kernel')->getBundle('SiwappEstimateBundle')->getPath();
      $value = $yaml->parse(file_get_contents($bpath.'/DataFixtures/estimates.yml'));
      
      foreach($value['Item'] as $ref => $values)
      {
          $item = new Item();
          $estimate = new Estimate();
          foreach($values as $fname => $fvalue)
          {
              if($fname == 'Estimate')
              {
                  $fvalue = $manager->merge($this->getReference($fvalue));
              }

              $method = 'set'.Inflector::camelize($fname);
              if(is_callable(array($item, $method)))
              {
                  call_user_func(array($item, $method), $fvalue);
              }
          }
          $manager->persist($item);
          $manager->flush();
          $this->addReference($ref, $item);
      }
      
      foreach($value['ItemTax'] as $ref => $values)
      {
          $item = $this->getReference($values['Item']);
          $tax = $this->getReference($values['Tax']);
          $item->addTax($tax);
          $manager->persist($item);
          $manager->flush();
      }
    }
    
    public function getOrder()
    {
      return '3';
    }
}