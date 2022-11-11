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
    <!-- enlaces para cambiar de pagina -->
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
<p class="display-3 text-center" > Episodios </p>

<center>
<img src = "https://pngimage.net/wp-content/uploads/2018/06/rick-and-morty-logo-png-3.png"></img>
</center>
    

<div class = "container">
   
   
        <div class = " d-flex flex-wrap justify-content-araound text-center">
            <?php
            function episodios($num){
        
                $Episodio = curl_init();

                curl_setopt ($Episodio, CURLOPT_URL, "https://rickandmortyapi.com/api/episode?page=$num");
                curl_setopt ($Episodio, CURLOPT_RETURNTRANSFER, true);
                curl_setopt ($Episodio, CURLOPT_HEADER, 0);

                $Episodios = curl_exec($Episodio);
                $Epi = json_decode($Episodios);

                foreach($Epi->results as $episodio){
                    echo" <div class='card mb-2 bg-white col-xl-4 border border-4 border-danger text-center text-dark'>";
                    echo "<div>{$episodio->id}</div>";
                    echo "<div>{$episodio->name}</div>";
                    echo "<div>{$episodio->air_date}</div>";
                    echo "<div>{$episodio->episode}</div>";
                    echo "</div>";
                }
           }

            for($i = 1; $i <= 3; $i++){
                episodios($i);
            }
            ?>
            <!-- <form action = "" metho = "post" >;
                <input type="submit" value="Mostrar más episodios" name = "contador">

            </form> -->

            <!-- <button type="button" class="btn btn-outline-danger p-2 col-12">Mostar más episodios</button> -->

        </div>
    
</div>
</body>
</html>