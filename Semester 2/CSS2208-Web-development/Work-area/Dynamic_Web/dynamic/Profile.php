<?php   
session_start();
require_once('connect_PDO.php');

    if (isset($_POST['submit'])){
        if(isset($_POST['password']) && !empty($_POST['password']))    {

            $id = $_SESSION['u_id'];
            $Newname = $_POST['UserName'];
            $Newgmail = $_POST['Gmail'];
            $password = trim($_POST['password']);

            $stmt = 'select * from user_tbl where U_ID = :id';
            $userDB = $conn->prepare($stmt);
            $uid = ['id' => $id];
            $userDB->execute($uid);
            $getRow = $userDB->fetch(PDO::FETCH_ASSOC);

            $stmt = 'select * from user_tbl where Username = :name';
            $Oldname = $conn->prepare($stmt);
            $p = ['name' => $Newname];
            $Oldname->execute($p);

            $stmt = 'select * from user_tbl where Gmail = :gmail';
            $Oldgmail = $conn->prepare($stmt);
            $p = ['gmail' => $Newgmail];
            $Oldgmail->execute($p);
            

            if(password_verify($password, $getRow['password'])) {
                if($Oldname->rowCount() == 1 && $Newname == $getRow['Username'] || $Oldname->rowCount() == 0){
                    if($Oldgmail->rowCount() == 1 && $Newgmail == $getRow['Gmail'] || $Oldgmail->rowCount() == 0){

                        try {

                            $sql = "update user_tbl set Username ='$Newname', Gmail = '$Newgmail' where U_ID = $id";
                            
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            $_SESSION['u_id'] = $getRow['U_ID'];
                            $_SESSION['name'] = $Newname;
                            $_SESSION['gmail'] = $Newgmail;
                            $_SESSION['user_lvl'] = $getRow['User_lvl'];
                            $_SESSION['login'] = True;

                            $success = 'successfully';


                        } catch (PDOException $e) {

                            $errors[] = $e->getMessage();
                            
                        }
                    } else {    

                        $errors[] = "Gmail already registered";
                    }
                } else {

                    $errors[] = "Username already registered";
                }

                
            } else {

                $errors[] = "Wrong password";

            }

        } else {

            $errors[] = "password is required";
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
                <a class="btn btn-outline-primary bi bi-arrow-left" href="index.php" role="button"> </a>


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
                    <label for="usename" class="form-label"> User Name </label>
                    <input type="text" name="UserName" class="form-control" id="usename" value="<?php echo $_SESSION['name']; ?>">
                </div>

                <div class="mb-3">
                    <label for="gmail" class="form-label"> Gmail </label>
                    <input type="gmail" name="Gmail" class="form-control" id= "gmail" value="<?php echo $_SESSION['gmail']; ?>">
                </div>

                <div class="mb-3">
                    <label for="Password" class="form-label"> Password </label>
                    <input type="password" class="form-control" name="password" id="Password">
                </div>
                
                <div class="d-grid gap-2 py-3">
                    <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
                </div>    
                
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-primary" href="ChangePass.php" role="button"> Change password </a>
                </div>  
                
            
            </form>
        </div>

</body>