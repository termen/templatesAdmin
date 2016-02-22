<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Application\Service\MenuService;

class IndexController extends AbstractActionController
{
	
	private $menuService, $baseURL;

	public function  __construct(){
		$this->baseURL = "";
	}
	
	public function getMenuserviceAction(){
		
		return $this->menuService = new MenuService();
		 
	}
	
    public function indexAction()
    {
    	
        return new ViewModel();
    }
	
    public function addAction()
    {
    	
        return new ViewModel();
    }
	
    public function deleteAction()
    {
    	
        return new ViewModel();
    }
    
	public function getMenuhomeAction(){
		
		$menu		= $this->getMenuserviceAction()->fetchMenu();
		
    	$response	=  $this->getResponse()
    							->setContent(\Zend\Json\Json::encode(
    									array(	"response"	=> "ok", 
    											"data"		=> $menu )));

    	return $response;
    	exit;
	}
	
}
