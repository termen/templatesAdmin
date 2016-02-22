<?php
	
/**
 * @author		Aron Chavez Solis
 * @copyright	Lynx_App 2015
 * @version		0.1
 * @category	Unstable
 * @package		Admin
 * @filesource	Admin/Form/adminForm.php
 */
	
	namespace Admin\Form;
	
	use Zend\Form\Form;
	use Zend\Form\Annotation\Attributes;
	use Zend\Validator\Identical;
			
	class adminForm extends Form{
		
		/**
		 * @method __construct
		 * @param string $name
		 * Formularios ZF2 De la Vista Admin
		 */
		
		public function __construct( $name=null ){
			parent::__construct($name);
			
			$this ->setName('addTheme')
			->setAttributes(array(
					'id'		=> 'addTheme',
					'name'		=> 'addTheme',
					'method'	=> 'Post',
					'action'	=> 'addWiki'
			));
			
			$this->add(array(
					'name' => 'wiki-title',
					'options' => array(
							'label'		=> 'Título:',
					),
					'attributes' => array(
							'type'		=> 'text',
							'class'		=> 'form-control',
							'id'		=> 'wiki-title',
							'required'	=> 'required'
					)
			));
			
			$this->add(array(
					'name' => 'id_asignature',
					'type' => 'Zend\Form\Element\Select',
					'options' => array(
							'label'			=> 'Clase:',
							'value_options' => array(
		      						'0'		=> 'Classes',
							),
					),
					'attributes' => array(
							'id'			=> 'id_asignature',
							'class'			=> 'form-control id_asignature',
							'required'		=> 'required',
							'placeholder'	=> 'Agrega tu Informacón ...'
					),
			));
			


			$this->add(array(
					'name' => 'wiki-content',
					'options' => array(
							'label'		=> 'Contenido:',
					),
					'attributes' => array(
							'type'		=> 'textarea',
							'class'		=> 'form-control content',
							'id'		=> 'wiki-content',
							'required'	=> 'required'
					)
			));

			$this->add(array(
					'name' => 'save-wiki',
					'attributes' => array(
							'id'		=> 'rte-wiki',
							'type'		=> 'button',
							'class' 	=> 'btn btn-lg btn-primary rte-wiki',
							'value'		=> 'Guardar',
							'title'		=> 'Guardar',
							'onclick'	=> 'javascript: saveWiki()'
					),
			));
			
			$this->add(array(
					'name' => 'cancel',
					'attributes' => array(
							'id'		=> 'cancel',
							'type'		=> 'button',
							'class' 	=> 'btn btn-lg btn-danger',
							'value'		=> 'Cancelar',
							'title'		=> 'Cancelar',
							'onclick'	=> 'javascript: clean()'
					),
			));
			
			/*
			 * 
			 */
			
			$this->add(array(
					'name' => 'post-title',
					'options' => array(
							'label'		=> 'Título:',
					),
					'attributes' => array(
							'type'		=> 'text',
							'class'		=> 'form-control',
							'id'		=> 'post-title',
							'required'	=> 'required'
					)
			));
			
			$this->add(array(
					'name' => 'post-content',
					'options' => array(
							'label'		=> 'Contenido:',
					),
					'attributes' => array(
							'type'		=> 'textarea',
							'class'		=> 'form-control content',
							'id'		=> 'post-content',
							'required'	=> 'required'
					)
			));
			
			$this->add(array(
					'name' => 'save-post',
					'attributes' => array(
							'id'		=> 'rte-wiki',
							'type'		=> 'button',
							'class' 	=> 'btn btn-lg btn-primary rte-wiki',
							'value'		=> 'Guardar',
							'title'		=> 'Guardar',
							'onclick'	=> 'javascript: savePost()'
					),
			));

		}

	}