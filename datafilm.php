<?php
    $film2 = htmlspecialchars($_GET["film2"]);
    $film2 = str_replace(' ', '+', strtolower($film2));
    $sumber2 = "http://www.omdbapi.com/?apikey=b844798a&t='$film2'";
    $konten2 = file_get_contents($sumber2);
    $data2 = json_decode($konten2,true);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body style="padding-top : 5rem">
    
    <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">WebEntertain</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Pencarian Film</a>
            <a class="nav-link" href="youtube.php">Pencarian Youtube</a>
        </div>
        </div>
    </div>
    </nav>
    <!-- penutup navbar -->

    <div class="container">        
        <div class="card">
        <h1 class="card-title"><center><?= $data2["Title"]?></center></h1>
        <img src='<?= $data2["Poster"]?>' class="card-img-top rounded mx-auto d-block"  style="width: 18rem; alt="gambar">
        <div class="card-body">
            <p class="card-text"><b>Genre :</b> <?= $data2["Genre"]?></p>
            <p class="card-text"><b>Actor :</b> <?= $data2["Actors"]?></p>
            <p class="card-text"><b>Writer :</b> <?= $data2["Writer"]?></p>
            <p class="card-text"><b>Tahun :</b> <?= $data2["Year"]?></p>
            <p class="card-text"><b>Rated :</b> <?= $data2["Rated"]?></p>
            <p class="card-text"><b>Released :</b> <?= $data2["Released"]?></p>
            <p class="card-text"><b>Rating :</b> <?= $data2["Ratings"][0]["Source"]?> : <?=$data2["Ratings"][0]["Value"] ?></p>
            <p class="card-text"><b>Plot :</b> <br><?= $data2["Plot"]?></p>
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
        </div>
    </div>



    <!-- penutup movie -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
