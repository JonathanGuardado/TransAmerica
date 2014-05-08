<form method="post" action="cabezal/editCabezal2" id="buscarFormCabezal">
	<fieldset>
		<legend>Modificar Cabezal</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Cabezal</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameCabezal" class="form-control" placeholder="No. Cabezal"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Cabezal" name="buscarBtnCabezal" id="buscarBtnCabezal"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarBtnCabezal").click(function(){
//    var $form=$("#buscarFormCabezal"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameCabezal:$form.find("input[name='nameCabezal']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>