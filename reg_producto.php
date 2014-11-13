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
    ?>
	<!-- Page Content -->
    <div class="container">
    	<?php  
    
            $pr_nombre = (isset($_POST['nombre'])) ? trim($_POST['nombre']) : '';
            $pr_descripcion = (isset($_POST['descripcion'])) ? trim($_POST['descripcion']) : '';
            $pr_precio = (isset($_POST['precio'])) ? trim($_POST['precio']) : '';
            $pr_cantidad = (isset($_POST['cantidad'])) ? trim($_POST['cantidad']) : '';
            $pr_estado = (isset($_POST['estado'])) ? trim($_POST['estado']) : '';
            $pr_categoria = (isset($_POST['categoria'])) ? trim($_POST['categoria']) : '';


            if(isset($_POST['btnregistrar'])){
                include('funciones.php');
                $usuario_class =  new venta();
                $response = $usuario_class->registrar2($pr_nombre,$pr_descripcion,$pr_precio,$pr_cantidad,$pr_estado,
                    $pr_categoria);

                if($response['done']){
                    $pr_nombre='';
                    $pr_apellidos='';
                    $pr_direccion='';
                    $pr_telefono='';
                    $pr_nombrebanco='';
                    $pr_claveinterbancaria='';
                    $pr_email='';
                    $pr_password='';

                    header('location:index.php');
                }

            }
        ?>
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 panel panel-default">
        <form role="form" method="post">
            <h2>Registro de un producto</h2>
            <hr class="colorgraph">
            <div class="row">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control input-lg" placeholder="Nombre" >
                    </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="estado" class="form-control input-lg">
                        	<option value="">--Estado--</option>
                        	<option value="1">Nuevo</option>
                        	<option value="2">Usado</option>}
                        </select>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="categoria" class="form-control input-lg">
                        	<option value="">--Categoria--</option>
                        	<option value="1">Accesorios</option>
                        	<option value="2">Arte</option>
                        	<option value="3">Deportes</option>
                        	<option value="4">Electronica</option>
                        	<option value="5">Libros</option>
                        	<option value="6">Mascotas</option>
                        	<option value="7">Ropa</opcion>
                        </select>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="precio"  class="form-control input-lg" placeholder="Precio" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="cantidad"  class="form-control input-lg" placeholder="Cantidad">
                    </div>
                </div>
            </div>
            <div class="row col-centered">
                <center><textarea name="descripcion" class="form-control" placeholder="Breve descripcion del producto" rows="5" cols="50"></textarea></center>
            </div>   
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Empezar a vender" class="btn btn-primary btn-block btn-lg" name="btnregistrar"></div>
            </div>
        </form>
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