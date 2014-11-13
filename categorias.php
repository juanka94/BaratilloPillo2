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

            $id = $_GET['id'];

            include('funciones.php');
            $producto_class =  new venta();
            $response = $producto_class->mostrar3($id);
    ?>
	<!-- Page Content -->
    <div class="container">

        <div class="row">

           <?php include("menu_categorias.html"); ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image expl" src="images/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image expl" src="images/img_no_disponible.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image expl" src="images/img_no_disponible.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                 <?php 
           			 foreach ($response as $key => $value) {
         		?>

           		<div class="col-md-3 col-sm-6 hero-feature items">
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


  </div>
    <!-- /.container -->
	    
	</body>
	<!-- Js vinculados -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/responsive.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>