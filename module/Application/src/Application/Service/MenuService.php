<?php
/**
 * @author		Aron Chavez Solis
 * @copyright	Lynx_App 2015
 * @version		0.1
 * @category	Unstable
 */

namespace Application\Service;

use Application\Model\MenuModel;
use Zend\Debug\Debug;

class MenuService{
	
	private $menuModel;
	
	/**
	 * 
	 * @return \Application\Model\MenuModel
	 */
	public function getMenuModel(){
		return $this->menuModel = new MenuModel();
	}
	
	public function fetchMenu()
	{
		
		$menu = $this->getMenuModel()->fetchMenu();
// 		$asignatures = $this->getAdminModel()->fetchAsignatures();

// 		print_r($matricule);
// 		print_r($asignatures);
// 		exit();
		
		return $menu;
	}
	
	/**
	 * 
	 * @param unknown $menuData
	 * @param unknown $user
	 * @return unknown
	 */
	public function addMenu($menuData){
		
		if( isset($menuData['id_menu']) && $menuData['id_menu'] != ""){
			
			$dataMenu = array(
					'id_menu'			=> $menuData['id_menu'],
					'id_menu_father'	=> $menuData['id_father'],
					'menu_name'			=> $menuData['name'],
			);
				
				
			$insertMenu = $this->getMenuModel()->editMenu($dataMenu);
			
		}else{
			
			$dataMenu = array(
					'id_menu_father'	=> $menuData['id_father'],
					'menu_name'			=> $menuData['name'],
			);
			
			
			$insertMenu = $this->getMenuModel()->addMenu($dataMenu);
			
		}
		
		return $insertAsigForum;
		
	}
	
	/**
	 * @method	Método encargado de eliminar los posts creados
	 * @param	unknown $menuData
	 * @param	unknown $user
	 * @return	unknown
	 */
	public function deleteMenu($menuData){
		$dataAsig = array(
				'id_menu'	=> $menuData['id_menu'],
		);
	
	
			$deleteWikiId	= $this->getMenuModel()->deleteMenuById($dataIdPost);
			
		return $deleteWikiId;
	}
}