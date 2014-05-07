<form id="newFormReencauche" method="post" action="reencauche/storeNewReencauche">
	<fieldset>
		<legend>Nuevo Reencauche</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha Reencauche</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" name="fechaReencauche" class="form-control" placeholder="Fecha Reencauche"/>            
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
            
            
        <input type="button" class="btn btn-primary" value="Nuevo Reencauche" id="newBtnReencauche" name="newBtnReencauche"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>

<script type="text/javascript">
$("#newBtnReencauche").click(function(){
    var $form=$("#newFormReencauche"), url=$form.attr("action");
    var posting= $.post(url,{
                fechaReencauche:$form.find("input[name='fechaReencauche']").val(),
                noWheel:$form.find("input[name='noWheel']").val(),
                descripcion:$form.find("input[name='descripcion']").val()
    });
    posting.done(function(data){
        $("#content_mantain").html(data);
    });
});
</script>