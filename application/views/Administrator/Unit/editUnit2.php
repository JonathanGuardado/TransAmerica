<form id="editUnitForm" method="post" action="unit/storeEditUnit">
	<fieldset>
		<legend>Editar Unidad</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Placa Chasis</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="noChasis" value="<?php echo $placa;?>" class="form-control" required placeholder="Placa Chasis"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No. Contenedor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $tipo_contenedor;?>" name="noContenedor" required  placeholder="Identificador Contenedor" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Identificador Cabezal</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $identificador;?>" required name="noCabezal" required  placeholder="No. Cabezal" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Chofer</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $nombre_conductor;?>" required name="nameChofer" required  placeholder="Nombre Chofer" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Editar Unidad" id="editBtnUnit" name="editBtnUnit"/>
            
            <br />            
           <input type="hidden" name="idFlota" id="idFlota" value="<?php echo $idflota;?>" /> 
           <input type="hidden" name="idChasis" id="idChasis" value="<?php echo $idchasis;?>" />
           <input type="hidden" name="idContenedor" id="idContenedor" value="<?php echo $idcontenedor;?>" />
           <input type="hidden" name="idCabezal" id="idCabezal" value="<?php echo $idcabezal;?>" />
           <input type="hidden" name="idConductor" id="idConductor" value="<?php echo $idconductor;?>" />
        </div>
	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#editBtnUnit").click(function(){
//    var $form=$("#editUnitForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                noChasis:$form.find("input[name='noChasis']").val(),
//                noContenedor:$form.find("input[name='noContenedor']").val(),
//                nameChofer:$form.find("input[name='nameChofer']").val()
//    });
//    posting.done(function(data){
//        $("#content_flotas").html(data);
//    });
//});
</script>