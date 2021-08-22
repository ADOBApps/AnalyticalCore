/*********************************************************
*************************Jquery-ui************************
*********************************************************/
/*=================================================================================*/
$("#dialog-link-sorkps").click(function(event){
	$("#s-kps-dialog-sorkps").dialog("open");
	event.preventDefault();
}).hover(
	function() {
		$(this).addClass("ui-state-hover");
	},
	function() {
		$(this).removeClass("ui-state-hover");
	}
);;
$("#s-kps-dialog-sorkps").dialog({
	autoOpen: false,
	width: $(window).width()*0.20,
	//height:$(window).height()*0.40,
	buttons: [
		{
			text: "kps",
			click: function(){
				$(this).dialog("close");
				//manage bootstrap modal, caution
				$("#Modalkps").modal("show");
				$("#s-kps-mlabel").text("Calcular kps");
				$("#s-kps-parag-cie").hide();
			}
		},
		{
			text: "solubilidad",
			click: function(){
				$(this).dialog("close");
				//manage bootstrap modal, caution
				$("#Modalkps").modal("show");
				$("#s-kps-mlabel").text("Calcular solubilidad");
				$("#s-kps-parag-cie").show();
			}
		}
	]
});
/*=================================================================================*/

