<form id="newFormCabezal" method="post" action="cabezal/storeNewCabezal">
	<fieldset>
		<legend>Nuevo Cabezal</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Identificador</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="identificadorCabezal" class="form-control" placeholder="Identificador"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Marca</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="marca" placeholder="Marca" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Kilometraje Actual</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="kilometraje" placeholder="Kilometraje Actual" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary  sendBtn" value="Nuevo Cabezal" id="newBtnCabezal" name="newBtnCabezal"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#newBtnCabezal").click(function(){
//    var $form=$("#newFormCabezal"), url=$form.attr("action");
//    var posting= $.post(url,{
//                identificadorCabezal:$form.find("input[name='identificadorCabezal']").val(),
//                marca:$form.find("input[name='marca']").val(),
//                kilometraje:$form.find("input[name='kilometraje']").val()
//    });
//    posting.done(function(data){
//        $("#content_mantain").html(data);
//    });
//});
</script>