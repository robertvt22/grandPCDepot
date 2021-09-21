<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Piese dedicate</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
</head>
<?php
        include "navbar_admin.php";
        include 'mysql.php';
        if(isset($_GET["cauta"])) {
            $result = $db->query("SELECT * FROM piese_pc WHERE id_categorie_piesa=".$_GET['categorie']." AND id_caracteristica_model=".$_GET['id_pc']."");
        }
        if (isset($_POST["trimite"]))
        {
            $nume= $_POST['nume'];
            $descriere = $_POST['descriere'];
            $pret = $_POST['pret'];
            $categorie = $_GET['categorie'];
            $id_caracteristica_model = $_GET['id_pc'];
            $path =  $db->query("SELECT path FROM caracteristici_model WHERE id_caracteristica=".$_GET['id_pc']."")->fetch_object()->path;
            $target_dir = "img/piese/".$path."/";
            $target_file = $target_dir . basename($_FILES["imagine"]["name"]);
            $intregistrare= $db->query("INSERT INTO piese_pc(id_categorie_piesa,id_caracteristica_model,nume,descriere,imagine,pret)
                                        VALUES ('$categorie','$id_caracteristica_model','$nume','$descriere','$target_file','$pret')");
            if(!($intregistrare))
                echo '<div class="alert alert-danger" role="alert">
                        Piesa nu a fost adaugata, va rugam reincercati!
                    </div>';
            else
                move_uploaded_file($_FILES["imagine"]["tmp_name"], $target_file);
                echo '<div class="alert alert-success" role="alert">
                        Piesa a fost adaugata cu succes.
                    </div>';
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=categorie_piese.php?categorie=".$_GET['categorie']."&id_pc=".$_GET['id_pc']."&cauta=\">";
        }
    ?>
<body class="grey lighten-3">
<div class="container">
  <div class="row">
			<div class="col-md-12 ">
				<form method="GET">
                    <div class="form-group">
                        <label for="sel1">Selectati categoria:</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="1">Alegeti categoria</option>
                            <option value="2">Placa de Baza</option>
                            <option value="3">Memorie</option>
                            <option value="4">Carcasa</option>
                            <option value="5">DVD Writer</option>
                            <option value="6">Hard Disk</option>
                            <option value="7">Placa de sunet</option>
                            <option value="8">Mouse</option>
                            <option value="9">Casti</option>
                            <option value="10">Sursa</option>
                            <option value="11">Cooler</option>
                            <option value="12">Tastatura</option>
                            <option value="13">Joystick</option>
                        </select>
                    </div>
                    <input type="text" value="<?php echo $_GET['id_pc'] ?>" hidden name="id_pc" id="id_pc" >
                    <button type="submit" id="cauta" name="cauta" class="btn btn-primary">Cauta</button>
                </form>
                <table class="table">
    <thead>
      <tr>
        <th>Nume</th>
        <th>Descriere</th>
        <th>Pret</th>
        <th>Actiune</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if(isset($result) && ($result!==null) ){
                echo '<div class="button-create">
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Adauga piese</button>
              </div>    ';
                while($row = $result->fetch_assoc()){
                $descriere = substr($row['descriere'],0, 40);
                echo '<tr>
                    <td>'.$row['nume'].'</td>
                    <td>'.$descriere.'...</td>
                    <td>'.$row['pret'].'</td>
                    <td>
                        <button class="btn btn-default btn-sm" onclick=window.location="/licenta/editare_piese.php?id_piesa='.$row['id_piesa'].'">Editare</button>
                        <button class="btn btn-danger  btn-sm" onclick=window.location="/licenta/sterge_piese.php?id_piesa='.$row['id_piesa'].'">Sterge</button>
                    </td>
                    </tr>';
                }
            }
            else{
                echo '
                    <tr>
                        <td>Va rugam selectati o categorie</td>
                    </tr>
                ';
            }
        ?>
    </tbody>
  </table>
			</div>
		</div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Adaugare piese tunning</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="nume" name="nume" class="form-control" required>
                <label for="nume">Numele piesei</label>
                </div>
                <div class="md-form">
                <i class="fa fa-pencil prefix grey-text"></i>
                <textarea type="text" id="descriere" name="descriere" class="md-textarea" required></textarea>
                <label for="descriere">Descriere</label>
                </div>
                <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="file" id="imagine" name="imagine" class="form-control" required>
                </div>
                <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="text" id="pret" name="pret" class="form-control" required>
                <label for="pret">Pret</label>
                </div>
                <div class="text-center">
                    <button class="btn btn-indigo" id="trimite" name="trimite">Adauga piesa</button>
                </div>
            </form>
            </div>
        </div>
        </div>
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
