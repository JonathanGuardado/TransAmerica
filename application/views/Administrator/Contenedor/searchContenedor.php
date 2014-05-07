<form id="searchFormContenedor" method="post" action="contenedor/searchContenedor2">
	<fieldset>
		<legend>Buscar Contenedor</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Contenedor</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameContenedor" class="form-control" placeholder="No. Contenedor"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Contenedor" name="searchBtnContenedor" id="searchBtnContenedor"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script src="../js/envio_datos.js"></script>
<script type="text/javascript">
//$("#searchBtnContenedor").click(function(){
//    var $form=$("#searchFormContenedor"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameContenedor:$form.find("input[name='nameContenedor']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>
