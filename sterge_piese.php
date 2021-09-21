<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Piese tunning</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
</head>

<body>
<?php
  include "navbar_admin.php";
  include 'mysql.php';
  $query = $db->query("SELECT * FROM piese_pc WHERE id_piesa=".$_GET['id_piesa']."");
  if (isset($_POST["sterge"]))
  {
    $intregistrare= $db->query("DELETE FROM piese_pc WHERE id_piesa=".$_GET['id_piesa']."");
    if(!($intregistrare))
    echo '<div class="alert alert-danger" role="alert">
        Piesa nu a fost stearsa, va rugam reincercati!
    </div>';
    else
    echo '<div class="alert alert-success" role="alert">
        Piesa a fost stearsa cu succes.
    </div>';
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin.php\">";
  }
?>
    <div class="container dark-grey-text mt-5">
    <?php
        while($row = $query->fetch_assoc()){
        echo '
        <div class="row">
            <div class="col-md-12 mb-4">
                <form method="post" role="form" enctype="multipart/form-data">
                    <div class="alert alert-danger" role="alert">
                        Sunteti sigur ca doriti sa stergeti piesa '.$row['nume'].'
                    </div>
                    <button type="submit" class="btn btn-danger btn-md" id="sterge" name="sterge">Da</button>
                    <button type="button" class="btn btn-primary btn-md" onClick="history.go(-1); return false;">Nu</button>
                </form>
            </div>
        </div>';
        }
    ?>
    </div>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>
</body>

</html>
