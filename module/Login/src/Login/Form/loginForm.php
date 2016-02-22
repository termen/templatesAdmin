<?php
namespace Login\Form;

use Zend\Form\Form;
use Zend\Form\Annotation\Attributes;
use Zend\Validator\Identical;
use Zend\Form\Element\Checkbox;
				
class loginForm extends Form{
	
	public function __construct( $name=null ){
		parent::__construct($name);
		
		$this ->setName('loginForm')
		->setAttributes(array(
				'id'		=> 'loginForm',
				'name'		=> 'loginForm',
				'method'	=> 'Post',
		));
		
		$this->add(array(
				'name' => 'user',
				'options' => array(
						'label'		=> 'Usuario:',
				),
				'attributes' => array(
						'type'			=> 'text',
						'class'			=> 'input-lg form-control',
						'id'			=> 'user',
						'name'			=> 'user',
						'autofocus'		=> 'autofocus',
						'placeholder'	=> 'Usuario...',
				)
		));
		
		$this->add(array(
				'name'		=> 'pass',
				'options'	=> array(
						'label'		=> 'Contraseña:',
				),
				'attributes'	=> array(
						'type'			=> 'password',
						'class'			=> 'input-lg form-control',
						'id'			=> 'pass',
						'name'			=> 'pass',
						'autofocus'		=> 'autofocus',
						'placeholder'	=> 'Contraseña...',
				)
		));
		
		$this->add(array(
				'name'		=> 'remember',
				'options'	=> array(
						'label'		=> 'Recordarme',
				),
				'attributes'	=> array(
						'id'		=> 'remember',
						'type'		=> 'checkbox',
// 						'value'		=> 'remember-me'
						'value'		=> '1'
				)
				
		));
		
		$this->add(array(
				'name' => 'login',
				'attributes' => array(
						'id'		=> 'login',
						'type'		=> 'submit',
						'class' 	=> 'btn btn-lg btn-primary',
						'value'		=> 'Entrar',
				),
		));
		
		$this->add(array(
				'type' => 'Zend\Form\Element\Csrf',
				'name' => 'loginCsrf',
				'options' => array(
						'csrf_options' => array(
								'timeout' => 7200
						)
				)
		));
	}

}