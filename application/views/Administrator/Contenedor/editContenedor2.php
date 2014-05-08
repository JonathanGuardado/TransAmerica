<form id="editContenedorForm" method="post" action="contenedor/storeEditContenedor">
	<fieldset>
		<legend>Editar Contenedor</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tipo de Contenedor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left">
            <input type="text" class="form-control" name="tipo" value="<?php echo $tipo_contenedor;?>" placeholder="Tipo de Contenedor" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Descripci&oacute;n</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control"  value="<?php echo $descripcion_contenedor;?>" name="descripcion" placeholder="Descripci&oacute;n" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Editar Contenedor" id="editBtnContenedor" name="editBtnContenedor"/>
            
            <br />            
            <input type="hidden" name="idContenedor" id="idContenedor" value="<?php echo $idcontenedor;?>" />
        </div>
	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#editBtnContenedor").click(function(){
//    var $form=$("#editContenedorForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                tipoContenedor:$form.find("input[name='tipoContenedor']").val(),
//                descripcion:$form.find("input[name='descripcion']").val()
//    });
//    posting.done(function(data){
//        $("#content_flotas").html(data);
//    });
//});
</script>