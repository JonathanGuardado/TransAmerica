<form id="newFormReencauche" method="post" action="reencauche/storeNewReencauche">
	<fieldset>
		<legend>Nuevo Reencauche</legend>
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Id LLanta</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" data-controller="reencauche" data-method="getDataLlantas" class="form-control autocomplete" name="idllanta" placeholder="Id LLanta" />
        </div>
        </div>
		<div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha Reencauche</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" name="fechaReencauche" class="form-control" placeholder="Fecha Reencauche"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Lugar</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="place" placeholder="Lugar" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Costo</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="costo" placeholder="Costo" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Observaciones</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="descripcion" placeholder="Observaciones" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary  sendBtn" value="Nuevo Reencauche" id="newBtnReencauche" name="newBtnReencauche"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#newBtnReencauche").click(function(){
//    var $form=$("#newFormReencauche"), url=$form.attr("action");
//    var posting= $.post(url,{
//                fechaReencauche:$form.find("input[name='fechaReencauche']").val(),
//                noWheel:$form.find("input[name='noWheel']").val(),
//                descripcion:$form.find("input[name='descripcion']").val()
//    });
//    posting.done(function(data){
//        $("#content_mantain").html(data);
//    });
//});
</script>