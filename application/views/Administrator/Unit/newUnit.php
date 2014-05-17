<form id="newFormUnit" method="post" action="unit/storeNewUnit">
	<fieldset>
		<legend>Nueva Unidad</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No Unidad</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="noUnidad"   class="form-control" required placeholder="No Unidad"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Placa Chasis</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="noChasis"  data-controller="chasis" data-method="getData" class="form-control autocomplete" required placeholder="Placa Chasis"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No. Contenedor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text"  data-controller="contenedor" data-method="getData" class="form-control autocomplete" required name="noContenedor" placeholder="Identificador Contenedor" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Identificador Cabezal</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text"  data-controller="cabezal" data-method="getData" class="form-control autocomplete" required name="noCabezal" placeholder="No. Cabezal" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Chofer</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text"  data-controller="chofer" data-method="getData" class="form-control autocomplete" required name="nameChofer" placeholder="Nombre Chofer" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary  sendBtn" value="Nueva Unidad" id="newBtnUnit" name="newBtnUnit"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#newBtnUnit").click(function(){
//    var $form=$("#newFormUnit"), url=$form.attr("action");
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