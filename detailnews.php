<?php 
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM info WHERE id = '$id'");

$data = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query)<1){
    die("data tidak ditemukan pada database");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'assets/css/style.css'?>
    </style>
</head>
<body class="db">
    <main class="new">
        <a href="index.php#news"><- Back</a>
        <img src="img/<?=$data['img']?>" alt="">
        <div class="txt">
        </div>
        <div class="div">
            <h3><?=$data['sub_judul']?></h3>
            <h6><?=$data['deskripsi']?></h6>
        </div>
    </main>
</body>
</html>