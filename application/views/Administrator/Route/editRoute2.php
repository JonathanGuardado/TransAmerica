<form id="editRouteForm" method="post" action="route/storeEditRoute">
	<fieldset>
		<legend>Editar Ruta</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Ruta</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" value="<?php echo $descripcion; ?>" name="nameRoute" class="form-control" placeholder="Nombre Empresa"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Origen</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" value="<?php echo $origen; ?>" class="form-control" name="origen" placeholder="Origen" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Destino</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $destino; ?>" name="destino" placeholder="Destino" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tiempo Estimado</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $tiempo_estimado; ?>" name="tiempo" placeholder="Tiempo Estimado" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Distancia Estimada (Km)</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $distancia_km; ?>" name="distancia" placeholder="Distancia Estimada (Km)" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Gasolina Estimada (Galones)</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" value="<?php echo $gasolina_estimada; ?>" name="gasolina" placeholder="Gasolina Estimada (Galones)" />
        </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Editar Ruta" id="editRouteBtn" name="editRoute"/>
            
            <br />            
            <input type="hidden" name="id_ruta" id="id_ruta" value="<?php echo $id_ruta; ?>"/>
            <input type="hidden" name="id_ori" id="id_ori" value="<?php echo $orirulu; ?>"/>
            <input type="hidden" name="id_des" id="id_des" value="<?php echo $desrulu; ?>"/>
        </div>
	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#editRouteBtn").click(function(){
//    var $form=$("#editRouteForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameRoute:$form.find("input[name='nameRoute']").val(),
//                origen:$form.find("input[name='origen']").val(),
//                destino:$form.find("input[name='destino']").val(),
//                tiempo:$form.find("input[name='tiempo']").val(),
//                distancia:$form.find("input[name='distancia']").val(),
//                gasolina:$form.find("input[name='gasolina']").val()
//    });
//    posting.done(function(data){
//        $("#content_fact").html(data);
//    });
//});
</script>