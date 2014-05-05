<form id="searchRouteForm" method="post" action="../route/searchRoute2">
	<fieldset>
		<legend>Buscar Ruta</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Ruta</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameRoute" class="form-control" placeholder="Nombre Ruta"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Ruta" name="search" id="searchRouteBtn"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script type="text/javascript">
$("#searchRouteBtn").click(function(){
    var $form=$("#searchRouteForm"), url=$form.attr("action");
    var posting= $.post(url,{
                nameRoute:$form.find("input[name='nameRoute']").val()
    });
    posting.done(function(data){
        $("#content_busqueda").html(data);
    });
});
</script>
