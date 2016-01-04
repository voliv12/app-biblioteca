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

    <title>Lista de libros de la biblioteca</title>
    <!-- Bootstrap core CSS -->
    <link href="recursoApp/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="recursoApp/css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    


  </head>
  
  <body>
    <div class="container">
      <div class="masthead">
        <h3 class="text-muted">Sistema Bibliotecario de Ciencias de la Salud</h3>
        <ul class="nav nav-justified">
          <li><a href="principal/admi">Libros</a></li>
          <li><a href="usuario">Usuarios</a></li>
          <li><a href="prestamos/tabla">Prestamos</a></li>
          <li><a href="principal">Cerrar Sesión</a></li>
        </ul>
      </div>
      <link href="css/booststrap.min.css" rel="stylesheet">
    <div id='content' class='row-fluid'>
          <div style='height:20px;'></div> 
            <div>
              <?php echo $contenido; ?>
            </div>
</html>