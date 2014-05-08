<form id="editLugarForm" method="post" action="lugar/storeEditLugar">
	<fieldset>
		<legend>Editar Lugar</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombre Lugar</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="nombreLugar" class="form-control" placeholder="Nombre Lugar"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Ciudad</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="ciudad" placeholder="Ciudad" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Pa&iacute;s</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="pais" placeholder="Pa&iacute;s" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary sendBtn" value="Editar Lugar" id="editBtnLugar" name="editBtnLugar"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#editBtnLugar").click(function(){
//    var $form=$("#editLugarForm"), url=$form.attr("action");
//    var posting= $.post(url,{
//                identificadorLugar:$form.find("input[name='identificadorLugar']").val(),
//                marca:$form.find("input[name='marca']").val(),
//                kilometraje:$form.find("input[name='kilometraje']").val()
//    });
//    posting.done(function(data){
//        $("#content_mantain").html(data);
//    });
//});
</script>