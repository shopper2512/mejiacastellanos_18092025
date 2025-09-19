<?php 
require("classes/conn.class.php");
require("classes/validaciones.inc.php");

class estudiante{
    public $idestudiante;
    public $fechanacimiento;
    public $estadoregistroestudiante;
    public $idgenero;
    public $conexion;
    public $validacion;

    public function __contruct(){
        $this->conexion = new DB();
        $this->validacion = validaciones(); 
    }

    public function setIdEstudiantes($idestudiante){
        $this->idestudiante = $idestudiante;
    }

    public function getIdEstudiante(){
        return $this->IdEstudiante; 
    }

     public function setFechaNacimiento($fechanacimiento){
        $this->fechanacimiento = $fechanacimiento;
    }
    
    public function getFechaNacimiento(){
        return $this->fechanacimiento; 
    }

       public function setEstadoRegistroEstudiante($estadoregistroestudiante){
        $this->estadoregistroestudiante = $estadoregistroestudiante;
    }
    
    public function getEstadoRegistroEstudiante($estadoregistroestudiante){
        return $this->$estadoregistroestudiante; 
    }

         public function setIdGenero($idgenero){
        $this->idgenero = $idgenero;
    }
    
    public function getIdGenero($idgenero){
        return $this->$idgenero; 
    }

    public function obtenerEstudiantes(){
        $resultado = $this->conexion->run('SELECT * FROM estudiante;');
        $array = array("mensaje"=>"registro encontrado","data"=>$resultado->fetchALL());
        return $array;
    }

    public function obtenerEstudiante(int $idestudiante){
        if($idestudiante > 0){
            $resultado = $this->run('SELECT * FROM estudiante WHERE  id_estudiante='.$idestudiante);
            $array = array("mensaje"=>"registro encontrados","data"=>$resultado->fetch());
            return $array;
        }else{
            $array = array("mensaje"=>"Registro NO encontrados, identificador incorrecto","data"=>"");
        }
    }

    public function nuevoEstudiante($fechanacimiento,$idestudiante){
        if(!empty($idgenero) && !empty($fechanacimiento)){
            $parametros = array(
                "fecha_nac" => $fechanacimiento,
                "id_genero" => $idgenero
            );

            $resultado = $this->conexion->run('INSERT INTO estudiante(fecha_nacimiento_estudiante,id_estudiante)VALUE(:fecha_nac,:id_genero);',$parametros);
            if ($this->conexion->n > 0 and $this->conexion->id > 0){
                $resultado = $this->obtenerEstudiante($this->conexion->id);
                $array = array("mensaje"=>"regsitros econtrados","data"=>$resultado["data"]);
                return $array;
            }else{
                $array = array("mensaje"=>"hubo un problema al registrar el estudiante","data"=>"");
                return $array;
            }
        }else{
            $array = array("mensaje"=>"paremetros enviados vacios","data"=>"");
            return $array;
        }
    }
}

?>