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
    <?php 
    include('menu.php');
     ?>
    <!-- Page Content -->
    <div class="container">
<?php  
    
            $pr_nombre = (isset($_POST['nombre'])) ? trim($_POST['nombre']) : '';
            $pr_apellidos = (isset($_POST['apellidos'])) ? trim($_POST['apellidos']) : '';
            $pr_direccion = (isset($_POST['direccion'])) ? trim($_POST['direccion']) : '';
            $pr_telefono = (isset($_POST['telefono'])) ? trim($_POST['telefono']) : '';
            $pr_nombrebanco = (isset($_POST['nombrebanco'])) ? trim($_POST['nombrebanco']) : '';
            $pr_claveinterbancaria = (isset($_POST['claveinterbancaria'])) ? trim($_POST['claveinterbancaria']) : '';
            $pr_email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
            $pr_password = (isset($_POST['password'])) ? trim($_POST['password']) : '';


            if(isset($_POST['btnregistrar'])){
                include('funciones.php');
                $usuario_class =  new venta();
                $response = $usuario_class->registrar($pr_nombre,$pr_apellidos,$pr_direccion,$pr_telefono,$pr_nombrebanco,
                    $pr_claveinterbancaria,$pr_email,$pr_password);

                if($response['done']){
                    $pr_nombre='';
                    $pr_apellidos='';
                    $pr_direccion='';
                    $pr_telefono='';
                    $pr_nombrebanco='';
                    $pr_claveinterbancaria='';
                    $pr_email='';
                    $pr_password='';

                    header('location:login.php');
                }

            }
        ?>
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 panel panel-default">
        <form role="form" method="post">
            <h2>Registrate<small> Es Gratis!!</small></h2>
            <?php
                        if(isset($response))
                            if(is_array($response)){
                                ?>
                                <div class="alert alert-<?php echo(($response['done']) ? 'success' : 'danger') ?>">
                                    <?php echo($response['msg']); ?>
                                </div>  
                                <?php   
                            }
            ?>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control input-lg" placeholder="Nombre" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="apellidos"  class="form-control input-lg" placeholder="Apellidos" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="direccion"  class="form-control input-lg" placeholder="Direccion" >
            </div>
            <div class="form-group">
                <input type="tex" name="telefono"  class="form-control input-lg" placeholder="Telefono" >
            </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="nombrebanco"  class="form-control input-lg" placeholder="Nombre del Banco" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="claveinterbancaria"  class="form-control input-lg" placeholder="Clave Interbancaria">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email"  class="form-control input-lg" placeholder="Correo Electronico" >
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password"  class="form-control input-lg" placeholder="Contraseña" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password"  class="form-control input-lg" placeholder="Confirmar Contraseña" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-9 col-md-9">
                     Al dar click en <strong class="label label-primary"> Registrar </strong>estaras de acuerdo con los <a href="#" data-toggle="modal" data-target="#t_and_c_m"> Terminos y Condiciones</a> de BaratilloPillo.com
                </div>
            </div>
            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" name="btnregistrar"></div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
            </div>
            <div class="modal-body" align="justify">
                <p>Este acuerdo estará regido en todos sus puntos por las leyes vigentes en la Republica Mexicana, en particular respecto de mensajes de datos, contratación electrónica y comercio electrónico se regirá por lo dispuesto por la legislación federal respectiva. Cualquier controversia derivada del presente acuerdo, su existencia, validez, interpretación, alcance o cumplimiento, será sometida a las leyes aplicables y a los Tribunales competentes.
                    Para la interpretación, cumplimiento y ejecución del presente contrato, las partes expresamente se someten a la jurisdicción de los tribunales competentes de la Ciudad de México, Distrito Federal, renunciando en consecuencia a cualquier fuero que en razón de su domicilio presente o futuro pudiera corresponderles.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Estoy de acuerdo</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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