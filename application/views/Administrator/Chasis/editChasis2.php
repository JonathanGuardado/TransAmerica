<form id="editChasisForm" method="post" action="../chasis/storeEditChasis">
	<fieldset>
		<legend>Editar Chasis</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Empresa</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="nameChasis" class="form-control" placeholder="Nombre Empresa"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Contacto</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="nameContact" placeholder="Nombre Contacto" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Telefono Contacto</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="phoneContact" placeholder="Telefono Contacto" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tarifa</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="tarifa" placeholder="Tarifa" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary" value="Editar Chasis" id="editBtnChasis" name="editBtnChasis"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>

<script type="text/javascript">
$("#editBtnChasis").click(function(){
    var $form=$("#editChasisForm"), url=$form.attr("action");
    var posting= $.post(url,{
                nameChasis:$form.find("input[name='nameChasis']").val(),
                nameContact:$form.find("input[name='nameContact']").val(),
                phoneContact:$form.find("input[name='phoneContact']").val(),
                tarifa:$form.find("input[name='tarifa']").val()
    });
    posting.done(function(data){
        $("#content_flotas").html(data);
    });
});
</script>