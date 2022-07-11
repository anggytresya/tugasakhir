<?php
//berfungsi untuk mengatur harus login dulu(jika belum login)
if(isset($_SESSION['log'])){


}else{
    header('location:login.php');
}
?>