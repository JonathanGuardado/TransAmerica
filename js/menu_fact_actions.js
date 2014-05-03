$("#addClient").click(function()
    {
      $("#content_fact").load("../administrador/newClient");
      $("#editClient").removeClass("active");
      $("#searchClient").removeClass("active");
      $("#deleteClient").removeClass("active");
      $("#addClient").addClass("active");
      
   });