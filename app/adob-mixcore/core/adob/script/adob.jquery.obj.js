//<></>

adob = {
	instance: ""
};

adob.body = {
	main: function (){
		$("body").append("<main></main>");
	}
	
	section: function  (_class, _id){
		$("body").append(
			$("<section>", 
				{
					"class": _class,
					"id": _id
				}
			)
		);
	}

	content: function  (_class, _id){
		$("body").append(
			$("<div>", 
				{
					"class": _class,
					"id": _id
				}
			)
		);
	}

	row: function (_id){
		$("body").append(
			$("<div>", 
				{
					"class": "row",
					"id": _id
				}
			)
		);
	}

	container: function (_id){
		$("body").append(
			$("<div>", 
				{
					"class": "container",
					"id": _id
				}
			)
		);
	}
};

adob.core = {
	style: function (_type){
		/******Bootstrap/jquery-ui******/
		if (_type == "bootstrap") {
			$.getJSON("../data/modules.json", function(data){
				for (var i = 0; i <= data.bootstrap.style.length - 1; i++) {
					if ( (data.bootstrap.style[i].search(".css") != -1) ) {
						$("head").append($("<link>", {
							"rel": "stylesheet",
							"href": data.bootstrap.style[i]
						}));
						//$("head").appendChild(_css2);
						console.log("CSS added " + data.bootstrap.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		} else if (_type == "jquery_ui") {
			$.getJSON("../data/modules.json", function(data){
				for (var i = 0; i <= data.jquery_ui.style.length - 1; i++) {
					if ( (data.jquery_ui.style[i].search(".css") != -1) ) {
						$("head").append($("<link>", {
							"rel": "stylesheet",
							"href": data.jquery_ui.style[i]
						}));
						console.log("CSS added " + data.jquery_ui.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		} else if (_type == null) {
			$.getJSON("../data/modules.json", function(p_ajax){
				for (var i = 0; i <= data.ui.style.length - 1; i++) {
					if ( (data.ui.style[i].search(".css") != -1) ) {
						$("head").append($("<link>", {
							"rel": "stylesheet",
							"href": data.ui.style[i]
						}));
						console.log("CSS added " + data.ui.style[i]);
					} else {
						console.log("Unsoported file");
					}
				}
			});
		}
	},
	//ShowTAlert ("", "", int);
	//@Param AlertId => AlertSPSuccess, AlertSPInfo, AlertSPWarning, AlertSPDanger
	// e.g. ShowTAlert ("AlertSPInfo", "Test", 5000);
	ShowTAlert: function (AlertId, Amassage, time){
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
	},
	/* ########## */

	/* ########## */
	//MakeAlert ("", "", "", "", int) 
	//@Param AlertType => alert-success, alert-info, alert-warning, alert-danger
	//e.g. MakeAlert("AlertSPSection", "AlertSPSuccess", "alert-info", "Success", 5000);
	MakeAlert: function (containerId, AlertId, AlertType, Amassage, time){
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

};