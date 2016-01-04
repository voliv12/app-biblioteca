<!DOCTYPE html>
<html lang="es">

  <head>
    <base href= "<?php echo $this->config->item('base_url'); ?>">   
    <meta charset="utf-8">
    <title>Login &middot; sistema bibliotecario </title>
    <script type='text/javascript' src='js/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src="recursoApp/js/bootstrap.min.js"></script>    
    <link href="recursoApp/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 400px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <h2  align="center">SISTEMA BIBLIOTECARIO</h2>
  </head>
  <body>
  
<!--#######################################################-->      
      <h3 class="muted"> &nbsp; </h3>
    <div class="container">

      <form class="form-signin" action="../biblioteca/login/validar_usuario" method="POST">       
        <h4 class="form-signin-heading">     Inicio de Sesion     </h4>
        <input type="text" name="nusuario" class="input-block-level" placeholder="Nombre del usuario">
        <input type="password" name="contrasena" class="input-block-level" placeholder="Contraseña">
        <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
        </label>        
        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
        <input  class="btn btn-large btn-primary" type='button' value="Cancelar" OnClick="window.location.href='principal'">
      </form>
      <div class="container-fluid">                     
             <?php echo $contenido; ?>                                    
     </div> 
    </div> <!-- /container -->   
  </body>
</html>