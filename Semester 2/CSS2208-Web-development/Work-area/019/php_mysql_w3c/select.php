<?php  
 if(isset($_POST["Herb_id"]))  
 {  
      $output = '';  
      require_once('connect_PDO.php');
      $sql = "SELECT * FROM herb_tbl WHERE Herb_id = '".$_POST["Herb_id"]."'";  
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = $stmt->fetch())  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Herb Name</label></td>  
                     <td width="70%">'.$row["Herb_Name"].'</td>  
                </tr>  
	      <tr>  
                     <td width="50%"> <img  src='.$row["Pic2"].' > </td>  
                     <td width="50%"><img  src='.$row["Pic3"].' ></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Details1</label></td>  
                     <td width="70%">'.$row["Details1"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Scientific Name</label></td>  
                     <td width="70%">'.$row["Scientific_Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Common Name</label></td>  
                     <td width="70%">'.$row["Common_Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Family</label></td>  
                     <td width="70%">'.$row["Family"].' Year</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Details2</label></td>  
                     <td width="70%">'.$row["Details2"].' Year</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
     }
      ?>