$(".nav.nav-tabs > li").click(function () { 
    var controller= $(this).attr("data-controller");
    var method= $(this).attr("data-method");
    $("#content").load(controller+"/"+method);
    $(".nav.nav-tabs > li").removeClass("active");
    $(this).addClass("active");
  });