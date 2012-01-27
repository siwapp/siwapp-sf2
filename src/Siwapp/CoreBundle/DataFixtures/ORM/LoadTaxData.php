<?php
namespace Siwapp\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Util\Inflector;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Siwapp\CoreBundle\Entity\Tax;


class LoadTaxData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $taxes = array(
                       'Tax_1'=>array(
                                      'name'=>'IVA 16%',
                                      'value'=>16,
                                      'active'=>true, 
                                      'is_default'=>true
                                      ),
                       'Tax_2'=>array(
                                      'name'=>'IVA 4%',
                                      'value'=>4,
                                      'active'=>true, 
                                      'is_default'=>false
                                      ),
                       'Tax_3'=>array(
                                      'name'=>'IVA 7%',
                                      'value'=>7,
                                      'active'=>false, 
                                      'is_default'=>false
                                      ),
                       'Tax_4'=>array(
                                      'name'=>'IRPF',
                                      'value'=>-15,
                                      'active'=>true, 
                                      'is_default'=>true
                                      )
                       );
        foreach($taxes as $ref => $values)
        {
            $tax = new Tax();
            foreach($values as $fname => $fvalue)
            {
                $method = 'set'.Inflector::camelize($fname);
                if(is_callable(array($tax, $method)))
                {
                    call_user_func(array($tax, $method), $fvalue);
                }
            }
            $manager->persist($tax);
            $manager->flush();
            $this->addReference($ref, $tax);
        }
    }
    
    public function getOrder()
    {
        return '0';
    }

}