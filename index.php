<?php

    // bagian pencarian film
	if(isset($_POST['cari'])) {
		$film = htmlspecialchars($_POST["film"]);
		if(!empty($_POST["film"])) {
			$sumber = "http://www.omdbapi.com/?apikey=b844798a&s='$film'";
			$konten = file_get_contents($sumber);
			$data = json_decode($konten,true);
			$data = $data["Search"];

		}
	}
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
            <a class="nav-link active" aria-current="page" href="#">Pencarian Film</a>
            <a class="nav-link" href="youtube.php">Pencarian Youtube</a>
        </div>
        </div>
    </div>
    </nav>
    <!-- penutup navbar -->

    <!-- form pencarian -->
    <form action="" method="POST">
        <div class="container">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukan Pencarian Film" name="film" id="film" aria-label="cari" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" name="cari" id="cari">Cari Film</button>
        </div>
		</div>
    </form>
    <!-- penutup form pencarian -->


    <!-- tampilan movie -->
    <?php if( isset($_POST["cari"]) && !empty($_POST["film"]) ) { ?>
		<div class="container">
        <div class="row">
            <?php foreach ($data as $row) : ?>
            <div class="col-md-4">
				<div class="card mb-3">
				<img src="<?= $row["Poster"]?>" class="card-img-top" alt="gambar">
				<div class="card-body">
				<h5 class="card-title"><?= $row["Title"]?></h5>
                
                <a class="btn btn-danger" href="youtube2.php?film=Trailer film <?= $row["Title"]; ?>">Cari Trailer Youtube</a> 
				<a class="btn btn-primary" href="datafilm.php?film2=<?= $row["Title"]; ?>">Cari Data Film</a> 

            </div>
			</div>
            </div>
			<?php endforeach; ?>
        </div>
		</div>
    <?php } ?>
    <!-- penutup movie -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	</body>
</html>
