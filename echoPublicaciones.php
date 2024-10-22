<?php
    $resultado=mysqli_query($conn,$sql);
    $sqlUbicacion="SELECT * FROM argentina";
    $resultadoUbicaciones=mysqli_query($conn,$sqlUbicacion);
    $ubicacionExiste = 0;

    if ($resultado === false) {
        // Mostrar el error de MySQL si la consulta falla
        echo "Error en la consulta SQL de publicaciones: " . mysqli_error($conn);
        exit;
    }

    if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_row($resultado)){
        //Primer while que busca la ubicacion de origen y destino (asigna nombres a variables)
        mysqli_data_seek($resultadoUbicaciones, 0);
        if(mysqli_num_rows($resultadoUbicaciones)>0){
            while($rowUbicacion=mysqli_fetch_row($resultadoUbicaciones)){
            if($row[3]==$rowUbicacion[0]){
                $origen=$rowUbicacion[1];
                $ubicacionExiste++;
            }
            if($row[4]==$rowUbicacion[0]){
                $destino = $rowUbicacion[1];
                $ubicacionExiste++;
            }
            if($ubicacionExiste===2){
                $ubicacionExiste=0;
                break;
            }
            }
        }
        //Crea el echo con la publicacion  
        echo"
        <div class='card d-flex flex-row ' style='height: 100%;'>
            <img src='https://cdn-icons-png.flaticon.com/512/4792/4792929.png' alt='' class='card-img-left'style='width: 150px; height: auto; object-fit: cover;'> 
            <div class='card-body d-flex flex-column'>
            <div class='flex-grow-1'>
                <h5 class='card-title'>".$row[2]."</h5>
                <p class='card-text'></p>
                <p class='card-text'> Descripcion: ".$row[7]."</p>
                <p class='card-text'> Comentario: ".$row[8]."</p>
                <small class='text-body-secondary'><strong>Origen</strong>: ".$origen."</small> <small class='text-body-secondary'><strong>Destino</strong>: ".$destino."</small><br><br>
            </div>
            <div class='ms-auto'> 
            <a href='publicacion.php?publicacion=".$row[0]."' class='btn btn-outline-info'>Ver mas</a>"; 

            //Empieza el modal de postulacion
            
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                  Postularce
            </button>      

                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Postularce a la publicacion</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <form action='subirPostulacion.php' method='post'>
                              <div class='container' align='center'>
                                Monto:   <input type='number' id='montoPostulacion' name='montoPostulacion' min='0' value='1'><br>
                              </div>
                              <br>
                              <div class='container' align='center'>
                                <label for='mensajePostulacion' align='center'>Comentario</label><br>
                                <textarea name='mensajePostulacion' id='mensajePostulacion' rows='4' cols='60'>
                                </textarea>
                              </div>
                              <br>
                              <div class='container' align='center'>
                                <input class='btn btn-primary' type='submit' value='Postularce'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>  
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
            </div>
        </div>
        ";
    }
    }else{
        echo"<br><br><br><h2 align='center'>No hay publicaciones que coincidan con el resultado que buscas</h2><br><br><br>";
    }
?>