<?php $User = (isset($_SESSION['User'])) ? $_SESSION['User'] : ''; ?>
<header>
    <nav id="sidenav-1" class="sidenav" data-mdb-hidden="false" data-mdb-accordion="true">
        <a class="ripple d-flex justify-content-center py-4" href="#!" data-mdb-ripple-color="primary">
            <img id="MDB-logo" src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.png" alt="MDB Logo" draggable="false" />
        </a>

        <ul class="sidenav-menu">
            <input id="IdUserSession" type="hidden" value="<?php echo $User['IdUser']; ?>">
            <li class="sidenav-item">
                <a class="sidenav-link" href="user">
                    <i class="fas fa-user fa-fw me-3"></i><span>Usuarios</span></a>
            </li>

            <li class="sidenav-item">
                <a class="sidenav-link" href="product">
                    <i class="fas fa-clipboard-list fa-fw me-3"></i><span>Productos</span></a>
            </li>


            <li class="sidenav-item">
                <a class="sidenav-link" href="sale">
                    <i class="fas fa-clipboard-list fa-fw me-3"></i><span>Nueva venta</span></a>
            </li>

        </ul>
    </nav>

    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <button data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" class="btn shadow-0 p-0 me-3 d-block d-xxl-none" aria-controls="#sidenav-1" aria-haspopup="true">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <span><?php echo $User['UName'].' - '. $User['UType']; ?></span>
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                        <li><a class="dropdown-item" href="out">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>