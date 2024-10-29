<?php 
    session_start();

    include "../../controladores/registroControl.php";
    include "../../modelos/registroModelo.php";

    

  

        // Agregar Registro
        if(isset($_POST['btnEnviar'])){


            $foto_carnet = $_POST['foto'];
            $nombres = $_POST['fnombres'];
            $apellidos = $_POST['fapellidos'];
            $telefono_movil = $_POST['fmovil'];
            $telefono_casa = $_POST['fnumcasa'];
            $email = $_POST['femail'];
            $licencia_conmebol = $_POST['fcursos'];
            $numero_licencia_conmebol = $_POST['fnumlicencia'];
            $pais_licencia_conmebol = $_POST['fpaislic'];
            $cursos_colegio_entrenadores = $_POST['fprofesion'];
            $numero_carnet_agremiado = $_POST['fnumcarnet'];
            $pais_carnet_agremiado = $_POST['fpaisagg'];
            $cursos_federaciones_asociaciones = $_POST['fcursosfed'];
            $estudios_universitarios = $_POST['festuduni'];
            $estudios_media = $_POST['festudmed'];
            $congresos = $_POST['fcongre'];
            $simposios = $_POST['fsimpo'];
            $cursos_cortos = $_POST['fcurscor'];
            $publicaciones = $_POST['fpublic'];
            $foto_carnet = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

    
            $datos = [
                'foto_carnet' => $foto_carnet,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'telefono_movil' => $telefono_movil,
                'telefono_casa' => $telefono_casa,
                'email' => $email,
                'licencia_conmebol' => $licencia_conmebol,
                'numero_licencia_conmebol' => $numero_licencia_conmebol,
                'pais_licencia_conmebol' => $pais_licencia_conmebol,
                'cursos_colegio_entrenadores' => $cursos_colegio_entrenadores,
                'numero_carnet_agremiado' => $numero_carnet_agremiado,
                'pais_carnet_agremiado' => $pais_carnet_agremiado,
                'cursos_federaciones_asociaciones' => $cursos_federaciones_asociaciones,
                'estudios_universitarios' => $estudios_universitarios,
                'estudios_media' => $estudios_media,
                'congresos' => $congresos,
                'simposios' => $simposios,
                'cursos_cortos' => $cursos_cortos,
                'publicaciones' => $publicaciones,
            ];
            crearRegistro($datos);
            header('location: ../seleccion/index.php');
            

            $datos = buscarRegistro(1);
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

            echo "<h6>Nombres: $nombres </h6>";
            echo "<h6>Apellidos: $apellidos </h6>";
            echo "<h6>Teléfono móvil: $telefono_movil </h6>";
            echo "<h6>Teléfono casa: $telefono_casa </h6>";
            echo "<h6>Email: $email </h6>";
            echo "<h6>Licencia CONMEBOL: $licencia_conmebol </h6>";
            echo "<h6>Número de licencia CONMEBOL: $numero_licencia_conmebol </h6>";
            echo "<h6>País de licencia CONMEBOL: $pais_licencia_conmebol </h6>";
            echo "<h6>Cursos colegio entrenadores: $cursos_colegio_entrenadores </h6>";
            echo "<h6>Número carnet agremiado: $numero_carnet_agremiado </h6>";
            echo "<h6>País carnet agremiado: $pais_carnet_agremiado </h6>";
            echo "<h6>Cursos federaciones asociaciones: $cursos_federaciones_asociaciones </h6>";
            echo "<h6>Estudios universitarios: $estudios_universitarios </h6>";
            echo "<h6>Estudios media: $estudios_media </h6>";
            echo "<h6>Congresos: $congresos </h6>";
            echo "<h6>Simposios: $simposios </h6>";
            echo "<h6>Cursos cortos: $cursos_cortos </h6>";
            echo "<h6>Publicaciones: $publicaciones </h6>";
        }
?>