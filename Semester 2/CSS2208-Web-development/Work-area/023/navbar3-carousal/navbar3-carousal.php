<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Static web using Bootstrap</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  session_start();
  require_once('connect_PDO.php');
  ?>
  <!-- ส่วนหัวของเว็บไซต์ -->
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container">
      <a class="navbar-brand" href="navbar3.html">
        <img src="img2/logo1-tran.png" height="80" alt="ssru logo">
        <img src="images/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#herb">สมุนไพร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รักษาตามโรค</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">สูตรยาสมุนไพร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ร้านขายสมุนไพร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">ติดต่อเรา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ผู้จัดทำ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ส่วนสไลด์โชว์ DB -->
  <?php
  $sql = "select * from slide_tbl";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="container-fluid">
      <div class="carousel-indicators">
        <?php
        $i = 0;
        while ($row = $stmt->fetch()) {
          $actives = '';
          if ($i == 0) {
            $actives = 'active';
          }
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $actives; ?> "></button>
        <?php $i++;
        } ?>
      </div>
      <div class="carousel-inner">
        <?php
        $i = 0;
        $sql = "select * from slide_tbl";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
          echo $row["slide"];
          $actives = '';
          if ($i == 0) {
            $actives = 'active';
          }
        ?>
          <div class="carousel-item <?php echo $actives; ?>">
            <img class="d-block w-100" src="<?php echo $row['slide']; ?>" alt="devbanban">
          </div>
        <?php
          $i++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- ส่วนเนื้อหาของเว็บไซต์ Card  -->
    <section id="herb">
      <?php
      $sql2 = "select * from herb_tbl";
      $stmt = $conn->prepare($sql2);
      $stmt->execute();
      ?>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-auto">
        <?php
        while ($row = $stmt->fetch()) {
        ?>
          <div class="col">
            <div class="card -100">
              <center>
                <img class="card-img-top" height="350" src="<?php echo $row['Pic1']; ?>" alt="Card image cap">
              </center>

              <div class="card-body">
                <h5 class="card-title"><b>Name : </b><?php echo $row['Herb_Name']; ?></h5>
                <p class="card-text text-left"><b> Details : </b><br><?php echo $row['Details1']; ?></p>
              </div>
              <div class="card-footer text-end">
                <input type="button" name="view" value="อ่านต่อ" id="<?php echo $row["Herb_id"]; ?>" class="btn btn-success btn-xs view_data" />
              </div>
            </div>
          </div>
        <?php
        }  // End While
        ?>
      </div> <!-- end row -->
      <!-- cart ends here -->
    </section>
    <!-- ส่วนท้ายของเว็บไซต์ -->
    <footer class="text-center p-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <p> Copyright &copy; กลุ่มนักศึกษาวิทยาการคอมพิวเตอร์ 2021</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal ติดต่องาน -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ติดต่อเรา</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label>อีเมล</label>
                <input type="email" placeholder="ป้อนอีเมลของคุณ" class="form-control" />
              </div>
              <div class="form-group">
                <label>หัวข้อ</label>
                <input type="text" placeholder="เสนอหัวข้องานของคุณ" class="form-control" />
              </div>
              <div class="form-group">
                <label>รายละเอียด</label>
                <textarea id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal"> ยกเลิก </button>
            <button class="btn btn-success">ส่งข้อมูล</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal ของสมุมไพร-1 -->
    <div id="dataModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Herb Details</h4>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" id="herb_detail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.view_data').click(function() {
          var Herb_id = $(this).attr("id");
          $.ajax({
            url: "select.php",
            method: "post",
            data: {
              Herb_id: Herb_id
            },
            success: function(data) {
              $('#herb_detail').html(data);
              $('#dataModal').modal("show");
            }
          });
        });
      });
    </script>
</body>

</html>