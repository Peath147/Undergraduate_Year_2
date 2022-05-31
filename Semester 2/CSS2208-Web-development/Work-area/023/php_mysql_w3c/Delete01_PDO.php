<?php
require 'connect_PDO.php';

try {
  // sql to delete a record
  $sql = "DELETE FROM CUSTOMER_TBL WHERE cid=235";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>