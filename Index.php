<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <title>Ricky y Morty</title>
</head>
    
<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link Home" aria-current="page" href="Index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Episodios.php">Episodios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Personajes.php">Personajes</a>
  </li>
  
</ul>
<center>
<img src = "https://pngimage.net/wp-content/uploads/2018/06/rick-and-morty-logo-png-3.png"></img>
</center>
    

<div class = "container">
   
    <div class = "row">

            <?php

            //curl para los episodios

            $episodio = curl_init();
            curl_setopt($episodio, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/1");
            curl_setopt ($episodio, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($episodio, CURLOPT_HEADER, 0);
            $epi= curl_exec($episodio);
            $episodios = json_decode($epi, true);
            $episo = $episodios['characters'];

            //curld para el episodio
            foreach($episo as $episodi){
                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_URL, $episodi);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                $dato1 = curl_exec($ch1);
                $datos1 =  json_decode($dato1, true);
                curl_close($ch1);
                
                echo" <div class='card mb-2 p-3 bg-white col-xl-3 border border-4 border-danger text-center text-dark'>
                <img src='$datos1[image] 'class ='mb-2 p-2 ' >".'<br>';
                echo $datos1['name'].'<br>';
                echo $datos1['status'].'<br>';
                echo $datos1['species'].'<br>';
                echo $datos1['type'].'<br>';
                echo $datos1['gender'].'<br>'.'</div>';
                
            }
            ?>
        
    </div>
</div >
</body>
</html>