<form id="searchForm" method="post" action="client/searchClient2">
	<fieldset>
		<legend>Buscar Cliente</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Empresa</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameClient" class="form-control" placeholder="Nombre Empresa"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Cliente" name="search" id="searchBtn"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script src="../js/envio_datos.js"></script>
<script type="text/javascript">
//$("#searchBtn").click(function(){
//    var $form=$("#searchForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameClient:$form.find("input[name='nameClient']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>
