
<?php 
include('config.php');
?>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <style>
        .navbar-brand {
            font-family: 'Dancing Script', cursive; /* Fuente divertida */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PAPER SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL;?>products/products.php">PRODUCTOS</a>
        </li>
        <?php

        if(isset($_SESSION['rol_user']) and $_SESSION['rol_user'] == 'admin'){
        echo '
        <li class="nav-item">
          <a class="nav-link" href="'.URL.'panelcontrol/panelcontrol.php">PANEL DE CONTROL</a>
        </li>
        ';

        } 
        if(isset($_SESSION['email_user'])){
          echo 
          '
          <li class="nav-item">
            <a class="nav-link" href="#">'.$_SESSION['email_user'].'</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="'.URL.'?cerrar_sesion=1">Cerrar sesión</a>
          </li>
          ';
        }else{
          echo'
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MI CUENTA
          </a>
          <ul class="dropdown-menu">
            
            <li><a class="dropdown-item" href="'.URL.'users/inicio.php">INICIAR SESION</a></li>
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="'.URL.'users/registro.php">CREAR CUENTA</a></li>
          </ul>
        </li>
        ';
        }

        ?>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>