<?php
    class RepositorioUsuario{
        
        public static function obtener_todos($conexion){
            $total_usuario = array();
            
            if(isset($conexion)){
                try{
                    include_once 'Usuario.inc.php';
                    
                    $sql = "SELECT * FROM usuarios";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        foreach ($resultado as $fila){
                            $total_usuario[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], 
                                    $fila['activo']);
                        }
                    }else{
                        print "No hay usuarios que mostrar";
                    }
                } catch (PDOException $ex) {
                    print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            return $total_usuario;
        }
        
        public static function obtener_numero_usuarios($conexion){
            $numero_usuario = null;
            
            if(isset($conexion)){
                try{
                    
                    $sql = "SELECT COUNT(*) as total FROM usuarios";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetch();
                    
                    $numero_usuario = $resultado['total'];
                } catch (PDOException $ex) {
                    print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            return $numero_usuario;
        }
        
        public static function usuario_existe($conexion, $nombre){
            $nombre_existe = true;
            
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        $nombre_existe = true;
                    }else{
                        $nombre_existe = false;
                    }
                } catch (PDOException $ex) {
                     print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            return $nombre_existe;
        }
        
        public static function email_existe($conexion, $email){
            $email_existe = true;
            
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM usuarios WHERE email = :email";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        $email_existe = true;
                    }else{
                        $email_existe = false;
                    }
                } catch (PDOException $ex) {
                     print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            return $email_existe;
        }
        
        public static function insertar_usuario($conexion, $usuario){
            $usuario_insertado = null;
            
            $usrNom = $usuario -> obtener_nombre();
            $usrEmail = $usuario -> obtener_email();
            $usrPass = $usuario -> obtener_password();        
            
            if(isset($conexion)){
                try{
                    $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":nombre", $usrNom, PDO::PARAM_STR);
                    $sentencia -> bindParam(":email", $usrEmail, PDO::PARAM_STR);
                    $sentencia -> bindParam(":password", $usrPass, PDO::PARAM_STR);
                    
                    $usuario_insertado = $sentencia -> execute();
                } catch (PDOException $ex) {
                    print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            return $usuario_insertado;
        }
        
        public static function obtener_usuarios_por_email($conexion, $email){
            $usuario = null;
            
            if(isset($conexion)){
                try{
                    include_once 'Usuario.inc.php';
                    
                    $sql = "SELECT * FROM usuarios WHERE email = :email";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetch();
                    
                    if(!empty($resultado)){
                        $usuario = new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], 
                                $resultado['fecha_registro'], $resultado['activo']);
                    }
                } catch (PDOException $ex) {
                    print 'ERROR:' . $ex -> getMessage() . "<br>";
                }
            }
            
            return $usuario;
        }
        
    }

