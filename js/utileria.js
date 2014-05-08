jQuery(document).ready(function() {
    jQuery(".sendBtn").click(envioDatos);
    var input = jQuery(".autocomplete");
    if(input.length>0){
    loadAutocomplete(input);
    }
});
function loadAutocomplete(input) {    
    var form = jQuery(input).parents("form");
    var dataMetod = jQuery(input).attr("data-method");
    var dataController = jQuery(input).attr("data-controller");
    var url = jQuery(form).attr("action");
    url = url.substring(0, url.lastIndexOf("/"));
    url = url.substring(0, url.lastIndexOf("/")) ;
    url= url+"/"+dataController+"/"+dataMetod;
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