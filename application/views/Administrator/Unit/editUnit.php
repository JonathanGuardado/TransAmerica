<form method="post" action="../unit/editUnit2" id="buscarUnitForm">
	<fieldset>
		<legend>Modificar Unidad</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Empresa</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameUnit" class="form-control" placeholder="Nombre Empresa"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Unidad" name="newUnit" id="buscarBtnUnit"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script type="text/javascript">
$("#buscarBtnUnit").click(function(){
    var $form=$("#buscarUnitForm"), url=$form.attr("action");
    var posting= $.post(url,{
                nameUnit:$form.find("input[name='nameUnit']").val()
    });
    posting.done(function(data){
        $("#content_busqueda").html(data);
    });
});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>