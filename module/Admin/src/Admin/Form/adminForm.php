<?php
	
/**
 * @author		Aron Chavez Solis
 * @copyright	Admin_Page 2015
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
					'id'		=> 'formHome',
					'name'		=> 'formHome',
					'method'	=> 'Post',
// 					'action'	=> 'addWiki'
			));
			
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
							'class'			=> 'form-control',
							'required'		=> 'required',
							'placeholder'	=> 'Agrega tu Informacón ...'
					),
			));
			
			$this->add(array(
					'name'	=> 'select_image',
					'type'	=> 'Zend\Form\Element\File',
					'options'	=>	array(
							'label'	=>	'Imagen:'
					),
					'attributes'	=>	array(
							'id'			=> 'select_image',
							'class'			=> 'form-control',
							'required'		=> 'required',
							'placeholder'	=> 'Selecciona una imagen ...'
					),
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
					'name' => 'save-home',
					'attributes' => array(
							'id'		=> 'save',
							'type'		=> 'button',
							'class' 	=> 'btn btn-lg btn-primary rte-wiki',
							'value'		=> 'Guardar',
							'title'		=> 'Guardar',
							'onclick'	=> 'javascript: saveHome()'
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
			
		}

	}