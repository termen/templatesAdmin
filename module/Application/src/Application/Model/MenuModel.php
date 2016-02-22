<?php
/**
 * @author		Aron Chavez Solis
 * @copyright	Lynx_App 2015
 * @version		0.1
 * @category	Unstable
 */

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\Feature;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class MenuModel extends TableGateway{
	
	private $dbAdapter;
	
	/**
	 * @method	Constructor encargado de crear el objeto para manejar la conexióna la base de datos.
	 * @var		$dbAdapter Variable privada encargada de manejar el adaptador de la abse de datos,
	 * 			maneja la conexión establecida en los archivos global.php y local.php.
	 * @param	table Parámetro en el que se especifica la tabla a utilizar por default.
	 */
	public function __construct()
	{
		$this->dbAdapter	= \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table		= 'menu';
		$this->featureSet	= new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	
	public function fetchMenu(){
		$sql	= new Sql($this->dbAdapter);
		$select	= $sql->select()
						->from(		$this->table)
						->where(	array(	'id_menu_father'	=>	1));
				
		$selectString	= $sql->getSqlStringForSqlObject($select);
		$execute		= $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$result			= $execute->toArray();
		
// 		print_r($result);
// 		exit();
		
		return $result;
	}
	
	public function addMenu($dataMenu){
		
		$addMenu				= $this->insert($dataMenu);
		$dataMenu['id_menu']	= $this->getLastInsertValue();
		
		return $dataMenu;
		
	}
	
	public function updateMenu($dataMenu){
		
		$addMenu				= $this->insert($dataMenu);
		$dataMenu['id_menu']	= $this->getLastInsertValue();
		
		return $dataMenu;
		
	}
	
	public function deletePostById($dataIdPost){

		$deletePost		= $this->delete($dataIdPost);
		
		return $this->fetchWiki();
	}
	
	
	
}