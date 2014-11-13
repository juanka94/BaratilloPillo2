<header><!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">BaratilloPillo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="categorias.php?id=1">Accesorios</a></li>
                        <li><a href="categorias.php?id=2">Arte</a></li>
                        <li><a href="categorias.php?id=3">Deportes</a></li>
                        <li><a href="categorias.php?id=4">Electronica</a></li>
                        <li><a href="categorias.php?id=5">Libros</a></li>
                        <li><a href="categorias.php?id=6">Mascotas</a></li>
                        <li><a href="categorias.php?id=7">Ropa</a></li>
                    </ul>
                </li>
                </ul>
                <?php 
                    if (!(isset($_SESSION['usuario']))){
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="registrar.php">Registrate</a></li>
                    <li><a href="login.php">Iniciar Sesion</a></li>
                </ul>
            </div> 
            <?php 
            }else{
            ?>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo($_SESSION['usuario']);
                        ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="reg_producto.php" title="Crear Venta">Crear Venta</a></li>
                            <li><a href="cerrarsesion.php" title="Cerrar sesión">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
            <?php
            } ?>
        </div>
    </nav>
</header>
