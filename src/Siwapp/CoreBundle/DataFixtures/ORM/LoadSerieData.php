<?php
namespace Siwapp\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Util\Inflector;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Siwapp\CoreBundle\Entity\Serie;


class LoadSerieData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $series = array(
                       'Serie_1'=>array(
                                      'name'=>'Internet',
                                      'value'=>'ASET-',
                                      'first_number'=>1, 
                                      'enabled'=>true
                                      ),
                       'Serie_2'=>array(
                                      'name'=>'Design',
                                      'value'=>'BSET-',
                                      'first_number'=>4, 
                                      'enabled'=>true
                                      ),
                       'Serie_3'=>array(
                                      'name'=>'Others',
                                      'value'=>'CSET-',
                                      'first_number'=>1, 
                                      'enabled'=>true
                                      )
                       );
        foreach($series as $ref => $values)
        {
            $serie = new Serie();
            foreach($values as $fname => $fvalue)
            {
                $method = 'set'.Inflector::camelize($fname);
                if(is_callable(array($serie, $method)))
                {
                    call_user_func(array($serie, $method), $fvalue);
                }
            }
            $manager->persist($serie);
            $manager->flush();
            $this->addReference($ref, $serie);
        }
    }
    
    public function getOrder()
    {
        return '0';
    }

}