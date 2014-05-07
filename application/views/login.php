<html>
<head>
	<title>Transamerica</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="js/jquery-2.1.0.js"></script>
     <script src="js/niveles.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>    
</head>
<body>
        <div class="col-lg-3 col-md-3 col-sm-2 hidden-xs"></div>
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
    <div class="row jumbotron text-center" style="font-size:16px;">
    <form method="post" action="index.php/login/checkUser">
    <fieldset>
        <legend class="text-center">Login</legend>

        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Usuario</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="text" id="user"  name="user" class="form-control" placeholder="Usuario"/>            
        </div>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"  style="text-align:right"><label>Contrase&ntilde;a</label></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"  style="text-align:left"><input type="password" id="password" onkeypress="validar(event);" class="form-control" name="password" placeholder="Password" />
        </div>
        </div>
       
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
            
            
        <input type="button" onclick="validar_usuario()" class="btn btn-primary" value="Sign In" name="signin"/>

            <br />            
            
        </div>
        <div id="mensaje_error_form_login" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="visibility: hidden; color:red; font-size:15px;">
         Usuario o Contrase&ntilde;a Incorrecta
          </div>
    </fieldset>
    </form>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2  hidden-xs"></div>
    
</body>
</html>