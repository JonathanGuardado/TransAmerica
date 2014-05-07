<form id="newFormUnit" method="post" action="unit/storeNewUnit">
	<fieldset>
		<legend>Nueva Unidad</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No Chasis</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="noChasis" class="form-control" placeholder="No Chasis"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No Contenedor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="noContenedor" placeholder="No Contenedor" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Chofer</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="nameChofer" placeholder="Nombre Chofer" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Nueva Unidad" id="newBtnUnit" name="newBtnUnit"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/envio_datos.js"></script>
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