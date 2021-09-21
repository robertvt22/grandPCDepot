<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cos de cumparaturi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

  <?php
    include 'navbar.php';
    include 'mysql.php';
    $result = $db->query("SELECT * FROM utilizatori WHERE id_utilizator=".$_SESSION['id_user']."");
    if (isset($_POST["editare"]))
    {
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $email = $_POST["email"];
        $adresa = $_POST["adresa"];
        $oras = $_POST["oras"];
        $judet = $_POST["judet"];
        $cod_postal = $_POST["zip"];
        $editare= $db->query("UPDATE utilizatori SET nume='$nume', prenume='$prenume', email='$email', adresa='$adresa',
                    oras='$oras', judet='$judet', cod_postal='$cod_postal'
                    WHERE id_utilizator=".$_SESSION['id_user']."");
        if(!($editare))
            echo '<div class="alert alert-danger" role="alert">
                    Sa produs o eroare, va rugam sa incercati din nou!
                </div>';
        else
            echo '<div class="alert alert-success" role="alert">
                    Informatiile au fost actualizate cu succes
                </div>';
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=editare_profil.php\">";
    }
  ?>

  <main class="user-login">
    <div class="container wow fadeIn">
      <div class="row my-5">
        <div class="col-md-12 mb-4">
          <div class="card edit-profil">
          <?php
          while($row = $result->fetch_assoc()){
          echo '
            <form class="card-body " method="post">
              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <input type="text" id="nume" name="nume" class="form-control" value='.$row['nume'].'>
                    <label for="nume" class="">Nume</label>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <input type="text" id="prenume" name="prenume" class="form-control" value='.$row['prenume'].'>
                    <label for="prenume" class="">Prenume</label>
                  </div>
                </div>
              </div>
              <div class="md-form mb-5">
                <input type="text" id="email" name="email" class="form-control" placeholder="emaill@exemplu.com" value='.$row['email'].' >
                <label for="email" class="">Email</label>
              </div>
              <div class="md-form mb-5">
                <input type="text" id="adresa" name="adresa" class="form-control" placeholder="Adresa" value="'.$row['adresa'].'">
                <label for="adresa" class="">Adresa</label>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="oras" name="oras" placeholder="" value="'.$row['oras'].'">
                  <label for="oras">Oras</label>
                  </div>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="judet" name="judet" placeholder="" value="'.$row['judet'].'">
                  <label for="judet">Oras</label>
                  </div>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="" value="'.$row['cod_postal'].'">
                  <label for="zip">Cod postal</label>
                  </div>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>
              <button class="btn btn-lg btn-block btn-confirmation" name="editare" type="submit">Editeaza profil</button>
            </form>
            ';
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

</html>
