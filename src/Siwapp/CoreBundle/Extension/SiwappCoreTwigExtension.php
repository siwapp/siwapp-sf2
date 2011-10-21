<?php
namespace Siwapp\CoreBundle\Extension;

/**
 * This is a Twig extension with methods common to all the application.
 */
class SiwappCoreTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return "siwapp_core_twig_extension";
    }
    
    public function getFilters()
    {
        return array(
            'menu_active_tab' => new \Twig_Filter_Method($this, 'menu_active_tab'),
        );
    }
    
    /**
     * @param string $routename Name of the route
     * @param string $prefix Prefix to test
     * @return string "active" if $routename is prefixed by $prefix
     * Ex: dashboard_index, dashboard_ => "active"
     * Ex: dashboard_index, invoice_   => ""
     */
    public function menu_active_tab($routename, $prefix)
    {
        return (strpos($routename, $prefix) === 0 ? "active" : "");
    }
}