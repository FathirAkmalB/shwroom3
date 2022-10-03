<?php

include "koneksi.php";
session_start();
?>
<table  align="center">
    <form action="login2.php" method="post">
        <tr>
            <th colspan="2" height="40">
                <p style="font-size: 20px; font-weight: bold;">Login Form</p>
            </th>
        </tr>
        <tr>
            <td width="100"> Username </td>
            <td> <input type="text" required="required" name="username"></td>
        </tr>
        <tr>
            <td> Password </td>
            <td> <input type="password" required="required" name="pass"> </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><input type="submit" value="Login" name="proseslog"></td>
            <td><a href="register/register.php">Daftar</a></td>
        </tr>
    </form>

    <?php 
    if(isset($_POST['proseslog'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' and pass =  '$pass'");

        $cek = mysqli_num_rows($data);
        // var_dump($data);
        // die;

        if($cek > 0){
            $_SESSION['username'] = $_POST['username'];

            echo "<meta http-equiv=refresh content=1;URL='admin-product.php'>";
        }else{
            echo "<p align=center><b> Username atau Password anda salah!! </b></p>";
            echo "<meta http-equiv=refresh content=2;URL='login2.php'>";
        }
    }



    ?>

    <?php  ?>

</table>