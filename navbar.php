<?php
    require_once("helper.php");
    include "mysql.php";
?>

<nav class="navbar fixed-top navbar-expand-lg py-4 green-gradient text-white lighten-5">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">
        <strong>Grand PC Depot</strong>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link text-white" href="selectare_pc.php">Cumparare PC</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="contact.php">Contact</a>
                </li>
            </ul>
              <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <?php if (isLoggedIn()){
                $result = $db->query("SELECT COUNT(id_cos_cumparaturi) as total_count FROM cos_cumparaturi WHERE id_user=".$_SESSION['id_user']."");
                $total = $result->fetch_object();
                echo '<li class="nav-item">
                    <a class="nav-link waves-effect text-white" href="cos_cumparaturi.php">
                        <span class="badge red z-depth-1 mr-1">'.$total->total_count.' </span>
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="editare_profil.php">Editare profil</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li> ';
            }
            ?>
                <?php if (!isLoggedIn())
                echo'
                <li class="nav-item">
                    <a href="login.php" class="nav-link text-white">
                    <i class="fa fa-user"></i>
                    </a>
                </li>';
                ?>
            </ul>
        </div>
    </div>
</nav>
