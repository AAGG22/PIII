<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="publicacionesEstilo.css">
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="https://cdn.pixabay.com/photo/2016/04/22/17/36/wooden-v-1346205_1280.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          VeryDeli
        </a>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar publicacion" aria-label="Buscar publicacion">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
      </div>
    </nav>

    <br><br>
      <div class="container" align="center">
        <form action="">
          Origen: <input type="text" name="origen" id="origen">
          Destino: <input type="text" name="destino" id="destino">
          Peso: <input type="number" name="peso" id="peso">  
          <input class="btn btn-primary" type="submit" value="Buscar">
        </form>
      </div>

      <br><br>
      <div class="container" align="center">

        <div class="card mb-3 col-md-12" style="max-width: 720px;" align="center">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="depositphotos_11506024-stock-photo-package.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Nombre de publicacion</h5>
                <p class="card-text">Detalles de la publicacion.......</p>
                <small class="text-body-secondary"><strong>Origen</strong>: ----</small> <small class="text-body-secondary"><strong>Destino</strong>: ----</small><br><br>
                <a href=""><button class="btn btn-primary">Ver detalles</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3 col-md-12" style="max-width: 720px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="depositphotos_11506024-stock-photo-package.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Nombre de publicacion</h5>
                <p class="card-text">Detalles de la publicacion.......</p>
                <small class="text-body-secondary"><strong>Origen</strong>: ----</small> <small class="text-body-secondary"><strong>Destino</strong>: ----</small><br><br>
                <a href=""><button class="btn btn-primary">Ver detalles</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3 col-md-12" style="max-width: 720px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="depositphotos_11506024-stock-photo-package.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Nombre de publicacion</h5>
                <p class="card-text">Detalles de la publicacion.......</p>
                <small class="text-body-secondary"><strong>Origen</strong>: ----</small> <small class="text-body-secondary"><strong>Destino</strong>: ----</small><br><br>
                <a href=""><button class="btn btn-primary">Ver detalles</button></a>
              </div>
            </div>
        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>