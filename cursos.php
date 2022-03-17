<?php

require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare("SELECT id, nombre, precio FROM tcursos WHERE activo = 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es  ">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" </head>

<body>
  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Together with me you will learn the different ways to apply nails, create designs,
              pedicure and manicure as well as I will guide you to start your own business.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="https://www.instagram.com/siemprebonita.ags/?hl=es" class="text-white">Follow on
                  Instagram</a></li>
              <li><a href="https://www.facebook.com/monica.esparza.12764" class="text-white">Follow on Facebook</a></li>
              <li><a href="#" class="text-white">Email me: siemprebella@gmail.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">

          <strong>Cursos</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <!--Cursos-->
  <!--carrusel de cursos manicura-->
  <section>
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!--Estas especificaciones hacen que se acomode segun la medida de la ventana-->
        <?php
        foreach ($resultado as $row) {
          $id = $row['id'];
          $imagen = "./images/" . $id . "/principal.jpeg";
          if (!file_exists($imagen)) {
            $imagen = "./images/no-photo-available.png";
          }
          if ($imagen) :

        ?>
            <div class="col-md-3">


              <!--botones-->
              <h5 class="card-title"><?= $row['nombre']; ?></h5>
              <img src="<?= $imagen; ?>" class="img-thumbnail img-fluid " style="background-size:contain width: 350px; height: 350px;">

              <p class="card-text"> Precio $<?= $row['precio']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="detalles.html" class="btn btn-primary">Detalles</a>

                </div>
                <a href="" class="btn btn-success">Agregar</a>
              </div>
            </div>
        <?php
          endif;
        }
        ?>
      </div>

    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>