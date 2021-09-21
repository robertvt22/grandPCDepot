<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Comanda confirmata</title>
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
      <h2 class="my-5 h2 text-center">Comanda trimisa</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
          <?php
          while($row = $result->fetch_assoc()){
          echo
            '<h1>Utilizatorul </h1>'.$row['id_utilizator'].' a cumparat in valoare de '. $total_price;
            ;
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
