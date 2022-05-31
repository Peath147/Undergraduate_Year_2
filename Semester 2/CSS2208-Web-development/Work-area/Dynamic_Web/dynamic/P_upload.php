<?php
session_start();
require_once('connect_PDO.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['Name'], $_POST['Details'], $_POST['Price'], $_POST['Promotion'], $_POST['Catalog'])
      && !empty($_POST['Name']) && !empty($_POST['Details']) && !empty($_POST['Price']) && !empty($_POST['Promotion']) && !empty($_POST['Catalog'])) 
      {
        $Name = $_POST['Name'];
        $Details = $_POST['Details'];
        $Price = $_POST['Price'];
        $Promotion = $_POST['Promotion'];
        $Catalog = $_POST['Catalog'];
        $filename = $_FILES['file']['name'];

        $P_image = '_images/Item/'.$filename;
  

            $sql = 'select * from product where Name = :Name';
            $stmt = $conn->prepare($sql);
            $p = ['Name' => $Name];
            $stmt->execute($p);

            if ($stmt->rowCount() == 0) 
            {
                try {
                    $sql = "insert into product (Name,Details,Price,Promotion,Catalog,P_image) 
                    values('$Name','$Details','$Price','$Promotion','$Catalog','$P_image');";
                    $stmt = $conn->prepare($sql);
                    $p = ['Name' => $Name];
                    $stmt->execute($p);

                    

                    $success = 'Product has been created successfully';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            }
            else {
                $valName = $Name;
                $valDetails = $Details;
                $valPrice = $Price;
                $valPromotion = $Promotion;
                $valCatalog = $Catalog;
                $errors[] = 'Name already registered';
            } 

    } 
    else {   
        if (!isset($_POST['Name']) || empty($_POST['Name'])) { 
            $errors[] = 'Product name is required';
        } else {
            $valName = $_POST['Name']; 
        }
        if (!isset($_POST['Details']) || empty($_POST['Details'])) { 
            $errors[] = 'Details is required';
        } else {
            $valLastName = $_POST['Details'];
        }

        if (!isset($_POST['Promotion']) || empty($_POST['Promotion'])) { 
            $errors[] = 'Promotion is required';
        } else {
            $valPromotion = $_POST['Promotion'];
        }

        if (!isset($_POST['Catalog']) || empty($_POST['Catalog'])) { 
            $errors[] = 'Catalog is required';
        } else {
            $valCatalog = $_POST['Catalog'];
        }
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
            <a class="btn btn-outline-primary bi bi-arrow-left" href="A_Product.php" role="button"> </a>
                <h1 class="mx-auto w-250">Add Product</h1>
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
                        <label for="Name">Product Name:</label>
                        <input type="text" name="Name" placeholder="Enter Product Name" class="form-control" value="<?php echo ($valName ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Details">Details:</label>
                        <textarea name="Details" placeholder="Enter Details" class="form-control" rows = "5" value="<?php echo ($valDetails ?? '') ?>"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input type="text" name="Price" placeholder="Enter Price" class="form-control" value="<?php echo ($valPrice ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Promotion">Promotion:</label><br>
                        <input type="radio" required name="Promotion" value = "True"> Have Promotion <br>
                        <input type="radio" name="Promotion" value = "False" checked> don't have Promotion
                    </div>
                    <div class="form-group">
                        <label for="Catalog">Catalog:</label><br>
                        <input type="radio" required name="Catalog" value = "Computer accessories"> Computer accessories <br>
                        <input type="radio" name="Catalog" value = "Mobile"> Mobile <br>
                        <input type="radio" name="Catalog" value = "Mobile accessories"> Mobile accessories <br>
                        <input type="radio" name="Catalog" value = "Electric device"> Electric device <br>
                        <input type="radio" name="Catalog" value = "Snack"> Snack <br>
                        <input type="radio" name="Catalog" value = "Model"> Model 
                    </div>
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