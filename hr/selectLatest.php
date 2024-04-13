<?php
include ("../includes/connect.php");

//   error_log("Department received: " . $department);
  // Assuming you have a database connection established

  $userid = $_GET['userid'];

  $sql = "SELECT * FROM `salaryincrease` WHERE empNo ='$userid'";
  $result = mysqli_query($con, $sql);
  $information = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $information[] = $row;
  }

  echo json_encode($information);

?>