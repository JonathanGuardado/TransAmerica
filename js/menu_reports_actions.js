$("#InventarioLlanta").click(function(){
	//$("#content_reports").load("reportes/inventarioLlantas");
	window.open('reportes/inventarioLlantas','_blank');
	$("#CostoViaje").removeClass("active");
	$("#HistorialReencauche").removeClass("active");
	$("#InventarioLlanta").addClass("active");
	
});

$("#HistorialReencauche").click(function(){
	window.open("reportes/historialReencauche","_blank");
	$("#CostoViaje").removeClass("active");
	$("#InventarioLlanta").removeClass("active");
	$("#HistorialReencauche").addClass("active");
});
$("#CostoViaje").click(function(){
	window.open("reportes/costoviaje","_blank");
	$("#HistorialReencauche").removeClass("active");
	$("#InventarioLlanta").removeClass("active");
	$("#CostoViaje").addClass("active");
});
