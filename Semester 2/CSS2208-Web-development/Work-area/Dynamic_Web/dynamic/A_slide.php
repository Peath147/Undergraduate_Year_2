<?php
    include('include/head.php');
    session_start();
    require_once('connect_PDO.php');

if (isset($_POST['submit'])) {
  
            $id = $_POST['C_ID'];
            $filename = $_FILES['file']['name'];
            $C_image = '_images/'.$filename;
            

            try {
                        
                $sql = "update carousel set C_image = '$C_image' where C_ID = '$id' ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $success = 'Product has been Edit successfully';


            } catch (PDOException $e) {
                            $errors[] = $e->getMessage();
            }

      
        
} elseif(isset($_POST['delete'])) {

    $sql = 'delete from carousel WHERE C_ID = :C_ID';  
    $stmt = $conn->prepare($sql);
    $p = ['C_ID' => $_POST["C_ID"]];
    $stmt->execute($p);

    $success = 'Carousel has been Delete';
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
  <a class="btn btn-primary" href="C_upload.php" role="button"> Upload carousel </a>
</div>

<div class="d-flex justify-content-center align-items-baseline " style="min-height: 61.28vh;">
    <table class="table" style="width: 60rem ">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlPro = "select * from carousel";
                $stmt = $conn->prepare($sqlPro);
                $stmt->execute();
                
                
                while ($row = $stmt->fetch()) {

            ?>
                    <tr>
                        <td><?php echo $row['C_ID']; ?></td>
                        <td><?php echo $row['C_image']; ?></td>
                        <td>
                            <input type="button" name="view" value="Edit"   id="<?php echo $row['C_ID'] ?>"  
                                class="btn btn-outline-primary C_Edit">

                            <input type="button" name="view" value="Delete" id="<?php echo $row['C_ID'] ?>"  
                                class="btn btn-outline-danger C_delete">
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



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
            $('.C_Edit').click(function() {
                var C_ID = $(this).attr("id");
                $.ajax({
                    url: "C_Edit.php",
                    method: "post",
                    data: {
                    C_ID: C_ID
                    },
                    success: function(data) {
                        $('#Product_detail').html(data);
                        $('#dataModal').modal("show");
                    }
                });
            });


            $('.C_delete').click(function() {
                var C_ID = $(this).attr("id");
                $.ajax({
                    url: "C_delete.php",
                    method: "post",
                    data: {
                    C_ID: C_ID
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