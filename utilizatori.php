<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Utilizatori</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <?php
        include "navbar_admin.php";
        include 'mysql.php';
        $result = $db->query("SELECT * FROM utilizatori");
    ?>

<div class="container margin-top">
  <h2>Utilizatori</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Email</th>
        <th>Oras</th>
        <th>Adresa</th>
        <th>Judet</th>
        <th>Cod postal</th>
      </tr>
    </thead>
    <tbody>
        <?php
            while($row = $result->fetch_assoc()){
            echo '<tr>
                <td>'.$row['nume'].'</td>
                <td>'.$row['prenume'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['oras'].'</td>
                <td>'.$row['adresa'].'</td>
                <td>'.$row['judet'].'</td>
                <td>'.$row['cod_postal'].'</td>
                </tr>';
            }
        ?>
    </tbody>
  </table>
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
