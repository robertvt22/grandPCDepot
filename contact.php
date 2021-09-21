<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Contact</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
  include "navbar.php";
  include 'mysql.php';
    if (isset($_POST["trimite"]))
    {
        $nume= $_POST['nume'];
        $email = $_POST['email'];
        $mesaj = $_POST['mesaj'];
        $intregistrare= $db->query("INSERT INTO mesaje(nume,email,mesaj) VALUES ('$nume','$email','$mesaj')");
        if(!($intregistrare))

          {
              echo '<script language="javascript">';
              echo 'alert("Mesajul nu a fost trimis, va rugam reincercati!")';
              echo '</script>';
            }


        else
        {
            echo '<script language="javascript">';
            echo 'alert("Mesajul a fost trimis! Multumim!")';
            echo '</script>';
          }
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=contact.php\">";
    }
  ?>
  <main class="user-login">
  <div class="view full-page-intro">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row wow fadeIn">
          <div class="col-md-6 mb-4 white-text text-center text-md-left">
            <h1 class="display-4 font-weight-bold">Grand PC Depot</h1>
            <hr class="hr-light">
            <p class="mb-4 d-none d-md-block">
              <strong>Piese pc pentru calculatorul tau!</strong>
            </p>
          </div>
          <div class="col-md-6 col-xl-5 mb-4">
            <div class="card">
              <div class="card-body">
                <form method="post" role="form">
                  <h3 class="dark-grey-text text-center">
                    <strong>Spune-ne parerea ta despre noi:</strong>
                  </h3>
                  <hr>
                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="nume" name="nume" class="form-control">
                    <label for="nume">Numele tau</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="text" id="email" name="email" class="form-control">
                    <label for="email">Email-ul tau</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="mesaj" name="mesaj" class="md-textarea"></textarea>
                    <label for="mesaj">Mesajul tau</label>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-confirmation" id="trimite" name="trimite">Trimite</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
