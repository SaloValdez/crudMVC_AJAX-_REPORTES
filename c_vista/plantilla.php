<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crud PHP</title>
  <link rel="stylesheet" href="c_vista/css/estilos.css">
    <script src="c_vista/js/jquery-3.2.1.min.js">  </script>
</head>
<body>
  <header>
      <center><h1>LOGOTIPO</h1></center>
  </header>
   <?php
    include "secciones/menu.php";
    ?>

    <section>
          <?php
            $mvc = new MvcController();
            $mvc ->enlacesPaginasController();

           ?>
    </section>

    <script type="text/javascript" src="c_vista/js/validarRegistro.js">  </script>

</body>
</html>
