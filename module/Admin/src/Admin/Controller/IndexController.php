<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
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
    	
        return new ViewModel();
    }
	
    public function deleteAction()
    {
    	
        return new ViewModel();
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
