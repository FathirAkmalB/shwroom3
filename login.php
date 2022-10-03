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
        <?php include 'assets/css/style.css'?>
    </style>
</head>
<body class="login">
    <main class="db card">
        <form action="" method="POST">
            <div class="r">
                <h2>Login</h2>
                <div class="logo"></div>
            </div>
            <div class="log">
                <div class="inputgrp">
                    <label for="username">
                        Username
                    </label>
                    <input type="email" placeholder="user@gmail.com" name="username">
                </div>
                <div class="inputgrp">
                <label for="Password">
                    Password
                </label>
                <input type="password" placeholder="*****" name="pass">                    
                </div>
            </div>
            <div class="btn">
                <a href="">Back</a>
                <input type="submit" name="login" value="Login">
            </div>
        </form>      
    </main>
</body>
</html>

    <?php 
    if(isset($_POST["login"])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if($username == "admin@gmail.com" && $pass == "1234"){
            echo "
            <script>
            document.location ='admin-product.php';
            </script>
            ";
        }else{
            echo "<script>
            alert('Username atau Password anda salah');
            </script>";
        }
    }
    ?>
</body>
</html>