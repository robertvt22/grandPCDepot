<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php
  include "navbar.php";
?>

<main class="user-login">
    <div class="container pc-parts">
        <?php
          include 'mysql.php';
          $query = $db->query("SELECT * FROM piese_pc WHERE id_categorie_piesa=".$_GET['id_categorie']." AND id_caracteristica_model= ".$_GET['id_pc']."");
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Produs: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Adauga in cos</button>
              </div>
            </div>
          </div>
        </div>
      <section class="text-center mb-4 pc-part3">
        <div class="row wow fadeIn">
        <?php
          while($row = $query->fetch_assoc()){
            echo '
              <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                  <div class="view overlay">
                    <img src="'.$row['imagine'].'" class="card-img-top" alt="" width="300" height="250">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <div class="card-body text-center">
                    <h5>
                      <strong>
                        <a href="" class="dark-grey-text">'.$row['nume'].'
                          <span class="badge badge-pill danger-color"></span>
                        </a>
                      </strong>
                    </h5>
                    <h4 class="font-weight-bold blue-text">
                      <strong>'.$row['pret'].' ron</strong>
                    </h4>
                    <button type="button" onclick=window.location="/licenta/detalii_piesa.php?id_piesa='.$row['id_piesa'].'" class="btn btn-primary">
                      Detalii
                    </button>
                  </div>
                </div>
              </div>
            ';
          }
      ?>
      </div>
      </section>
    </div>
  </main>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</body>
