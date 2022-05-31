<!DOCTYPE html>
<html lang="en">

<?php
  include('include/head.php')
  ?>
<body>
  <?php
  session_start();
  require_once('connect_PDO.php');
  ?>

  <?php
  include('include/navbar.php')
  ?>

  <h1 class="text-center py-3">Model</h1>

  <!--Card-->
  <section id="product">
      <?php
      $sqlPro = "select * from product where Catalog = 'Model'";
      $stmt = $conn->prepare($sqlPro);
      $stmt->execute();
      ?>
      <div class="row row-cols-3 row-cols-md-4 g-5 mt-auto " style="border:10px ; padding:10px 10px 10px 10px; margin:30px;">
        <?php
        while ($row = $stmt->fetch()) {
        ?>
          <div class="col">
            <div class="card h-100" style="width: 18rem;">
              <center>
                <img class="card-img-top" height="250" src="<?php echo $row['P_image']; ?>" alt="Card image cap">
              </center>

              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $row['Name']; ?></h5>

                <?php if($row['Promotion'] == "False"): ?>
                    <div class="cost mt-3 text-dark text-center">
                        <span> <b><?php echo $row['Price']; ?></b><b>.- </b>  </span> 
                    </div>
                <?php else: ?>
                    <div class="cost mt-3 text-dark text-center">
                        <span> <b>sale!! </b><b><?php echo $row['Price']; ?></b><b>.- </b>  </span> 
                    </div>
                <?php endif ?>

              </div>
              <div class="card-footer text-center">
                <input type="button" name="view" value="more information" id="<?php echo $row["P_ID"]; ?>" class="btn btn-outline-primery btn-xs Show-more" />
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
  </section>

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

  <!--modal-->
  <div id="dataModal" class="modal fade">
      <div class="modal-dialog ">
        <div class="modal-content" id="Product_detail">
        </div>
      </div>
  </div>


    <script>
      
      $(document).ready(function() {
        $('.Show-more').click(function() {
          var P_ID = $(this).attr("id");
          $.ajax({
            url: "modal.php",
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
      });
      
  </script>

</body>
    

