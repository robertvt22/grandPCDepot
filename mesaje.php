<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesaje</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <?php
        include "navbar_admin.php";
        include 'mysql.php';
        $result = $db->query("SELECT * FROM mesaje");
    ?>

<div class="container">
  <h2>Mesaje</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>Nume</th>
        <th>Email</th>
        <th>Mesaj</th>
        <th>Actiune</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            while($row = $result->fetch_assoc()){  
            echo '<tr>
                <td>'.$row['nume'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['mesaj'].'</td>
                <td> <a href="detalii_mesaj.php?id_mesaj='.$row['id_mesaj'].'"<button class="btn btn-black">Detalii</button></a> </td>
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