$("#addReencauche").click(function()
    {
      $("#content_mantain").load("../reencauche/newReencauche");
      $("#editReencauche").removeClass("active");
      $("#searchReencauche").removeClass("active");
      $("#deleteReencauche").removeClass("active");
      $("#addReencauche").addClass("active");
      
   });
$("#editReencauche").click(function()
    {
      $("#content_mantain").load("../reencauche/editReencauche");
      $("#addReencauche").removeClass("active");
      $("#searchReencauche").removeClass("active");
      $("#deleteReencauche").removeClass("active");
      $("#editReencauche").addClass("active");
      
   });
$("#deleteReencauche").click(function()
    {
      $("#content_mantain").load("../reencauche/deleteReencauche");
      $("#editReencauche").removeClass("active");
      $("#searchReencauche").removeClass("active");
      $("#addReencauche").removeClass("active");
      $("#deleteReencauche").addClass("active");
      
   });
$("#searchReencauche").click(function()
    {
      $("#content_mantain").load("../reencauche/searchReencauche");
      $("#editReencauche").removeClass("active");
      $("#addReencauche").removeClass("active");
      $("#deleteReencauche").removeClass("active");
      $("#searchReencauche").addClass("active");
      
   });
