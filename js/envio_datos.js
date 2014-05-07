jQuery(document).ready(function(){
	jQuery(".sendBtn").click(function(){
        form=jQuery(this).parents("form")[0];
        url=jQuery(form).attr("action");    
        data=jQuery(form).serialize();
        jQuery.ajax({
            url:url,
            data: data,
            type: 'POST',
            success:function(resp){
                
            }     
        })
	})
})