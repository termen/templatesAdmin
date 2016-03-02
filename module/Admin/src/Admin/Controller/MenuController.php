<?php
/**
 *
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Debug\Debug;

use Admin\Service\AdminService;

class MenuController extends AbstractActionController
{
	
	private $AdminService ;

	public function  __construct(){
		
	}
	
	public function getMenuadminserviceAction(){
		
// 		return $this->AdminService = new AdminService();
		 
	}
	
    public function indexAction()
    {
    	
        return new ViewModel();
    }
	
}
