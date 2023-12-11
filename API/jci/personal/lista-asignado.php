<?php

    include '../../../admin/connection/bd_connection.php';

    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: *');
    
    // Verificar si es una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Obtener los valores enviados desde el frontend
        $V_ESTA = !isset($_POST["estado"]) ? null : ($_POST["estado"] == '' ? null : $_POST["estado"]);
        $V_PERI = !isset($_POST["periodo"]) ? null : ($_POST["periodo"] == '' ? null : $_POST["periodo"]);
        $V_SERV = !isset($_POST["servicio"]) ? null : ($_POST["servicio"] == '' ? null : $_POST["servicio"]);
        $V_ID = !isset($_POST["usuario"]) ? null : ($_POST["usuario"] == '' ? null : $_POST["usuario"]);
        $V_ROL = !isset($_POST["usuario_rol"]) ? NULL : ($_POST["usuario_rol"] == '' ? NULL : $_POST["usuario_rol"]);

        try {
            
            $contador = 0;
            $erray = array();
            session_start();
            $contadorsession = 0;

            // VALIDAMOS EL ID DEL SUPERVISOR
            if ( $V_ID === NULL || $V_ID == '' ) {
                $error = 'El ID del supervisor es obligatorio';
                $contador += 1;
                $earray[$contador] = $error;
            } else {
                $stmt = $conn->prepare("SELECT NUSUA_ID, NROLE_ID FROM SRD_USUARIOS WHERE NUSUA_ID = ? AND ESTADO_REG = 1;");
                $stmt->bind_param("i", $V_ID);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idusuario, $idrol);
                    $stmt->fetch();
                    if ( $idusuario != $_SESSION['id'] ) {
                        $error = 'El usuario no puede realizar dicha operación';
                        $contador += 1;
                        $contadorsession += 1;
                        $earray[$contador] = $error;
                    }
                    if ( $idrol != $_SESSION['rol_id'] ) {
                        $error = 'El rol del usuario no corresponde a la operación';
                        $contador += 1;
                        $contadorsession += 1;
                        $earray[$contador] = $error;
                    }
                    
                    // VALIDAMOS QUE LA SESIÓN HAYA SIDO INICIADA
                    if ($contadorsession != 0) {
                        session_destroy();
                    }
                } else {
                    $error = 'El ID del supervisor no se encuentra registrado';
                    $contador += 1;
                    $earray[$contador] = $error;
                }
                $stmt->close();
            }

            if ($contador == 0) {
                $column = array(
                    'NUSUA_ID',
                    'NJENC_ID',
                    'CUSUA_CODIGO',
                    'CUSUA_NOMBRES',
                    'CUSUA_IMG',
                    'CNACI_DESCRIPCION',
                    'CNACI_IMAGEN',
                    'CAREA_ID',
                    'SUPERVISOR',
                    'CDESE_DESCRIPCION'
                );
                $query = "SELECT 
                            A.NUSUA_ID,
                            B.NJENC_ID,
                            A.CUSUA_CODIGO,
                            A.CUSUA_NOMBRES,
                            A.CUSUA_IMG,
                            C.CNACI_DESCRIPCION,
                            C.CNACI_IMAGEN,
                            E.CAREA_ID,
                            F.CUSUA_NOMBRES SUPERVISOR,
                            D.CDESE_DESCRIPCION
                        FROM SRD_USUARIOS A
                        LEFT JOIN SRD_JCI_ENCUESTAS B ON A.NUSUA_ID = B.NUSUA_ID
                        INNER JOIN SRD_JCI_AREAS_SUPER E ON E.CAREA_ID = B.CAREA_ID 
                        INNER JOIN SRD_USUARIOS F ON E.NUSUA_ID = F.NUSUA_ID 
                        INNER JOIN SRD_NACIONALIDAD C ON C.NNACI_ID = A.NNACI_ID
                        LEFT JOIN SRD_DESEMPENIO D ON D.NDESE_ID = A.NDESE_ID WHERE ";
                
                //Inicio Filtros de Busqueda personalizados
                if (!empty($V_PERI) && isset($V_PERI)) {
                    $query .= " B.CJPER_ID = '" . $V_PERI . "' AND ";
                }
    
                if (!empty($V_ESTA) && isset($V_ESTA)) {
                    $query .= " A.NUSUA_ESTADO = " . $V_ESTA . " AND ";
                }
    
                if (!empty($V_ID) && isset($V_ID) && $V_ROL != 1) {
                    $query .= " E.NUSUA_ID = " . $V_ID . " AND ";
                }
    
                if (!empty($V_SERV) && isset($V_SERV)) {
                    $query .= " E.CAREA_ID = '" . $V_SERV . "' AND ";
                }
                //Fin Filtros de Busqueda personalizados
    
                $query .= " B.NJENC_ESTADO = 1 AND B.ESTADO_REG = 1 ";
    
                if (isset($_POST["search"]["value"])) {
                    $query .= 'AND (A.CUSUA_NOMBRES LIKE "%' . $_POST["search"]["value"] . '%") ';
                }
                if (isset($_POST["order"])) {
                    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
                } else {
                    $query .= 'ORDER BY A.CUSUA_NOMBRES ASC ';
                }
    
                $query1 = '';
    
                if ($_POST["length"] != -1) {
                    $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
                }
    
                $result = $conn->query($query);
                $number_filter_row = $result->num_rows;
    
                $result = $conn->query($query . $query1);
                $data = array();
            
                while($row = $result->fetch_assoc()) {
                    $sub_array = array();
                    $sub_array[] = $row["NUSUA_ID"];                                    //[0]
                    $sub_array[] = $row["NJENC_ID"];                                    //[1]
                    $sub_array[] = $row["CUSUA_CODIGO"];                                //[2]
                    $sub_array[] = ucwords($row["CUSUA_NOMBRES"]);                      //[3]
                    $sub_array[] = $row["CUSUA_IMG"];                                   //[4]
                    $sub_array[] = ucwords($row["CNACI_DESCRIPCION"]);                  //[5]
                    $sub_array[] = $row["CNACI_IMAGEN"];                                //[6]
                    $sub_array[] = $row["CAREA_ID"];                                    //[7]
                    $sub_array[] = $row["SUPERVISOR"];                                  //[8]
                    $sub_array[] = $row["CDESE_DESCRIPCION"];                           //[9]
                    $data[] = $sub_array;
                }
                
                function get_all_data($connect, $V_PERI, $V_ID, $V_ROL)
                {
                    $query = "  SELECT 
                                    count(*) AS TOTAL 
                                FROM SRD_USUARIOS A
                                LEFT JOIN SRD_JCI_ENCUESTAS B ON A.NUSUA_ID = B.NUSUA_ID
                                INNER JOIN SRD_JCI_AREAS_SUPER E ON E.CAREA_ID = B.CAREA_ID 
                                WHERE A.NUSUA_ESTADO = 1 AND B.NJENC_ESTADO = 1 AND B.ESTADO_REG = 1 ";
                    
                    //Inicio Filtros de Busqueda personalizados
                    if (!empty($V_PERI) && isset($V_PERI)) {
                        $query .= " AND B.CJPER_ID = '" . $V_PERI . "' ";
                    }
    
                    if (!empty($V_ID) && isset($V_ID) && $V_ROL != 1 ) {
                        $query .= " AND E.NUSUA_ID = '" . $V_ID . "' ";
                    }
                    
                    $result = $connect->query($query);
                    return $result->fetch_assoc()['TOTAL'];
                }
                $respuesta = array(
                    "draw"    => intval($_POST["draw"]),
                    "recordsTotal"  =>  get_all_data($conn, $V_PERI, $V_ID, $V_ROL),
                    "recordsFiltered" => $number_filter_row,
                    "data"    => $data
                );
            } else {
                
                $respuesta = array(
                    'estado' => 0,
                    'mensaje' => '¡Error!',
                    'data' => $earray
                );
                
            }

        } catch(Exception $e) {
            $respuesta = array(
                'estado' => 0,
                'mensaje' => '¡Error!',
                'data' => array(
                    '1' => $e->getMessage()
                )
            );
        }
    } else {
        $respuesta = array(
            'estado' => 0,
            'mensaje' => '¡Error!',
            'data' => array(
                '1' => 'El método de solicitud no es el indicado'
            )
        );
    }

    echo json_encode($respuesta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    
    $conn->close();
?>