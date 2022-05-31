<?php   
session_start();
require_once('../connect_PDO.php');
    if (isset($_POST['submit'])){
        if(isset($_POST['UserName'], $_POST['password']) &&
            !empty($_POST['UserName']) && !empty($_POST['password']))
        {
            $userName = trim($_POST['UserName']);
            $password = trim($_POST['password']);

            $stmt = 'select * from user_tbl where Username = :Name';
            $userDB = $conn->prepare($stmt);
            $N = ['Name' => $userName];
            $userDB->execute($N);
            if($userDB->rowCount() > 0){

                $getRow = $userDB->fetch(PDO::FETCH_ASSOC);

                if(password_verify($password, $getRow['password'])) {

                    $_SESSION['u_id'] = $getRow['U_ID'];
                    $_SESSION['name'] = $getRow['Username'];
                    $_SESSION['gmail'] = $getRow['Gmail'];
                    $_SESSION['user_lvl'] = $getRow['User_lvl'];
                    $_SESSION['login'] = True;
                    header("Location: ../index.php");

                } else {

					$errors[] = "Wrong Username or Password";
				}
            } else {

				$errors[] = "Wrong Username or Password";
			}


        } else {
            if (empty($_POST['UserName'])) {
                $errors[] = "Username is required";
            }
            if (empty($_POST['password'])) {
                $errors[] = " password is required";
            }
        }
    } 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="Style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</head>
<body>

    <div class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
            <form class="p-5 rounded shadow" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 30rem">
                <a class="btn btn-outline-primary bi bi-arrow-left" href="../index.php" role="button"> </a>

                <h1 class="text-center pb-5 display-4">LOGIN</h1>
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
                    <label for="usename" class="form-label"> Username </label>
                    <input type="text" name="UserName" class="form-control" id="usename" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="Password" class="form-label"> Password </label>
                    <input type="password" class="form-control" name="password" id="Password">
                </div>
                
                <div class="d-grid gap-2 py-3">
                    <button type="submit" class="btn btn-primary" name="submit"> LOGIN </button>
                </div>                
                
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-primary" href="register.php" role="button">register </a>
                </div>    
            
            </form>
        </div>

</body>