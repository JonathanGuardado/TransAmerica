<form method="post" action="">
	<fieldset>
		<legend>Eliminar Chasis</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Chasis</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameChasis" class="form-control" placeholder="No. Chasis"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Chasis" name="newChasis"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

<?php   
echo $tabla_loadChasis;
?> 
</div>
<script src="../js/utileria.js"></script>