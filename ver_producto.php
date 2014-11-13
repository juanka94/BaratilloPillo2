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

            if (!(isset($_SESSION['usuario']))){
                header('Location:login.php');
            }

            $id = $_GET['id'];

            include('funciones.php');
            $producto_class =  new venta();
            $response = $producto_class->mostrar2($id);
    ?>
	<!-- Page Content -->
    <div class="container">


<div class="row">

			<?php 
				include("menu_categorias.html");
			 ?>

            <div class="col-md-9">
            <?php 

            	foreach ($response as $key => $value) {
             ?>
                <div class="thumbnail">
                    <img class="img-responsive" src="css/images/imagen-no-disponible.gif">
                    <div class="caption-full">
                        <h4 class="pull-right">$<?=$value["pr_precio"]?></h4>
                        <h3><?=$value["pr_nombre"]?></h3>
                        <p>
                        	<?php 
                        		if ($value["pr_estado"]==1) {
                        	?>
                        			<h3><span class="label label-success">Nuevo</span></h3>
                        	<?php
                        		}else
                        		{
                        	?>
                        			<h3><span class="label label-warning">Usado</span></h3>
                        	<?php
                        		}
                        	 ?>
                        </p>
                        <p><h4><?=$value["pr_descripcion"]?></h4></p>
                    </div>
                    
                </div>

            <?php 
            	}
             ?>

          <!--      <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div> -->

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