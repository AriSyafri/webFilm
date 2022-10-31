<?php

    $film = htmlspecialchars($_GET["film"]);
    $film = str_replace(' ', '+', strtolower($film));

    $sumber = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyBHRV-rLqOnHnD8iO2TvlSDdRUeFJQyc90&part=snippet&maxResults=25&type=video&q=$film";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten,true);
    $data = $data['items'];
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>WebEntertain</title>
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
            <a class="nav-link" href="index.php">Pencarian Film</a>
            <a class="nav-link active" aria-current="page" href="youtube.php">Pencarian Youtube</a>
        </div>
        </div>
    </div>
    </nav>
    <!-- penutup navbar -->

    <!-- form pencarian -->
    <div class="container">
        <h1>Hasil pencarian</h1>
    </div>
    <!-- penutup form pencarian -->


        <!-- tampilan movie -->
		<div class="container">
        <div class="row">
            <?php foreach ($data as $row) : ?>
            <div class="col-md-4">
				<div class="card mb-3">
				<img src="<?= $row['snippet']['thumbnails']['medium']['url']?>" class="card-img-top" alt="...">
				<div class="card-body">
				<h5 class="card-title"><?= $row["snippet"]["title"]?></h5>
				<p class="card-text">Channel <?= $row["snippet"]["channelTitle"]?></p>
				<a href="https://www.youtube.com/watch?v=<?= $row['id']['videoId']?>" class="btn btn-primary" target="_blank">Youtube</a>
				</div>
			</div>
            </div>
			<?php endforeach; ?>
        </div>
		</div>
    <!-- penutup movie -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	</body>
</html>
