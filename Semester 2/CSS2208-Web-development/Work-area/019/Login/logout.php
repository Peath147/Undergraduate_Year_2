<?php
session_start();
if(isset($_SESSION)){
    session_destroy(); //ทำลายข้อมูล SESSION ทิ้งไป
    header('location:login.php');
    exit();
}
?>