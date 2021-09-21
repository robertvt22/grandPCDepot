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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="grey lighten-3">
    <?php
        include "navbar_admin.php";
        include 'mysql.php';
        include 'helper.php';

        $citire_mesaj = $db->query("UPDATE mesaje SET citit=1 WHERE id_mesaj=".$_GET['id_mesaj']."");
        $result = $db->query("SELECT * FROM mesaje WHERE id_mesaj=".$_GET['id_mesaj']."");
        if (isset($_POST["trimite"]))
        {
            $mesaj = $_POST['mesaj'];
            $email= $_POST['email'];
            $subiect = "Raspuns intrebare";
            $id_mesaj = $_GET['id_mesaj'];
            $intregistrare= $db->query("INSERT INTO raspunsuri(id_mesaj, mesaj) VALUES ('$id_mesaj','$mesaj')");
            if(!($intregistrare))
                echo '<div class="alert alert-danger" role="alert">
                        Mesajul nu a fost trimis, va rugam reincercati!
                    </div>';
            else
                send_mail($email,$mesaj,$subiect);	
                echo '<div class="alert alert-success" role="alert">
                        Mesajul a fost trimis cu succes!
                    </div>';
               echo "<meta http-equiv=\"refresh\" content=\"2;URL=detalii_mesaj.php?id_mesaj=".$_GET['id_mesaj']."\">";
        }
    ?>

<div class="container">
  <div class="card margin-top">
  <div class="card-body">
    <h4>Detalii mesaj</h4>
    <?php 
        while($row = $result->fetch_assoc()){  
        echo '<span>Nume: '.$row['nume'].'</span> <br> 
              <span>Email: '.$row['email'].'</span> <br>
              <span>Mesaj: '.$row['mesaj'].'</span>  
              <form method="post" role="form">
              <input type="text" id="email" name="email" value='.$row['email'].' hidden/>
              <div class="md-form">
              <i class="fa fa-pencil prefix grey-text"></i>
              
              <textarea type="text" id="mesaj" name="mesaj" class="md-textarea"></textarea>
              <label for="mesaj">Raspunde</label>
              </div>
              <div class="text-center">
              <button class="btn btn-indigo" id="trimite" name="trimite">Trimite</button>
              </div>
         </form>       ';      
        }
    ?>
              
  </div>
</div>

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