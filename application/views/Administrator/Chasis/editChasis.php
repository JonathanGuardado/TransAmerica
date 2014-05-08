<form method="post" action="chasis/editChasis2" id="buscarFormChasis">
	<fieldset>
		<legend>Modificar Chasis</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Placa Chasis</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left">
                <input type="text" name="nameChasis" data-controller="chasis" data-method="getData" class="form-control autocomplete" placeholder="No. Chasis"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn " value="Buscar Chasis" name="buscarBtnChasis" id="buscarBtnChasis"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarBtnChasis").click(function(){
//    var $form=$("#buscarFormChasis"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameChasis:$form.find("input[name='nameChasis']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>