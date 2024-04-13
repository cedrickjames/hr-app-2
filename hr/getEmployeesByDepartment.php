<?php
include ("../includes/connect.php");

//   error_log("Department received: " . $department);
  // Assuming you have a database connection established

  $department = $_GET['department'];

  if($department == "all"){
    $sql = "SELECT * from salaryincrease WHERE deactivated = 0 order by id desc";
    $result = mysqli_query($con, $sql);
    $employees = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $employees[] = $row;
    }
  
    echo json_encode($employees);
  
  }
  else{
    $sql = "SELECT * from salaryincrease WHERE department = '$department' AND deactivated = 0 order by id desc";
    $result = mysqli_query($con, $sql);
    $employees = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $employees[] = $row;
    }
  
    echo json_encode($employees);
  }
 
?>