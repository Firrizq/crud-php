<?php

$con = mysqli_connect("localhost","root","","crud-simpel");

$data = mysqli_query($con,"SELECT * FROM film");
// while ($row = mysqli_fetch_assoc($data)){
//     $rows[]=$row;
// }

function query($query){
    global $con;
    $result = mysqli_query($con,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

$films = query("SELECT * FROM film")
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>list film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

<body class="p-4">
    <h1>Daftar film</h1>

    <div class="container">
        <!-- Modal tambah data -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Film
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahDataLabel">Tambahkan Film</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul">
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <br>
                                <input type="radio" id="comedy" name="genre" value="comedy">
                                <label for="comedy">comedy</label><br>
                                <input type="radio" id="action" name="genre" value="action">
                                <label for="action">action</label><br>
                                <input type="radio" id="romance" name="genre" value="romance">
                                <label for="romance">romance</label><br>
                                <input type="radio" id="documentary" name="genre" value="documentary">
                                <label for="documentary">documentary</label><br>
                                <input type="radio" id="sci-fi" name="genre" value="sci-fi">
                                <label for="sci-fi">sci-fi</label><br>
                                <input type="radio" id="fiction" name="genre" value="fiction">
                                <label for="fiction">fiction</label><br>
                                <input type="radio" id="fantasy" name="genre" value="fantasy">
                                <label for="fantasy">fantasy</label><br>
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" name="durasi" class="form-control" id="durasi">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" name="rating" class="form-control" id="rating">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="btnTambahFilm">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir modal tambah data -->
        <table class="table table-striped">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">judul</th>
                        <th scope="col">genre</th>
                        <th scope="col">durasi</th>
                        <th scope="col">rating</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    <?php foreach ($films as $film){ ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $film["judul"] ?></td>
                        <td><?= $film["genre"] ?></td>
                        <td><?= $film["durasi"] ?></td>
                        <td><?= $film["rating"] ?></td>
                        <td>
                            <a type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#btnHapus<?= $film["id"] ?>">Hapus</a>
                            <a type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#btnUbah<?= $film["id"] ?>">Ubah</a>
                        </td>

                    </tr>
                    <!-- Modal Hapus -->
                    <div class=" modal fade" id="btnHapus<?= $film["id"] ?>" tabindex="-1"
                        aria-labelledby="btnHapusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="btnHapusLabel">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>Yakin menghapus film <strong><?= $film["judul"] ?></strong>?</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $film["id"] ?>">
                                        <button type="submit" name="btnHapus" class="btn btn-danger">Hapus</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir modal hapus -->
                    <!-- modal ubah -->
                    <div class="modal fade" id="btnUbah<?= $film["id"] ?>" tabindex="-1"
                        aria-labelledby="tambahDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambahDataLabel">Ubah Data Film</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" name="judul" class="form-control" id="judul"
                                                value="<?= $film["judul"] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="genre" name="genre" class="form-label">Genre</label>
                                            <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="comedy") echo "checked";?>
                                                value="comedy"> comedy <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="action") echo "checked";?>
                                                value="action"> action <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="romance") echo "checked";?>
                                                value="romance"> romance <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="documentary") echo "checked";?>
                                                value="documentary"> documentary <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="sci-fi") echo "checked";?>
                                                value="sci-fi"> sci-fi <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="fiction") echo "checked";?>
                                                value="fiction"> fiction <br>
                                            <input type="radio" name="genre"
                                                <?php if (isset($genre) && $genre=="fantasy") echo "checked";?>
                                                value="fantasy"> fantasy <br>
                                        </div>
                                        <div class="mb-3">
                                            <label for="durasi" class="form-label">Durasi</label>
                                            <input type="text" name="durasi" class="form-control" id="durasi"
                                                value="<?= $film["durasi"] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Rating</label>
                                            <input type="text" name="rating" class="form-control" id="rating"
                                                value="<?= $film["rating"] ?>">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <input type="hidden" name="id" value="<?= $film["id"] ?>">
                                    <button type="submit" class="btn btn-primary" name="btnUbahFilm">Ubah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal ubah -->
                    <?php
                $i++
                ?>
                    <?php
                };
                ?>

                </tbody>
            </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<!-- langkah membuaf fungsi create, update, delete -->
<!-- 1. membuat tombol : untuk amsuk ke form (modal) -->
<!-- 2. membuat form : intuk mengirim data (harus beratribut method dan action()) -->
<!-- 3. mengecek apakah tombolsudah ditekan atau belum -->
<!-- 4. menangkap data yang dikirim dari form -->
<!-- 5. membuat query database -->
<!-- redirek ke halaman itu sendiri agar terlihat perbahannya -->
<!--  -->


<!-- catatan -->
<!-- 1. tabmabhkan input id ketika membuat update -->
<!-- 2. untuk meminimalisir kesalahan query make mysql saja -->


<?php 
if(isset($_POST["btnHapus"])){
    $id = $_POST["id"];
    mysqli_query($con,"DELETE FROM film WHERE id = $id");
    header ("location: film.php");
    echo 
    "<script>
        document.location.href='film.php';
    </script>";
}
    

if(isset($_POST["btnTambahFilm"])){
    $judul = $_POST["judul"];
    $genre = $_POST["genre"];
    $durasi = $_POST["durasi"];
    $rating = $_POST["rating"];

    mysqli_query($con,"INSERT INTO `film`(`id`, `judul`, `genre`, `durasi`, `rating`) VALUES ( NULL,'$judul','$genre','$durasi','$rating')"); 
    echo 
    "<script>
        document.location.href='film.php';
    </script>";
};

if(isset($_POST["btnUbahFilm"])){
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $genre = $_POST["genre"];
    $durasi = $_POST["durasi"];
    $rating = $_POST["rating"];
    

    mysqli_query($con,"UPDATE `film` SET `judul`='$judul',`genre`='$genre',`durasi`='$durasi',`rating`='$rating' WHERE id = $id");
    echo 
    "<script>
        document.location.href='film.php';
    </script>";
};
?>