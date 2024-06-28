<?php
require_once './database/db_connection.php';
$genre = mysqli_query($koneksi, "SELECT * FROM tb_genre ORDER BY nama_genre ASC LIMIT 0, 5");
$film = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre ORDER BY rating_film DESC LIMIT 0, 10");
$film_genre_aksi = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '1' ORDER BY rating_film DESC");
$film_genre_komedi = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '2' ORDER BY rating_film DESC");
$film_genre_horror = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '3' ORDER BY rating_film DESC");
$film_genre_animasi = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '4' ORDER BY rating_film DESC");
$film_genre_drama = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '5' ORDER BY rating_film DESC");
$film_genre_petualangan = mysqli_query($koneksi, "SELECT * FROM tb_film INNER JOIN tb_genre ON tb_film.id_genre = tb_genre.id_genre WHERE tb_genre.id_genre = '6' ORDER BY rating_film DESC");

?>
<!DOCTYPE html>
<html>

<head>      
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Movie Holics</title>
  <?php include 'include/css.php'; ?>
</head>

<body style="background-image: url(assets/img/img_properties/bg-landing.jpg); background-size: cover; background-attachment: fixed;">
  <!-- adding navbar --->
  <?php include 'include/navbar.php'; ?>
  <!-- end navbar --->
  <br />
  <br />
  <br />
  <br />
  <div class="container px-4 rounded-bottom bg-dark">
    <div class="row mb-3 justify-content-center">
      <div class="col-lg my-2">
        <h3>New Trailers</h3>
        
        <!-- Carousel New Trailers -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7iZ3TjJxVp4?rel=0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="carousel-item">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mzIsfSsZh7I?rel=0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="carousel-item">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/elmmD3jTkuk?rel=0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="carousel-item">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mHNng3hb4co?rel=0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="carousel-item">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2-B7w5YpxUc?rel=0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="carousel-item">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/L2pDyY3rGI8?rel=0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>      
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="hottest">Hottest view TOP 10</h3>
        <div class="owl-carousel">
          <?php foreach ($film as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="action">Action Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_aksi as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="comedy">Comedy Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_komedi as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="horor">Horror Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_horror as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="animation">Animation Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_animasi as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="drama">Drama Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_drama as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-lg my-2">
        <h3 id="adventure">Adventure Genre's</h3>
        <div class="owl-carousel">
          <?php foreach ($film_genre_petualangan as $df) : ?>
            <?php if ($df == NULL) : ?>
              <h4>No Movies</h4>
            <?php else : ?>
              <div class="card">
                <a href="assets/img/img_films/<?= $df['cover_film']; ?>" class="enlarge">
                  <img src="assets/img/img_films/<?= $df['cover_film']; ?>" class="card-img-top" alt="Cover Film <?= $df['nama_film']; ?>">
                </a>
                <div class="card-body text-dark">
                  <h6 class="card-subtitle mb-2 text-warning">&#9733; <?= $df['rating_film']; ?></h6>
                  <?php
                  $length = strlen($df['nama_film']);
                  if ($length > 20) {
                    $show_nama_film = substr($df['nama_film'], 0, 20);
                    $show_nama_film .= '...';
                  } else {
                    $show_nama_film = $df['nama_film'];
                  }
                  ?>
                  <h5 style="height: 52px" class="my-auto"><?= $show_nama_film; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $df['tahun_film']; ?></h6>
                  <h6 class="card-subtitle mb-2"><?= $df['nama_genre']; ?></h6>
                  <a href="detail_film.php?id_film=<?= $df['id_film']; ?>" class="btn btn-primary"><i class="far fa-play-circle"></i> Watch</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php' ?>
  <?php include 'include/js.php'; ?>
</body>

</html>