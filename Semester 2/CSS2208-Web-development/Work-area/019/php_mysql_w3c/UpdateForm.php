<?php
require 'connect_PDO.php';

try {
//SQL Statement
  $sql = "SELECT * FROM MYGUESTS  WHERE id=?";

  // Prepare statement
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1,$_GET["id"]);  //นำค่า id ที่ส่งมากับ URL มากำหนดเป็นเงื่อนไข

  // execute the query
  $stmt->execute();
  $row = $stmt->fetch();  //ดังผลลัพธ์ (จะได้ข้อมูลเพียง 1 แถว)
  ?>
  <form method="post" action="Update02_DB_PDO.php">
<input type="hidden" name="id" value="<?= $row["id"]?>">
ชื่อ <input type="text" name="firstname" value="<?= $row["firstname"];?>" /><br>
นามสกุล <input type="text" name="lastname" value="<?= $row["lastname"];?>" /><br>
อีเมล <input type="text" name="email" value="<?= $row["email"];?>" /><br>
<input type="submit" value="Update">
</form>
<?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
