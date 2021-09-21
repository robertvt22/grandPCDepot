<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body id="page-top">
    <?php
      include "navbar_admin.php";
      include 'mysql.php';
      $result = $db->query("SELECT COUNT(id_mesaj) as total_count FROM mesaje");
      $mesaje = $result->fetch_object();
      $result2 = $db->query("SELECT COUNT(id_piesa) as total_count FROM piese_pc");
      $piese_pc = $result2->fetch_object();
      // $result3 = $db->query("SELECT COUNT(id_comanda) as total_count FROM comenzi WHERE trimis=0");
      // $comenzi = $result3->fetch_object();
      $result4 = $db->query("SELECT COUNT(id_utilizator) as total_count FROM utilizatori");
      $utilizatori = $result4->fetch_object();
    ?>
      <div id="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3 ">
              <div class="card text-white o-hidden h-100 card1">
                <div class="card-body ">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?php echo $mesaje->total_count ?> Mesaje</div>
                </div>
                <a class="card-footer text-white clearfix small z-1 card2" href="mesaje.php">
                  <span class="float-left">Vezi detalii</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white o-hidden h-100 card1">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php echo $piese_pc->total_count ?> Piese adaugate</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white o-hidden h-100 card1">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">0 Comenzi</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white o-hidden h-100 card1">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?php echo $utilizatori->total_count ?> Utilizatori</div>
                </div>
                <a class="card-footer text-white clearfix small z-1 card2" href="utilizatori.php">
                  <span class="float-left">Vezi detalii</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
  </body>

</html>
