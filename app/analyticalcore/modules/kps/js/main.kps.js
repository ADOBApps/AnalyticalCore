/* ================== */


$(document).ready(function(){

/* General Manage section */

	$(".alert").hide();
	$('[data-toggle="tooltip"]').tooltip();
	$("[data-toggle='popover']").popover();
	$("#s-kps-check-c-ion").prop("checked", "");
	$("#s-kps-check-f-ion").prop("checked", "");
	/* Modalkps: controls*/
	var s_kps_instance = "";
	var s_kps_instance_1 = "";
	var s_kps_virtkey_instance = "";
	var s_kps_virtkey_instance_val = 0;
	var s_kps_instance_key_code = 0;
	var s_kps_instance_key_value = "";
	var slim_url = "";
	$("#s-kps-subind-element1").val("1");
	$("#s-kps-subind-element2").val("1")
	$("#s-kps-concentration-e1").val("1.0");
	$("#s-kps-concentration-e2").val("1.0");
	$("#s-kps-concentration-ci-e1").val("0.0");
	$("#s-kps-concentration-ci-e2").val("0.0");
	$("#s-kps-section-ci-1").hide();
	$("#s-kps-section-ci-2").hide();
	$("#s-kps-section-mu").hide();
	$("#s-kps-mu-value").val("0.0");
	$("#s-kps-virtkey").hide();
	/* Modalkps: controls */

/* General Manage section */

	/* ########## */
	/* ########## */

	/* ########## */
	/* ########## */

});
/** Can be detect key mix
*/
//Help: http://keycode.info/
//.keypress() cannot detect Control_key in linux ubuntu mate 18.04 LTS
$(document).keydown(function(event){
	var key_value = (event.key);
	var key_code = (event.which) || (event.keyCode);
	if ( (key_code == 17) ) {
		s_kps_instance_key_code = (event.which) || (event.keyCode);
		s_kps_instance_key_value = (event.key);
	}
}).keypress(function(event){
	if ( (s_kps_instance_key_code == 17) && (event.which == 68) ) {
		//Control + d
		//Also can be Control + Shift + d
		alert("You use ctrl+d");


		//Restart instace
		s_kps_instance_key_code = 0;
		s_kps_instance_key_value = "";
	}

});

/*=================================================================================*/

// Offset for Site Navigation
$('#siteNav').affix({
	offset: {
		top: 100
	}
});

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
	$("#"+AlertId).append($("<b>", {
		"id": "st1",
		"text": Amassage
	}));
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
	$("#" + AlertId).remove();
	$("#"+ containerId).append(
		$("<div>", {
			"class":"alert " + AlertType + " alert-dismissable",
			"id": AlertId
		}).append(
			$("<b>", {
				"text": Amassage
			})
		)
	);
	$("<button>", {
		"type": "button",
		"class": "close",
		"data-dismiss": "alert",
		"aria-hidden": "true",
		"html": "&times;" //due to &times; is a native html caracter, we cannot use "text" property
	}).appendTo("#"+AlertId);

	window.setTimeout(function (){
		$("#" + AlertId).hide();
		$("#" + AlertId).remove();
	}, time);
}
	/* ########## */
/* Service Page Alert Manage section */
/*=================================================================================*/
//----------------------------------------------------------------


//----------------------------------------------------------------
//----------------------------------------------------------------
/* Modalkps: controls */
$("#s-kps-input-element1").keyup(function(){
	str = $("#s-kps-input-element1").val();
	//.val(). This form returns a String, Array object.
	//.val(value) sets the value of value attribure for all selected.
	if( (str.length > 0) ){
		$.get("./analyticalcore/modules/kps/php/slim.ajax.php/ajax/get_e/" + str).done(function(data){
			if (data != "") {
				MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-success", "Success", 1000);
				$("#s-kps-p-hint").text("Hint: " + data);
			} else {
				MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-info", "No found", 1000);
			}
		}).fail(function(data){
			MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-warning", "Elemento " + str + " no encontrado", 1000);
		});
	} else {
		MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-danger", "Error", 1000);
	}
});

$("#s-kps-input-element2").keyup(function(){
	str = $("#s-kps-input-element2").val();
	//.val(). This form returns a String, Array object.
	//.val(value) sets the value of value attribure for all selected.

	if( (str.length > 0) ){
		$.get("./analyticalcore/modules/kps/php/slim.ajax.php/ajax/get_e/" + str).done(function(data){
			if (data != "") {
				MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-success", "Success", 1000);
				$("#s-kps-p-hint").text("Hint: " + data);
			} else {
				MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-info", "No found", 1000);
			}
		}).fail(function(data){
			MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-warning", "Elemento " + str + " no encontrado", 1000);
		});
	} else {
		MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-danger", "Error", 1000);
	}
});

	/*-------------------------------------------------*/
	/*Ionic effects*/
$("#s-kps-check-c-ion").on("change", function(){
	if ( $(this).is(":checked") ) {
		$("#s-kps-section-ci-1").show();
		$("#s-kps-section-ci-2").show();
	} else {
		$("#s-kps-section-ci-1").hide();
		$("#s-kps-section-ci-2").hide();
		$("#s-kps-section-ci-1").val("0.0");
		$("#s-kps-section-ci-2").val("0.0");
	
	}
});
$("#s-kps-check-f-ion").on("change", function(){
	if ( $(this).is(":checked") ) {
		$("#s-kps-section-mu").show();
	} else {
		$("#s-kps-section-mu").hide();
		$("#s-kps-mu-value").val("0.0");
	}
});
$("#s-kps-mu-value").change(function () {
	if( $(this).val() > 0.1 ){
		$(this).val("0.1");
	} else if ( $(this).val() < 0 ) {
		$(this).val("0.0");
	}
});
	/*Ionic effects*/
	/*-------------------------------------------------*/

$("#s-kps-concentration-e1").focus(function(){
	$("#s-kps-virtkey").show();
	s_kps_instance = (document.activeElement.id);
});

$("#s-kps-concentration-e2").focus(function(){
	$("#s-kps-virtkey").show();
	s_kps_instance = (document.activeElement.id);
});
$("#s-kps-concentration-ci-e1").focus(function(){
	$("#s-kps-virtkey").show();
	s_kps_instance = (document.activeElement.id);
});
$("#s-kps-concentration-ci-e2").focus(function(){
	$("#s-kps-virtkey").show();
	s_kps_instance = (document.activeElement.id);
});
$("#s-kps-mu-value").focus(function(){
	$("#s-kps-virtkey").show();
	s_kps_instance = (document.activeElement.id);
});

	/*-------------------------------------------------*/
	/*Virtkey*/

$("#s-kps-btn_close").click(function(event){
	event.preventDefault(); //stop sending
	$("#s-kps-inp_virtkey").val("0");
	$("#s-kps-virtkey").hide();
});
$("#s-kps-btn_inp-exp").click(function(event){
	event.preventDefault(); //stop sending
	$("#s-kps-inp_virtkey").val( $("#s-kps-inp_virtkey").val() + "{}^{}" );
});
$("#s-kps-btn_inp-sub").click(function(event){
	event.preventDefault(); //stop sending
	$("#s-kps-inp_virtkey").val( $("#s-kps-inp_virtkey").val() + "{}_{}" );
});
$("#s-kps-btn_inp-10x").click(function(event){
	event.preventDefault(); //stop sending
	$("#s-kps-inp_virtkey").val( $("#s-kps-inp_virtkey").val() + "{10}^{}" );
});
$("#s-kps-btn_inp-go").click(function(event){
	event.preventDefault(); //stop sending
	var last_value = $("#" + s_kps_instance).val();
	if ( (s_kps_instance == "s-kps-concentration-e1") || (s_kps_instance == "s-kps-concentration-e2") || (s_kps_instance == "s-kps-concentration-ci-e1") || (s_kps_instance == "s-kps-concentration-ci-e2")) {
		$("#" + s_kps_instance).val(s_kps_virtkey_instance_val);
		s_kps_virtkey_instance_val = 0;
	} else if( (s_kps_instance == "s-kps-mu-value") ){
		if( s_kps_virtkey_instance_val > 0.1 ){
			$("#" + s_kps_instance).val("0.1");
		} else if ( s_kps_virtkey_instance_val < 0.0 ) {
			$("#" + s_kps_instance).val("0.0");
		} else {
			$("#" + s_kps_instance).val(s_kps_virtkey_instance_val);
			s_kps_virtkey_instance_val = 0;
		}
	}else{
		$("#" + s_kps_instance).val(s_kps_virtkey_instance);
		s_kps_virtkey_instance = "";
	}
});
$("#s-kps-inp_virtkey").keyup(function () {
	var vk_text = $(this).val();
	if ( vk_text.includes("}^{") ) {
		var vk_slice_init_val = vk_text.indexOf("{") + 1;
		var vk_slice_end_val = vk_text.indexOf("}");
		var vk_base = vk_text.slice(vk_slice_init_val, vk_slice_end_val);
		var vk_exponent = vk_text.slice( vk_text.indexOf("^{") + 2, vk_text.lastIndexOf("}") );
		if ( vk_text.startsWith("{") ) {
			s_kps_virtkey_instance_val = Math.pow(parseFloat(vk_base), parseFloat(vk_exponent));
		} else{
			var last_oper = vk_text.slice(0, vk_slice_init_val-1);
			var temp_s_kps_vk_val = Math.pow(parseFloat(vk_base), parseFloat(vk_exponent));
			s_kps_virtkey_instance_val = eval( last_oper +  temp_s_kps_vk_val.toString() );
		}
	} else if ( vk_text.includes("}_{") ) {
		s_kps_virtkey_instance = vk_text;
	} else{
		s_kps_virtkey_instance_val = eval(vk_text);
	}
}).change(function () {
	var vk_text = $(this).val();
	if ( vk_text.includes("}^{") ) {
		var vk_slice_init_val = vk_text.indexOf("{") + 1;
		var vk_slice_end_val = vk_text.indexOf("}");
		var vk_base = vk_text.slice(vk_slice_init_val, vk_slice_end_val);
		var vk_exponent = vk_text.slice( vk_text.indexOf("^{") + 2, vk_text.lastIndexOf("}") );
		if ( vk_text.startsWith("{") ) {
			s_kps_virtkey_instance_val = Math.pow(parseFloat(vk_base), parseFloat(vk_exponent));
		} else{
			var last_oper = vk_text.slice(0, vk_slice_init_val-1);
			var temp_s_kps_vk_val = Math.pow(parseFloat(vk_base), parseFloat(vk_exponent));
			s_kps_virtkey_instance_val = eval( last_oper +  temp_s_kps_vk_val.toString() );
		}
	} else if ( vk_text.includes("}_{") ) {
		s_kps_virtkey_instance = vk_text;
	} else{
		s_kps_virtkey_instance_val = eval(vk_text);
	}
});
$("#s-kps-btn_calc").click(function(){
	var btn = $(this).button('loading');
    setTimeout(function (){
    	btn.button('reset')
    }, 50);
});
	/*Virtkey*/
	/*-------------------------------------------------*/

$(document).on("submit", "#s-kps-form", function(event){
	event.preventDefault(); //stop sending
	//$.post("../../php/modules/kps/slim.ajax.php/calc_kps/", $("#s-kps-form").serialize(), function(data){});
	//$.post("../../php/modules/kps/slim.ajax.php/calc_kps/", $("#s-kps-form").serialize()).done(function(data){}).fail(function(data){});

	//Comprobamos la visibilidad del apartado de efectos ionicos para saber si empleamos valvulo de kps o de solubilidad
	//La idea es que más adelante se consulte el archivo kps_module.json para saber que funcion se está empleando
	
	if ($("#s-kps-l-c_f-ion").is(':visible') && $("#s-kps-l-c_f-ion").css("visibility") != "hidden" && $("#s-kps-l-c_f-ion").css("opacity") > 0) {
		slim_url = "./analyticalcore/modules/kps/php/slim.ajax.php/ajax/solu_calc/";
	} else{
		slim_url = "./analyticalcore/modules/kps/php/slim.ajax.php/ajax/kps_calc/";
	}

	$.post(slim_url, $("#s-kps-form").serialize()).done(function(data){
		if ( data != "" ) {
			MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-success", "Kps = " + data, 5000);
		} else {
			MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-info", "Cannot be Solved", 1000);
		}
	}).fail(function(data){
		MakeAlert("alert-kps-section", "alert-kps-temp-t", "alert-warning", "Error", 1000);
	});

});
/* Modalkps: controls */
//----------------------------------------------------------------
//----------------------------------------------------------------

/* AJAX */



/*=================================================================================*/

