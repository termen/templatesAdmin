<?php
/**
 *
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Debug\Debug;

use Admin\Service\AdminService;

class IndexController extends AbstractActionController
{
	
	private $menuAdminService, $baseURL;

	public function  __construct(){
		$this->baseURL = "";
	}
	
	public function getMenuadminserviceAction(){
		
		return $this->menuAdminService = new AdminService();
		 
	}
	
    public function indexAction()
    {
    	
        return new ViewModel();
    }
	
    public function addAction()
    {
    	
        $response	=  $this->getResponse()
    	->setContent(\Zend\Json\Json::encode(
    			array(	"response"	=> "ok",
    					"data"		=> $add )));
    
    	return $response;
    	exit;
    }
	
    public function deleteAction()
    {
    	
        $response	=  $this->getResponse()
    	->setContent(\Zend\Json\Json::encode(
    			array(	"response"	=> "ok",
    					"data"		=> $delete )));
    
    	return $response;
    	exit;
    }
	

    public function getMenuadminAction(){
    	
    	$menu		= $this->getMenuadminserviceAction()->fetchAdminMenu();
    	
//     	Debug::dump($menu);
    	
    	$response	=  $this->getResponse()
    	->setContent(\Zend\Json\Json::encode(
    			array(	"response"	=> "ok",
    					"data"		=> $menu )));
    
    	return $response;
    	exit;
    }
}
