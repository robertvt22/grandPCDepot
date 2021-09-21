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
  if (isset($_POST["imagine"]))
  {
    $target_dir = "img/piese/Tunning/";
    $target_file = $target_dir . basename($_FILES["imagine"]["name"]);
    $editare= $db->query("UPDATE piese_pc SET imagine='$target_file' WHERE id_piesa=".$_GET['id_piesa']."");
    if(!($editare))
    echo '<div class="alert alert-danger" role="alert">
        Piesa nu a fost editata, va rugam reincercati!
        </div>';
    else
    move_uploaded_file($_FILES["imagine"]["tmp_name"], $target_file);
    echo '<div class="alert alert-success" role="alert">
        Piesa a fost editata cu succes.
    </div>';
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=editare_piese.php?id_piesa=".$_GET['id_piesa']."\">";
  }
  if (isset($_POST["editare"]))
  {
    $nume= $_POST['nume'];
    $descriere = $_POST['descriere'];
    $pret = $_POST['pret'];
    $editare= $db->query("UPDATE piese_pc SET nume='$nume',descriere='$descriere', pret='$pret' WHERE id_piesa=".$_GET['id_piesa']."");
    if(!($editare))
    echo '<div class="alert alert-danger" role="alert">
        Piesa nu a fost editata, va rugam reincercati!
        </div>';
    else
    echo '<div class="alert alert-success" role="alert">
        Piesa a fost editata cu succes.
    </div>';
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=editare_piese.php?id_piesa=".$_GET['id_piesa']."\">";
  }
?>
    <div class="container dark-grey-text mt-5">
    <?php
        while($row = $query->fetch_assoc()){
        echo '
        <div class="row">
            <div class="col-md-6 mb-4">
                <form method="post" role="form" enctype="multipart/form-data">
                    <img src="'.$row['imagine'].'" class="img-fluid" alt="">
                    <p>Schimba imaginea</p>
                    <input type="file" id="imagine" name="imagine" required>
                    <button type="submit" class="btn btn-primary btn-md" id="imagine" name="imagine">Salveaza</button>
                </form>
            </div>
            <div class="col-md-6 mb-4">
                <form method="post" role="form" enctype="multipart/form-data">
                    <div class="p-4">
                        <p class="lead font-weight-bold">
                            <span>Nume piesa:</span>
                            <span></span>
                            <input type="text" class="form-control" id="nume" name="nume" value="'.$row['nume'].'">
                        </p>
                        <p class="lead font-weight-bold">
                            <span>Pret:</span>
                            <input type="text" class="form-control" id="pret" name="pret" value="'.$row['pret'].'">
                        </p>
                        <p class="lead font-weight-bold">Descriere produs</p>
                            <textarea rows="5" class="form-control" id="descriere" name="descriere">'.$row['descriere'].'</textarea>
                            <button class="btn btn-md btn-indigo mt-4" style="float:right;" id="editare" name="editare">Editare informatii</button>
                    </div>
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
