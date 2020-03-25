<?php 
include_once 'RepositorioUsuario.inc.php';

    class ValidadorUsuario{
        
        private $aviso_inicio;
        private $aviso_cierre;
        
        private $nombre;
        private $email;
        private $clave;
        
        private $error_nombre;
        private $error_email;
        private $error_clave1;
        private $error_clave2;
        
        public function __construct($nombre, $email, $clave1, $clave2, $conexion){
            $this -> aviso_inicio = "<br><div role='alert' class='alert alert-danger'>";
            $this -> aviso_cierre = "</di>";
            
            $this -> nombre = "";
            $this -> email = "" ;
            $this -> clave = "";
            
            $this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
            $this -> error_email = $this -> validar_email($conexion, $email);
            $this -> error_clave1 = $this -> validar_clave1($clave1);
            $this -> error_clave2 = $this -> validar_clave2($clave1, $clave2);
            
            if($this -> error_clave1 === "" && $this -> error_clave2 === ""){
                $this -> clave = $clave1;
            }
        }
        
        private function variable_iniciada($variable){
            if(isset($variable) && !empty($variable)){
                return true;
            }else{
                return false;
            }
        }
        
        private function validar_nombre($conexion, $nombre){
            if(!$this -> variable_iniciada($nombre)){
                return "Debes de llenar el campo nombre";
            }else{
                $this -> nombre = $nombre;
            }
            
            if(strlen($nombre) < 6){
                return "El campo nombre tiene que ser mayor a 6 caracteres";
            }
            
            if(strlen($nombre) > 40){
                return "El campo nombre tiene que ser menor a 40 caracteres";
            }
            
            if(RepositorioUsuario::usuario_existe($conexion, $nombre)){
                return "El nombre del usuario ya existe. Por favor prueva con otro";
            }
            
            return "";
        }
        
        private function validar_email($conexion, $email){
            if(!$this -> variable_iniciada($email)){
                return "Debes de llenar el campo email";
            }else{
                $this -> email = $email;
            }
            
            if(RepositorioUsuario::email_existe($conexion, $email)){
                return "El email del usuario ya existe Por favor prueva con otro";
            }
            
            return "";
        }
        
        private function validar_clave1($clave1){
            if(!$this -> variable_iniciada($clave1)){
                return "Debes de llenar el campo contraseña";
            }
            
            return "";
        }
        
        private function validar_clave2($clave1, $clave2){
            if(!$this -> variable_iniciada($clave1)){
                return "Primero debes llenar el campo contraseña";
            }
            
            if(!$this -> variable_iniciada($clave2)){
                return  "Debes de repetir la contraseña";
            }
            
            if($clave1 !== $clave2){
                return  "Ambas contraseñas debe coincidir";
            }
            
            return "";
        }
        
        
        public function obtener_nombre(){
            return $this -> nombre;
        }
        
        public function obtener_email(){
            return $this -> email;
        }
        
        public function obtener_clave(){
            return $this -> clave;
        }
        
        
        
        public function mostrar_nombre(){
            if($this -> nombre !== ""){
                echo "value='" . $this -> nombre . "'";
            }
        }
        
        public function mostrar_email(){
            if($this -> email !== ""){
                echo "value='" . $this -> email . "'";
            }
        }
        
        public function mostrar_error_nombre(){
            if($this -> error_nombre !== ""){
                echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
            }
        }
        
        public function mostrar_error_email(){
            if($this -> error_email !== ""){
                echo $this -> aviso_inicio . $this -> error_email . $this -> aviso_cierre;
            }
        }
        
        public function mostrar_error_clave1(){
            if($this -> error_clave1 !== ""){
                echo $this -> aviso_inicio . $this -> error_clave1 . $this -> aviso_cierre;
            }
        }
        
        public function mostrar_error_clave2(){
            if($this -> error_clave2 !== ""){
                echo $this -> aviso_inicio . $this -> error_clave2 . $this -> aviso_cierre;
            }
        }
        
        
        public function registro_valido(){
            if($this -> error_nombre === "" &&
                    $this -> error_email === "" &&
                    $this -> error_clave1 === "" &&
                    $this -> error_clave2 === ""){
                return true;
            }else{
                return false;
            }
        }
    }
            
