<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear publicacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
<?php
include('cabecera.php');
?>

        <div class="card container" style='width:750px'>
        <div class="card-header" align="center" style='background-color: lightblue;'>
            <strong>Crear Publicacion</strong>
        </div>
        <div class="card-body">
        <div class="container ">
            
        <form action="subirPublicacion.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group col-md-6">
                    <label for="origen">Origen:</label>
                    <input type="text" class="form-control" id="origen" name="origen">
                </div>
                <div class="form-group col-md-6">
                    <label for="destino">Destino:</label>
                    <input type="text" class="form-control" id="destino" name="destino">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
                
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="volumen">Volumen: </label>
                    <input type="text" class="form-control" id="volumen" name="volumen">
                </div>
                <div class="form-group col-md-6">
                    <label for="peso">Peso:</label>
                    <input type="number" class="form-control" id="peso" name="peso">
                </div><br>
                <div class="form-group col-md-6">
                    <label for="imagen">Imagen:   </label>
                    <input type="file" name="imagen" id="imagen">
                </div>
            </div>
            
            <br><br>
            <div align="right">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
        </div>
        </div>
    </div>

<?php
include('pie.php');
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>