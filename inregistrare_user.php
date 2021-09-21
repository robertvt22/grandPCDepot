<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Inregistrare</title>
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
    if (isset($_POST["editare"]))
    {
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $email = $_POST["email"];
        $adresa = $_POST["adresa"];
        $oras = $_POST["oras"];
        $judet = $_POST["judet"];
        $cod_postal = $_POST["zip"];
        $parola = $_POST["parola"];
        $intregistrare= $db->query("INSERT INTO utilizatori(nume,prenume,email,adresa,oras,judet,cod_postal, parola)
                                    VALUES ('$nume','$prenume','$email','$adresa', '$oras','$judet','$cod_postal', '$parola')");
        if(!($intregistrare)){
          echo '<script language="javascript">';
          echo 'alert("A intervenit o eroare. Va rugam incercati din nou")';
          echo '</script>';
        }
        else
        {
          echo '<script language="javascript">';
          echo 'alert("V-ati inregistrat cu succes!")';
          echo '</script>';
        }
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\">";
    }
  ?>

  <main class="user-login forn-login">
    <div class="container wow fadeIn ">
      <div class="row my-5">
        <div class="col-md-12 mb-4 log1">
          <div class="card ">
            <form class="card-body forn-login" method="post">
              <div class="row ">
                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <input type="text" id="nume" name="nume" class="form-control " required>
                    <label for="nume" class="">Nume</label>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <input type="text" id="prenume" name="prenume" class="form-control" required>
                    <label for="prenume" class="">Prenume</label>
                  </div>
                </div>
              </div>
              <div class="md-form mb-5">
                <input type="email" id="email" name="email" class="form-control" placeholder="emaill@exemplu.com" required>
                <label for="email" class="">Email</label>
              </div>
              <div class="md-form mb-5">
                <input type="text" id="adresa" name="adresa" class="form-control" placeholder="Adresa" required>
                <label for="adresa" class="">Adresa</label>
              </div>
              <div class="md-form mb-5">
                <input type="password" id="parola" name="parola" class="form-control" placeholder="Parola" required>
                <label for="parola" class="">Parola</label>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="oras" name="oras" placeholder="" required>
                  <label for="oras">Oras</label>
                  </div>
                  <div class="invalid-feedback">
                    Introduce un oras corect.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="judet" name="judet" placeholder="" required>
                  <label for="judet">Judet</label>
                  </div>
                  <div class="invalid-feedback">
                    Introduce un judet corect.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="md-form mb-4">
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                  <label for="zip">Cod postal</label>
                  </div>
                  <div class="invalid-feedback">
                    Introdu un cod corect
                  </div>
                </div>
              </div>
              <button class="btn btn-lg btn-block btn-confirmation" name="editare" type="submit">Inregistrare</button>
            </form>
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
