<form id="searchFormChasis" method="post" action="../chasis/searchChasis2">
	<fieldset>
		<legend>Buscar Chasis</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>Nombre Empresa</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameChasis" class="form-control" placeholder="Nombre Empresa"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary" value="Buscar Chasis" name="searchBtnChasis" id="searchBtnChasis"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script type="text/javascript">
$("#searchBtnChasis").click(function(){
    var $form=$("#searchFormChasis"), url=$form.attr("action");
    var posting= $.post(url,{
                nameChasis:$form.find("input[name='nameChasis']").val()
    });
    posting.done(function(data){
        $("#content_busqueda").html(data);
    });
});
</script>
