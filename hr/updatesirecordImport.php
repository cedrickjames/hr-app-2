<?php
include ("../includes/connect.php");

$from = $_GET['from'];
$dateOfEffectivity = $_GET['dateOfEffectivity'];
$daily = $_GET['daily'];
$level = $_GET['level'];
$basicSalary = $_GET['basicSalary'];
$monthlySalary = $_GET['monthlySalary'];
$posPe = $_GET['posPe'];
$posAllowance = $_GET['posAllowance'];
$posRank = $_GET['posRank'];
$empNumber = $_GET['empNumber'];
$id = $_GET['id'];
$firsthp = $_GET['firsthp'];
$firsthr = $_GET['firsthr'];
$secondhp = $_GET['secondhp'];
$secondhr = $_GET['secondhr'];
$finalp = $_GET['finalp'];
$finalr = $_GET['finalr'];
$fullName = $_GET['fullName'];


  $sql = "SELECT * FROM `basicallowancesettings`";
  $result = mysqli_query($con, $sql);
  $rowsBasicAllowanceSettings = array();


?>