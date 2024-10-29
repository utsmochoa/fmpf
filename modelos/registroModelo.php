<?php
class registroModel{
  public $id_miembro;
  public $foto_carnet;
  public $nombres;
  public $apellidos;
  public $telefono_movil;
  public $telefono_casa;
  public $email;
  public $licencia_conmebol;
  public $numero_licencia_conmebol;
  public $pais_licencia_conmebol;
  public $cursos_colegio_entrenadores;
  public $numero_carnet_agremiado;
  public $pais_carnet_agremiado;
  public $cursos_federaciones_asociaciones;
  public $estudios_universitarios;
  public $estudios_media;
  public $congresos;
  public $simposios;
  public $cursos_cortos;
  public $publicaciones;
  public $estado;
  public $profesion;
  public $codigo;
  public $resultado;
  protected $conn;
    
    function conectar(){
        include "config.php";
            
        try {
             $this->conn = new PDO("mysql:host=$servername;dbname=$baseDatos", $username, $password);
              // set the PDO error mode to exception
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              //echo "Connected successfully";
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }    
        }
    function cerrar(){
            $this->conn = null;
        }

        function insertar(){
        try{
          $this->conectar();

          $sql = 'INSERT INTO miembros (foto_carnet, nombres, apellidos, telefono_movil, telefono_casa, email, licencia_conmebol, numero_licencia_conmebol, pais_licencia_conmebol, cursos_colegio_entrenadores, numero_carnet_agremiado, pais_carnet_agremiado, cursos_federaciones_asociaciones, estudios_universitarios, estudios_media, congresos, simposios, cursos_cortos, publicaciones) VALUES ';
          $sql = $sql."('";
          $sql = $sql.$this->foto_carnet."','";
          $sql = $sql.$this->nombres."','";
          $sql = $sql.$this->apellidos."','";
          $sql = $sql.$this->telefono_movil."','";
          $sql = $sql.$this->telefono_casa."','";
          $sql = $sql.$this->email."','";
          $sql = $sql.$this->licencia_conmebol."','";
          $sql = $sql.$this->numero_licencia_conmebol."','";
          $sql = $sql.$this->pais_licencia_conmebol."','";
          $sql = $sql.$this->cursos_colegio_entrenadores."','";
          $sql = $sql.$this->numero_carnet_agremiado."','";
          $sql = $sql.$this->pais_carnet_agremiado."','";
          $sql = $sql.$this->cursos_federaciones_asociaciones."','";
          $sql = $sql.$this->estudios_universitarios."','";
          $sql = $sql.$this->estudios_media."','";
          $sql = $sql.$this->congresos."','";
          $sql = $sql.$this->simposios."','";
          $sql = $sql.$this->cursos_cortos."','"; 
          $sql = $sql.$this->publicaciones."')";
          // $sql = $sql.$this->estado."','";
          // $sql = $sql.$this->profesion."','";
          // $sql = $sql.$this->codigo."')";

 


          $this->conn->exec($sql);
          //echo "New record created successfully";
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        $this->cerrar();
        }

  
  function consultar(){
      $this->conectar();
      $sql = "SELECT * FROM miembros;";
      $r = $this->conn->prepare($sql);
      $r->execute();
      $data = $r->fetchAll();
      $this->resultado = $data;
      $this->cerrar();

  }
  function buscar($id_miembro){
    $this->conectar();
    $sql = "SELECT * FROM miembros WHERE id=?";
    $r = $this->conn->prepare($sql);
    $r->execute([$id_miembro]);
    $data = $r->fetch();
    $this->resultado = $data;
    $this->cerrar();
  }
  function borrar($id_miembro){
    $this->conectar();
    $sql = "DELETE FROM miembros WHERE id_miembro=?";
    try {
        $r = $this->conn->prepare($sql);
        $r->execute([$id_miembro]);

    }catch (PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }

    $this->cerrar();
  }

  function actualizar($datos){

    $this->conectar();

    $id_miembro = $datos['id_miembro'];
    $foto_carnet = $datos['foto_carnet'];
    $nombres = $datos['nombres'];
    $apellidos = $datos['apellidos'];
    $telefono_movil = $datos['telefono_movil'];
    $telefono_casa = $datos['telefono_casa'];
    $email = $datos['email'];
    $licencia_conmebol = $datos['licencia_conmebol'];
    $numero_licencia_conmebol = $datos['numero_licencia_conmebol'];
    $pais_licencia_conmebol = $datos['pais_licencia_conmebol'];
    $cursos_colegio_entrenadores = $datos['cursos_colegio_entrenadores'];
    $numero_carnet_agremiado = $datos['numero_carnet_agremiado'];
    $pais_carnet_agremiado = $datos['pais_carnet_agremiado'];
    $cursos_federaciones_asociaciones = $datos['cursos_federaciones_asociaciones'];
    $estudios_universitarios = $datos['estudios_universitarios'];
    $estudios_media = $datos['estudios_media'];
    $congresos = $datos['congresos'];
    $simposios = $datos['simposios'];
    $cursos_cortos = $datos['cursos_cortos']; 
    $publicaciones = $datos['publicaciones'];
    $estado = $datos['estado'];
    $profesion = $datos['profesion'];
    $codigo = $datos['codigo'];

    $sql = "UPDATE miembros SET ";
    $foto_carnet = $datos['foto_carnet'];
    $nombres = $datos['nombres'];
    $apellidos = $datos['apellidos'];
    $telefono_movil = $datos['telefono_movil'];
    $telefono_casa = $datos['telefono_casa'];
    $email = $datos['email'];
    $licencia_conmebol = $datos['licencia_conmebol'];
    $numero_licencia_conmebol = $datos['numero_licencia_conmebol'];
    $pais_licencia_conmebol = $datos['pais_licencia_conmebol'];
    $cursos_colegio_entrenadores = $datos['cursos_colegio_entrenadores'];
    $numero_carnet_agremiado = $datos['numero_carnet_agremiado'];
    $pais_carnet_agremiado = $datos['pais_carnet_agremiado'];
    $cursos_federaciones_asociaciones = $datos['cursos_federaciones_asociaciones'];
    $estudios_universitarios = $datos['estudios_universitarios'];
    $estudios_media = $datos['estudios_media'];
    $congresos = $datos['congresos'];
    $simposios = $datos['simposios'];
    $cursos_cortos = $datos['cursos_cortos']; 
    $publicaciones = $datos['publicaciones'];
    $estado = $datos['estado'];
    $profesion = $datos['profesion'];
    $codigo = $datos['codigo'];
    $sql = $sql." WHERE id_miembro = $id_miembro";
    //var_dump($sql);
    try {
      $r = $this->conn->prepare($sql);
      $r->execute();
    }catch (PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }
    $this->cerrar();

  }
  // function obtenerUltimoCodigo($profesion){
  //   include "config.php";
  //   $this->conectar();
  //   $sql = "SELECT codigo FROM miembros WHERE profesion = ? ORDER BY codigo DESC LIMIT 1";
  //   $r = $this->conn->prepare($sql);
  //   $r->execute([$profesion]);
  //   $data = $r->fetch();
  //   $this->cerrar();
  //   return $data ? $data['codigo'] : null; // Devolver null si no hay códigos previos
  // }
}
 ?>