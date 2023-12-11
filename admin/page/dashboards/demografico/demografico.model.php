<?php
    include '../../../connection/bd_connection.php';

    // GRÁFICO 1: GENERO - TIPO PIE
    if ($_POST['registro'] == 'genero') {
        $sql = "SELECT COUNT(genero) AS 'subtotal', 'Mujeres' AS 'genero' FROM alumni WHERE genero = 'F' UNION
                SELECT COUNT(genero), 'Hombres' FROM alumni WHERE genero = 'M' UNION
                SELECT COUNT(genero), 'No Binario' FROM alumni WHERE genero = 'NB' UNION
                SELECT COUNT(codPucp), 'Pendientes' FROM alumni WHERE genero IS NULL OR genero = ''; ";
        $result = $conn->query($sql);
        if ($result -> num_rows > 0) {
            //$row = $result->fetch_assoc();
            $total = 0;
            while($row = $result->fetch_assoc()) {            
                $sub_genero[] = $row["genero"];            
                $sub_total[] = $row["subtotal"];
                $total += (int) $row["subtotal"];
            }
            // output data of each row        
            $respuesta = array(
                'resultado' => 'ok',
                'labels' => $sub_genero,
                'series' => $sub_total,
                'total' => $total,
            );
        }
        $conn -> close();
        echo json_encode($respuesta);
    }

    // GRÁFICO 3: TIPO ALUMNI ANUAL - LINEAL
    if ($_POST['registro'] == 'tipoalumnianual') {
        $sql = "SELECT 
                    anioGrad 'Anio', 
                    SUM(IF(tipopostgrado='MAESTRÍA', 1, 0)) 'Maestria', 
                    SUM(IF(tipopostgrado='DOCTORADO', 1, 0)) 'Doctorado', 
                    SUM(IF(tipopostgrado='' OR tipopostgrado IS NULL, 1, 0)) 'Pendientes'
                FROM
                    datosalumni GROUP BY anioGrad ORDER BY anioGrad; ";
        $result = $conn->query($sql);
        if ($result -> num_rows > 0) {
            //$row = $result->fetch_assoc();
            while($row = $result->fetch_assoc()) {
                $anio[] = $row["Anio"];
                $maestria[] = $row["Maestria"];
                $doctorado[] = $row["Doctorado"];
                $pendientes[] = $row["Pendientes"];
            }
            // output data of each row
            $respuesta = array(
                'resultado' => 'ok',
                'anio' => $anio,
                'maestria' => $maestria,
                'doctorado' => $doctorado,
                'pendientes' => $pendientes
            );
        }
        $conn -> close();
        echo json_encode($respuesta);
    }
?>