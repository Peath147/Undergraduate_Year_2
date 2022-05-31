<?php
session_start();
require_once('connect_PDO.php');

if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "select * from user_tbl where email = :email ";
			$handle = $conn->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))  //เปรียบเทียบ Password ที่ป้อนเข้ามกับในฐานข้อมูล
				{
					unset($getRow['password']); //ลบคอลัมน์ Password ออก ไม่ต้องเก็บลงใน SESSION
					$_SESSION = $getRow;	//เก็บข้อมูล User ลงใน SESSION
					header('location:dashboard.php');
					exit();
				}
				else
				{
					$errors[] = "Wrong Email or Password";
				}
			}
			else
			{
				$errors[] = "Wrong Email or Password";
			}
			
		}
		else
		{
			$errors[] = "Email address is not valid";	
		}

	}
	else
	{
		$errors[] = "Email and Password are required";	
	}

}
?>

<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Login</h1>
			<?php 
				if(isset($errors) && count($errors) > 0)
				{
					foreach($errors as $error_msg)
					{
						echo '<div class="alert alert-danger">'.$error_msg.'</div>';
					}
				}
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
				<label for="password">Password:</label>
					<input type="password" name="password" placeholder="Enter Password" class="form-control">
				</div>
				<div class="form-control pt-3" >	
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<a href="register.php" class="btn btn-primary">Register</a>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>