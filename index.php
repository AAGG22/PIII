<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeryDeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <!-- Contenido de todo el index-->
<div class="container-fluid" id="contenido">


    <!-- BarraNavegacion-->

<nav class="navbar navbar-expand-lg bg-body-tertiary container-fluid d-flex justify-content-between align-items-center" id="navBar">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="Imagenes/logoVeryDeli.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
      <span class="ms-2">VeryDeli</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ms-3" id="navbarScroll">
      <form class="d-flex me-auto" role="search" id="buscar">
        <input class="form-control me-2" type="search" placeholder="Buscar publicación" aria-label="Buscar publicación" id="barraBusqueda">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <ul class="navbar-nav ms-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Registrarse</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- publicacionesDestacadas(3 de usuarios mejores puntuados)-->

  <div id="pubDestacadas" class="container-fluid">

  <div class="row justify-content-center m-4">
    
  <div class="container-fluid">
  <div class="row">
    <div class="card col-lg-3 col-md-4 col-12 mx-3 mb-3"> 
      <div class="card-body container">
        <div class="row align-items-center">
          <div class="col-3">
            <img src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png" alt="" class="card-img-left" style="width:50px; height: auto; object-fit: cover;">
          </div>
          <div class="col-8 d-flex">
            <h5 class="card-title text-center">Titulo</h5>
          </div>
        </div>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugiat dolorem quidem inventore minus! Optio sunt molestiae vero in eos?</p>
        <a href="#" class="btn btn-info">Postularme</a>
      </div>
    </div>

    <div class="card col-lg-3 col-md-4 col-12 mx-3 mb-3">
      <div class="card-body container">
        <div class="row align-items-center">
          <div class="col-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg-k4aMIE4Y-ok7X2N5kFvquh3K9scHC9D0wlcv4t_KDhRChwrlX7DVxzOHLd3_Kz5un4&usqp=CAU" alt="" class="card-img-left" style="width:50px; height: auto; object-fit: cover;">
          </div>
          <div class="col-8 d-flex">
            <h5 class="card-title text-center">Titulo</h5>
          </div>
        </div>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugiat dolorem quidem inventore minus! Optio sunt molestiae vero in eos?</p>
        <a href="#" class="btn btn-info">Postularme</a>
      </div>
    </div>

    <div class="card col-lg-3 col-md-4 col-12 mx-3 mb-3">
      <div class="card-body container">
        <div class="row align-items-center">
          <div class="col-3">
            <img src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png" alt="" class="card-img-left" style="width:50px; height: auto; object-fit: cover;">
          </div>
          <div class="col-8 d-flex">
            <h5 class="card-title text-center">Titulo</h5>
          </div>
        </div>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugiat dolorem quidem inventore minus! Optio sunt molestiae vero in eos?</p>
        <a href="#" class="btn btn-info">Postularme</a>
      </div>
    </div>
  </div>
</div>


    

  </div>
</div>



    <!-- publicacionesRecientes(ultimas 5)-->
<div id="pubRecientes">


<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg-k4aMIE4Y-ok7X2N5kFvquh3K9scHC9D0wlcv4t_KDhRChwrlX7DVxzOHLd3_Kz5un4&usqp=CAU" alt="" class="card-img-left" style="width: 150px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>

<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png" alt="" class="card-img-left" style="width: 150px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg-k4aMIE4Y-ok7X2N5kFvquh3K9scHC9D0wlcv4t_KDhRChwrlX7DVxzOHLd3_Kz5un4&usqp=CAU" alt="" class="card-img-left" style="width: 150px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png" alt="" class="card-img-left" style="width: 150px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 50%;">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg-k4aMIE4Y-ok7X2N5kFvquh3K9scHC9D0wlcv4t_KDhRChwrlX7DVxzOHLd3_Kz5un4&usqp=CAU" alt="" class="card-img-left" style="width: 150px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>



</div>


</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>