<?php
	session_start();
?>
<!DOCTYPE html>		
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0"> 
		<title>Login</title>
		<!-- Estilos CSS vinculados -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
	
<body>



<?php     
            $msgerror = false;
            if (isset($_POST['btnlogin'])){
                include('DAO.php');

                $db = new Dao(
                    array(
                        'server_ip' => 'localhost',
                        'server_user' => 'root',
                        'server_password' => '',
                        'server_db' => 'baratillopillo',
                    )
                );

                $result = $db->query_array("
                            select 
                                * 
                            from 
                                usuarios
                            where 
                               correo = '".$_POST['email']."' and 
                                password = '".$_POST['password']."'"
                        );

                if (count($result) > 0){
                    $_SESSION['usuario'] = $result[0];
                    $_SESSION['usuario'] =$_POST['email'];
                    header('Location: index.php');
                }else
                    $msgerror = true;
            }

?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Iniciar Sesion</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="" method="POST">
                    <?php
                        if ($msgerror){
                            ?>
                            <div class="alert alert-danger" role="alert">El usuario y/o contraseña son incorrectos</div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Email" required name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="Password" required name="password">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm" name="btnlogin">
                                Iniciar Sesion</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    No Estas Registrado? <a href="registrar.php">Registrate Aqui</a></div>
            </div>
        </div>
    </div>
</div>

</body>	
	<!-- Js vinculados -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/responsive.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>