<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'assets/CSS/Style.css'?>
    </style>
</head class="diam">
<body class="diam">
    <div class="container">
        <div class="sidebar">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="menu">
                <a  href="admin-product.php">Our Product</a>
                <a class="activate" href="admin-event.php">News</a>
            </div> 
        </div>
        <div class="min diam">
        <a href="create_event.php">Create New</a>
        <?php 
    $ts = query("SELECT * FROM info WHERE status = 'up' GROUP BY id DESC LIMIT 4");

    $col = count($ts);
    if($col == 4):?>
    <main class="layout4">
    <?php elseif($col == 3): ?>
    <main class="layout3">
    <?php elseif($col == 2) :?>
    <main class="layout2">
    <?php elseif($col == 1) : ?>
    <main class="layout">
    <?php 
    endif;
    $row = mysqli_query($koneksi, "SELECT * FROM info WHERE status = 'up' GROUP BY id DESC LIMIT 4");
    while($ulang = mysqli_fetch_array($row)) :?>
        
        <div class="boxevent">
            <img src="img/<?=$ulang['img']?>" alt="">
            <div class="tex">
                <h2><?=$ulang['judul']?></h2>
                <h6><?=$ulang['sub_judul']?></h6>
                <a href="hapus_event.php?id=<?=$ulang['id']?>">Delete</a>
                <a href="edit_event.php?id=<?=$ulang['id']?>">Edit</a>
            </div>
        </div>
    <?php endwhile ?>
    </main>
    </div>
    </div>
</body>

</html>