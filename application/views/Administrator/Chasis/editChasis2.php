<form id="editChasisForm" method="post" action="chasis/storeEditChasis">
	<fieldset>
		<legend>Editar Chasis</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Estado Chasis</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left">
            <select type="text" name="tipoContenedor" class="form-control" placeholder="Estado Chasis">
                <option>A</option>
                <option>B</option>
            </select>
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Descripci&oacute;n</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="descripcion" placeholder="Descripci&oacute;n" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Editar Chasis" id="editBtnChasis" name="editBtnChasis"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<script src="../js/envio_datos.js"></script>
<script type="text/javascript">
//$("#editBtnChasis").click(function(){
//    var $form=$("#editChasisForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                estado:$form.find("input[name='estado']").val(),
//                descripcion:$form.find("input[name='descripcion']").val()
//    });
//    posting.done(function(data){
//        $("#content_flotas").html(data);
//    });
//});
</script>