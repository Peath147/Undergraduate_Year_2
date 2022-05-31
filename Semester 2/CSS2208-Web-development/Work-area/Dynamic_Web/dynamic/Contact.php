<!DOCTYPE html>
<html lang="en">
  
  <?php
  session_start();
  require_once('connect_PDO.php');

  include('include/head.php')
  ?>

<body>
  

  <?php
  include('include/navbar.php')
  ?>

  <!-- Container -->
  <div container-fluid class="py-5">
    <div class="row justify-content-center">
      <div class="col-3">
        <img src="_images/LOGO_FRIEND_STUDIO.PNG" height="400" width="400">
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12">
        <p class="fs-1 text-center">Friend Studio</p>
      </div>
      <div class="col-1">
        <p class="fs-3">Tell</p>
      </div>
      <div class="col-1">
        <p class="fs-3">: -----</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        <p class="fs-3">Gmail</p>
      </div>
      <div class="col-1">
        <p class="fs-3">: -----</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        <p class="fs-3">Address</p>
      </div>
      <div class="col-1">
        <p class="fs-3">: -----</p>
      </div>
    </div>
    <div class="row justify-content-center py-4">
      <div class="col-1">
        <p class="fs-3"> นาย <br>
                         นางสาว <br>
                         นางสาว <br>
                         นาย</p>
      </div>
      <div class="col-2">
        <p class="fs-3"> นายธีรภัทร <br>
                         รัชนาถ <br>
                         ชนิสรา <br>
                         สุรดิษ</p>
      </div>
      <div class="col-2">
        <p class="fs-3"> ศรีคิรินทร์ <br>
                         ต่อมณี   <br>
                         ใจเย็น   <br>
                         หิรัญญานนท์</p>
      </div>
      <div class="col-1">
        <p class="fs-3"> 63122201001<br>
                         63122201013<br>
                         63122201019<br>
                         63122201023</p>
      </div>
    </div>
  </div>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>