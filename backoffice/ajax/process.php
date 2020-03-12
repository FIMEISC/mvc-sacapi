<?php
    require_once "../controladores/general.controlador.php";
    require_once "../modelos/general.modelo.php";

    
    $query = new ControladorGeneral();

    if(isset($_REQUEST['Guardar'])){
        if($_REQUEST["value"] == "edit"){
            if($_REQUEST["tipo"] == "profesores"){
                $tabla = $_REQUEST['tipo'];
                $numCotrol = $_REQUEST['num_c'];
                $nombre = $_REQUEST['nombreu'];
                $apellidoP = $_REQUEST['apellidop'];
                $apellidoM = $_REQUEST['apellidom'];
                $email = $_REQUEST['email'];
                $permisosAcceso = $_REQUEST['permisos_acceso'];
                $subPermisosAcceso = $_REQUEST['sub_permiso_acceso'];
                $password = $_REQUEST['password'];
                $idFacultad1 = $_REQUEST["1"];
                $idFacultad2 = $_REQUEST["2"];
                $idFacultad3 = $_REQUEST["3"];
                $idFacultad4 = $_REQUEST["4"];
                $url = $_REQUEST['url'];
                $foto = "user-default.png";

                $query -> ctrlUpdateProfesor(
                    $tabla,
                    $numCotrol,
                    $nombre,
                    $apellidoP,
                    $apellidoM,
                    $password,
                    $email,
                    $foto,
                    $permisosAcceso,
                    $subPermisosAcceso,
                    $idFacultad1,
                    $idFacultad2,
                    $idFacultad3,
                    $idFacultad4,
                    $url
                );
            }else if($_REQUEST["tipo"] == "alumnos"){
                $tipo = $_REQUEST["tipo"];
                $noCuenta = $_REQUEST["num_c"];
                $nombre = $_REQUEST["nombreu"];
                $apellidoP = $_REQUEST["apellidop"];
                $apellidoM = $_REQUEST["apellidom"];
                $password = $_REQUEST["password"];
                $email = $_REQUEST["email"];
                $foto = "user-default.png";
                $permiasoA = "Alumno";
                $status = "activo";
                $semestre = $_REQUEST["semestre"];
                $grupo = $_REQUEST["grupo"];
                $generacion = $_REQUEST["generacion"];
                $idnivel = $_REQUEST["id_nivel"];
                $idtutor = $_REQUEST["idtutor"];
                $idcarrera = $_REQUEST["id_carr"];
                $idfacultad = $_REQUEST["id_facultad"];
                $passok = 0;
                $url = $_REQUEST['url'];

                $query -> ctrlUpdateAlumno(
                    $tipo, $noCuenta, $nombre,
                    $apellidoP, $apellidoM,
                    $password,
                    $email,
                    $foto,
                    $permiasoA,
                    $status,
                    $semestre,
                    $grupo,
                    $generacion,
                    $idnivel,
                    $idtutor,
                    $idcarrera,
                    $idfacultad,
                    $passok,
                    $url
                );
            }else if($_REQUEST["tipo"] == "grupos"){
                $semestre = $_REQUEST["semestre"];
                $grupo = $_REQUEST["grupo"];
                $id_nivel = $_REQUEST["id_nivel"];
                $id = $_REQUEST["id"];
                $nivel = $_REQUEST["nivel"];

                $query -> ctrlUpdateGrupo($id, $semestre, $grupo, $id_nivel, $nivel);
            }else{
                if($_REQUEST['tabla'] == "carreras"){
                    echo "id de la facultad a la que pertenece".$_REQUEST["id_facultad"];
                }
        
                $tabla = $_REQUEST["tabla"];
                $id = $_REQUEST["id"];
                $value = $_REQUEST["nombre"];
                
                $query -> ctrlEditar($tabla, $id, $value);
            }
       }else if($_REQUEST["value"] == "add"){
            if($_REQUEST["tipo"] == "profesores"){
                $tabla = $_REQUEST['tipo'];
                $numCotrol = $_REQUEST['num_c'];
                $nombre = $_REQUEST['nombreu'];
                $apellidoP = $_REQUEST['apellidop'];
                $apellidoM = $_REQUEST['apellidom'];
                $email = $_REQUEST['email'];
                $permisosAcceso = $_REQUEST['permisos_acceso'];
                $subPermisosAcceso = $_REQUEST['sub_permiso_acceso'];
                $password = $_REQUEST['password'];
                $idFacultad1 = $_REQUEST["1"];
                $idFacultad2 = $_REQUEST["2"];
                $idFacultad3 = $_REQUEST["3"];
                $idFacultad4 = $_REQUEST["4"];
                $url = $_REQUEST['url'];
                $foto = "user-default.png";

                $query -> ctrlAgregarProfesor(
                    $tabla,
                    $numCotrol,
                    $nombre,
                    $apellidoP,
                    $apellidoM,
                    $password,
                    $email,
                    $foto,
                    $permisosAcceso,
                    $subPermisosAcceso,
                    $idFacultad1,
                    $idFacultad2,
                    $idFacultad3,
                    $idFacultad4,
                    $url
                );
            }else if($_REQUEST["tipo"] == "alumnos"){
                $tipo = $_REQUEST["tipo"];
                $noCuenta = $_REQUEST["num_c"];
                $nombre = $_REQUEST["nombreu"];
                $apellidoP = $_REQUEST["apellidop"];
                $apellidoM = $_REQUEST["apellidom"];
                $password = $_REQUEST["password"];
                $email = $_REQUEST["email"];
                $foto = "user-default.png";
                $permiasoA = "Alumno";
                $status = "activo";
                $semestre = $_REQUEST["semestre"];
                $grupo = $_REQUEST["grupo"];
                $generacion = $_REQUEST["generacion"];
                $idnivel = $_REQUEST["id_nivel"];
                $idtutor = $_REQUEST["idtutor"];
                $idcarrera = $_REQUEST["id_carr"];
                $idfacultad = $_REQUEST["id_facultad"];
                $passok = 0;
                $url = $_REQUEST['url'];

                $query -> ctrlAgregarAlumno(
                    $tipo, $noCuenta, $nombre,
                    $apellidoP, $apellidoM,
                    $password,
                    $email,
                    $foto,
                    $permiasoA,
                    $status,
                    $semestre,
                    $grupo,
                    $generacion,
                    $idnivel,
                    $idtutor,
                    $idcarrera,
                    $idfacultad,
                    $passok,
                    $url
                );
            }else if($_REQUEST["tipo"] == "grupos"){
                $semestre = $_REQUEST["semestre"];
                $grupo = $_REQUEST["grupo"];
                $id_nivel = $_REQUEST["id_nivel"];
                $nivel = $_REQUEST["nivel"];

                $query -> ctrlAgregarGrupo($semestre, $grupo, $id_nivel, $nivel);
            }else{
                $tabla = $_REQUEST["tabla"];
                $value = $_REQUEST["nombre"];
    
                if($_REQUEST['tabla'] == "carreras"){ 
                    $idFacultad = $_REQUEST["idFacultad"];
                }else{
                    $idFacultad = 0;
                }
                
                $query -> ctrlAgregar($tabla, $value, $idFacultad);
            }
       }
    }
?>