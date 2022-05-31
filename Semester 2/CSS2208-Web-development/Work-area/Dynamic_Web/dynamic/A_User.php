<?php
    include('include/head.php');
    session_start();
    require_once('connect_PDO.php');

if (isset($_POST['submit'])) {
  
            $id = $_POST['U_ID'];
            $Newname = $_POST['Username'];
            $Newgmail = $_POST['Gmail'];

            $stmt = 'select * from user_tbl where U_ID = :id';
            $userDB = $conn->prepare($stmt);
            $uid = ['id' => $id];
            $userDB->execute($uid);
            $getRow = $userDB->fetch(PDO::FETCH_ASSOC);

            $stmt = 'select * from user_tbl where Username = :name';
            $Oldname = $conn->prepare($stmt);
            $p = ['name' => $Newname];
            $Oldname->execute($p);

            $stmt = 'select * from user_tbl where Gmail = :gmail';
            $Oldgmail = $conn->prepare($stmt);
            $p = ['gmail' => $Newgmail];
            $Oldgmail->execute($p);
            

            if($Oldname->rowCount() == 1 && $Newname == $getRow['Username'] || $Oldname->rowCount() == 0){
              if($Oldgmail->rowCount() == 1 && $Newgmail == $getRow['Gmail'] || $Oldgmail->rowCount() == 0){

                  try {

                      $sql = "update user_tbl set Username ='$Newname', Gmail = '$Newgmail' where U_ID = $id";
                      
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();

                      $_SESSION['u_id'] = $getRow['U_ID'];
                      $_SESSION['name'] = $Newname;
                      $_SESSION['gmail'] = $Newgmail;
                      $_SESSION['user_lvl'] = $getRow['User_lvl'];
                      $_SESSION['login'] = True;

                      $success = 'successfully';


                  } catch (PDOException $e) {

                      $errors[] = $e->getMessage();
                      
                  }
              } else {    

                  $errors[] = "Gmail already registered";
              }
          } else {

              $errors[] = "Username already registered";
          }
            
    

      
        
} elseif(isset($_POST['delete'])) {

    $sql = 'delete from user_tbl WHERE U_ID = :U_ID';  
    $stmt = $conn->prepare($sql);
    $p = ['U_ID' => $_POST["U_ID"]];
    $stmt->execute($p);

    $success = 'User has been Delete';
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
  <h3 class="text-center"> User </h3>
</div>

<div class="d-flex justify-content-center align-items-baseline " style="min-height: 69vh;">
    <table class="table" style="width: 60rem ">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Gmail</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlPro = "select * from user_tbl";
                $stmt = $conn->prepare($sqlPro);
                $stmt->execute();
                
                
                while ($row = $stmt->fetch()) {

            ?>
                    <tr>
                        <td><?php echo $row['U_ID']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['Gmail']; ?></td>
                        <td>
                            <input type="button" name="view" value="Edit"   id="<?php echo $row['U_ID'] ?>"  
                                class="btn btn-outline-primary U_Edit">

                            <input type="button" name="view" value="Delete" id="<?php echo $row['U_ID'] ?>"  
                                class="btn btn-outline-danger U_delete">
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
            $('.U_Edit').click(function() {
                var U_ID = $(this).attr("id");
                $.ajax({
                    url: "U_Edit.php",
                    method: "post",
                    data: {
                    U_ID: U_ID
                    },
                    success: function(data) {
                        $('#Product_detail').html(data);
                        $('#dataModal').modal("show");
                    }
                });
            });


            $('.U_delete').click(function() {
                var U_ID = $(this).attr("id");
                $.ajax({
                    url: "U_delete.php",
                    method: "post",
                    data: {
                    U_ID: U_ID
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