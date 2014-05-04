$("#fleet").click(function()
    {
      $("#content").load("../administrador/showFleet");
      $("#fact").removeClass();
      $("#mantain").removeClass();
      $("#fleet").addClass("active");
      
   });
$("#fact").click(function()
    {
      $("#content").load("../administrador/showFact");
      $("#fleet").removeClass();
      $("#mantain").removeClass();
      $("#fact").addClass("active");
      
   });
$("#mantain").click(function()
    {
      $("#content").load("../administrador/showMantain");
      $("#fleet").removeClass();
      $("#fact").removeClass();
      $("#mantain").addClass("active");
      
   });