<?php 

include('include/head.php');

require_once('connect_PDO.php');


$sql = 'select * from user_tbl where U_ID = :U_ID ';  
$stmt = $conn->prepare($sql);
$p = ['U_ID' => $_POST["U_ID"]];
$stmt->execute($p);

$_SESSION['U_ID'] = $_POST["U_ID"];

while($row = $stmt->fetch())
{
?>



<div class="d-flex justify-content-center align-items-center ">
    <form class="p-5 " action="A_User.php" method="post" style="width: 50rem" enctype='multipart/form-data'> 
        <h1 class="mx-auto w-250">Edit User <?php echo $_SESSION['U_ID']; ?></h1>
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
            <div class="form-group">
                <label for="Name">User ID:</label>
                <input type="text" name="U_ID"  value="<?php echo $row['U_ID']; ?>">
            </div>
            <div class="form-group">
                <label for="Name">Username:</label>
                <input type="text" name="Username" placeholder="Enter Username" class="form-control" value="<?php echo $row['Username']; ?> ">
            </div>
            <div class="form-group">
                <label for="Gmail">Gmail:</label>
                <input type="text" name="Gmail" placeholder="Enter Gmail" class="form-control" value="<?php echo $row['Gmail']; ?>"> 
            </div>
            <div class="form-group">
                <label for="Price">User level:</label>
                <input type="text" name="User_lvl" placeholder="Enter User_lvl" class="form-control" value="<?php echo $row['User_lvl']; ?>">
            </div>

            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php   } ?>




