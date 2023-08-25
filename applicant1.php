<?php
    include "config.php";
    $sql_admin = "SELECT  SUM(id) AS id FROM candidate_table";
    $result_admin = mysqli_query($conn, $sql_admin);
  $row1 = array();
    while($row_admin = mysqli_fetch_assoc($result_admin)){
      echo $row_admin['id'];

 
    }
  
?>