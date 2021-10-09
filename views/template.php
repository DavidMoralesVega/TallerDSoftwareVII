<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller de Desarrollo de Software Versión II - Jesús María</title>
    <link rel="stylesheet" href="views/resources/template/css/all.css">
    <link rel="stylesheet" href="views/resources/template/css/mdb.min.css">
    <link rel="stylesheet" href="views/resources/template/css/style.css">
</head>

<body>
  
    <?php
        $Links = new LinksControllers();
        $Links->LinkController();
    ?>

    <!--Footer-->
    <footer></footer>
    <!--Footer-->
</body>

<script src="views/resources/template/js/mdb.min.js"></script>
<script src="views/resources/template/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Scripts personalizados -->
<script src="views/resources/scripts/utils.js"></script>

<?php
      $Route = (isset($_GET['action'])) ? $_GET['action'] : 'login';
      echo '<script src="views/resources/scripts/'.$Route.'.js"></script>';
?>


</html>