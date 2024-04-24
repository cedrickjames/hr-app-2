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


  $sql = "SELECT * FROM `salaryincrease` WHERE `id` = '$id'";
  $result = mysqli_query($con, $sql);
  $rowCount = mysqli_num_rows($result);
  if($rowCount>0){
    while ($row = mysqli_fetch_assoc($result)){
      // $information[] = $row;
      $updatedFields = array();
      $dateModified = strftime('%B %d, %Y');


      if($level != $row["level"]){
        $updatedFields = array(
          'previousValue' =>  $row["level"],
          'updatedValue' => $salary
      );
      // echo $row["level"];
      // echo $salary;
      $category = "Basic Salary";
      $field = "level";
      $modifier = $fullName;
    
      $selecthistory24 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory24;
      $resultHistory24 = mysqli_query($con, $selecthistory24);
      $rowCount24 = mysqli_num_rows($resultHistory24);
      // echo $rowCount;
      if($rowCount24 > 0){
      // echo "Count: ",$rowCount;
      while($row24=mysqli_fetch_assoc($resultHistory24))
      {
      $rowId24 = $row24["id"];
      $updateHistory24 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId24'";
    
      // echo "result", $updateHistory24;
      $resulUpdatetHistory24 = mysqli_query($con, $updateHistory24);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["level"];
      $insertHistory23 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$level', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory23 = mysqli_query($con, $insertHistory23);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($basicSalary != $row["basicSalary"]){
        $updatedFields = array(
          'previousValue' =>  $row["basicSalary"],
          'updatedValue' => $salary
      );
      // echo $row["basicSalary"];
      // echo $salary;
      $category = "Basic Salary";
      $field = "basicSalary";
      $modifier = $fullName;
    
      $selecthistory24 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory24;
      $resultHistory24 = mysqli_query($con, $selecthistory24);
      $rowCount24 = mysqli_num_rows($resultHistory24);
      // echo $rowCount;
      if($rowCount24 > 0){
      // echo "Count: ",$rowCount;
      while($row24=mysqli_fetch_assoc($resultHistory24))
      {
      $rowId24 = $row24["id"];
      $updateHistory24 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId24'";
    
      // echo "result", $updateHistory24;
      $resulUpdatetHistory24 = mysqli_query($con, $updateHistory24);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["basicSalary"];
      $insertHistory24 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$basicSalary', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory24 = mysqli_query($con, $insertHistory24);
    
      // echo "result", $insertHistory;
    
      }
      }



      if($daily != $row["daily"]){
        $updatedFields = array(
          'previousValue' =>  $row["daily"],
          'updatedValue' => $salary
      );
      // echo $row["daily"];
      // echo $salary;
      $category = "Salary Increase";
      $field = "daily";
      $modifier = $fullName;
    
      $selecthistory25 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory25;
      $resultHistory25 = mysqli_query($con, $selecthistory25);
      $rowCount25 = mysqli_num_rows($resultHistory25);
      // echo $rowCount;
      if($rowCount25 > 0){
      // echo "Count: ",$rowCount;
      while($row25=mysqli_fetch_assoc($resultHistory25))
      {
      $rowId25 = $row25["id"];
      $updateHistory25 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId25'";
    
      // echo "result", $updateHistory25;
      $resulUpdatetHistory25 = mysqli_query($con, $updateHistory25);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["daily"];
      $insertHistory25 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$daily', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory25 = mysqli_query($con, $insertHistory25);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($monthlySalary != $row["monthlySalary"]){
        $updatedFields = array(
          'previousValue' =>  $row["monthlySalary"],
          'updatedValue' => $salary
      );
      // echo $row["monthlySalary"];
      // echo $salary;
      $category = "Basic Salary";
      $field = "monthlySalary";
      $modifier = $fullName;
    
      $selecthistory26 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory26;
      $resultHistory26 = mysqli_query($con, $selecthistory26);
      $rowCount26 = mysqli_num_rows($resultHistory26);
      // echo $rowCount;
      if($rowCount26 > 0){
      // echo "Count: ",$rowCount;
      while($row26=mysqli_fetch_assoc($resultHistory26))
      {
      $rowId26 = $row26["id"];
      $updateHistory26 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId26'";
    
      // echo "result", $updateHistory26;
      $resulUpdatetHistory26 = mysqli_query($con, $updateHistory26);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["monthlySalary"];
      $insertHistory26 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$monthlySalary', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory26 = mysqli_query($con, $insertHistory26);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($posPe != $row["pPEPoint"]){
        $updatedFields = array(
          'previousValue' =>  $row["pPEPoint"],
          'updatedValue' => $salary
      );
      // echo $row["pPEPoint"];
      // echo $salary;
      $category = "Position";
      $field = "pPEPoint";
      $modifier = $fullName;
    
      $selecthistory27 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory27;
      $resultHistory27 = mysqli_query($con, $selecthistory27);
      $rowCount27 = mysqli_num_rows($resultHistory27);
      // echo $rowCount;
      if($rowCount27 > 0){
      // echo "Count: ",$rowCount;
      while($row27=mysqli_fetch_assoc($resultHistory27))
      {
      $rowId27 = $row27["id"];
      $updateHistory27 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId27'";
    
      // echo "result", $updateHistory27;
      $resulUpdatetHistory27 = mysqli_query($con, $updateHistory27);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["pPEPoint"];
      $insertHistory27 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$posPe', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory27 = mysqli_query($con, $insertHistory27);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($posAllowance != $row["pAllowance"]){
        $updatedFields = array(
          'previousValue' =>  $row["pAllowance"],
          'updatedValue' => $salary
      );
      // echo $row["pAllowance"];
      // echo $salary;
      $category = "Position";
      $field = "pAllowance";
      $modifier = $fullName;
    
      $selecthistory28 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory28;
      $resultHistory28 = mysqli_query($con, $selecthistory28);
      $rowCount28 = mysqli_num_rows($resultHistory28);
      // echo $rowCount;
      if($rowCount28 > 0){
      // echo "Count: ",$rowCount;
      while($row28=mysqli_fetch_assoc($resultHistory28))
      {
      $rowId28 = $row28["id"];
      $updateHistory28 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId28'";
    
      // echo "result", $updateHistory28;
      $resulUpdatetHistory28 = mysqli_query($con, $updateHistory28);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["pAllowance"];
      $insertHistory28 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$posAllowance', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory28 = mysqli_query($con, $insertHistory28);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($posRank != $row["pRank"]){
        $updatedFields = array(
          'previousValue' =>  $row["pRank"],
          'updatedValue' => $salary
      );
      // echo $row["pRank"];
      // echo $salary;
      $category = "Position";
      $field = "pRank";
      $modifier = $fullName;
    
      $selecthistory29 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory29;
      $resultHistory29 = mysqli_query($con, $selecthistory29);
      $rowCount29 = mysqli_num_rows($resultHistory29);
      // echo $rowCount;
      if($rowCount29 > 0){
      // echo "Count: ",$rowCount;
      while($row29=mysqli_fetch_assoc($resultHistory29))
      {
      $rowId29 = $row29["id"];
      $updateHistory29 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId29'";
    
      // echo "result", $updateHistory29;
      $resulUpdatetHistory29 = mysqli_query($con, $updateHistory29);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["pRank"];
      $insertHistory29 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$posRank', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory29 = mysqli_query($con, $insertHistory29);
    
      // echo "result", $insertHistory;
    
      }
      }

      if($from == "import"){
        $updateSalaryIncreaseSql = "UPDATE `salaryincrease` SET `level`='$level', `salaryType`='$salary', `basicSalary`='$basicSalary', `daily`='$daily', `monthlySalary`='$monthlySalary', `pPEPoint`='$posPe', `pAllowance`='$posAllowance', `pRank`='$posRank', `fstHalfPoint`='$firsthp',`fstHalfResult`='$firsthr',`sndHalfPoint`='$secondhp',`sndHalfResult`='$secondhr',`FinalPoint`='$finalp',`FinalResult`='$finalr'  WHERE `id` = '$id'";
        $resultupdateSalaryIncreaseSql = mysqli_query($con, $updateSalaryIncreaseSql);

        


      }




    }
  }




?>