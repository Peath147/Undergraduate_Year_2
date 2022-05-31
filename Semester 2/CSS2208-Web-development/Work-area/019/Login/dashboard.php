<?php 
    session_start();
  
    if(!$_SESSION['id']){
        header('location:login.php');
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pages</title>
</head>
<body>
<h1>Welcome <?php echo ucfirst($_SESSION['first_name']); ?></h1>
<a href="logout.php?logout=true">Logout</a>
</body>
</html>
