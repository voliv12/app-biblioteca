<!DOCTYPE html>
<head>
<title>Sistema de prestamo de equipo de computo del ICS</title>
<script type='text/javascript' src='js/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src="recursoApp/js/bootstrap.min.js"></script>    
    <link href="recursoApp/css/bootstrap.css" rel="stylesheet" media="screen">
    
    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">

    <meta charset="utf-8" />
 
<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var url = window.location.href;
        $('.nav a[href="'+url+'"]').parent().addClass('active');
    });
</script>

 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>



<style type='text/css'>
    body {
      background-color: #CCC;
    }
    #content {
      background-color: #FFF;
      border-radius: 5px;
    }
    #content .main {
      padding: 20px;
    }
    #content p {
      line-height: 30px;
    }
</style>
</head>
<body>
  <div class='container'>
    <img src="http://www.uv.mx/veracruz/nutricion/files/2012/10/Logo-UV.jpg" width='123' height='123'><h1>SISTEMA DE PRESTAMO DE EQUIPO DE COMPUTO</h1>
    <div class='navbar navbar-inverse'>
      <div class='navbar-inner nav-collapse' style="height: auto;">
       <ul class="nav">
          <li><a href="regsitro">Prestamos</a></li>
          <li><a href="equipos">Equipo de computo</a></li>
          <li><a href="academico">Personal</a></li>
          <li><a href="usuario">Usuarios del sistema</a></li>
       </ul>

      </div>
    </div>
    <div id='content' class='row-fluid'>
                
        <h2>Administracion</h2>
        
          <div style='height:20px;'></div>  
            <div>
              <?php echo $contenido; ?>
 
            </div>
    </div>
  </div>
</body>
</html>
