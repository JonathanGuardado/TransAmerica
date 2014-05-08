$("#fleet").click(function()
    {
      $("#content").load("administrador/showFleet");
      $("#fact").removeClass("active");
      $("#mantain").removeClass("active");
      $("#fleet").addClass("active");
      
   });
$("#fact").click(function()
    {
      $("#content").load("administrador/showFact");
      $("#fleet").removeClass("active");
      $("#mantain").removeClass("active");
      $("#fact").addClass("active");
      
   });
$("#mantain").click(function()
    {
      $("#content").load("administrador/showMantain");
      $("#fleet").removeClass("active");
      $("#fact").removeClass("active");
      $("#mantain").addClass("active");
      
   });