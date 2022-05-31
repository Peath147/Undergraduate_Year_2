<?php
require 'connect_PDO.php';

try {
if(isset($_POST['id'])){
//prepare
$sqle = "UPDATE MYGUESTS SET firstname=?, lastname=?, email=? WHERE id=?";
$stmt = $conn->prepare($sqle);
//bindParam
$stmt->bindParam(1,$_POST["firstname"]);
$stmt->bindParam(2,$_POST["lastname"]);
$stmt->bindParam(3,$_POST["email"]);
$stmt->bindParam(4,$_POST["id"]);
//Execute
$stmt->execute();
if($stmt == true){
echo "แก้ไขข้อมูลเรียบร้อย";
}else{
echo "แก้ไขข้อมูลไม่ได้";
}
} //end if
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;
?>