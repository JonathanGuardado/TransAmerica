<form method="post" action="route/editRoute2" id="buscar">
	<fieldset>
		<legend>Modificar Ruta</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Ruta</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left">
                <input type="text" name="nameRoute" data-controller="route" data-method="getData" class="form-control autocomplete" class="form-control" placeholder="Nombre Ruta"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Ruta" name="newRoute" id="buscarRuta"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarRuta").click(function(){
//    var $form=$("#buscar"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameRoute:$form.find("input[name='nameRoute']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>