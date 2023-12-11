<?php

    include '../../../admin/connection/bd_connection.php';

    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: *');
    
    // Verificar si es una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Obtener los valores enviados desde el frontend
        $V_PERI = !isset($_POST["periodo"]) ? null : ($_POST["periodo"] == '' ? null : $_POST["periodo"]);
        $V_SERVI = !isset($_POST["servicio"]) ? null : ($_POST["servicio"] == '' ? null : $_POST["servicio"]);
        $V_ESTA = !isset($_POST["estado"]) ? null : ($_POST["estado"] == '' ? null : $_POST["estado"]);
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
                    'NJENC_ID',
                    'NUSUA_ID',
                    'CUSUA_IMG',
                    'CUSUA_NOMBRES',
                    'CUSUA_CORREO',
                    'CAREA_ID',
                    'CNACI_DESCRIPCION',
                    'CNACI_IMAGEN',
                    'CJPER_ID',
                    'AVANCE',
                    'PUNTAJE',
                    'PUNTAJE_MAX',
                    'NOTA_PORC',
                    'PREG_CONTESTADAS',
                    'TOTAL_PREGUNTAS',
                    'ESTADO',
                    'FEC_MODIFICACION',
                    'USR_MODIFICACION'
                );
                $query = "SELECT * FROM (
                            SELECT
                                NJENC_ID,
                                NUSUA_ID,
                                CJPER_ID,
                                CUSUA_NOMBRES,
                                CUSUA_CORREO,
                                CAREA_ID,
                                CUSUA_IMG,
                                CNACI_DESCRIPCION,
                                CNACI_IMAGEN,
                                SUM(NOTA) PUNTAJE,
                                SUM(NOTA_MAXIMA) PUNTAJE_MAX,
                                ROUND((SUM(NOTA) / SUM(NOTA_MAXIMA) * 100), 1) NOTA_PORC,
                                COUNT(NJENPR_ID) PREG_CONTESTADAS,
                                (SELECT COUNT(*) FROM SRD_JCI_PREGUNTAS) TOTAL_PREGUNTAS,
                                ROUND(COUNT(NJENPR_ID) / (SELECT COUNT(*) FROM SRD_JCI_PREGUNTAS) * 100, 1) AVANCE,
                                ESTADO,
                                FEC_MODIFICACION,
                                USR_MODIFICACION
                            FROM (
                                SELECT
                                    A.NJENPR_ID,
                                    A.NJENC_ID,
                                    B.CJPER_ID,
                                    B.NUSUA_ID,
                                    C.CUSUA_NOMBRES,
                                    C.CUSUA_CORREO,
                                    B.CAREA_ID,
                                    C.CUSUA_IMG,
                                    G.CNACI_DESCRIPCION,
                                    G.CNACI_IMAGEN,
                                    D.NJRESP_VALOR AS NOTA,
                                    IF(D.NJRESP_VALOR IS NULL, NULL, MAX(F.NJRESP_VALOR)) AS NOTA_MAXIMA,
                                    FN_OBTENER_NOMBRE_ESTADO(B.NJENC_ESTADO) ESTADO,
                                    IFNULL(B.DUSUA_REG_UPD, B.DUSUA_REG_INS) FEC_MODIFICACION,
                                    FN_OBTENER_NOMBRE_POR_ID(IFNULL(B.NUSUA_REG_UPD, B.NUSUA_REG_INS)) USR_MODIFICACION
                                FROM SRD_JCI_ENCUESTAS_PREG A
                                RIGHT JOIN SRD_JCI_ENCUESTAS B ON B.NJENC_ID = A.NJENC_ID
                                INNER JOIN SRD_USUARIOS C ON B.NUSUA_ID = C.NUSUA_ID
                                INNER JOIN SRD_NACIONALIDAD G ON G.NNACI_ID = C.NNACI_ID
                                INNER JOIN SRD_JCI_RESPUESTAS D ON D.NJRESP_ID = A.NJRESP_ID
                                RIGHT JOIN SRD_JCI_PREGUNTAS_RPTAS E ON E.NJPRE_ID = A.NJPRE_ID
                                INNER JOIN SRD_JCI_RESPUESTAS F ON F.NJRESP_ID = E.NJRESP_ID 
                                WHERE ";
                                
                //Filtros de Busqueda personalizados
                if (!empty($V_ID) && isset($V_ID) && $V_ROL != 1) {
                    $query .= "B.NJENC_SUPERVISOR = " . $V_ID . " AND ";
                }

                if (!empty($V_SERVI) && isset($V_SERVI)) {
                    $query .= "B.CAREA_ID = '" . $V_SERVI . "' AND ";
                }
        
                if (!empty($V_PERI) && isset($V_PERI)) {
                    $query .= "B.CJPER_ID = '" . $V_PERI . "' AND ";
                }
        
                if (!empty($V_ESTA) && isset($V_ESTA)) {
                    $query .= "B.NJENC_ESTADO = " . $V_ESTA . " AND ";
                }
                //Fin Filtros de Busqueda personalizados
        
        
                $query .= " A.ESTADO_REG = 1 AND A.NJENPR_ESTADO = 1 AND
                            B.ESTADO_REG = 1 AND 
                            C.ESTADO_REG = 1 AND C.NUSUA_ESTADO = 1 AND 
                            D.ESTADO_REG = 1 AND D.NJRESP_ESTADO = 1 AND
                            E.ESTADO_REG = 1 AND E.NJRPT_ESTADO = 1 AND ";
        
                if (isset($_POST["search"]["value"])) {
                    $query .= '(C.CUSUA_NOMBRES LIKE "%' . $_POST["search"]["value"] . '%" ';    
                    $query .= 'OR B.CJPER_ID LIKE "%' . $_POST["search"]["value"] . '%") ';
                }
        
                $query .= "     GROUP BY A.NJENC_ID, E.NJPRE_ID
                            ) AS SUBCONSULTA
                            GROUP BY NJENC_ID 
                            UNION 
                            SELECT 
                                A.NJENC_ID,
                                A.NUSUA_ID,
                                A.CJPER_ID,
                                B.CUSUA_NOMBRES,
                                B.CUSUA_CORREO,
                                A.CAREA_ID,
                                B.CUSUA_IMG,
                                G.CNACI_DESCRIPCION,
                                G.CNACI_IMAGEN,
                                '0' PUNTAJE,
                                '0' PUNTAJE_MAX,
                                '0' NOTA_PORC,
                                '0' PREG_CONTESTADAS,
                                (SELECT COUNT(*) FROM SRD_JCI_PREGUNTAS) TOTAL_PREGUNTAS,
                                '0' AVANCE,
                                FN_OBTENER_NOMBRE_ESTADO(A.NJENC_ESTADO) ESTADO,
                                IFNULL(A.DUSUA_REG_UPD, A.DUSUA_REG_INS) FEC_MODIFICACION,
                                FN_OBTENER_NOMBRE_POR_ID(IFNULL(A.NUSUA_REG_UPD, A.NUSUA_REG_INS)) USR_MODIFICACION
                            FROM SRD_JCI_ENCUESTAS A
                            INNER JOIN SRD_USUARIOS B ON A.NUSUA_ID = B.NUSUA_ID
                            LEFT JOIN SRD_JCI_ENCUESTAS_PREG C ON A.NJENC_ID = C.NJENC_ID
                            LEFT JOIN SRD_JCI_RESPUESTAS D ON C.NJRESP_ID = D.NJRESP_ID
                            LEFT JOIN SRD_NACIONALIDAD G ON G.NNACI_ID = B.NNACI_ID
                            WHERE ";
                
                //Filtros de Busqueda personalizados
                if (!empty($V_ID) && isset($V_ID) && $V_ROL != 1) {
                    $query .= "A.NJENC_SUPERVISOR = " . $V_ID . " AND ";
                }
                
                if (!empty($V_SERVI) && isset($V_SERVI)) {
                    $query .= "A.CAREA_ID = '" . $V_SERVI . "' AND ";
                }

                if (!empty($V_PERI) && isset($V_PERI)) {
                    $query .= "A.CJPER_ID = '" . $V_PERI . "' AND ";
                }
        
                if (!empty($V_ESTA) && isset($V_ESTA)) {
                    $query .= "A.NJENC_ESTADO = " . $V_ESTA . " AND ";
                }
                //Fin Filtros de Busqueda personalizados
        
                $query .= " A.NJENC_ESTADO = 1 AND A.ESTADO_REG = 1 AND
                            B.NUSUA_ESTADO = 1 AND B.ESTADO_REG = 1 AND 
                            C.NJENPR_ID IS NULL AND ";
        
                if (isset($_POST["search"]["value"])) {
                    $query .= '(B.CUSUA_NOMBRES LIKE "%' . $_POST["search"]["value"] . '%" ';    
                    $query .= 'OR A.CJPER_ID LIKE "%' . $_POST["search"]["value"] . '%") ';
                }
        
                $query .= " ) DATOS ";
        
                if (isset($_POST["order"])) {
                    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
                } else {
                    $query .= 'ORDER BY CUSUA_NOMBRES ASC';
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
                    $sub_array[] = $row["NJENC_ID"];                                                    //[0]
                    $sub_array[] = $row["NUSUA_ID"];                                                    //[1]
                    $sub_array[] = $row["CUSUA_IMG"];                                                   //[2]
                    $sub_array[] = $row["CUSUA_NOMBRES"];                                               //[3]
                    $sub_array[] = $row["CUSUA_CORREO"];                                                //[4]
                    $sub_array[] = $row["CAREA_ID"];                                                    //[5]
                    $sub_array[] = $row["CNACI_DESCRIPCION"];                                           //[6]
                    $sub_array[] = $row["CNACI_IMAGEN"];                                                //[7]
                    $sub_array[] = $row["CJPER_ID"];                                                    //[8]
                    $sub_array[] = $row["AVANCE"];                                                      //[9]
                    $sub_array[] = $row["PUNTAJE"];                                                     //[10]
                    $sub_array[] = $row["PUNTAJE_MAX"];                                                 //[11]
                    $sub_array[] = $row["NOTA_PORC"];                                                   //[12]
                    $sub_array[] = $row["PREG_CONTESTADAS"];                                            //[13]
                    $sub_array[] = $row["TOTAL_PREGUNTAS"];                                             //[14]
                    $sub_array[] = $row["ESTADO"];                                                      //[15]
                    $sub_array[] = date_format(date_create($row["FEC_MODIFICACION"]), "d/m/Y h:i:s A"); //[16]
                    $sub_array[] = $row["USR_MODIFICACION"];                                            //[17]
                    $data[] = $sub_array;
                }
                
                function get_all_data($connect, $V_ID, $V_PERI, $V_ROL, $V_SERVI)
                {
                    $query = "SELECT count(*) AS TOTAL FROM SRD_JCI_ENCUESTAS WHERE ESTADO_REG = 1 ";
                    
                    if (!empty($V_ID) && isset($V_ID) && $V_ROL != 1) {
                        $query .= " AND NJENC_SUPERVISOR = " . $V_ID . " " ;
                    }

                    if (!empty($V_SERVI) && isset($V_SERVI)) {
                        $query .= " AND CAREA_ID = '" . $V_SERVI . "' ";
                    }
            
                    if (!empty($V_PERI) && isset($V_PERI)) {
                        $query .= " AND CJPER_ID = '" . $V_PERI . "'";
                    }
        
                    $result = $connect->query($query);
                    return $result->fetch_assoc()['TOTAL'];
                }

                $respuesta = array(
                    "draw"    => intval($_POST["draw"]),
                    "recordsTotal"  =>  get_all_data($conn, $V_ID, $V_PERI, $V_ROL, $V_SERVI),
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