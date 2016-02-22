<?php
namespace Admin\Form\Filter;

use Zend\InputFilter\InputFilter;
				
class adminFilter extends InputFilter{

	public function __construct(){
		
		$isEmpty			= \Zend\Validator\NotEmpty::IS_EMPTY;
		$minlenght			= \Zend\Validator\StringLength::TOO_SHORT;
		$maxlenght			= \Zend\Validator\StringLength::TOO_LONG;
		$specialSymb		= \Zend\Validator\Digits::NOT_DIGITS;
		$specialCharacters	=\Zend\Validator\Digits::STRING_EMPTY;
		
		$this->add(array(
				'name' => 'user',
            	'required' => true,
				'filters'		=> array(
		                array(
		                    	'name' => 'StripTags'
		                ),
						array(
								
								'name' => 'StringTrim'
						)
				),
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'options'	=> array(
										'messages'	=> array(
												$isEmpty	=> 'Escriba su Usuario...'
										)
								),
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'StringLength',
								'options'	=> array(
										'encoding'	=> 'UTF-8',
										'min'		=> 8,
										'max'		=> 8,
										'messages'	=> array(
												$minlenght	=> 'El Usuario debe ser de 8 caracteres',
												$maxlenght	=> 'El Usuario debe ser de 8 caracteres'
										)
								),
						),
// 						array(
// 								'name'		=> 'Digits',
// 								'options'	=> array(
// 										'number'	=> 'number',
// 										'messages'	=> array(
// 												$specialSymb	=> 'El Usuario solo debe llevar dígitos',
// 										)
// 								),
// 						)
				)
		));
		
		$this->add(array(
				'name'		=> 'pass',
            	'required'	=> true,
				'filters'	=> array(
		                array(
		                    	'name' => 'StripTags'
		                ),
				),
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'options'	=> array(
										'messages'	=> array(
												$isEmpty	=> 'Escriba su Contraseña...'
										)
								),
								'break_chain_on_failure'	=> true
						),array(
								'name'		=> 'StringLength',
								'options'	=> array(
										'encoding'	=> 'UTF-8',
										'min'		=> 8,
										'max'		=> 11,
										'messages'	=> array(
												$minlenght	=> 'La Contraseña debe tener al menos 8 caracteres',
												$maxlenght	=> 'La Contraseña debe tener menos de 11 caracteres'
										)
								),
						)
				)
		));
		
	}

}