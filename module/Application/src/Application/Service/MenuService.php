<?php
/**
 * @author		Aron Chavez Solis
 * @copyright	YanicShow 2015
 * @version		0.1
 * @category	Unstable
 */

namespace Application\Service;

use Application\Model\HomeModel;
use Zend\Debug\Debug;

class MenuService{
	
	private $menuModel;
	
	/**
	 * 
	 * @return \Application\Model\HomeModel
	 */
	public function getHomeModel(){
		return $this->menuModel = new HomeModel();
	}
	
	public function fetchMenu()
	{
		
		$menu = $this->getHomeModel()->fetchMenu();
		
		return $menu;
	}
	
	public function fetchContent()
	{
		
		$content = $this->getHomeModel()->fetchContent();
		
// 		Debug::dump($content);
		
		return $content;
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
				
				
			$insertMenu = $this->getHomeModel()->editMenu($dataMenu);
			
		}else{
			
			$dataMenu = array(
					'id_menu_father'	=> $menuData['id_father'],
					'menu_name'			=> $menuData['name'],
			);
			
			
			$insertMenu = $this->getHomeModel()->addMenu($dataMenu);
			
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
	
	
			$deleteWikiId	= $this->getHomeModel()->deleteMenuById($dataIdPost);
			
		return $deleteWikiId;
	}
}