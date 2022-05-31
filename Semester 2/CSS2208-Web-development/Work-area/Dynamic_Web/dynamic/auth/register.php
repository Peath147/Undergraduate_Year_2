<?php
session_start();
require_once('../connect_PDO.php');

if (isset($_POST['Register'])) {
    if (isset($_POST['UserName'], $_POST['gmail'], $_POST['password']) &&
        !empty($_POST['UserName']) && !empty($_POST['gmail']) && !empty($_POST['password'])) {

        $userName = $_POST['UserName'];
        $Gmail = $_POST['gmail'];
        $password = $_POST['password'];
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

        $sql = 'select * from user_tbl where Username = :Name';
        $Name = $conn->prepare($sql);
        $N = ['Name' => $userName];
        $Name->execute($N);

        $sql = 'select * from user_tbl where Gmail = :gmail';
        $gm = $conn->prepare($sql);
        $g = ['gmail' => $Gmail];
        $gm->execute($g);

        if($Name->rowCount() > 0 && $gm->rowCount() > 0){
            $errors[] = "Username and Gmail already registered";
        } elseif ($Name->rowCount() > 0) {
            $errors[] = "Username already registered";
        } elseif ($gm->rowCount() > 0) {
            $errors[] = "Gmail already registered";
        } else {
            try {
                $sql = "insert into user_tbl (Username, Password, Gmail, User_lvl) 
                values(:userName, :password, :Gmail, :User)";
                $params = [
                    ':userName'=>$userName,
                    ':password'=>$hashPassword,
                    ':Gmail'=>$Gmail,
                    ':User'=>'User'
                ];
                $stmt = $conn->prepare($sql);
                $stmt->execute($params);

                $success = 'User has been created successfully';
            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        }
        
 
    } else {
        if (empty($_POST['UserName'])) {
            $errors[] = "Username is required";
        }
        if (empty($_POST['gmail'])) {
            $errors[] = "Gmail is required";
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
                <a class="btn btn-outline-primary bi bi-arrow-left" href="login.php" role="button"> </a>

                <h1 class="text-center pb-5 display-4">register</h1>

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
                <label for="Gmail" class="form-label"> Gmail </label>
                <input type="gmail" class="form-control" name="gmail" id="Gmail">
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label"> Password </label>
                <input type="password" class="form-control" name="password" id="Password">
            </div>
                
            <div class="d-grid gap-2 py-3">
                <button type="submit" name="Register" class="btn btn-primary"> Register </button>
            </div>                          
        </form>
    </div>
</body>