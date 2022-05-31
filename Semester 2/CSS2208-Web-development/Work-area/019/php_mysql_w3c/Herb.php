<?php
session_start();
require_once('connect_PDO.php');
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
if (isset($_POST['submit'])) {
    if (isset($_POST['Herb_Name'], $_POST['Details1'], $_POST['Scientific_Name'], $_POST['Common_Name'], $_POST['Family'], $_POST['Details2'])
      && !empty($_POST['Herb_Name']) && !empty($_POST['Details1']) && !empty($_POST['Scientific_Name']) && !empty($_POST['Common_Name']) 
      && !empty($_POST['Family']) && !empty($_POST['Details2'])) {
        $Herb_Name = $_POST['Herb_Name'];
        $Details1 = $_POST['Details1'];
        $Scientific_Name = $_POST['Scientific_Name'];
        $Common_Name = $_POST['Common_Name'];
        $Family = $_POST['Family'];
        $Details2 = $_POST['Details2'];
        // ส่วน Upload Files
        // Count total files
  $countfiles = count($_FILES['files']['name']); 
  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'upload/'.$filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

          // Execute query
          $pic[$i] = $target_file;
	 // $statement->execute(array($filename,$target_file));

       }
    } // end if ตรวจสอบนามสกุลไฟล์
 
  } // end for
  //echo "File upload successfully";

        //จบส่วน Upload Files

        $date = date('Y-m-d H:i:s');
// ตรวจสอบว่ามีข้อมูลเดิมหรือไม่
        $sql = 'select * from herb_tbl where Herb_Name = :Herb_Name';
            $stmt = $conn->prepare($sql);
            $p = ['Herb_Name' => $Herb_Name];
            $stmt->execute($p);

            if ($stmt->rowCount() == 0)  //ถ้าไม่มีข้อมูลในฐานข้อมูล (เป็นสมุนไพรใหม่)
            {
                $sql = "insert into herb_tbl (Herb_Name,Details1,Scientific_Name,Common_Name,Family,Details2,Pic1,Pic2,Pic3) 
                values(:hname,:de1,:sci_name,:com_name,:family,:de2,:pic1,:pic2,:pic3)";

                try {
                    $handle = $conn->prepare($sql);
                    $params = [
                        ':hname' => $Herb_Name,
                        ':de1' => $Details1,
                        ':sci_name' => $Scientific_Name,
                        ':com_name' => $Common_Name,
                        ':family' => $Family,
                        ':de2' => $Details2,
                        ':pic1' => $pic[0],
                        ':pic2' => $pic[1],
                        ':pic3' => $pic[2]
                    ];

                    $handle->execute($params);

                    $success = 'User has been created successfully';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            }  //end if ถ้าเป็นผู้ใช้ใหม่
            else {
                $valHerb_Name = $Herb_Name;
                $valDetails1 = $Details1;
                $valScientific_Name = '';
                $valScientific_Name = $Scientific_Name;
                $valCommon_Name = $Common_Name;
                $valFamily = $Family;
                $valDetails2 = $Details2;
                $errors[] = 'Herb_Name already registered';
            } //end ถ้าไม่เป็นสมุนไพรใหม่

    } //end if ถ้า post แล้วไม่เป็นค่าว่าง
    else {   
        if (!isset($_POST['Herb_Name']) || empty($_POST['Herb_Name'])) {  //ถ้าไม่ได้ post ชื่อสมุนไพรมาหรือเป็นค่าว่าง
            $errors[] = 'Herb name is required';
        } else {
            $valHerb_Name = $_POST['Herb_Name']; 
        }
        if (!isset($_POST['Details1']) || empty($_POST['Details1'])) { //ถ้าไม่ได้ post รายละเอียดหรือเป็นค่าว่าง
            $errors[] = 'Details is required';
        } else {
            $valLastName = $_POST['Details1'];
        }

        if (!isset($_POST['Scientific_Name']) || empty($_POST['Scientific_Name'])) { //ถ้าไม่ได้ post ชื่อวิทยาศาสตร์หรือเป็นค่าว่าง
            $errors[] = 'Scientific_Name is required';
        } else {
            $valScientific_Name = $_POST['Scientific_Name'];
        }

        if (!isset($_POST['Common_Name']) || empty($_POST['Common_Name'])) {  //ถ้าไม่ได้ post ชื่อสามัญหรือเป็นค่าว่าง
            $errors[] = 'Common_Name is required';
        } else {
            $valCommon_Name = $_POST['Common_Name'];
        }
        if (!isset($_POST['Family']) || empty($_POST['Family'])) {  //ถ้าไม่ได้ post วงศ์หรือเป็นค่าว่าง
            $errors[] = 'Family is required';
        } else {
            $valFamily = $_POST['Family'];
        }
        if (!isset($_POST['Details2']) || empty($_POST['Details2'])) {  //ถ้าไม่ได้ post รายละเอียด2 หรือเป็นค่าว่าง
            $errors[] = 'Details2 is required';
        } else {
            $valDetails2 = $_POST['Details2'];
        }
    }
} //end if submit
?>


<!doctype html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="bg-dark">

    <div class="container h-100">
        <div class="row h-100 mt-5 justify-content-center align-items-center">
            <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
                <h1 class="mx-auto w-250">Add Herb</h1>
                <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error_msg) {
                        echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                    }
                }

                if (isset($success)) {

                    echo '<div class="alert alert-success">' . $success . '</div>';
                }
                ?>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="Herb_Name">Herb Name:</label>
                        <input type="text" name="Herb_Name" placeholder="Enter Herb Name" class="form-control" value="<?php echo ($valHerb_Name ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Details1">Details1:</label>
                        <textarea name="Details1" placeholder="Enter Details1" class="form-control" rows = "5" value="<?php echo ($valDetails1 ?? '') ?>"> </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Scientific_Name:</label>
                        <input type="text" name="Scientific_Name" placeholder="Enter Scientific_Name" class="form-control" value="<?php echo ($valScientific_Name ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Common_Name">Common_Name:</label>
                        <input type="text" name="Common_Name" placeholder="Enter Common_Name" class="form-control" value="<?php echo ($valCommon_Name ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Family">Family:</label>
                        <input type="text" name="Family" placeholder="Enter Family" class="form-control" value="<?php echo ($valFamily ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Details2">Details2:</label>
                        <textarea name="Details2" placeholder="Enter Details2"  rows = "5" class="form-control" value="<?php echo ($valDetails2 ?? '') ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Files">Files:</label> 
                    <input type='file' name='files[]' multiple / class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <p class="pt-2"> Back to <a href="login.php">Login</a></p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>