<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Interface d'administration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- jQuery -->
        <script src="js/vendor/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/vendor/notify.min.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <?php 
    if(login()){
        if(isset($_COOKIE['login'])){
          echo"
            <a class='navbar-brand' href='../index.php?u=".$_COOKIE['login']."' target='_blank'>
            <img src='../assets/images/profile/".$_COOKIE['login'].".png' onerror='this.src=\"img/profile.png\"' width='30' height='30' class='d-inline-block align-top' alt='profile picture'>
            My Resume
            </a>
          ";
      }

        else if(isset($_POST['login'])){
            echo"
                <a class='navbar-brand' href='../index.php?u=".$_POST['login']."' target='_blank'>
                <img src='../assets/images/profile/".$_POST['login'].".png' onerror='this.src=\"img/profile.png\"' width='30' height='30' class='d-inline-block align-top' alt='profile picture'>
                My Resume
                </a>
              ";
      }

    }

    else{

        echo"
        <a class='navbar-brand' href='../index.php' target='_blank'>
        <img src='img/profile.png' width='30' height='30' class='d-inline-block align-top' alt=''>
        My Resume
        </a>
        ";
    }
    ?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php 
        if(login()){
        echo<<<END
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <a class="nav-link" href="?page=experiences"> Experiences <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item active"> <a class="nav-link" href="?page=education"> Education <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item active"> <a class="nav-link" href="?page=skills_com"> Skills Com <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item active"> <a class="nav-link" href="?page=skills_info"> Skills Info <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item active"> <a class="nav-link" href="?page=skills_pro"> Skills Pro <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item active"> <a class="nav-link" href="?page=details"> Details <span class="sr-only">(current)</span></a> </li>
          </ul>
          <form method="post" action="logout.php" class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
END;
        }


        elseif(superLogin()){

            echo<<<END
                <ul class="navbar-nav mr-auto">
                </ul>
                <form method="post" action="logout.php" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
END;

        }

        else{

        echo<<<END
        <ul class="navbar-nav mr-auto">
        </ul>
        <form method="post" action="index.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" name="login" placeholder="Login" aria-label="Search">
          <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
END;
        }
        ?>
      </div>
    </nav>