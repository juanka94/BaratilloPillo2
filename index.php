<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina de Inicio</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device.width, initial-scale=1.0">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link href="css/heroic-features.css" rel="stylesheet">

	</head>
	<body>
	<?php include('menu.php'); 
            include('funciones.php');
            $producto_class =  new venta();
            $response = $producto_class->mostrar();
    ?>
        
	<!-- Page Content -->
    <div class="container">

        <div class="row ">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Bienvenido a BaratilloPillo</h1>
            <p>Este es un sitio en donde puedes comprar y vender cualquier objeto, pero es necesario tener una cuenta. Si ya estas registrado inicia sesion sino crea tu cuenta aqui</p>
            <p><a class="btn btn-primary btn-large" href="registrar.php">Registrarse</a>
            </p>
        </header>

        <hr>
        <div class="container panel panel-default">
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Productos Mas Recientes</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

        <?php 
            foreach ($response as $key => $value) {
         ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images/imagen-no-disponible.gif">
                    <div class="caption">
                        <h3><?= $value['pr_nombre']?></h3>
                        <p><?= $value['pr_descripcion'] ?></p>
                        <p>
                            <a href="ver_producto.php?id=<?=$value['pr_id']?>" class="btn btn-primary">Mas info</a>
                        </p>
                    </div>
                </div>
            </div>

            <?php 
            }
             ?>

        </div>
        </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <strong>BaratilloPillo</strong> 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
	    
	</body>
	<!-- Js vinculados -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/responsive.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>
