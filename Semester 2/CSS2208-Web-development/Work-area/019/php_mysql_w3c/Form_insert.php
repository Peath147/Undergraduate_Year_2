<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Form Input</title>
</head>

<body>
    <div class="text-center">
        <h2>โปรแกรม Form Input</h2>
    </div>
    <form action="Form_insert.php" method="post">
        <div class="container">
            <div class="row mb-3">
                <label for="inputFirstname" class="col-sm-2 col-form-label">Firstname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFirstname" name="firstname">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputLastname" class="col-sm-2 col-form-label">Lastname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastname" name="lastname">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div> <!--  container -->
    </form>
</body>

</html>

<?php
// print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['firstname']) && isset($_POST['lastname'])) {

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require 'connect_PDO.php';

    try {
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES (:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);

        // insert another row
        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email =  $_POST['email'];
        $stmt->execute();
        echo "New records created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}  //end if
$conn = null;
exit;
?>