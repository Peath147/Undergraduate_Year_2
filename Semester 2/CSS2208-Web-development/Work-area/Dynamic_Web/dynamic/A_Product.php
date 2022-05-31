<?php
    include('include/head.php');
    session_start();
    require_once('connect_PDO.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['Name'], $_POST['Details'], $_POST['Price'], $_POST['Promotion'], $_POST['Catalog'])
      && !empty($_POST['Name']) && !empty($_POST['Details']) && !empty($_POST['Price']) && !empty($_POST['Promotion']) && !empty($_POST['Catalog'])) {
        
        if(empty($_FILES['file']['name'])) {
            $Name = $_POST['Name'];
            $Details = $_POST['Details'];
            $Price = $_POST['Price'];
            $Promotion = $_POST['Promotion'];
            $Catalog = $_POST['Catalog'];
            $id = $_POST['P_ID'];
            
    

                $sql = 'select * from product where P_ID = :P_ID';
                $PID = $conn->prepare($sql);
                $p = ['P_ID' => $_SESSION['P_ID']];
                $PID->execute($p);
                $getRow = $PID->fetch(PDO::FETCH_ASSOC);

                $sql = 'select * from product where Name = :Name';
                $stmt = $conn->prepare($sql);
                $p = ['Name' => $Name];
                $stmt->execute($p);

                    try {
                        
                        $sql = "update product set Name = '$Name', Details = '$Details', Price = '$Price', Promotion = '$Promotion', Catalog = '$Catalog'
                        where P_ID = '$id' ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $success = 'Product has been Edit successfully';


                    } catch (PDOException $e) {
                            $errors[] = $e->getMessage();
                    }

        } else {
            $Name = $_POST['Name'];
            $Details = $_POST['Details'];
            $Price = $_POST['Price'];
            $Promotion = $_POST['Promotion'];
            $Catalog = $_POST['Catalog'];
            $filename = $_FILES['file']['name'];

            $P_image = '_images/Item/'.$filename;
    

                $sql = 'select * from product where P_ID = :P_ID';
                $PID = $conn->prepare($sql);
                $p = ['P_ID' => $_SESSION['P_ID']];
                $PID->execute($p);
                $getRow = $PID->fetch(PDO::FETCH_ASSOC);

                $sql = 'select * from product where Name = :Name';
                $stmt = $conn->prepare($sql);
                $p = ['Name' => $Name];
                $stmt->execute($p);

                if($stmt->rowCount() == 1 && $Name == $getRow['Name'] || $stmt->rowCount() == 0) {
                    try {
                        
                        $sql = "update product set Name = '$Name', Details = '$Details', Price = '$Price', Promotion = '$Promotion', Catalog = '$Catalog'
                        where P_ID = $id ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        

                        $success = 'Product has been Edit successfully';


                    } catch (PDOException $e) {
                            $errors[] = $e->getMessage();
                    }

                } else {
                    $errors[] = 'Name already registered';
                } 
        }
        
    } else {   
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
} elseif(isset($_POST['delete'])) {

    $sql = 'delete from product WHERE P_ID = :P_ID';  
    $stmt = $conn->prepare($sql);
    $p = ['P_ID' => $_POST["P_ID"]];
    $stmt->execute($p);

    $success = 'Product has been Delete';
}
?>





<body>
    
    <?php
    include('include/navbar.php')
    ?>

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

<div class="d-grid gap-2 col-6 mx-auto py-2">
  <a class="btn btn-primary" href="P_upload.php" role="button">Upload product</a>
</div>



    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Details</th>
                <th>Price</th>
                <th>Promotion</th>
                <th>Catalog</th>
                <th>P_image</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlPro = "select * from product";
                $stmt = $conn->prepare($sqlPro);
                $stmt->execute();
                
                
                while ($row = $stmt->fetch()) {

            ?>
                    <tr>
                        <td><?php echo $row['P_ID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Details']; ?></td>
                        <td><?php echo $row['Price']; ?></td>
                        <td><?php echo $row['Promotion']; ?></td>
                        <td><?php echo $row['Catalog']; ?></td>
                        <td><?php echo $row['P_image']; ?></td>
                        <td>
                            <input type="button" name="view" value="Edit"   id="<?php echo $row['P_ID'] ?>"  
                                class="btn btn-outline-primary P_Edit">

                            <input type="button" name="view" value="Delete" id="<?php echo $row['P_ID'] ?>"  
                                class="btn btn-outline-danger P_delete">
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>



    <!-- modal -->
    <div id="dataModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body" id="Product_detail">

                    
          </div>
        </div>
      </div>
    </div>

    <!-- modal -->
    <div id="deleModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" id="Product">

                    
          </div>
        </div>
      </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.P_Edit').click(function() {
                var P_ID = $(this).attr("id");
                $.ajax({
                    url: "P_Edit.php",
                    method: "post",
                    data: {
                    P_ID: P_ID
                    },
                    success: function(data) {
                        $('#Product_detail').html(data);
                        $('#dataModal').modal("show");
                    }
                });
            });


            $('.P_delete').click(function() {
                var P_ID = $(this).attr("id");
                $.ajax({
                    url: "P_delete.php",
                    method: "post",
                    data: {
                    P_ID: P_ID
                    },
                    success: function(data) {
                        $('#Product').html(data);
                        $('#deleModal').modal("show");
                    }
                });
            });
        });
      
    </script>




















  <!-- Footer -->
  <footer class="bg-dark">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 mb-2 mb-lg-0 align-self-start">
          <img src="_images/LOGO_FRIEND_STUDIO.PNG" alt="" height="100" class="mb-3">
        </div>
        <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
          <ul class="list-unstyled mb-0">
            <li><a class="text-muted text-start">contacts</a></li>
            <li"><a href="#" class="text-muted">Gmail:-----</a></li>
            <li><a href="#" class="text-muted">Tel:-----</a></li>
            <li><a href="#" class="text-muted">Address</Address>:-----</a></li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-8 mb-2 mb-lg-0 "> 
          <p class="font-italic text-muted text-end">
              นาย    นายธีรภัทร ศรีคิรินทร์ 63122201001<br>
              นางสาว รัชนาถ ต่อมณี       63122201013<br>
              นางสาว ชนิสรา ใจเย็น       63122201019<br>
              นาย    สุรดิษ หิรัญญานนท์  63122201023
          </p>
        </div>
      </div>
    </div>
    </div>
  </footer>
</body>