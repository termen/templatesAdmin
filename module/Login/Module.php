<?php

namespace Login;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\ModuleManager;
use Login\Authentication\AuthenticationListener;

class Module
{
	public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	
    public function init(ModuleManager $ModuleManager)
    {
    	$ModuleManager->getEventManager()->getSharedManager()->attach(__NAMESPACE__,
    			'dispatch', function($e) {
    				$e->getTarget()->layout('login/layout');
    			});
    }
}
