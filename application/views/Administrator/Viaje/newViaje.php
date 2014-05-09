<form id="newViaje" method="post" action="viaje/storeNewViaje">
	<fieldset>
		<legend>Nuevo Viaje</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Cliente</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="nameClient" data-controller="viaje" data-method="getData2" class="form-control autocomplete" placeholder="Nombre Cliente"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Ruta</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" data-controller="viaje" data-method="getData3" class="form-control autocomplete" name="nameRoute" placeholder="Nombre Ruta" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No. Flota</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" data-controller="viaje" data-method="getData4" class="form-control autocomplete" name="idFlota" placeholder="No. Flota" />
        </div>
        </div>

        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre conductor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" data-controller="viaje" data-method="getData5" class="form-control autocomplete" name="conductor" placeholder="Nombre Conductor" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Gasolina Asignada</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="gas" placeholder="Gasolina Asignada" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Marchamos</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="marchamos" placeholder="Marchamos" />
        </div>
        </div>

        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha de viaje</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" class="form-control" name="fechaViaje" placeholder="Fecha de viaje" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tipo de Viaje</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left">
            <select type="text" class="form-control" name="tipoViaje" placeholder="Tipo de Viaje" >
                <option>A</option>
                <option>B</option>
            </select>
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn sendBtn" value="Nuevo Viaje" id="newBtnViaje" name="newBtnViaje"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#newBtnViaje").click(function(){
//    var $form=$("#newViaje"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameClient:$form.find("input[name='nameClient']").val(),
//                nameRoute:$form.find("input[name='nameRoute']").val(),
//                idFlota:$form.find("input[name='idFlota']").val(),
//                fechaViaje:$form.find("input[name='fechaViaje']").val(),
//                tipoViaje:$form.find("select[name='tipoViaje']").val()
//    });
//    posting.done(function(data){
//        $("#content_fact").html(data);
//    });
//});
</script>