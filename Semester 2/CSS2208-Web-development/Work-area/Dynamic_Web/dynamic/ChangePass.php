<?php   
session_start();
require_once('connect_PDO.php');

    if (isset($_POST['submit'])){
        if(isset($_POST['password'], $_POST['newPassword'], $_POST['newPassword2']) && 
            !empty($_POST['password']) && !empty($_POST['newPassword']) && !empty($_POST['newPassword2'])) {
            

            $id = $_SESSION['u_id'];
            $NewPassword = $_POST['newPassword'];
            $NewPassword2 = $_POST['newPassword2'];
            $password = $_POST['password'];

            $stmt = 'select * from user_tbl where U_ID = :id';
            $userDB = $conn->prepare($stmt);
            $uid = ['id' => $id];
            $userDB->execute($uid);
            $getRow = $userDB->fetch(PDO::FETCH_ASSOC);

                        
            if(password_verify($password, $getRow['password'])) {
                if($NewPassword == $NewPassword2){

                    $options = array("cost"=>4);
                    $hashPassword = password_hash($NewPassword,PASSWORD_BCRYPT,$options);

                    try {

                        $sql = "update user_tbl set password ='$hashPassword' where U_ID = $id";
                            
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        $success = 'successfully';


                    } catch (PDOException $e) {

                        $errors[] = $e->getMessage();
                            
                    }

                } else {

                    $errors[] = "Password not match";
                }

                
            } else {

                $errors[] = "Wrong password";

            }

        } else {

            if(empty($_POST['password'])) {
                $errors[] = "Old Password is required";
            }
            if (empty($_POST['newPassword'])) {
                $errors[] = "New Password is required";
            }
            if (empty($_POST['newPassword2'])) {
                $errors[] = " Confirm Password is required";
            }
        }

    } 
?>




<!DOCTYPE html>
<html lang="en">


<?php
include('include/head.php')
?>

<body>

    <div class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
            <form class="p-5 rounded shadow" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 30rem">
                <a class="btn btn-outline-primary bi bi-arrow-left" href="Profile.php" role="button"> </a>


                <h1 class="text-center pb-5 display-4"><?php echo $_SESSION['name']; ?></h1>
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

                
                <div class="mb-3">
                    <label for="NewPassword" class="form-label"> New Password </label>
                    <input type="password" class="form-control" name="newPassword" id="NewPassword">
                </div>

                <div class="mb-3">
                    <label for="NewPassword2" class="form-label"> Confirm Password </label>
                    <input type="password" class="form-control" name="newPassword2" id="NewPassword2">
                </div>
                
                <div class="mb-3">
                    <label for="Password" class="form-label"> Old Password </label>
                    <input type="password" class="form-control" name="password" id="Password">
                </div>

                
                <div class="d-grid gap-2 py-3">
                    <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
                </div>    

            
            </form>
    </div>
</body>