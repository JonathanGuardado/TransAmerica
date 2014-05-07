<form id="newFormContenedor" method="post" action="contenedor/storeNewContenedor">
	<fieldset>
		<legend>Nuevo Contenedor</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Tipo de Contenedor</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left">
            <select type="text" name="tipoContenedor" class="form-control" placeholder="Tipo de Contenedor">
                <option>A</option>
                <option>B</option>
            </select>
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Descripci&oacute;n</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="descripcion" placeholder="Descripci&oacute;n" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary" value="Nuevo Contenedor" id="newBtnContenedor" name="newBtnContenedor"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>

<script type="text/javascript">
$("#newBtnContenedor").click(function(){
    var $form=$("#newFormContenedor"), url=$form.attr("action");
    var posting= $.post(url,{
                tipoContenedor:$form.find("input[name='tipoContenedor']").val(),
                descripcion:$form.find("input[name='descripcion']").val()
    });
    posting.done(function(data){
        $("#content_flotas").html(data);
    });
});
</script>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left">