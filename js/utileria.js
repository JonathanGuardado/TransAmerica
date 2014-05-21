//alert("juqeu")
jQuery(document).ready(function() {
    configureMask();
    configureSendBtn();
    configureCalendar();
    configureAutocomplete();
    configureDataTable();
});
function  configureMask(){
    jQuery(".tel").mask("0000-0000");
    jQuery(".tel").attr({"placeholder":"2222-2222"});
    jQuery(".dui").mask("00000000-0");
    jQuery(".dui").attr({"placeholder":"00000000-0"});
    jQuery(".nit").mask("0000-000000-000-0");
    jQuery(".nit").attr({"placeholder":"0000-000000-000-0"});
}
function  configureSendBtn(){
    jQuery(".sendBtn").click(function() {
        if (InputsEmpty(this) == 0) {
            envioDatos(this);
        }
    });
}
function configureCalendar(){
    jQuery(".calendar").datepicker({
        dateFormat:"yy-mm-dd"
    });
}
function configureDataTable() {
    jQuery("table").find("th").css({"background": "#428BCA", "color": "white"})
    jQuery("table").addClass("display").dataTable();
    jQuery('table.editable tbody td').editable(function (value){return value});
}
function configureAutocomplete() {
    jQuery(".autocomplete").each(function(i, input) {
        loadAutocomplete(input);
    });
}
function loadAutocomplete(input) {
    var form = jQuery(input).parents("form");
    var dataMetod = jQuery(input).attr("data-method");
    var dataController = jQuery(input).attr("data-controller");
    var url = jQuery(form).attr("action");
    url = dataController + "/" + dataMetod;
    jQuery.ajax({
        url: url,
        type: 'GET',
        success: function(response) {
            var data = jQuery.parseJSON(response);
            jQuery(input).autocomplete({
                source: data
            });
        }
    });
}
function envioDatos(input) {
    form = jQuery(input).parents("form")[0];
    url = jQuery(form).attr("action");
    data = jQuery(form).serialize();
    jQuery.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function(resp) {
            jQuery(form).parent("div").html(resp);
        },
        error: function(e, estado, descripcion) {
            alert(descripcion);
        }
    })
}
function InputsEmpty(btnSend) {
    countInputEmpty = 0;
    jQuery("input[type='text']").each(function(i, input) {
        if (jQuery(input).val().trim() == "") {
            jQuery(input).css({"border": "1px solid red"});
            div = jQuery(btnSend).parent();
            setTimeout(function() {
                jQuery(input).css({"border": "1px solid #ccc"})
            }, 3000);
            countInputEmpty++;
        }
    });
    if (countInputEmpty > 0) {
        divCount = jQuery("#divError").length;
        if (divCount == 0) {
            jQuery("<div id='divError' style='color:red'>Â¡Ops Le faltaron algunos campos!</div>").appendTo(div)
        } else {
            jQuery("#divError").html("Â¡Ops Le faltaron algunos campos!");
        }
        setTimeout(function() {
            jQuery("#divError").html("");
        }, 3000);
    }
    return countInputEmpty;
}
function deleteData(id){
    
        var controller = $("a.delete").attr("data-controller");
        var method = $("a.delete").attr("data-method");
        
        var url  = controller + "/" + method;
        
        var posting= $.post(url,{id:id});

        posting.done(function(data){
            $("#content_busqueda").html(data);
        });    

}
function finishData(id)
{
    
    var controller = $("a.finish").attr("data-controller");
        var method = $("a.finish").attr("data-method");
        
        var url  = controller + "/" + method;
        
        var posting= $.post(url,{id:id});
        posting.done(function(data){
          $("#content_busqueda").html(data);
        });  
}
