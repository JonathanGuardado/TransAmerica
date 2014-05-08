<form id="searchFormWheel" method="post" action="wheel/searchWheel2">
	<fieldset>
		<legend>Buscar Llanta</legend>
		<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs form-group"  style="text-align:right"><label>No. Llanta</label></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 form-group"  style="text-align:left"><input type="text" name="nameWheel" class="form-control" placeholder="No. Llanta"/>            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <input type="button" class="btn btn-primary sendBtn" value="Buscar Llanta" name="searchBtnWheel" id="searchBtnWheel"/>            
        </div>
        </div>        

	</fieldset>
</form>

<div id="content_busqueda" class="row">

</div>
<script src="../js/utileria.js"></script>
<script type="text/javascript">
//$("#searchBtnWheel").click(function(){
//    var $form=$("#searchFormWheel"), url=$form.attr("action");
//    var posting= $.post(url,{
//                nameWheel:$form.find("input[name='nameWheel']").val()
//    });
//    posting.done(function(data){
//        $("#content_busqueda").html(data);
//    });
//});
</script>
