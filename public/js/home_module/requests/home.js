/**
 * @author		Aron Chavez Solis
 * @copyright	YanicShow 2015
 * @version		0.1
 * @category	Unstable
 */
$.noConflict();
/*
 * 
 */
function getHomeMenu(){
//	console.log('getting getHomeMenu()');
	$.ajax({
		url  : $basePath + "/application/getmenuhome",
		type : "POST",
		dataType: 'json',
		success: function(response){
			
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

function getHomeContect(){
	
	$.ajax({
		url  : $basePath + "/application/getcontenthome",
		type : "POST",
		dataType: 'json',
		success: function(response){
			
			
			var $formatDate;
			
			$.each(response.data, function(index, obj){
				
				if(index == 0){

					var date = obj.content_date;
					$formatDate = formatDate(new Date(date));
					
					$('#post-datde').append($formatDate + ' por <a href="#">Abner Showman</a></p>');
				}
				
				if(obj.type == "text"){
					$('#home_title_'+index).append( obj.section_title );
					$('#home_text_'+index).append( obj.section_content );
				}
				else if(obj.type == "image"){
					$('#home_image_'+index).append( obj.section_image );
				}
				
				
			});
			
		},
		error : function(){ 
//			alert("Ocurrio un error, intentalo de nuevo");
			console.log("Ocurrio un error, intentalo de nuevo");
		}
	});
	
}
