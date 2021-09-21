<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Autentificare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
    </style>
</head>

<?php
require_once("helper.php");
include "mysql.php";

$usernameErr = $passwordErr = "";
$email = $parola = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $usernameErr = "Email-ul trebuie complectat";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["parola"])) {
    $passwordErr = "Parola trebuie complectata";
  } else {
    $parola = test_input($_POST["parola"]);
  }

  if (!(loginUser($email, $parola) || loginAdmin($email, $parola))) {
		$errorMessage = "Email-ul sau parola sunt invalide";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<body>
    <?php
        include "navbar.php";
    ?>
    <main class="user-login" >
        <div class="container login-page" >
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">

                    <form class="text-center border border-light p-5 form-user-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                        <p class="h4 mb-4 login-title">Autentificare</p>
                        <span class="error" style="color:red"><?php echo $errorMessage;?></span>
                        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">
                        <span class="error" style="color:red"><?php echo $usernameErr;?></span>
                        <input type="password" id="parola" name="parola" class="form-control mb-4" placeholder="Parola">
                        <span class="error" style="color:red"><?php echo $passwordErr;?></span>
                        <button class="btn btn-block my-4 btn-confirmation" type="submit">Logare</button>
                        <a href="inregistrare_user.php">Inca nu ai cont? Inregistreaza-te</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
