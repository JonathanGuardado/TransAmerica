<form id="searchFormChofer" method="post" action="chofer/searchChofer2">
	<fieldset>
		<legend>Buscar Chofer</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Chofer</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameChofer" class="form-control" placeholder="Nombre Chofer"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Chofer" name="searchBtnChofer" id="searchBtnChofer"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script src="../js/envio_datos.js"></script>
<script type="text/javascript">
//$("#searchBtnChofer").click(function(){
//    var $form=$("#searchFormChofer"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameChofer:$form.find("input[name='nameChofer']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>
