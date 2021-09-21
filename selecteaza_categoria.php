<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Categorie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<?php
  include "navbar.php";
?>
 <main class="user-login">
  <div class="container selected-car">
    <div class="row">
    <?php
      include 'mysql.php';

       $query = $db->query("SELECT * FROM categorie_piese WHERE id_categorie_piesa < 5");
       $query2 = $db->query("SELECT * FROM categorie_piese WHERE id_categorie_piesa >= 5 LIMIT 3");
       $query3 = $db->query("SELECT * FROM categorie_piese WHERE id_categorie_piesa >= 8 AND universale=false");
       $query4 = $db->query("SELECT * FROM caracteristici_model WHERE id_caracteristica = ".$_GET['id_pc']." ");
    ?>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pc-mag pc-1">
          <div class="row selected-part">
              <?php
                while($row = $query3->fetch_assoc()){
                  echo '
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" onclick=window.location="/licenta/piese_pc.php?id_categorie='.$row['id_categorie_piesa'].'&id_pc='.$_GET['id_pc'].'">
                    <div class="card">
                        <h5 class="category-title"><b>'.$row['nume'].'</b></h5>
                        <img class="card-img-top" src="'.$row['imagine'].'" />
                    </div>
                  </div>';
                }
              ?>
          </div>
          <div class="pc-image">
            <?php
                  while($row = $query4->fetch_assoc()){
                  echo '<img class="card-img-top" src="'.$row['imagine'].'" /> ';
                  }
            ?>
          </div>

        </div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12x pc-mag">
          <div class="row">
              <?php
                while($row = $query->fetch_assoc()){
                  echo '
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" onclick=window.location="/licenta/piese_pc.php?id_categorie='.$row['id_categorie_piesa'].'&id_pc='.$_GET['id_pc'].'">
                    <div class="card">
                        <h5 class="category-title"><b>'.$row['nume'].'</b></h5>
                        <img class="card-img-top" src="'.$row['imagine'].'" />
                    </div>
                  </div>';
                }
              ?>
              <?php
                while($row = $query2->fetch_assoc()){
                  echo '
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" onclick=window.location="/licenta/piese_pc.php?id_categorie='.$row['id_categorie_piesa'].'&id_pc='.$_GET['id_pc'].'">
                    <div class="card">
                        <h5 class="category-title"><b>'.$row['nume'].'</b></h5>
                        <img class="card-img-top" src="'.$row['imagine'].'" />
                    </div>
                  </div>';
                }
              ?>
          </div>

        </div>


    </div>
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
