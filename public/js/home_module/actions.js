/**
 * @author		Aron Chavez Solis
 * @copyright	YanicShow 2015
 * @version		0.1
 * @category	Unstable
 */

jQuery.noConflict();

$(document).ready(function($) {

	getHomeMenu();
	getHomeContent();
    
    /**
     * 	@posts
     */
    
});

function formatDate(d) {

//    var d_names = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
//
//    var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	
	var d_names = new Array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

    var m_names = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",  "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

	
    var curr_day = d.getDay();
    var curr_date = d.getDate();
//    var sup = "";
//    if (curr_date == 1 || curr_date == 21 || curr_date == 31) {
//        sup = "st";
//    } else if (curr_date == 2 || curr_date == 22) {
//        sup = "nd";
//    } else if (curr_date == 3 || curr_date == 23) {
//        sup = "rd";
//    } else {
//        sup = "th";
//    }
    
    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();

    
//    var ret = d_names[curr_day] + " " + m_names[curr_month] + " " + curr_date + sup + "  " + curr_year;
    var ret = m_names[curr_month] + " " + curr_date + ", " + curr_year;
    
    return ret

}