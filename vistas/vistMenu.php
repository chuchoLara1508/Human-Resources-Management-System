<div class="fondiu">
    <div class="header">
    <div class="profile" id="profile-pd">
            <?php
        if((isset($_SESSION["user"])&& isset($_SESSION["pass"])||isset($_SESSION["rol"]))
            &&
            (!empty($_SESSION["user"])&&!empty($_SESSION["pass"])||!empty($_SESSION["rol"]))
        ){
            ?>
                <span title="Usuario" class="name"><?php echo $_SESSION["user"]; ?> | <?php echo $_SESSION["rol"]; ?></span>
            <?php
           
        }
    ?>
    </div>
    </div>
</div>
<div class="l-navbar" id="navbar">
    <nav class="nav">
        <div>
            <div class="nav__brand">
                <i class="fas fa-bars nav__toggle" id="nav-toggle" onclick="boton();"></i>
            </div>
            <div class="nav__list">
                <a href="?pag=2" class="nav__link" title="Inicio">
                    <i class="fas fa-home nav__icon"></i>
                    <span class="nav__name">Inicio</span>
                </a>
                <a href="?pag=3" class="nav__link" title="Gestión de Departamentos">
                    <i class="fas fa-edit nav__icon"></i>
                    <span class="nav__name">Departamentos</span>
                </a>
                <a href="?pag=5" class="nav__link" title="Gestión de Puestos">
                    <i class="fas fa-user-tag nav__icon"></i>
                    <span class="nav__name">Puestos</span>
                </a>
                <a href="?pag=7" class="nav__link" title="Gestión de Empleados">
                    <i class="fas fa-user-tie nav__icon"></i>
                    <span class="nav__name">Empleados</span>
                </a>
                <a href="?pag=9" class="nav__link" title="Gestión de Incapacidades">
                    <i class="fas fa-wheelchair nav__icon"></i>
                    <span class="nav__name">Incapacidades</span>
                </a>
                <a href="?pag=11" class="nav__link especial" title="Gestión de Nóminas">
                    <i class="fas fa-dollar-sign nav__icon"></i>
                    <span class="nav__name">Nóminas</span>
                </a>
                <?php
                    if($_SESSION["rol"]=="SuperAdministrador de RH"){
                ?>
                    <a href="?pag=14" class="nav__link" title="Gestión de Roles y Permisos">
                        <i class="fas fa-tasks nav__icon"></i>
                        <span class="nav__name">Roles y Permisos</span>
                    </a>
                <?php
                    }
                ?>
                <a href="?pag=16" class="nav__link" title="Gestión de Usuarios">
                    <i class="fas fa-users nav__icon"></i>
                    <span class="nav__name">Usuarios</span>
                </a>
                <a href="?pag=17" class="nav__link" title="Cerrar Sesión">
                    <i class="fas fa-sign-out-alt nav__icon"></i>
                    <span class="nav__name">Salir</span>
                </a>
            </div>
        </div>
    </nav>
</div>