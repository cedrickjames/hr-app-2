<?php
include ("../includes/connect.php");

//   error_log("Department received: " . $department);
  // Assuming you have a database connection established
  $sql = "SELECT * FROM `basicallowancesettings`";
  $result = mysqli_query($con, $sql);
  $rowsBasicAllowanceSettings = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rowsBasicAllowanceSettings[] = $row;
  }

  echo json_encode($rowsBasicAllowanceSettings);

?>