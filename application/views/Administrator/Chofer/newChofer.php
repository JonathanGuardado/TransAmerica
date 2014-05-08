<form id="newFormChofer" method="post" action="chofer/storeNewChofer">
	<fieldset>
		<legend>Nuevo Chofer</legend>
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Nombres</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" name="nameChofer" class="form-control" placeholder="Nombres"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Apellidos</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="surnameChofer" placeholder="Apellidos" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>DUI</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="dui" placeholder="DUI" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>NIT</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="nit" placeholder="NIT" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Fecha Nacimiento</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="date" class="form-control" name="fechaNac" placeholder="Fecha Nacimiento" />
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Estado</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" class="form-control" name="estado" placeholder="Estado" />
        </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10px;">
            
            
        <input type="button" class="btn btn-primary  sendBtn" value="Nuevo Chofer" id="newBtnChofer" name="newBtnChofer"/>
            
            <br />            
            
        </div>
	</fieldset>
</form>
<div id="message">
<?php if(isset($message)) echo $message ; ?>
</div>
  <script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#newBtnChofer").click(function(){
//    var $form=$("#newFormChofer"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameChofer:$form.find("input[name='nameChofer']").val(),
//                surnameChofer:$form.find("input[name='surnameChofer']").val(),
//                dui:$form.find("input[name='dui']").val(),
//                nit:$form.find("input[name='nit']").val(),
//                fechaNac:$form.find("input[name='fechaNac']").val(),
//                estado:$form.find("input[name='estado']").val()
//    });
//    posting.done(function(data){
//        $("#content_flotas").html(data);
//    });
//});
</script>