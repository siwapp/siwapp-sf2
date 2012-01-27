<?php
namespace Siwapp\EstimateBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Siwapp\EstimateBundle\Entity\Estimate;
use Siwapp\EstimateBundle\SiwappEstimateBundle;
use Symfony\Component\Yaml\Parser;
use Doctrine\Common\Util\Inflector;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEstimateData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $yaml = new Parser();
        $bpath = $this->container->get('kernel')->getBundle('SiwappEstimateBundle')->getPath();
        $value = $yaml->parse(file_get_contents($bpath.'/DataFixtures/estimates.yml'));
      
        foreach($value['Estimate'] as $ref => $values)
            {
                $estimate = new Estimate();
                foreach($values as $fname => $fvalue)
                    {
                        $method = 'set'.Inflector::camelize($fname);
                        if(is_callable(array($estimate, $method)))
                            {
                                call_user_func(array($estimate, $method), $fvalue);
                            }
                    }
                $manager->persist($estimate);
                $manager->flush();
                $this->addReference($ref, $estimate);
            }

    }

    public function getOrder()
    {
        return '2';
    }
}