<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Detalii piesa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
  include 'navbar.php';
  include 'mysql.php';
  require_once("helper.php");
  $query = $db->query("SELECT * FROM piese_pc WHERE id_piesa=".$_GET['id_piesa']."");
  $query2 = $db->query("SELECT * FROM piese_pc WHERE id_piesa=".$_GET['id_piesa']."");


  $cant1 = $query2->fetch_assoc();



  if (isset($_POST['adauga-in-cos']) && !($cant1['cantitate_piesa'] < 0)) {
		    if ((isLoggedIn()) && ($cant1['cantitate_piesa'] > 0)) {
			       $cantitate = $_POST['cantitate'];
			       $id_user = $_SESSION['id_user'];
			       $id_piesa = $_GET['id_piesa'];
			       $adaugare= $db->query("INSERT INTO cos_cumparaturi(id_piesa,id_user, cantitate) VALUES('$id_piesa','$id_user', '$cantitate')");

				          if(!($adaugare) && ($cant1['cantitate_piesa'] < 0)) {
                      echo '<script language="javascript">';
                      echo 'alert("Stoc insuficient")';
                      echo '</script>';
                    }
					         else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Piesa a fost adaugata cu succes in cos")';
                        echo '</script>';
                    }

						echo "<meta http-equiv=\"refresh\" content=\"2;URL=detalii_piesa.php?id_piesa=".$_GET['id_piesa']."\">";
		}

    else {
      echo '<script language="javascript">';
      echo 'alert("Nu sunteti autentificat/stoc insuficient")';
      echo '</script>';
		}
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=detalii_piesa.php?id_piesa=".$_GET['id_piesa']."\">";
}



?>
  <main class="mt-5 pt-4 user-login">
    <div class="container dark-grey-text mt-5">
      <div class="row wow fadeIn whitecolor">
      <?php
          while($row = $query->fetch_assoc()){
          echo '
          <div class="col-md-6 mb-4">
            <img src="'.$row['imagine'].'" class="img-fluid" alt="">
          </div>

          <div class="col-md-6 mb-4">
            <div class="p-4">
              <p class="lead font-weight-bold">
                  <span>Pret:</span>
                <span>'.$row['pret'].' RON</span>
              </p>
              <p class="lead font-weight-bold">Denumire produs</p>
              <p>'.$row['nume'].'</p>
              <p class="lead font-weight-bold">Descriere produs</p>
              <p>'.$row['descriere'].'</p>
              <p class="lead font-weight-bold">Stoc disponibil</p>';
              if ($row['cantitate_piesa'] <= 0){
               echo '<h3><span class="badge bg-danger">Stoc indisponibil</span></h3>';
             }
             else {
               echo '<h3><span class="badge bg-success">In stoc</span></h3>';
             }
             echo '


              <form class="d-flex justify-content-left" method="post" role="form">
                <input type="number" value="1" name="cantitate" aria-label="Search" class="form-control" style="width: 100px">
                <button class="btn btn-primary btn-md my-0 p" name="adauga-in-cos" type="submit">Adauga in cos
                  <i class="fa fa-shopping-cart ml-1"></i>
                </button>
              </form>
            </div>
          </div>';
        }
      ?>
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

</html>
