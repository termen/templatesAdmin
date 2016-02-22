<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonLogin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Form\loginForm;
use Login\Form\Filter\loginFilter;

class IndexController extends AbstractActionController
{
	private $session, $outSession;
	
	private $loginForm ;
	
	public function __construct(){
		$this->loginForm = new loginForm();
		$this->loginForm->setInputFilter(new loginFilter());
	}
	
    public function indexAction()
    {
    	$form = new LoginForm();
    	
    	// Si el usuario ha enviado el formulario
    	$request = $this->getRequest();
    	
    	if($request->isPost()){
    		$data = $request->getPost();
    		$this->loginForm->setData($data);
    		
    		if ($this->loginForm->isValid()){
    			$data = $this->loginForm->getData();
    			$pass = md5($this->loginForm->get('pass')->getValue());
    			
    		}else{
    			$errors = $this->loginForm->getMessages();
    		}
    	}
    	
    	$add = array(
    			'loginForm'		=> $this->loginForm,
    			 
    	);
    	return new ViewModel($add);
    	
    }
    
    public function logonAction(){
    	print_r("__");exit;
		
    }
    
    
    public function logoutAction(){
		return $this->redirect()->toRoute('login'); // redirigir al ej: login
    }

}
