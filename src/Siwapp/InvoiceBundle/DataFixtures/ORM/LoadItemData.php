<?php
namespace Siwapp\InvoiceBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Siwapp\InvoiceBundle\Entity\Invoice;
use Siwapp\InvoiceBundle\Entity\Item;


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
        $bpath = './src/Siwapp/InvoiceBundle';
        $value = $yaml->parse(file_get_contents($bpath.'/DataFixtures/invoices.yml'));
        foreach($value['Item'] as $ref => $values)
        {
            $item = new Item();
            $invoice = new Invoice();
            foreach($values as $fname => $fvalue)
            {
                if($fname == 'Invoice')
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