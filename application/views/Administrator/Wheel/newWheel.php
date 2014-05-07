<form id="newFormWheel" method="post" action="wheel/storeNewWheel">
	<fieldset>
		<legend>Nueva Llanta</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No. Serie</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="noSerie" class="form-control" placeholder="No. Serie"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Marca</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="marca" placeholder="Marca" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tamaño</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="size" placeholder="Tamaño" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Estado</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="estado" placeholder="Estado" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha de Compra</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" class="form-control" name="fechaCompra" placeholder="Fecha de Compra" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Descripcion</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="descripcion" placeholder="Descripcion" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Nueva Llanta" id="newBtnWheel" name="newBtnWheel"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/envio_datos.js"></script>
<script type="text/javascript">
//$("#newBtnWheel").click(function(){
//    var $form=$("#newFormWheel"), url=$form.attr("action");
//    var posting= $.post(url,{
//                noSerie:$form.find("input[name='noSerie']").val(),
//                marca:$form.find("input[name='marca']").val(),
//                size:$form.find("input[name='size']").val(),
//                estado:$form.find("input[name='estado']").val(),
//                fechaCompra:$form.find("input[name='fechaCompra']").val(),
//                descripcion:$form.find("input[name='descripcion']").val()
//    });
//    posting.done(function(data){
//        $("#content_mantain").html(data);
//    });
//});
</script>