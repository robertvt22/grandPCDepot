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
    $result2 = $db->query("SELECT * FROM cos_cumparaturi AS c
                           INNER JOIN piese_pc p ON c.id_piesa = p.id_piesa
                           WHERE id_user=".$_SESSION['id_user']."");
  ?>

  <main class="user-login">
    <div class="container wow fadeIn">
      <h2 class="my-5 h2 text-center">Cos de cumparaturi</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
          <?php
          while($row = $result->fetch_assoc()){
          echo '
            <form class="card-body">
              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" value='.$row['nume'].'>
                    <label for="firstName" class="">Nume</label>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" value='.$row['prenume'].'>
                    <label for="lastName" class="">Prenume</label>
                  </div>
                </div>
              </div>
              <div class="md-form mb-5">
                <input type="text" id="email" class="form-control" placeholder="emaill@exemplu.com" value='.$row['email'].' >
                <label for="email" class="">Email</label>
              </div>
              <div class="md-form mb-5">
                <input type="text" id="address" class="form-control" placeholder="Adresa" value="'.$row['adresa'].'">
                <label for="address" class="">Adresa</label>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                  <label for="country">Oras</label>
                  <input type="text" class="form-control" id="zip" placeholder="" value="'.$row['oras'].'">
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="state">Judet</label>
                  <input type="text" class="form-control" id="zip" placeholder="" value="'.$row['judet'].'">
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="zip">Cod postal</label>
                  <input type="text" class="form-control" id="zip" placeholder="" value="'.$row['cod_postal'].'">
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>
              <hr>
              <button class="btn btn-lg btn-block btn-confirmation" onclick="myFunction()" type="submit">Trimite comanda</button>;


            </form>
            ';
          }
            ?>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Cosul tau</span>
            <span class="badge badge-info badge-pill"> <?php echo $result2->num_rows; ?></span>
          </h4>
          <ul class="list-group mb-3 z-depth-1">
            <li class="col-md-12 list-group-item">
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="my-0">Nume</h6>
                    </div>
                    <div class="col-md-3">
                        <h6 class="my-0">Pret</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="my-0">Cantitate</h6>
                    </div>
                </div>
            </li>
            <?php

            if (isset($_POST["sterge"]))
            {
                $sterge= $db->query("DELETE FROM cos_cumparaturi WHERE id_cos_cumparaturi=". $_POST["sterge"]."");
                if(!($sterge))
                    echo '<div class="alert alert-danger" role="alert">
                            Pentru a adauga un produs in cosul de cumparaturi este necesar sa va autentificati in contul dumneavoastra.
                        </div>';
                else
                    echo '<div class="alert alert-success" role="alert">
                            Piesa a fost stearsa din cosul de cumparaturi
                        </div>';
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=cos_cumparaturi.php\">";
            }


            $total_price = 0;
            while($row2 = $result2->fetch_assoc()){
            $total_price += $row2['pret'];
            echo '
            <li class="col-md-12 list-group-item">
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="my-0">'.$row2['nume'].'</h6>
                    </div>
                    <div class="col-md-3">
                        <span class="text-muted">'.$row2['pret'].'</span>
                    </div>
                    <div class="col-md-2" style="text-align: center;">
                        <span class="text-muted">'.$row2['cantitate'].'</span>
                    </div>

                    <div class="col-md-2">
                        <form method="post">
                            <button type="submit" class="badge badge-danger badge-pill" name="sterge" value="'.$row2['id_cos_cumparaturi'].'" style="border: none; cursor: pointer;">
                                <i class="fa fa-close"></i>
                            </button>
                        </form>
                    <div>
                </div>
            </li>';
            }
            ?>
            <li class="col-md-12 list-group-item">
                <div class="row">
                    <div class="col-md-5">
                        <span><b>Total (RON)</b></span>
                    </div>
                    <div class="col-md-3">
                        <strong><?php echo $total_price ?></strong>
                    </div>
                </div>
            </li>
          </ul>
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

  <script>
function myFunction() {
  alert("Comanda a fost plasata! Multumim!");
}
</script>


</body>

</html>
