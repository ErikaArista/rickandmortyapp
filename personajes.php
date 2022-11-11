<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/main.css">
    <title>Document</title>
</head>
<body>
<ul class="nav nav-tabs">
<li class="nav-item">
    <a class="nav-link Home" aria-current="page" href="index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="episodios.php">Episodios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="personajes.php">Personajes</a>
  </li>
  
</ul>
<p class="display-3 text-center" > Personajes </p>

<center>
<img src = "https://pngimage.net/wp-content/uploads/2018/06/rick-and-morty-logo-png-3.png"></img>
</center> 

<div class = "container">
  <div class = "row">
      <div class = "col-8">
          <nav class="navbar  bg-light">
            <?php
            if(!isset($_GET['IdEpisodio'])){
              $_GET['IdEpisodio'] = 1;
            }
            ?>
            <div class="container-fluid">
              <form class="d-flex" method="get"  >
                <input class="form-control me-2" type="number" name="IdEpisodio" placeholder="Buscar personaje " min="1" max="51" >
                <button class="btn btn-outline-success" type="submit">Buscar </button>
              </form>
        
              <?php
              $episodio = curl_init();
              curl_setopt($episodio, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/{$_GET['IdEpisodio']}");
              curl_setopt ($episodio, CURLOPT_RETURNTRANSFER, true);
              curl_setopt ($episodio, CURLOPT_HEADER, 0);
              $epi= curl_exec($episodio);
              $episodios = json_decode($epi, true);
              $episo = $episodios['characters'];

              //curld para las caracteristicas de los personajes
              foreach($episo as $episodi){
                  $ch1 = curl_init();
                  curl_setopt($ch1, CURLOPT_URL, $episodi);
                  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                  $dato1 = curl_exec($ch1);
                  $datos1 =  json_decode($dato1, true);
                  curl_close($ch1);
                  
                  echo" <div class='card mb-2 p-3 bg-white col-xl-4 border border-4 border-danger text-center text-dark'>
                  <img src='$datos1[image] 'class ='mb-2 p-2 ' >".'<br>';
                  echo $datos1['name'].'<br>';
                  echo $datos1['status'].'<br>';
                  echo $datos1['species'].'<br>';
                  echo $datos1['type'].'<br>';
                  echo $datos1['gender'].'<br>'.'</div>';
                  
              }

              ?>
      
          </nav>
          </div>
          <div class = "col-4">
                <section class = "Recomendaciones y Caracteristicas">
                  <div class = "">
                    <?php
                    // personajes aleatorios
                    $personaje1 = rand(1, 826);
                    $personaje2 = rand(1, 826);
                    $personaje3 = rand(1, 826);

                    $diferentes = "https://rickandmortyapi.com/api/character/"."[".$personaje1. ",".$personaje2. ",".$personaje3."]";
                    $ch = curl_init();
                    curl_setopt ($ch, CURLOPT_URL, $diferentes);
                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt ($ch, CURLOPT_HEADER, 0);
                    $dato = curl_exec($ch);
                    $datos = json_decode($dato);

                    // datos de los personajes aleatorios

                    foreach($datos as $dato){
                    echo "<div class = 'mt-5 text-center'>";
                    echo "<div class=' card bg-white col-xl-8 border border-4 border-danger text-center text-dark'>
                    <img src='$dato->image'>";
                    echo "<h5>Name: $dato->name</h5>";
                    echo "<h5>Id: $dato->id</h5>";
                    echo "<h5>Estatus: $dato->status</h5>";
                    echo "<h5>Especie: $dato->species</h5>";
                    echo "<h5>Genero: $dato->gender</h5>";
                    echo "</div>";
                    }
                    ?> 
                  </div>
                </section>
         </div>
    </div>
</div>
</body>
</html>