<form method="post" action="viaje/editViaje2" id="buscarFormViaje">
	<fieldset>
		<legend>Modificar Viaje</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No Viaje</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left">
                <input type="text" name="nameViaje" data-controller="viaje" data-method="getData" class="form-control autocomplete"  placeholder="No Viaje"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Viaje" name="newViaje" id="buscarBtnViaje"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarBtnViaje").click(function(){
//    var $form=$("#buscarFormViaje"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameViaje:$form.find("input[name='nameViaje']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>