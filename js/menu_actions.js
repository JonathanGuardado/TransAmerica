$("#fleet").click(function()
    {
      $("#content").load("administrador/showFleet");
      $("#fact").removeClass("active");
      $("#mantain").removeClass("active");
      $("#fleet").addClass("active");
      $("#reports").removeClass("active");
      
   });
$("#fact").click(function()
    {
      $("#content").load("administrador/showFact");
      $("#fleet").removeClass("active");
      $("#mantain").removeClass("active");
      $("#fact").addClass("active");
      $("#reports").removeClass("active");
      
   });
$("#mantain").click(function()
    {
      $("#content").load("administrador/showMantain");
      $("#fleet").removeClass("active");
      $("#fact").removeClass("active");
      $("#reports").removeClass("active");
      $("#mantain").addClass("active");
      
   });

$("#reports").click(function()
    {
      $("#content").load("administrador/showReports");
      $("#fleet").removeClass("active");
      $("#fact").removeClass("active");
      $("#mantain").removeClass("active");
      $("#reports").addClass("active");
      
   });
