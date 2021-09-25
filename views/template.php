<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller de Desarrollo de Software Versión II - Jesús María</title>
    <link rel="stylesheet" href="views/resources/template/css/all.css">
    <link rel="stylesheet" href="views/resources/template/css/mdb.min.css">
    <link rel="stylesheet" href="views/resources/template/css/style.css">
</head>

<body>

    <!--Main Navigation-->
    <header>
        <!-- Sidenav -->
        <nav id="sidenav-1" class="sidenav" data-mdb-hidden="false" data-mdb-accordion="true">
            <a class="ripple d-flex justify-content-center py-4" href="#!" data-mdb-ripple-color="primary">
                <img id="MDB-logo" src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.png" alt="MDB Logo" draggable="false" />
            </a>

            <ul class="sidenav-menu">
                
                <li class="sidenav-item">
                    <a class="sidenav-link" href="user">
                        <i class="fas fa-user fa-fw me-3"></i><span>Usuarios</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="product">
                        <i class="fas fa-clipboard-list fa-fw me-3"></i><span>Productos</span></a>
                </li>

            </ul>
        </nav>
        <!-- Sidenav -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggler -->
                <button data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" class="btn shadow-0 p-0 me-3 d-block d-xxl-none" aria-controls="#sidenav-1" aria-haspopup="true">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">

                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">My profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <?php
        $Links = new LinksControllers();
        $Links->LinkController();
    ?>

    <!--Footer-->
    <footer></footer>
    <!--Footer-->
</body>

<script src="views/resources/template/js/mdb.min.js"></script>
<script src="views/resources/template/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Scripts personalizados -->

<script src="views/resources/scripts/user.js"></script>

</html>