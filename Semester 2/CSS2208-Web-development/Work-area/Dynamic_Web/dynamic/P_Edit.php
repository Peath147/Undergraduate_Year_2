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
        
        $_SESSION['P_ID'] = $row['P_ID'] ?>



        <div class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
            <form class="p-5 " action="A_Product.php" method="post" style="width: 50rem" enctype='multipart/form-data'> 
                <h1 class="mx-auto w-250">Edit Product <?php echo $_SESSION['P_ID']; ?></h1>
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
                    </div>
                    <div class="form-group">
                        <label for="Name">Product Name:</label>
                        <input type="text" name="Name" placeholder="Enter Product Name" class="form-control" value="<?php echo $row['Name']; ?> ">
                    </div>
                    <div class="form-group">
                        <label for="Details">Details:</label>
                        <textarea name="Details" placeholder="Enter Details" class="form-control" rows = "5"> <?php echo $row['Details']; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input type="text" name="Price" placeholder="Enter Price" class="form-control" value="<?php echo $row['Price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Promotion">Promotion:</label><br>
                        <input type="radio" required name="Promotion" value = "True"> Have Promotion <br>
                        <input type="radio" name="Promotion" value = "False"> don't have Promotion
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
                        <input type='file' name='file'  class="form-control">
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php   } ?>

    


