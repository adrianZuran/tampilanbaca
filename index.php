<?php
require "koneksi.php";
$buku = mysqli_query($koneksi, "SELECT  tb_buku.*, (SELECT GROUP_CONCAT(nama_genre SEPARATOR ', ') FROM tb_buku_genre INNER JOIN tb_genre ON tb_buku_genre.id_genre = tb_genre.id_genre WHERE tb_buku_genre.id_buku = tb_buku.id_buku) as nama_genre, tb_user.username
                                  FROM tb_buku 
                                  INNER JOIN tb_user ON tb_buku.id_user = tb_user.id_user
                                  ORDER BY tb_buku.nama_buku ASC");
$books = mysqli_query($koneksi, "SELECT  tb_buku.*, (SELECT GROUP_CONCAT(nama_genre SEPARATOR ', ') FROM tb_buku_genre INNER JOIN tb_genre ON tb_buku_genre.id_genre = tb_genre.id_genre WHERE tb_buku_genre.id_buku = tb_buku.id_buku) as nama_genre, tb_user.username
                                  FROM tb_buku
                                  INNER JOIN tb_user ON tb_buku.id_user = tb_user.id_user
                                  ORDER BY tb_buku.nama_buku ASC LIMIT 5");
$book = mysqli_query($koneksi, "SELECT  tb_buku.*, (SELECT GROUP_CONCAT(nama_genre SEPARATOR ', ') FROM tb_buku_genre INNER JOIN tb_genre ON tb_buku_genre.id_genre = tb_genre.id_genre WHERE tb_buku_genre.id_buku = tb_buku.id_buku) as nama_genre, tb_user.username
                                  FROM tb_buku
                                  INNER JOIN tb_user ON tb_buku.id_user = tb_user.id_user
                                  ORDER BY tb_buku.nama_buku DESC
                                  
                                   LIMIT 8");

$genre = mysqli_query($koneksi, "SELECT * FROM tb_genre ORDER BY nama_genre ASC");

$query = "SELECT * FROM tb_buku";
$result = mysqli_query($koneksi, $query);
$genre = mysqli_query($koneksi, "SELECT * FROM tb_genre ORDER BY nama_genre ASC");
$selectedGenres = array();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="owl_carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl_carousel/owl.theme.default.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="col-12 bg-light p-2 d-flex justify-content-center">
        <div class="container d-flex row justify-content-center align-items-center">
            <div class="col-lg-3 col-sm-6 col-6 ">
                <img src="assets/asset/logo-bacacuy.png" class="logo me-auto ms-auto d-block" width="70%" alt="">
            </div>
            <div class="col-lg-6  d-sm-none d-md-block d-none">
                <div class="d-flex align-items-center justify-content-evenly">
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Terbaru</a></span>
                    <span class="fs-4">|</span>
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Favorit</a></span>
                    <span class="fs-4">|</span>
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Menarik</a></span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-12 ">
                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12  d-sm-none d-block">
                <div class="d-flex align-items-center justify-content-evenly">
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Terbaru</a></span>
                    <span class="fs-4">|</span>
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Favorit</a></span>
                    <span class="fs-4">|</span>
                    <span class="fs-4 nav-item"><a class="nav-link" href="#">Menarik</a></span>
                </div>
            </div>
        </div>
    </header>
    <nav class="col-12 bg-light p-1 mb-2">
        <div class="container">
            <div class="container d-flex d-md-flex align-items-center justify-content-center overflow-y-new">
                <?php foreach ($genre as $dg): ?>
                    <button class="btn btn-danger m-1 w-50 fs-7"><a class="nav-link" href="#">
                            <?= ucwords($dg['nama_genre']); ?>
                        </a></button>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>
    <main class="col-12 container mt-4">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/asset/gambar1.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/asset/gambar2.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/asset/gambar3.jpeg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>
    <section class="col-12 container mt-4">
        <div class="row my-5">
            <h1 class="text-center">Terbaru</h1>
            <p class="fw-light w-75 mx-auto text-center">Buku adalah kunci menuju dunia yang tak terbatas, di mana
                imajinasi dan pengetahuan bertemu.</p>
        </div>
        <div class="container row">
            <?php foreach ($books as $tb): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="card card-body container " style="max-height:80%; overflow:hidden;">
                        <img class="img-list-cover" style="height:250px; width:100%;"
                            src="assets/img/img_buku/<?= $tb['cover_buku']; ?>" alt="<?= $tb['cover_buku']; ?>">
                        <span class="fs-3">
                            <?= $tb["nama_buku"]; ?>
                        </span>
                        <p class="fs-7 text-center">
                            <?= ucwords($tb['nama_genre']); ?>
                        </p>
                        <p class="fs-7 text-center ">
                            -
                            <?= $tb['penulis_buku']; ?> -
                        </p>
                        <button class="button-readmore btn btn-light nav-item"><a class="nav-link" href="#">View
                                More</a></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="container">
        <div class="row my-5">
            <h1 class="text-center">Favorit</h1>
            <p class="fw-light w-75 mx-auto text-center">"Makin banyak membaca, makin aku banyak berpikir, makin aku
                banyak belajar, makin aku sadar bahwa aku tak mengetahui apa pun.</p>
        </div>

        <div class="row g-1 my-5 mx-auto owl-carousel owl-theme">
            <?php foreach ($book as $bf): ?>
                <div class="col product-item mx-auto p-1">
                    <div class="product-img">
                        <img width="200px" height="400px" src="assets/img/img_buku/<?= $bf['cover_buku']; ?>" alt="<?= $bf['cover_buku']; ?> " alt=""
                            class="d-block mx-auto">
                        <div class="row btns w-100 mx-auto text-center">
                            <button type="button" class="col-12 py-2">
                                <i class="fa fa-binoculars"></i> View
                            </button>
                        </div>
                    </div>

                    <div class="product-info p-3">
                        <span class="product-type m-auto d-block text-center">
                            <?= $bf["nama_buku"]; ?>
                        </span>
                        <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"></a>
                        <div class="rating d-flex mt-1 align-items-center justify-content-center">
                            <p class="text-center">Ratting : <?= ucwords($bf['rating_buku']); ?> / 10</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="col-12 container">
        <div class="row my-5">
            <h1 class="text-center">Menarik</h1>
            <p class="fw-light w-75 mx-auto text-center">Buku adalah kunci menuju dunia yang tak terbatas, di mana
                imajinasi dan pengetahuan bertemu.</p>
        </div>
        <div class="container overflow-x-scroll border d-flex">
            <?php foreach($buku as $bm): ?>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 m-2">
                <div class="card card-body container ">
                    <img src="assets/img/img_buku/<?= $bm['cover_buku']; ?>" alt="<?= $bm['cover_buku']; ?>" style="height:250px; width:100%;" alt="Banner">
                    <span class="fs-3"><?= $bm["nama_buku"]; ?></span>
                    <p class="fs-7 text-center">
                            <?= ucwords($bm['nama_genre']); ?>
                        </p>
                        <p class="fs-7 text-center ">
                            -
                            <?= $bm['penulis_buku']; ?> -
                        </p>
                        <button class="button-readmore btn btn-light nav-item"><a class="nav-link" href="#">View
                                More</a></button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </section>
    <footer class="col-12 bg-light mt-5 p-5">
        <div
            class="container col-lg-5 col-sm-8 col-12 d-block align-items-center justify-content-center d-flex flex-column">
            <img src="assets/asset/logo-bacacuy.png" class="w-75 me-auto ms-auto d-flex" alt="">
            <span class="fs-7 text-center">Copyright &copy;BacaCuy.com -BacaCuy Situs baca Komik </span>
        </div>
    </footer>







    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- owl carousel -->
    <script src="owl_carousel/owl.carousel.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
    </script>

</body>

</html>