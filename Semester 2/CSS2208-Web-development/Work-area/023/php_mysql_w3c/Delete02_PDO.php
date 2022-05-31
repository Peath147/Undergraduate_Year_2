<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมลบข้อมูล</title>
    <script>
        function confirmDelete(cid){  //ฟังก์ชันจะถูกเรียกใช้ถ้าผู้ใช้คลิกที่ลิงค์ Delete
            var ans = confirm("ต้องการลบลูกค้ารหัส " + cid);  //แสดงกล่องถามผู้ใช้
            if(ans == true) //ถ้าผู้ใช้กด OK จะเข้าเงื่อนไขนี้
                document.location = "Delete02_DB_PDO.php?cid=" + cid; //ส่งรหัสสินค้า               
        }
    </script>
</head>
<body>
    
<?php
require 'connect_PDO.php';

try {
  //SQL  Statement
  $sql = "SELECT * FROM CUSTOMER_TBL ";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a  Record for Table
  while ($row = $stmt -> fetch()){
    echo "รหัสลูกค้า: " . $row["cid"] . "<br>";
    echo "ชื่อลูกค้า: " . $row["cname"] . "<br>";
    echo "ที่อยู่: " . $row["address"] . "<br>";
    echo "เบอร์โทรศัพท์: " . $row["telephone"] . "<br>";
    echo "วงเงินเครดิต: " . $row["credit_lim"] . "<br>";
    echo "วงเงินคงเหลือ: " . $row["curr_bal"] . "<br>";
        echo "<a href='#' onclick='confirmDelete(" .$row["cid"].")'>Delete</a>";
    echo "<hr>\n";
  }
  } catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
</body>
</html>