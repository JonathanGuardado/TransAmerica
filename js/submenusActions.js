$(".list-group-item").click(function(){
        var controller= $(this).attr("data-controller");
        var method= $(this).attr("data-method");
        if(controller=="reportes") window.open(controller+'/'+method,'_blank');
        else $("#content2").load(controller+"/"+method);

        $(".list-group-item").removeClass("active");
        $(this).addClass("active");
});

