<?php
    $publicacionesPorPagina = 7;
    $paginaActual = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
    $offset = ($paginaActual - 1) * $publicacionesPorPagina;

    // Consulta SQL con límite y desplazamiento para obtener las publicaciones de la página actual
    $sqlPublicaciones = "SELECT * FROM denuncias LIMIT :offset, :limit";
    $stmtPublicaciones = $pdo->prepare($sqlPublicaciones);
    $stmtPublicaciones->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmtPublicaciones->bindValue(':limit', $publicacionesPorPagina, PDO::PARAM_INT);
    $stmtPublicaciones->execute();
    
    $resultadoCantidadPublicaciones = $stmtPublicaciones->fetchAll(PDO::FETCH_NUM);
    
    $sql = "SELECT * FROM denuncias";
    $stmt = $pdo->prepare($sql);  // Preparar la consulta
    $stmt->execute();  // Ejecutar con los parámetros

    $resultadoDenuncias = $stmt->fetchAll(PDO::FETCH_NUM);  // Obtener los resultados
    
    // Define la consulta SQL para ubicaciones

    if (count($resultadoDenuncias) > 0) {
        
        foreach ($resultadoDenuncias as $row) {
            if($row[5]!="descartada"){
                
                $sql = "SELECT * FROM publicacion WHERE pu_id=".$row[1];
                $stmt = $pdo->prepare($sql);  // Preparar la consulta
                $stmt->execute();  // Ejecutar con los parámetros

                $resultadoPublicacion = $stmt->fetchAll(PDO::FETCH_NUM);
                if(count($resultadoPublicacion)>0){
                    foreach($resultadoPublicacion as $rowPubliacion){
                        $nombrePublicacion =  $rowPubliacion[2];
                        $idPublicacion = $rowPubliacion[0];
                    }
                }
                $idDenuncia = $row[0];
                // Imprimir la denuncia
                echo "
                <div class='container'>
                <div class='card d-flex flex-row ' style='height: 100%;'>
                    <div class='card-body d-flex flex-column'>
                        <div class='flex-grow-1'>
                            <h5 class='card-title'>" . $nombrePublicacion . "</h5>
                            <p class='card-text'></p>
                            <p class='card-text'> Descripción: " . $row[4] . "</p>
                            <p class='card-text'> Tags: " . $row[3] . "</p>
                            <br><br>
                        </div>
                        <div class='ms-auto'> 
                            <a href='publicacion.php?publicacion=" . $row[1] . "&denuncia=" . $idDenuncia . "' class='btn btn-outline-info'>Ver Publicación</a>    
                        </div>
                        <div class='ms-auto'> 
                            <a href='descartarDenuncia.php?denuncia=".$idDenuncia.",&publicacion=" . $row[1] . "' class='btn btn-outline-info'>Descartar</a>    
                        </div>
                    </div>
                </div>
                </div>
                ";
            }
        }
    } else {
        echo "<br><br><br><h2 align='center'>No hay denuncias</h2><br><br><br>";
    }

    $totalPublicaciones = $pdo->query("SELECT COUNT(*) FROM publicacion")->fetchColumn();
    $totalPaginas = ceil($totalPublicaciones / $publicacionesPorPagina);

    echo "<br>
        <div align='right'><nav aria-label='Page navigation example'>
        <ul class='pagination'>";
    if ($paginaActual > 1) {
        echo "<li class='page-item'><a class='page-link' href=?pag=" . ($paginaActual - 1) . ">Anterior</a></li>";
    }
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<li class='page-item'><a class='page-link' href=?pag=" . $i . ">". $i . "</a></li>";
    }
    if ($paginaActual < $totalPaginas) {
        echo "<li class='page-item'><a class='page-link' href=?pag=". ($paginaActual + 1) . ">Siguiente</a></li>";
    }
    echo "</ul></nav></div>";
?>