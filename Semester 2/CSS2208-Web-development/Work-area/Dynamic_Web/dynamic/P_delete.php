<?php 

include('include/head.php');

require_once('connect_PDO.php');


$sql = 'select * from product where P_ID = :P_ID ';  
$stmt = $conn->prepare($sql);
$p = ['P_ID' => $_POST["P_ID"]];
$stmt->execute($p);

$_SESSION['P_ID'] = $_POST["P_ID"];


while($row = $stmt->fetch())
{
?>



<div class="d-flex justify-content-center align-items-center py-1">
    <form action="A_Product.php" method="post" enctype='multipart/form-data'> 
        <h1 class="mx-auto w-250">Delete Product</h1>
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
                <label for="Name">Product ID:</label>
                <input type="text" name="P_ID"  value="<?php echo $row['P_ID']; ?>">

            <br>
            <div class="py-3 d-flex justify-content-center align-items-center ">
            <button type="submit" name="delete" class="btn btn-danger justify-content-center">Submit</button>
            </div>
    </form>
</div>
<?php   } ?>