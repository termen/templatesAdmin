<?php
/**
 * @author		Aron Chavez Solis
 * @copyright	Lynx_App 2015
 * @version		0.1
 * @category	Unstable
 */

namespace Admin\Service;

use Admin\Model\AdminModel;
use Zend\Debug\Debug;

class AdminService{
	
	private $adminModel;
	
	/**
	 * 
	 * @return \Admin\Model\AdminMenuModel
	 */
	public function getAdminMenuModel(){
		return $this->adminModel = new AdminModel();
	}
	
	public function fetchAdminMenu()
	{
		
		$menu = $this->getAdminMenuModel()->fetchMenu();
		
		$subMenu = array('submenu' => $this->getAdminMenuModel()->fetchSubMenu());
		
		
		array_push($menu, $subMenu);
// 		$menu['submenu'] = $subMenu;
		
// 		Debug::dump($menu);
		
		return $menu;
	}
	
	/**
	 * 
	 * @param unknown $menuData
	 * @param unknown $user
	 * @return unknown
	 */
	public function addAdminMenu($menuData){
		
		if( isset($menuData['id_menu']) && $menuData['id_menu'] != ""){
			
			$dataAdminMenu = array(
					'id_menu'			=> $menuData['id_menu'],
					'id_menu_father'	=> $menuData['id_father'],
					'menu_name'			=> $menuData['name'],
			);
				
				
			$insertAdminMenu = $this->getAdminMenuModel()->editAdminMenu($dataAdminMenu);
			
		}else{
			
			$dataAdminMenu = array(
					'id_menu_father'	=> $menuData['id_father'],
					'menu_name'			=> $menuData['name'],
			);
			
			
			$insertAdminMenu = $this->getAdminMenuModel()->addAdminMenu($dataAdminMenu);
			
		}
		
		return $insertAsigForum;
		
	}
	
	/**
	 * @method	Método encargado de eliminar los posts creados
	 * @param	unknown $menuData
	 * @param	unknown $user
	 * @return	unknown
	 */
	public function deleteAdminMenu($menuData){
		$dataAsig = array(
				'id_menu'	=> $menuData['id_menu'],
		);
	
	
			$deleteWikiId	= $this->getAdminMenuModel()->deleteAdminMenuById($dataIdPost);
			
		return $deleteWikiId;
	}
}