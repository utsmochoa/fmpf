<?php

    function crearRegistro($datos){

        $p = new registroModel();
        $p->foto_carnet = $datos["foto_carnet"];
        $p->nombres = $datos["nombres"];
        $p->apellidos = $datos["apellidos"];
        $p->telefono_movil = $datos["telefono_movil"];
        $p->telefono_casa = $datos["telefono_casa"];
        $p->email = $datos["email"];
        $p->licencia_conmebol = $datos["licencia_conmebol"];
        $p->numero_licencia_conmebol = $datos["numero_licencia_conmebol"];
        $p->pais_licencia_conmebol = $datos["pais_licencia_conmebol"];
        $p->cursos_colegio_entrenadores = $datos["cursos_colegio_entrenadores"];
        $p->numero_carnet_agremiado = $datos["numero_carnet_agremiado"];
        $p->pais_carnet_agremiado = $datos["pais_carnet_agremiado"];
        $p->cursos_federaciones_asociaciones = $datos["cursos_federaciones_asociaciones"];
        $p->estudios_universitarios = $datos["estudios_universitarios"];
        $p->estudios_media = $datos["estudios_media"];
        $p->congresos = $datos["congresos"];
        $p->simposios = $datos["simposios"];
        $p->cursos_cortos = $datos["cursos_cortos"];
        $p->publicaciones = $datos["publicaciones"];
        // $p->estado = $datos["estado"];

        // $profesion = $datos["profesion"]; 
        // $pais = $datos["pais"]; 

        // $p->profesion = $profesion;
        // $p->codigo = generarCodigoUnico($profesion, $pais, $p);

        $p->insertar();

    }

    function generarCodigoUnico($profesion, $pais, $modelo) { 
        // Pasar el objeto del modelo como argumento
        $ultimoCodigo = $modelo->obtenerUltimoCodigo($profesion);

        if ($ultimoCodigo) {
            $secuencia = (int)substr($ultimoCodigo, 3, 6);
            $nuevaSecuencia = $secuencia + 1;
        } else {
            $nuevaSecuencia = 1000; // Empezar en 1000 si no hay códigos previos
        }

        $nuevoCodigo = sprintf("%s-%06d-%s", $profesion, $nuevaSecuencia, $pais);
        return $nuevoCodigo;
    }

    function actualizarProveedor($datos){

        $p = new registroModel();
        //var_dump($datos);
        $p->actualizar($datos);

    }

    function consultarRegistro(){
        $p = new registroModel();
        $p->consultar();
        return $p->resultado;
    }
    function buscarRegistro($id_miembro){
        $p = new registroModel();
        $p->buscar($id_miembro);
        return $p->resultado;
    }

    function borrarRegistro($id_miembro){
        $p = new registroModel();
        $p->borrar($id_miembro);
    }

?>