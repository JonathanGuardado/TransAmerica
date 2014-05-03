$("#fleet").click(function()
    {
      $("#content").load("../administrador/showFleet");
      $("#fact").removeClass();
      $("#users").removeClass();
      $("#fleet").addClass("active");
      
   });
$("#fact").click(function()
    {
      $("#content").load("../administrador/showFact");
      $("#fleet").removeClass();
      $("#users").removeClass();
      $("#fact").addClass("active");
      
   });
$("#users").click(function()
    {
      $("#content").load("../administrador/showUsers");
      $("#fleet").removeClass();
      $("#fact").removeClass();
      $("#users").addClass("active");
      
   });