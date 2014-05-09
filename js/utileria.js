jQuery(document).ready(function() {
    jQuery(".sendBtn").click(function() {
        if (InputsEmpty(this) == 0) {
            envioDatos();
        }
    });
    var input = jQuery(".autocomplete");
    if (input.length > 0) {
        loadAutocomplete(input);
    }
});


function loadAutocomplete(input) {
    var form = jQuery(input).parents("form");
    var dataMetod = jQuery(input).attr("data-method");
    var dataController = jQuery(input).attr("data-controller");
    var url = jQuery(form).attr("action");
    //url = url.substring(0, url.lastIndexOf("/"));
    //url = url.substring(0, url.lastIndexOf("/")) ;
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
function envioDatos() {
    form = jQuery(this).parents("form")[0];
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
            div=jQuery(btnSend).parent();             
            setTimeout(function() {
                jQuery(input).css({"border": "1px solid #ccc"})
            }, 3000);
            countInputEmpty++;
        }
    });
    if (countInputEmpty>0){
        divCount=jQuery("#divError").length;
        if(divCount==0){
        jQuery("<div id='divError' style='color:red'>¡Ops Le faltaron algunos campos!</div>").appendTo(div)
        }else{
            jQuery("#divError").html("¡Ops Le faltaron algunos campos!");
        }
          setTimeout(function() {
            jQuery("#divError").html(""); }, 3000);
    }
    return countInputEmpty;
}