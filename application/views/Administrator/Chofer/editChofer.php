<form method="post" action="chofer/editChofer2" id="buscarFormChofer">
	<fieldset>
		<legend>Modificar Chofer</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Chofer</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameChofer"  data-controller="chofer" data-method="getData" class="form-control autocomplete" placeholder="Nombre Chofer"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Chofer" name="buscarBtnChofer" id="buscarBtnChofer"/>            
        </div>
        </div>        

	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#buscarBtnChofer").click(function(){
//    var $form=$("#buscarFormChofer"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameChofer:$form.find("input[name='nameChofer']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>

<div id="content_busqueda" class="row">
<?php if(isset($message)) echo $message ; ?>
</div>