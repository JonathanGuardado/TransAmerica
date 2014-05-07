<form id="searchFormViaje" method="post" action="viaje/searchViaje2">
	<fieldset>
		<legend>Buscar Viaje</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No Viaje</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameViaje" class="form-control" placeholder="No Viaje"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Viaje" name="searchBtnViaje" id="searchBtnViaje"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script type="text/javascript">
$("#searchBtnViaje").click(function(){
    var $form=$("#searchFormViaje"), url=$form.attr("action");
    var posting= $.post(url,{
                nameViaje:$form.find("input[name='nameViaje']").val()
    });
    posting.done(function(data){
        $("#content_busqueda").html(data);
    });
});
</script>
