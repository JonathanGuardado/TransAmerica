$("#InventarioLlanta").click(function(){
	//$("#content_reports").load("reportes/inventarioLlantas");
	window.open('reportes/inventarioLlantas','_blank');
	$("#InventarioLlanta").addClass("active");
	$("#HistorialReencauche").removeClass("active");
});

$("#HistorialReencauche").click(function(){
	$("#content_reports").load("reportes/historialReencauche");
	$("#InventarioLlanta").removeClass("active");
	$("#HistorialReencauche").addClass("active");
});