/**
 * @author		Aron Chavez Solis
 * @copyright	Lynx_App 2015
 * @version		0.1
 * @category	Unstable
 */

/*
 * 
 */
function getHomeMenu(){
	
	$.ajax({
		url  : $basePath + "/application/getmenuhome",
		type : "POST",
		dataType: 'json',
		success: function(response){
			
			console.log('success');
			var $home_list = $('#home_list');
			var $login_list = $('#login_list');
			
			$.each(response.data, function(index, obj){
				
				if(obj.menu_name == "INICIO"){
					$home_list.append('<li class="menu active" ><a href="' + obj.ruta + '">' 
							+ obj.menu_name + '</a></li>');
				}
				else if(obj.menu_name == "INICIA SESION"){
					$login_list.append('<li class="menu active" ><a href="' + obj.ruta + '">' 
							+ obj.menu_name + '</a></li>');
				}
				else{
					$home_list.append('<li class="menu" ><a href="' + obj.ruta + '">' 
							+ obj.menu_name + '</a></li>');
				}
				
			});
			
		},
		error : function(){ 
//			alert("Ocurrio un error, intentalo de nuevo");
			console.log("Ocurrio un error, intentalo de nuevo");
			}
	});
	
}

/*
 * 
 */



function checkMenuOptions(){
	
	$.ajax({
		url 		: $basePath + "/admin/fetchMenu",
		type		: "POST",
		dataType	: 'json',
		success		: function(response){
			
			var $content = $('#wiki-contents');
			$content.html('<th><h4 class="">Nombre</h4></th>'
						 +'<th><h4 class="">Acción</h4></th>');
			
			$.each(response.data, function(index, obj){
				
				$content.append('<tr><td>' + obj.wiki_name + '</td>'
						+'<td><a class="btn btn-success activity-btn"' 
						+'onclick="javascript: editWiki('+obj.id_wiki+')">Editar</a></td>'
						+'<td><a class="btn btn-danger activity-btn"'
						+ 'onclick="javascript: deleteWiki('+obj.id_asig_wiki+')">Eliminar</a></td>'
						+'</tr>');
			});
		},
		error	: function(){
//			alert("Algo salio mal, intentalo de nuevo");
			$content.append('<tr><td>'
					+'<h2 class="">Ups! Algo salio mal.</h2>'
					+'<h3 class="">Intentalo de nuevo.</h3>'
					+'</td></tr>');
		}
	});
}

/*
 * 
 */
function saveMenu(){
	
	var postTitle = $('#post-title').val();
	var postContent = $('#post-content').val();
	
	alert(postTitle+'___'+postContent);
	$.ajax({
		url  : $basePath + "/admin/savePosts",
		type : "POST",
		data : {post_title:postTitle, content:postContent},
		success : function(response){
			alert("Contenido Guardado");
		},
		error  : function(){
			alert("Algo salio mal, intentalo de nuevo");
		}
	});
}

/*
 * 
 */
function editMenu(id_menu){
	
	$.ajax({
		url		 : $basePath + "/admin/searchWiki",
		type	 : "POST",
		data	 : {id_wiki:idwiki},
		dataType :"json",
		success: function(response){
			
			$.each(response.data, function(index, obj){
				$('#title').val(''+obj.wiki_name+'');
				
//				asignatures();
				$('#id_asignature').val(obj.id_asignature);
				
				$('.wiki-content').show(600);
				$('.activity').hide(600);
			    $('.wiki-list').hide(600);
			    
				$('.wiki_content').html(obj.wiki_content);
				
			});
		},
		error  : function(){
			alert("Algo salio mal, intentalo de nuevo");
		}
	});
}

/*
 * 
 */
function deleteMenu(idwikiasig){
	$.ajax({
		url		 : $basePath + "/admin/deleteWiki",
		type	 : "POST",
		data	 : {id_asig_wiki:idwikiasig},
		dataType :"json",
		success: function(response){
			
			var $content = $('#wiki-contents');
			$content.html('<th>'
		            +'<h4 class="">Wikis</h4>'
		            +'</th>');
			
			$.each(response.data, function(index, obj){
				
				$content.append('<tr><td>' + obj.wiki_name + '</td>'
						+'<td><a class="btn btn-success activity-btn"' 
						+'onclick="javascript: editWiki('+obj.id_wiki+')">Editar</a></td>'
						+'<td><a class="btn btn-danger activity-btn"'
						+ 'onclick="javascript: deleteWiki('+obj.id_asig_wiki+')">Eliminar</a></td>'
						+'</tr>');
			});
		},
		error  : function(){
//			alert("Algo salio mal, intentalo de nuevo");
			$content.append('<tr><td><h2>Algo salio mal, intentalo de nuevo</h2></td>');
		}
	});
}
