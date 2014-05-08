<form method="post" action="">
	<fieldset>
		<legend>Eliminar Cabezal</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Cabezal</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameCabezal" class="form-control" placeholder="No. Cabezal"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Cabezal" name="newCabezal"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">
<?php
echo $tabla_loadCabezales;
?>
</div>