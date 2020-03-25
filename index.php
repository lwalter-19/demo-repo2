<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    
    $titulo = "MitoCode";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<!-- SIMPLEMENTE PUSIMO UN COMENTARIO A NUESTRO DOCUMENTO INDEX.PHP -->
<div class="container">
    <div class="jumbotron">
        <h1>Suscribete a mi canal y aprende más</h1>
        <p>Blog dedicado a la programacion Web</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-search" data_hidden="true"></span> Buscar
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Haz tu busqueda aquí">
                            </div>
                            <button type="button" class="form-control">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" data_hidden="true"></span> Filtros
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-education" data_hidden="true"></span> Autores
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-time" data_hidden="true"></span> Ultimas Entradas
                        </div>
                        <div class="panel-body">
                            <p>
                                Aun no hay entradas que mostrar 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
