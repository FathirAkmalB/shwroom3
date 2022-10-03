<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'assets/CSS/style.css'?>
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="menu">
                <a href="admin-product.php">Our Product</a>
                <a href="admin-event.php" class="activate">News</a>
            </div> 
        </div>
        <div class="for">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="cont">
                    <label class="file" for="carimg">
                        Image
                        <input type="file" name="img">
                    </label>
                <div class="co"> 
                    <input type="text" placeholder="Title..." name="judul">                  
                    <input type="text" placeholder="Sub Title..." name="sub_judul">                  
                    <textarea placeholder="input here..." name="deskripsi" id=""></textarea>
                </div>
                <!-- button -->
                <input type="submit" name="kirim">                 
                </div>
            </form>

            <?php 
            if(isset($_POST['kirim'])){
                $judul = $_POST['judul'];
                $sub_judul = $_POST['sub_judul'];
                $img = $_FILES['img']['name'];
                $deskripsi = $_POST['deskripsi'];

                $img_tmp = $_FILES['img']['tmp_name'];

                move_uploaded_file($img_tmp, "img/$img");

                $query = mysqli_query($koneksi, "INSERT INTO info VALUES('', '$judul', '$sub_judul', '$deskripsi', '$img', 'up')");

                if($query){
                    echo "
                    <script>
                    document.location = 'admin-event.php';
                    </script>
                    ";
                }else{
                    header("Location: create_event.php?status='gagal'");
                }
            }
            ?>

        </div>   
    </div>
</body>
</html>