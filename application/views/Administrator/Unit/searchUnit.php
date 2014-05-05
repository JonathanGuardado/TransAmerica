<form id="searchFormUnit" method="post" action="../unit/searchUnit2">
	<fieldset>
		<legend>Buscar Unidad</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Unidad</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameUnit" class="form-control" placeholder="No. Unidad"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Unidad" name="searchBtnUnit" id="searchBtnUnit"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script type="text/javascript">
$("#searchBtnUnit").click(function(){
    var $form=$("#searchFormUnit"), url=$form.attr("action");
    var posting= $.post(url,{
                nameUnit:$form.find("input[name='nameUnit']").val()
    });
    posting.done(function(data){
        $("#content_busqueda").html(data);
    });
});
</script>
