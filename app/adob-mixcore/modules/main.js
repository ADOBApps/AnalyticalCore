/* ================== */


$(document).ready(function(){

/* General Manage section */

	$(".alert").hide();
	$('[data-toggle="tooltip"]').tooltip();
	$("[data-toggle='popover']").popover();

/* General Manage section */

	/* ########## */
	/* ########## */

	/* ########## */
	/* ########## */

});

/*=================================================================================*/

/* ================== */
/* AJAX */
/* ------------------------------------ */

/*=================================================================================*/
/* XMLHttpRequest Constructor */
function createxmlhr(){
	var xmlhttp=null;
	if (window.ActiveXObject){
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
/* XMLHttpRequest Constructor */
/*=================================================================================*/




/*=================================================================================*/
/* Service Page Alert Manage section */
	/* ########## */
//ShowTAlert ("", "", int);
//@Param AlertId => AlertSPSuccess, AlertSPInfo, AlertSPWarning, AlertSPDanger
// e.g. ShowTAlert ("AlertSPInfo", "Test", 5000);
function ShowTAlert (AlertId, Amassage, time){
	$("#"+ AlertId).show();
	$("#st1").remove();
	$("#"+AlertId).append("<b id='st1'>" + Amassage + "</b>");
	window.setTimeout(function (){
		$("#"+ AlertId).hide();
		$("#st1").remove();
	}, time);
}
	/* ########## */

	/* ########## */
//MakeAlert ("", "", "", "", int) 
//@Param AlertType => alert-success, alert-info, alert-warning, alert-danger
//e.g. MakeAlert("AlertSPSection", "AlertSPSuccess", "alert-info", "Success", 5000);
function MakeAlert(containerId, AlertId, AlertType, Amassage, time){
	var Structure = '<div class="alert ' +AlertType + ' alert-dismissable"' + ' ' + 'id="' + AlertId + '" >' + '<b>' +Amassage + '</b>'+ '<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'
	$("#" + AlertId).remove();
	$("#"+ containerId).append(Structure);
	window.setTimeout(function (){
		$("#" + AlertId).hide();
		$("#" + AlertId).remove();
	}, time);
}
	/* ########## */
/* Service Page Alert Manage section */
/*=================================================================================*/
//----------------------------------------------------------------


/* AJAX */



/*=================================================================================*/

