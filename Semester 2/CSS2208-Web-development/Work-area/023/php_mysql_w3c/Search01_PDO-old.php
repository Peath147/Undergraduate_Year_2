<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมค้นข้อมูล</title>
</head>

<body>
<?php
    // set Data in input text
    $cid = "";
    $cname = "";
    $address = "";
    $telephone = "";
    $credit_lim = "";
    $curr_bal = "";
    
    //ตรวจสอบการ post
    if (isset($_POST['Find'])) {
        require 'connect_PDO.php';
        try {
            //SQL  Statement
            $sql = "SELECT * FROM CUSTOMER_TBL  WHERE CID=?";
            // echo $_POST["cid"];
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // bindParam
            $stmt->bindParam(1, $_POST["cid"]); //กำหนดค่าให้กับตำแหน่ง ?
            // execute the query
            $stmt->execute();

            // echo a  Record for Table
            if($stmt){
           $row = $stmt->fetch();
            $cid =$row["cid"];
            $cname=$row["cname"];
            $address = $row["address"];
            $telephone = $row["telephone"];
            $credit_lim =  $row["credit_lim"];
            $curr_bal = $row["curr_bal"];                
        } //end if
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        } //end try catch
        $conn = null;
    } //end if
    ?>

    <form action="Search01_PDO.php" method="post">
        รหัสลูกค้า: <input type="text" name="cid" value="<?php echo $cid; ?>"> <br><br>
        ชื่อลูกค้า: <input type="text" name="cname" value="<?php echo $cname; ?>"> <br><br>
        ที่อยู่: <input type="text" name="address" value="<?php echo $address; ?>"><br><br>
        เบอร์โทรศัพท์: <input type="text" name="telephone" value="<?php echo $telephone; ?>"><br><br>
        วงเงินเครดิต: <input type="text" name="credit_lim" value="<?php echo $credit_lim; ?>"><br><br>
        วงเงินคงเหลือ: <input type="text" name="curr_bal" value="<?php echo $curr_bal; ?>"><br><br>
        <input type="submit" name="Find" value="Find Data">
   </form>
</body>
</html>