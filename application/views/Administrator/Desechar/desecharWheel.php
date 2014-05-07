<form id="newFormDesechar" method="post" action="desechar/storeNewDesechar">
	<fieldset>
		<legend>Nuevo Desecho</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha Desecho</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" name="fechaDesechar" class="form-control" placeholder="Fecha Desecho"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>No. Llanta</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="noWheel" placeholder="No. Llanta" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Descripci&oacute;n</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="descripcion" placeholder="Descripci&oacute;n" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary" value="Nuevo Desecho" id="newBtnDesechar" name="newBtnDesechar"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>

<script type="text/javascript">
$("#newBtnDesechar").click(function(){
    var $form=$("#newFormDesechar"), url=$form.attr("action");
    var posting= $.post(url,{
                fechaDesechar:$form.find("input[name='fechaDesechar']").val(),
                noWheel:$form.find("input[name='noWheel']").val(),
                descripcion:$form.find("input[name='descripcion']").val()
    });
    posting.done(function(data){
        $("#content_mantain").html(data);
    });
});
</script>