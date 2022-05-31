<?php
require 'connect_PDO.php';

try {
  //SQL  Statement
  $sql = "SELECT * FROM MYGUESTS ";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a  Record for Table
  while ($row = $stmt -> fetch()){
    echo "รหัส: " . $row["id"] . "<br>";
    echo "ชื่อ: " . $row["firstname"] . "<br>";
    echo "นามสกุล: " . $row["lastname"] . "<br>";
    echo "อีเมล: " . $row["email"] . "<br>";
    echo "<a href='UpdateForm.php?id=" .$row["id"] . "'>Update</a>";
    echo "<hr>\n";
  }
  } catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
