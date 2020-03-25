<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorUsuario.inc.php';
    include_once 'app/Usuario.inc.php';
    include_once 'app/Redireccion.inc.php';
    
    if(isset($_POST['enviar'])){
        Conexion::abrir_conexion();
        
        $validador = new ValidadorUsuario($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());
        
        if($validador -> registro_valido()){
            // insertar el usuario 
            $usuario = new Usuario("", $validador -> obtener_nombre(), $validador -> obtener_email(), password_hash($validador -> obtener_clave(), 
                    PASSWORD_DEFAULT), "", "");
            $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
            
            if($usuario_insertado){
                // Redirigimos a la siguiente pagina 
                Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . "?nombre=" . $usuario -> obtener_nombre());
            }
        }
        
        Conexion::cerrar_conexion();
    }
    
    $titulo = "Registro";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario De Registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title"> 
                                Instrucciones
                            </h3>
                        </div>
                        <div class="panel-body">
                            <br>
                            <p class="text-justify">
                                Para unirte al blog de JavaDevOne introduce un
                                nombre de usuario y una contraseña. El email que
                                escribas debe ser real ya que lo necesitaras para 
                                gestionar tu cuenta. Te recomendamos que uses una 
                                contraseña que contega letras minusculas, Mayusculas, numeros y simbolos
                            </p>
                            <br><br>
                            <a href="#">¿Ya tienes cuenta?</a>
                            <br><br>
                            <a href="#">¿Olvidaste tu contraseña?</a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> 
                                Introduce tus datos
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php
                                    if(isset($_POST['enviar'])){
                                        include_once 'plantillas/registro-validado.inc.php';
                                    }else{
                                        include_once 'plantillas/registro-vacio.inc.php';
                                    }
                                ?>
                            </form>
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
