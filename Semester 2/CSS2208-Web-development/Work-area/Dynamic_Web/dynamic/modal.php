<?php
 if(isset($_POST["P_ID"]))
 {
    $output = '';
    require_once('connect_PDO.php');
    $sql = "SELECT * FROM product WHERE P_ID = '".$_POST["P_ID"]."'";  
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $output .= '
      <div class="table-responsive">  
           <table class="table table-bordered">';
        while($row = $stmt->fetch())
        {
            $output .='
                <div class="modal-header">
                    <h5 class="modal-title"> '.$row["Name"].' </h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    '.$row["Details"].'
                </div>
                <div class="modal-footer">
                    <p class="fs-3">
                    ราคา '.$row["Price"].'.-
                    </p>
                    <button class="btn btn-secondary" data-bs-dismiss="modal"> cancel </button>
                </div>
            ';
        }
      $output .= '</table></div>';
      echo $output;
 }
?>