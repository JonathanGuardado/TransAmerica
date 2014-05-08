<form method="post" action="lugar/editLugar2" id="buscarFormLugar">
	<fieldset>
		<legend>Modificar Lugar</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Lugar</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameLugar" class="form-control" placeholder="No. Lugar"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Lugar" name="buscarBtnLugar" id="buscarBtnLugar"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarBtnLugar").click(function(){
//    var $form=$("#buscarFormLugar"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameLugar:$form.find("input[name='nameLugar']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>