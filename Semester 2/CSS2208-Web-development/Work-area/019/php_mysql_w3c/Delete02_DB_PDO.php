<?php
require 'connect_PDO.php';

try {
//prepare
$sql = "DELETE FROM CUSTOMER_TBL WHERE CID=?";
$stmt = $conn->prepare($sql);
//Bind
$stmt->bindParam(1,$_GET["cid"]); //กำหนดค่าให้กับตำแหน่ง ?

if($stmt->execute())    //เริ่มลบข้อมูล
    header("location: Delete02_PDO.php"); //กลับไปแสดงผลข้อมูล

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;
?>