<?php 

include('include/head.php');

require_once('connect_PDO.php');


$sql = 'select * from carousel where C_ID = :C_ID ';  
$stmt = $conn->prepare($sql);
$p = ['C_ID' => $_POST["C_ID"]];
$stmt->execute($p);

while($row = $stmt->fetch())
{

$_SESSION['C_ID'] = $row['C_ID'] ?>



<div class="d-flex justify-content-center align-items-center ">
    <form class="p-5 " action="A_slide.php" method="post" style="width: 50rem" enctype='multipart/form-data'> 
        <h1 class="mx-auto w-250">Edit Carousel <?php echo $_SESSION['C_ID']; ?></h1>
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
                <label for="Name">Carousel ID:</label>
                <input type="text" name="C_ID"  value="<?php echo $row['C_ID']; ?>">
            </div>
            <div class="form-group">
                <label for="Files">Files:</label> 
                <input type='file' name='file'  class="form-control">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php   } ?>




