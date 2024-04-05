<?php
include ("../includes/connect.php");

//   error_log("Department received: " . $department);
  // Assuming you have a database connection established
  $sql = "SELECT * FROM `allowancetable`";
  $result = mysqli_query($con, $sql);
  $rowsListAllowance = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rowsListAllowance[] = $row;
  }

  echo json_encode($rowsListAllowance);

?>