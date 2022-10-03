<?php 

include "koneksi.php"; 

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM info WHERE id = '$id'");

$data = mysqli_fetch_array($query);

if(mysqli_num_rows($query)<1){
    die("Tidak ada data");
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
                    <input type="text" placeholder="Title..." name="judul" value="<?=$data['judul']?>">                  
                    <input type="text" placeholder="Sub Title..." name="sub_judul" value="<?=$data['sub_judul']?>">                  
                    <textarea placeholder="input here..." name="deskripsi" id=""><?=$data['deskripsi']?></textarea>
                </div>
                <!-- button -->
                <input type="submit" name="kirim" onclick="return confirm('apakah anda yakin ingin mengubah data berikut?')">                 
                </div>
            </form>


    <?php 
    if(isset($_POST['kirim'])){
        $img = $_FILES['img']['name'];
        $judul = $_POST['judul'];
        $sub_judul = $_POST['sub_judul'];
        $deskripsi = $_POST['deskripsi'];

        $img_tmp = $_FILES['img']['tmp_name'];

        move_uploaded_file($img_tmp, "img/$img");

        if($img != ""){
            $result = mysqli_query($koneksi, "UPDATE info SET judul = '$judul', sub_judul='$sub_judul',deskripsi = '$deskripsi', img = '$img', status ='up' WHERE id = '$id'");
        }else{
            $result = mysqli_query($koneksi, "UPDATE info SET judul = '$judul', sub_judul='$sub_judul',deskripsi = '$deskripsi', status ='up' WHERE id = '$id'");
        }

        if($result){
            echo "
            <script>
            document.location = 'admin-event.php';
            </script>
            ";
        }else{
            header("Location: create-event.php?status='gagal'");
        }
    }
    // var_dump($result);
    // die;
    ?>
</body>
</html>