<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <base href= "<?php echo $this->config->item('base_url'); ?>"/>

    <!-- Bootstrap core CSS -->
    <link href="recursoApp/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="recursoApp/css/justified-nav.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <div class="masthead">
        <h3 class="text-muted">Sistema Bibliotecario de Ciencias de la Salud</h3>
    <!--    <ul class="nav nav-justified">
          <li class="active">Libros</a></li>
        </ul> -->
      </div>
      
      <body>
      <div class="container">
      <div class="masthead">
        <ul class="nav nav-justified">
          <li><a href="principal/admi">Libros</a></li>
          <li><a href="usuario">Usuarios</a></li>
          <li><a href="prestamos/tabla">Prestamos</a></li>
          <li><a href="principal">Cerrar Sesión</a></li>
        </ul>
      </div>

    <div id='content' class='row-fluid'>
          <div style='height:20px;'></div>  
            <div>
             <!-- <a class="btn btn-small btn-primary" href="principal_view">Inicio<br></a> -->
              <?php echo $contenido; ?>
            </div>
</html>