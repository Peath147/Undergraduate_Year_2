<?php
session_start();
require_once('connect_PDO.php');

if (isset($_POST['submit'])) {

        $filename = $_FILES['file']['name'];

        $C_image = '_images/'.$filename;
  


                try {
                    $sql = "insert into carousel (C_image) 
                    values('$C_image');";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    

                    $success = 'Carousel has been created successfully';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
}


?>


<!doctype html>
<html>

<?php
include('include/head.php')
?>

<body>

        <div class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
            <form class="p-5 rounded shadow" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 30rem" enctype='multipart/form-data'> 
            <a class="btn btn-outline-primary bi bi-arrow-left" href="A_slide.php" role="button"> </a>
                <h1 class="mx-auto w-250">Add Carousel</h1>
                <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error_msg) {
                        echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                    }
                }

                if (isset($success)) { #

                    echo '<div class="alert alert-success">' . $success . '</div>';
                }
                ?>


                    <div class="form-group">
                        <label for="Files">Files:</label> 
                        <input type='file' name='file' class="form-control">
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
</body>
</html>