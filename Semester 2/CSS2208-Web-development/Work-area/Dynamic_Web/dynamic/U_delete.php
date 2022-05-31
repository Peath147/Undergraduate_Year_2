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



<div class="d-flex justify-content-center align-items-center py-1">
    <form action="A_User.php" method="post" enctype='multipart/form-data'> 
        <h1 class="mx-auto w-250">Delete User</h1>
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

            <br>
            <div class="py-3 d-flex justify-content-center align-items-center ">
            <button type="submit" name="delete" class="btn btn-danger justify-content-center">Submit</button>
            </div>
    </form>
</div>
<?php   } ?>