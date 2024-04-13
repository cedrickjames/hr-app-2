
<?php
date_default_timezone_set('Asia/Manila'); // You can change the timezone as per your requirement


if(isset($_POST['updatesirecord'])){
   $from = "manual" ;
  
   $formattedDate  = $_POST['dateOfEffectivity'];
  //  echo $formattedDate;
   $dateOfEffectivity = date('Y-m-d', strtotime($formattedDate));
// echo $dateOfEffectivity;
   $daily = $_POST['dailySalary'];
   $level = $_POST['level'];
   $basicSalary = $_POST['basicSalary'];
   $monthlySalary = $_POST['monthlySalary'];
   $posPe = $_POST['posPePoint'];
   $posAllowance = $_POST['posAllowance'];
   $posRank = $_POST['posRank'];
   $empNumber = $_POST['employeeId'];
   $id = $_POST['infoId'];
   $department = $_POST['department'];
   $section = $_POST['section'];
   $empName = $_POST['empName'];
   $position = $_POST['position'];
   $classEmp = $_POST['classEmp'];
   $designation = "";

       $designation = $_POST['designation'];
   
       if($designation!=""){
         
       $designation = implode(', ', $designation);
       }
       $salary =$_POST['salaryType'];
       $tsPEPoint =$_POST['tsPEPoint'];
       $tsAllowance =$_POST['tsAllowance'];
       $tsRank =$_POST['tsRank'];
       $leLicenseFee =$_POST['leLicenseFee'];
       $lePEPoint =$_POST['lePEPoint'];
       $leAllowance =$_POST['leAllowance'];
       $leRank =$_POST['leRank'];
       $ceCertificateOnFee =$_POST['ceCertificateOnFee'];
       $cePEPoint =$_POST['cePEPoint'];
       $ceAllowance =$_POST['ceAllowance'];
       $ceRank =$_POST['ceRank'];
       $Specialization =$_POST['Specialization'];
       $newBirthday =$_POST['birthday'];
       $birthday = date('j-M-y', strtotime($newBirthday));
       $age =$_POST['age'];
       $sex =$_POST['sex'];
       $firsthp =$_POST['firstHalf'];
         $firsthr =$_POST['firstResult'];
         $secondhp =$_POST['secondHalf'];
         $secondhr =$_POST['secondResult'];
         $finalp =$_POST['finalPoint'];
         $finalr =$_POST['finalResult'];
         $levelup =$_POST['levelPoint'];
       $newDateHired =$_POST['dateHired'];
       $dateHired = date('j-M-y', strtotime($newDateHired));
       $serviceTerm =$_POST['serviceTerm'];
       $fullName =$_SESSION['name'];


       $selectempInfo = "SELECT * FROM `salaryincrease` WHERE `id` = '$id'";
       $resultEmpInfo = mysqli_query($con, $selectempInfo);
       while($row=mysqli_fetch_assoc($resultEmpInfo))
       {
        $updatedFields = array();
        $dateModified = strftime('%B %d, %Y');
        if($from == "manual"){
          if($department != $row["department"]){
            $updatedFields = array(
              'previousValue' =>  $row["department"],
              'updatedValue' => $department
          );
          // echo $row["sex"];
          // echo $row["department"];
          // echo $department;
          $category = "Basic Information";
          $field = "department";
          $modifier = $fullName;

          
       $selecthistory1 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      //  echo "sql: ",$selecthistory;
       $resultHistory1 = mysqli_query($con, $selecthistory1);
       $rowCount1 = mysqli_num_rows($resultHistory1);
      //  echo $rowCount;
       if($rowCount1 > 0){
        // echo "Count: ",$rowCount;
        while($row1=mysqli_fetch_assoc($resultHistory1))
        {
          $rowId1 = $row1["id"];
          $updateHistory1 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$department',`modifier`='$modifier' WHERE `id` = '$rowId1'";

          // echo "result", $updateHistory;
          $resulUpdatetHistory1 = mysqli_query($con, $updateHistory1);
        }
       }
       else{
        // echo "Count: ",$rowCount;
        $oldField = $row["department"];
        $insertHistory1 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$department', '$modifier', '$dateOfEffectivity')";
        $resultInsertHistory1 = mysqli_query($con, $insertHistory1);

        // echo "result", $insertHistory;
            
           }
          }
         if($section != $row["section"]){
            $updatedFields = array(
              'previousValue' =>  $row["section"],
              'updatedValue' => $section
          );
          // echo $row["section"];
          // echo $section;
          $category = "Basic Information";
          $field = "section";
          $modifier = $fullName;

       $selecthistory2 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      //  echo "sql: ",$selecthistory;
       $resultHistory2 = mysqli_query($con, $selecthistory2);
       $rowCount2 = mysqli_num_rows($resultHistory2);
      //  echo $rowCount;
       if($rowCount2 > 0){
        // echo "Count: ",$rowCount;
        while($row2=mysqli_fetch_assoc($resultHistory2))
        {
          $rowId2 = $row2["id"];
          $updateHistory2 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$section',`modifier`='$modifier' WHERE `id` = '$rowId2'";

          // echo "result", $updateHistory;
          $resulUpdatetHistory2 = mysqli_query($con, $updateHistory2);
        }
       }
       else{
        // echo "Count: ",$rowCount;
        $oldField = $row["section"];
  //  echo $section;
  //  echo $row['section'];

        $insertHistory2 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$section', '$modifier', '$dateOfEffectivity')";
        $resultInsertHistory2 = mysqli_query($con, $insertHistory2);

        // echo "result", $insertHistory2;

         }
      }

      if($empName != $row["employeeName"]){
        $updatedFields = array(
          'previousValue' =>  $row["employeeName"],
          'updatedValue' => $empName
      );
      // echo $row["employeeName"];
      // echo $empName;
      $category = "Basic Information";
      $field = "employeeName";
      $modifier = $fullName;

   $selecthistory3 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
  //  echo "sql: ",$selecthistory;
   $resultHistory3 = mysqli_query($con, $selecthistory3);
   $rowCount2 = mysqli_num_rows($resultHistory3);
  //  echo $rowCount;
   if($rowCount2 > 0){
    // echo "Count: ",$rowCount;
    while($row3=mysqli_fetch_assoc($resultHistory3))
    {
      $rowId3 = $row3["id"];
      $updateHistory3 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$empName',`modifier`='$modifier' WHERE `id` = '$rowId3'";

      // echo "result", $updateHistory;
      $resulUpdatetHistory3 = mysqli_query($con, $updateHistory3);
    }
   }
   else{
    // echo "Count: ",$rowCount;
    $oldField = $row["employeeName"];
    $insertHistory3 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$empName', '$modifier', '$dateOfEffectivity')";
    $resultInsertHistory3 = mysqli_query($con, $insertHistory3);

    // echo "result", $insertHistory;

     }
  }

          if($sex != $row["sex"]){
            $updatedFields = array(
              'previousValue' =>  $row["sex"],
              'updatedValue' => $sex
          );
          // echo $row["sex"];
          // echo $sex;
          $category = "Basic Information";
          $field = "sex";
          $modifier = $fullName;

        $selecthistory4 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
        // echo "sql: ",$selecthistory;
        $resultHistory4 = mysqli_query($con, $selecthistory4);
        $rowCount4 = mysqli_num_rows($resultHistory4);
        // echo $rowCount;
        if($rowCount4 > 0){
        // echo "Count: ",$rowCount;
        while($row4=mysqli_fetch_assoc($resultHistory4))
        {
          $rowId4 = $row4["id"];
          $updateHistory4 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$sex',`modifier`='$modifier' WHERE `id` = '$rowId4'";

          // echo "result", $updateHistory;
          $resulUpdatetHistory4 = mysqli_query($con, $updateHistory4);
        }
        }
        else{
        // echo "Count: ",$rowCount;
        $oldField = $row["sex"];
        $insertHistory4 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$sex', '$modifier', '$dateOfEffectivity')";
        $resultInsertHistory4 = mysqli_query($con, $insertHistory4);

        // echo "result", $insertHistory;

        }
        }
        if($birthday != $row["birthday"]){
          $updatedFields = array(
            'previousValue' =>  $row["birthday"],
            'updatedValue' => $birthday
        );
        // echo $row["birthday"];
        // echo $birthday;
        $category = "Basic Information";
        $field = "birthday";
        $modifier = $fullName;

      $selecthistory5 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
      // echo "sql: ",$selecthistory5;
      $resultHistory5 = mysqli_query($con, $selecthistory5);
      $rowCount5 = mysqli_num_rows($resultHistory5);
      // echo $rowCount;
      if($rowCount5 > 0){
      // echo "Count: ",$rowCount;
      while($row5=mysqli_fetch_assoc($resultHistory5))
      {
        $rowId5 = $row5["id"];
        $updateHistory5 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$birthday',`modifier`='$modifier' WHERE `id` = '$rowId5'";

        // echo "result", $updateHistory5;
        $resulUpdatetHistory5 = mysqli_query($con, $updateHistory5);
      }
      }
      else{
      // echo "Count: ",$rowCount;
      $oldField = $row["birthday"];
      $insertHistory5 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$birthday', '$modifier', '$dateOfEffectivity')";
      $resultInsertHistory5 = mysqli_query($con, $insertHistory5);

      // echo "result", $insertHistory;

      }
      }
      if($age != $row["age"]){
        $updatedFields = array(
          'previousValue' =>  $row["age"],
          'updatedValue' => $age
      );
      // echo $row["age"];
      // echo $age;
      $category = "Basic Information";
      $field = "age";
      $modifier = $fullName;

    $selecthistory6 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
    // echo "sql: ",$selecthistory6;
    $resultHistory6 = mysqli_query($con, $selecthistory6);
    $rowCount6 = mysqli_num_rows($resultHistory6);
    // echo $rowCount;
    if($rowCount6 > 0){
    // echo "Count: ",$rowCount;
    while($row6=mysqli_fetch_assoc($resultHistory6))
    {
      $rowId6 = $row6["id"];
      $updateHistory6 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$age',`modifier`='$modifier' WHERE `id` = '$rowId6'";

      // echo "result", $updateHistory6;
      $resulUpdatetHistory6 = mysqli_query($con, $updateHistory6);
    }
    }
    else{
    // echo "Count: ",$rowCount;
    $oldField = $row["age"];
    $insertHistory6 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$age', '$modifier', '$dateOfEffectivity')";
    $resultInsertHistory6 = mysqli_query($con, $insertHistory6);

    // echo "result", $insertHistory;

    }
    }
    if($empNumber != $row["empNo"]){
      $updatedFields = array(
        'previousValue' =>  $row["empNo"],
        'updatedValue' => $empNumber
    );
    // echo $row["empNo"];
    // echo $empNumber;
    $category = "Basic Information";
    $field = "empNo";
    $modifier = $fullName;

  $selecthistory7 = "SELECT * FROM `history` WHERE `employeeId` = '$empNumber' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
  // echo "sql: ",$selecthistory7;
  $resultHistory7 = mysqli_query($con, $selecthistory7);
  $rowCount7 = mysqli_num_rows($resultHistory7);
  // echo $rowCount;
  if($rowCount7 > 0){
  // echo "Count: ",$rowCount;
  while($row7=mysqli_fetch_assoc($resultHistory7))
  {
    $rowId7 = $row7["id"];
    $updateHistory7 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$empNumber',`modifier`='$modifier' WHERE `id` = '$rowId7'";

    // echo "result", $updateHistory7;
    $resulUpdatetHistory7 = mysqli_query($con, $updateHistory7);
  }
  }
  else{
  // echo "Count: ",$rowCount;
  $oldField = $row["empNo"];
  $insertHistory7 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$empNumber', '$modifier', '$dateOfEffectivity')";
  $resultInsertHistory7 = mysqli_query($con, $insertHistory7);

  // echo "result", $insertHistory;

  }
  }

  if($dateHired != $row["dateHired"]){
    $updatedFields = array(
      'previousValue' =>  $row["dateHired"],
      'updatedValue' => $dateHired
  );
  // echo $row["dateHired"];
  // echo $dateHired;
  $category = "Basic Information";
  $field = "dateHired";
  $modifier = $fullName;

$selecthistory7 = "SELECT * FROM `history` WHERE `employeeId` = '$dateHired' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory7;
$resultHistory7 = mysqli_query($con, $selecthistory7);
$rowCount7 = mysqli_num_rows($resultHistory7);
// echo $rowCount;
if($rowCount7 > 0){
// echo "Count: ",$rowCount;
while($row7=mysqli_fetch_assoc($resultHistory7))
{
  $rowId7 = $row7["id"];
  $updateHistory7 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$dateHired',`modifier`='$modifier' WHERE `id` = '$rowId7'";

  // echo "result", $updateHistory7;
  $resulUpdatetHistory7 = mysqli_query($con, $updateHistory7);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["dateHired"];
$insertHistory7 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$dateHired', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory7 = mysqli_query($con, $insertHistory7);

// echo "result", $insertHistory;

}
}


if($position != $row["position"]){
  $updatedFields = array(
    'previousValue' =>  $row["position"],
    'updatedValue' => $position
);
// echo $row["position"];
// echo $position;
$category = "Position / Designation";
$field = "position";
$modifier = $fullName;

$selecthistory8 = "SELECT * FROM `history` WHERE `employeeId` = '$position' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory8;
$resultHistory8 = mysqli_query($con, $selecthistory8);
$rowCount8 = mysqli_num_rows($resultHistory8);
// echo $rowCount;
if($rowCount8 > 0){
// echo "Count: ",$rowCount;
while($row8=mysqli_fetch_assoc($resultHistory8))
{
$rowId8 = $row8["id"];
$updateHistory8 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$position',`modifier`='$modifier' WHERE `id` = '$rowId8'";

// echo "result", $updateHistory8;
$resulUpdatetHistory8 = mysqli_query($con, $updateHistory8);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["position"];
$insertHistory8 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$position', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory8 = mysqli_query($con, $insertHistory8);

// echo "result", $insertHistory;

}
}
if($designation != $row["designation"]){
  $updatedFields = array(
    'previousValue' =>  $row["designation"],
    'updatedValue' => $designation
);
// echo $row["designation"];
// echo $designation;
$category = "Position / Designation";
$field = "designation";
$modifier = $fullName;

$selecthistory9 = "SELECT * FROM `history` WHERE `employeeId` = '$designation' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory9;
$resultHistory9 = mysqli_query($con, $selecthistory9);
$rowCount9 = mysqli_num_rows($resultHistory9);
// echo $rowCount;
if($rowCount9 > 0){
// echo "Count: ",$rowCount;
while($row9=mysqli_fetch_assoc($resultHistory9))
{
$rowId9 = $row9["id"];
$updateHistory9 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$designation',`modifier`='$modifier' WHERE `id` = '$rowId9'";

// echo "result", $updateHistory9;
$resulUpdatetHistory9 = mysqli_query($con, $updateHistory9);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["designation"];
$insertHistory9 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$designation', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory9 = mysqli_query($con, $insertHistory9);

// echo "result", $insertHistory;

}
}

if($classEmp != $row["class"]){
  $updatedFields = array(
    'previousValue' =>  $row["class"],
    'updatedValue' => $classEmp
);
// echo $row["class"];
// echo $classEmp;
$category = "Basic Salary";
$field = "class";
$modifier = $fullName;

$selecthistory10 = "SELECT * FROM `history` WHERE `employeeId` = '$classEmp' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory10;
$resultHistory10 = mysqli_query($con, $selecthistory10);
$rowCount10 = mysqli_num_rows($resultHistory10);
// echo $rowCount;
if($rowCount10 > 0){
// echo "Count: ",$rowCount;
while($row10=mysqli_fetch_assoc($resultHistory10))
{
$rowId10 = $row10["id"];
$updateHistory10 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$classEmp',`modifier`='$modifier' WHERE `id` = '$rowId10'";

// echo "result", $updateHistory10;
$resulUpdatetHistory10 = mysqli_query($con, $updateHistory10);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["class"];
$insertHistory10 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$classEmp', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory10 = mysqli_query($con, $insertHistory10);

// echo "result", $insertHistory;

}
}

if($salary != $row["salaryType"]){
  $updatedFields = array(
    'previousValue' =>  $row["salaryType"],
    'updatedValue' => $salary
);
// echo $row["salaryType"];
// echo $salary;
$category = "Basic Salary";
$field = "salaryType";
$modifier = $fullName;

$selecthistory11 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory11;
$resultHistory11 = mysqli_query($con, $selecthistory11);
$rowCount11 = mysqli_num_rows($resultHistory11);
// echo $rowCount;
if($rowCount11 > 0){
// echo "Count: ",$rowCount;
while($row11=mysqli_fetch_assoc($resultHistory11))
{
$rowId11 = $row11["id"];
$updateHistory11 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId11'";

// echo "result", $updateHistory11;
$resulUpdatetHistory11 = mysqli_query($con, $updateHistory11);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["salaryType"];
$insertHistory11 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$salary', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory11 = mysqli_query($con, $insertHistory11);

// echo "result", $insertHistory;

}
}

if($tsPEPoint != $row["tsPEPoint"]){
  $updatedFields = array(
    'previousValue' =>  $row["tsPEPoint"],
    'updatedValue' => $salary
);
// echo $row["tsPEPoint"];
// echo $salary;
$category = "Technical Skills / Special Experience";
$field = "tsPEPoint";
$modifier = $fullName;

$selecthistory12 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory12;
$resultHistory12 = mysqli_query($con, $selecthistory12);
$rowCount12 = mysqli_num_rows($resultHistory12);
// echo $rowCount;
if($rowCount12 > 0){
// echo "Count: ",$rowCount;
while($row12=mysqli_fetch_assoc($resultHistory12))
{
$rowId12 = $row12["id"];
$updateHistory12 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId12'";

// echo "result", $updateHistory12;
$resulUpdatetHistory12 = mysqli_query($con, $updateHistory12);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["tsPEPoint"];
$insertHistory12 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$tsPEPoint', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory12 = mysqli_query($con, $insertHistory12);

// echo "result", $insertHistory;

}
}

if($tsAllowance != $row["tsAllowance"]){
  $updatedFields = array(
    'previousValue' =>  $row["tsAllowance"],
    'updatedValue' => $salary
);
// echo $row["tsAllowance"];
// echo $salary;
$category = "Technical Skills / Special Experience";
$field = "tsAllowance";
$modifier = $fullName;

$selecthistory13 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory13;
$resultHistory13 = mysqli_query($con, $selecthistory13);
$rowCount13 = mysqli_num_rows($resultHistory13);
// echo $rowCount;
if($rowCount13 > 0){
// echo "Count: ",$rowCount;
while($row13=mysqli_fetch_assoc($resultHistory13))
{
$rowId13 = $row13["id"];
$updateHistory13 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId13'";

// echo "result", $updateHistory13;
$resulUpdatetHistory13 = mysqli_query($con, $updateHistory13);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["tsAllowance"];
$insertHistory13 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$tsAllowance', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory13 = mysqli_query($con, $insertHistory13);

// echo "result", $insertHistory;

}
}
if($tsRank != $row["tsRank"]){
  $updatedFields = array(
    'previousValue' =>  $row["tsRank"],
    'updatedValue' => $salary
);
// echo $row["tsRank"];
// echo $salary;
$category = "Technical Skills / Special Experience";
$field = "tsRank";
$modifier = $fullName;

$selecthistory14 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory14;
$resultHistory14 = mysqli_query($con, $selecthistory14);
$rowCount14 = mysqli_num_rows($resultHistory14);
// echo $rowCount;
if($rowCount14 > 0){
// echo "Count: ",$rowCount;
while($row14=mysqli_fetch_assoc($resultHistory14))
{
$rowId14 = $row14["id"];
$updateHistory14 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId14'";

// echo "result", $updateHistory14;
$resulUpdatetHistory14 = mysqli_query($con, $updateHistory14);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["tsRank"];
$insertHistory14 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$tsRank', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory14 = mysqli_query($con, $insertHistory14);

// echo "result", $insertHistory;

}
}

if($leLicenseFee != $row["leLicenseFee"]){
  $updatedFields = array(
    'previousValue' =>  $row["leLicenseFee"],
    'updatedValue' => $salary
);
// echo $row["leLicenseFee"];
// echo $salary;
$category = "License / Evaluation";
$field = "leLicenseFee";
$modifier = $fullName;

$selecthistory15 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory15;
$resultHistory15 = mysqli_query($con, $selecthistory15);
$rowCount15 = mysqli_num_rows($resultHistory15);
// echo $rowCount;
if($rowCount15 > 0){
// echo "Count: ",$rowCount;
while($row15=mysqli_fetch_assoc($resultHistory15))
{
$rowId15 = $row15["id"];
$updateHistory15 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId15'";

// echo "result", $updateHistory15;
$resulUpdatetHistory15 = mysqli_query($con, $updateHistory15);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["leLicenseFee"];
$insertHistory15 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$leLicenseFee', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory15 = mysqli_query($con, $insertHistory15);

// echo "result", $insertHistory;

}
}


if($lePEPoint != $row["lePEPoint"]){
  $updatedFields = array(
    'previousValue' =>  $row["lePEPoint"],
    'updatedValue' => $salary
);
// echo $row["lePEPoint"];
// echo $salary;
$category = "License / Evaluation";
$field = "lePEPoint";
$modifier = $fullName;

$selecthistory16 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory16;
$resultHistory16 = mysqli_query($con, $selecthistory16);
$rowCount16 = mysqli_num_rows($resultHistory16);
// echo $rowCount;
if($rowCount16 > 0){
// echo "Count: ",$rowCount;
while($row16=mysqli_fetch_assoc($resultHistory16))
{
$rowId16 = $row16["id"];
$updateHistory16 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId16'";

// echo "result", $updateHistory16;
$resulUpdatetHistory16 = mysqli_query($con, $updateHistory16);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["lePEPoint"];
$insertHistory16 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$lePEPoint', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory16 = mysqli_query($con, $insertHistory16);

// echo "result", $insertHistory;

}
}


if($leAllowance != $row["leAllowance"]){
  $updatedFields = array(
    'previousValue' =>  $row["leAllowance"],
    'updatedValue' => $salary
);
// echo $row["leAllowance"];
// echo $salary;
$category = "License / Evaluation";
$field = "leAllowance";
$modifier = $fullName;

$selecthistory17 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory17;
$resultHistory17 = mysqli_query($con, $selecthistory17);
$rowCount17 = mysqli_num_rows($resultHistory17);
// echo $rowCount;
if($rowCount17 > 0){
// echo "Count: ",$rowCount;
while($row17=mysqli_fetch_assoc($resultHistory17))
{
$rowId17 = $row17["id"];
$updateHistory17 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId17'";

// echo "result", $updateHistory17;
$resulUpdatetHistory17 = mysqli_query($con, $updateHistory17);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["leAllowance"];
$insertHistory17 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$leAllowance', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory17 = mysqli_query($con, $insertHistory17);

// echo "result", $insertHistory;

}
}

if($leRank != $row["leRank"]){
  $updatedFields = array(
    'previousValue' =>  $row["leRank"],
    'updatedValue' => $salary
);
// echo $row["leRank"];
// echo $salary;
$category = "License / Evaluation";
$field = "leRank";
$modifier = $fullName;

$selecthistory18 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory18;
$resultHistory18 = mysqli_query($con, $selecthistory18);
$rowCount18 = mysqli_num_rows($resultHistory18);
// echo $rowCount;
if($rowCount18 > 0){
// echo "Count: ",$rowCount;
while($row18=mysqli_fetch_assoc($resultHistory18))
{
$rowId18 = $row18["id"];
$updateHistory18 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId18'";

// echo "result", $updateHistory18;
$resulUpdatetHistory18 = mysqli_query($con, $updateHistory18);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["leRank"];
$insertHistory18 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$leRank', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory18 = mysqli_query($con, $insertHistory18);

// echo "result", $insertHistory;

}
}


if($ceCertificateOnFee != $row["ceCertificateOnFee"]){
  $updatedFields = array(
    'previousValue' =>  $row["ceCertificateOnFee"],
    'updatedValue' => $salary
);
// echo $row["ceCertificateOnFee"];
// echo $salary;
$category = "Certification / Evaluation";
$field = "ceCertificateOnFee";
$modifier = $fullName;

$selecthistory19 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory19;
$resultHistory19 = mysqli_query($con, $selecthistory19);
$rowCount19 = mysqli_num_rows($resultHistory19);
// echo $rowCount;
if($rowCount19 > 0){
// echo "Count: ",$rowCount;
while($row19=mysqli_fetch_assoc($resultHistory19))
{
$rowId19 = $row19["id"];
$updateHistory19 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId19'";

// echo "result", $updateHistory19;
$resulUpdatetHistory19 = mysqli_query($con, $updateHistory19);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["ceCertificateOnFee"];
$insertHistory19 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$ceCertificateOnFee', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory19 = mysqli_query($con, $insertHistory19);

// echo "result", $insertHistory;

}
}


if($cePEPoint != $row["cePEPoint"]){
  $updatedFields = array(
    'previousValue' =>  $row["cePEPoint"],
    'updatedValue' => $salary
);
// echo $row["cePEPoint"];
// echo $salary;
$category = "Certification / Evaluation";
$field = "cePEPoint";
$modifier = $fullName;

$selecthistory20 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory20;
$resultHistory20 = mysqli_query($con, $selecthistory20);
$rowCount20 = mysqli_num_rows($resultHistory20);
// echo $rowCount;
if($rowCount20 > 0){
// echo "Count: ",$rowCount;
while($row20=mysqli_fetch_assoc($resultHistory20))
{
$rowId20 = $row20["id"];
$updateHistory20 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId20'";

// echo "result", $updateHistory20;
$resulUpdatetHistory20 = mysqli_query($con, $updateHistory20);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["cePEPoint"];
$insertHistory20 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$cePEPoint', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory20 = mysqli_query($con, $insertHistory20);

// echo "result", $insertHistory;

}
}


if($ceAllowance != $row["ceAllowance"]){
  $updatedFields = array(
    'previousValue' =>  $row["ceAllowance"],
    'updatedValue' => $salary
);
// echo $row["ceAllowance"];
// echo $salary;
$category = "Certification / Evaluation";
$field = "ceAllowance";
$modifier = $fullName;

$selecthistory21 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory21;
$resultHistory21 = mysqli_query($con, $selecthistory21);
$rowCount21 = mysqli_num_rows($resultHistory21);
// echo $rowCount;
if($rowCount21 > 0){
// echo "Count: ",$rowCount;
while($row21=mysqli_fetch_assoc($resultHistory21))
{
$rowId21 = $row21["id"];
$updateHistory21 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId21'";

// echo "result", $updateHistory21;
$resulUpdatetHistory21 = mysqli_query($con, $updateHistory21);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["ceAllowance"];
$insertHistory21 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$ceAllowance', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory21 = mysqli_query($con, $insertHistory21);

// echo "result", $insertHistory;

}
}

if($ceRank != $row["ceRank"]){
  $updatedFields = array(
    'previousValue' =>  $row["ceRank"],
    'updatedValue' => $salary
);
// echo $row["ceRank"];
// echo $salary;
$category = "Certification / Evaluation";
$field = "ceRank";
$modifier = $fullName;

$selecthistory22 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
// echo "sql: ",$selecthistory22;
$resultHistory22 = mysqli_query($con, $selecthistory22);
$rowCount22 = mysqli_num_rows($resultHistory22);
// echo $rowCount;
if($rowCount22 > 0){
// echo "Count: ",$rowCount;
while($row22=mysqli_fetch_assoc($resultHistory22))
{
$rowId22 = $row22["id"];
$updateHistory22 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId22'";

// echo "result", $updateHistory22;
$resulUpdatetHistory22 = mysqli_query($con, $updateHistory22);
}
}
else{
// echo "Count: ",$rowCount;
$oldField = $row["ceRank"];
$insertHistory22 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$ceRank', '$modifier', '$dateOfEffectivity')";
$resultInsertHistory22 = mysqli_query($con, $insertHistory22);

// echo "result", $insertHistory;

}
}

  if($Specialization != $row["Specialization"]){
    $updatedFields = array(
      'previousValue' =>  $row["Specialization"],
      'updatedValue' => $salary
  );
  // echo $row["Specialization"];
  // echo $salary;
  $category = "Specialization";
  $field = "Specialization";
  $modifier = $fullName;

  $selecthistory23 = "SELECT * FROM `history` WHERE `employeeId` = '$salary' and `dateOfEffectivity` = '$dateOfEffectivity'  and `category` = '$category' and `field` = '$field'";
  // echo "sql: ",$selecthistory23;
  $resultHistory23 = mysqli_query($con, $selecthistory23);
  $rowCount23 = mysqli_num_rows($resultHistory23);
  // echo $rowCount;
  if($rowCount23 > 0){
  // echo "Count: ",$rowCount;
  while($row23=mysqli_fetch_assoc($resultHistory23))
  {
  $rowId23 = $row23["id"];
  $updateHistory23 = "UPDATE `history` SET `dateModified` = '$dateModified' , `hr_to`='$salary',`modifier`='$modifier' WHERE `id` = '$rowId23'";

  // echo "result", $updateHistory23;
  $resulUpdatetHistory23 = mysqli_query($con, $updateHistory23);
  }
  }
  else{
  // echo "Count: ",$rowCount;
  $oldField = $row["Specialization"];
  $insertHistory23 = "INSERT INTO `history`(`employeeId`, `dateModified`, `category`, `field`, `hr_from`, `hr_to`, `modifier`, `dateOfEffectivity`) VALUES ('$empNumber', '$dateModified', '$category', '$field', '$oldField', '$Specialization', '$modifier', '$dateOfEffectivity')";
  $resultInsertHistory23 = mysqli_query($con, $insertHistory23);

  // echo "result", $insertHistory;

  }
  }   
        }

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
        $updateSalaryIncreaseSql = "UPDATE `salaryincrease` SET `department`='$department', `section`='$section', `employeeName`='$empName', `sex`='$sex', `birthday`='$birthday', `age`='$age', `empNo`='$empNumber', `dateHired`='$dateHired', `serviceTerm`='$serviceTerm', `position`='$position', `designation`='$designation', `class`='$classEmp', `level`='$level', `salaryType`='$salary', `basicSalary`='$basicSalary', `daily`='$daily', `monthlySalary`='$monthlySalary', `pPEPoint`='$posPe', `pAllowance`='$posAllowance', `pRank`='$posRank', `tsPEPoint`='$tsPEPoint', `tsAllowance`='$tsAllowance', `tsRank`='$tsRank', `leLicenseFee`='$leLicenseFee', `lePEPoint`='$lePEPoint', `leAllowance`='$leAllowance', `leRank`='$leRank', `ceCertificateOnFee`='$ceCertificateOnFee', `cePEPoint`='$cePEPoint', `ceAllowance`='$ceAllowance', `ceRank`='$ceRank', `Specialization`='$Specialization', `fstHalfPoint`='$firsthp',`fstHalfResult`='$firsthr',`sndHalfPoint`='$secondhp',`sndHalfResult`='$secondhr',`FinalPoint`='$finalp',`FinalResult`='$finalr',`LevelUpPoints`='$levelup' WHERE `id` = '$id'";
        $resultupdateSalaryIncreaseSql = mysqli_query($con, $updateSalaryIncreaseSql);




       }

}


?>

<div id="employeesDetails" class=" hidden h-full fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none" tabindex="-1" aria-labelledby="drawer-bottom-label">
<form action="" method="POST">
<?php
   $selectEmp = "SELECT * FROM `salaryincrease` WHERE `empNo` = '$getempNo' ";
   $resultEmp = mysqli_query($con, $selectEmp);
   while($row=mysqli_fetch_assoc($resultEmp))
   {
    $id=$row["id"];

    $employeeName=$row["employeeName"];
    $department2=$row["department"];
    $position=$row["position"];
    $designation=$row["designation"];
    $section=$row["section"];
    $sex=$row["sex"];
    $birthday=$row["birthday"];
    $age=$row["age"];
    $dateHired=$row["dateHired"];
    $serviceTerm=$row["serviceTerm"];
    $salaryType=$row["salaryType"];
    $class=$row["class"];




    $empNo=$row["empNo"];
    $level=$row["level"];
    $basicSalary=$row["basicSalary"];
    $daily=$row["daily"];
    $monthlySalary=$row["monthlySalary"];
    $pPEPoint=$row["pPEPoint"];
    $pAllowance=$row["pAllowance"];
     $pRank = $row["pRank"];  
     $tsPEPoint = $row["tsPEPoint"];
     $tsAllowance = $row["tsAllowance"];
     $tsRank = $row["tsRank"];
     $leLicenseFee = $row["leLicenseFee"];
     $lePEPoint = $row["lePEPoint"];
     $leAllowance = $row["leAllowance"];
     $leRank = $row["leRank"];
     $ceCertificateOnFee = $row["ceCertificateOnFee"];
     $cePEPoint = $row["cePEPoint"];
     $ceAllowance = $row["ceAllowance"];
     $ceRank = $row["ceRank"];
     $Specialization = $row["Specialization"];
     $total = $row["total"];
     $fstHalfPoint = $row["fstHalfPoint"];
     $fstHalfResult = $row["fstHalfResult"];
     $sndHalfPoint = $row["sndHalfPoint"];
     $sndHalfResult = $row["sndHalfResult"];
     $FinalPoint = $row["FinalPoint"];
     $FinalResult = $row["FinalResult"];
     $LevelUpPoints = $row["LevelUpPoints"];




    
  ?>
<input type="text" name="infoId" value="<?php echo $id; ?>" class="hidden">
<div class="h-14 bg-blue-900 grid grid-cols-2 gap-4 place-content-between content-center px-4">
  
<h5 id="drawer-bottom-label" class="text-white font-medium rounded-lg text-sm content-center"><?php echo $employeeName; ?></h5>
<div class="flex justify-end">
<button  type="button"  onclick ="openSaveModal()" class="mr-4 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
   Save
   </button>
    <button type="button" data-drawer-hide="employeesDetails" aria-controls="employeesDetails" class="text-white font-medium rounded-lg text-sm  " >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
</div>

</div>    

   </button>
   <div class="p-4">
   <div class="grid md:grid-cols-3 md:gap-6">
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 bg-[#f3fff0]">
        <div class="relative z-0 w-full group ">
            <input type="text" id="firstHalf" name="firstHalf" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text"  id="firstResult" name="firstResult" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 bg-[#e1f1ff]">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" id="secondHalf" name="secondHalf"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2nd Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text"  id="secondResult" name="secondResult" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-3 md:gap-2 p-2 border border-grey-600 bg-orange-100">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" id="finalPoint" name="finalPoint" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Final Points</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" id="finalResult" name="finalResult"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Results</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text"  id="levelPoint" name="levelPoint"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level Up Points</label>
          </div>  
    </div>


   

  </div>
  <div class="grid md:grid-cols-3 md:gap-6 mt-4">
      <div class="md:gap-2 p-2 border border-grey-600">
           <div class="relative z-0 w-full group ">
           <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select position</label>
  <select id="position" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option <?php if($position == "Staff"){ echo "selected";} ?>>Staff</option>
    <option <?php if($position == "Senior Staff"){ echo "selected";} ?>>Senior Staff</option>
    <option <?php if($position == "Operator"){ echo "selected";} ?>>Operator</option>
    <option <?php if($position == "Senior Operator"){ echo "selected";} ?>>Senior Operator</option>
    <?php
   $selectPosition = "SELECT * FROM `allowancetable`";
   $resultPosition = mysqli_query($con, $selectPosition);
   while($row=mysqli_fetch_assoc($resultPosition))
   {
    $positionLevel=$row["positionLevel"];
    
  ?>
  <option <?php if($position == $positionLevel){ echo "selected";} ?>><?php echo $positionLevel; ?></option>
<?php  }   ?>
  </select>
            </div>
            <div class="relative z-0 w-full group ">
            <label for="designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Designation</label>

         
        <!-- <input type="text" name="designation" id="designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
       
        <select name="designation[]" id="designation" multiple="multiple" class="form-control js-example-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             <!-- <option selected disabled value=" " data-val="">Choose PC Tag:</option> -->
             <?php
   $selectPosition1 = "SELECT `positionLevel` as 'label' FROM `allowancetable` WHERE `annex` LIKE '%Annex D%'";
   $resultPosition1 = mysqli_query($con, $selectPosition1);
   while($row=mysqli_fetch_assoc($resultPosition1))
   {
    $positionLevel=$row["label"];
    
  ?>
  <?php if($designation != ""){
    echo " <option >$positionLevel</option>";

  } ?>

<?php  }   echo " <option selected >$designation</option>"; ?>
            </select>  
            </div>

            <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Salary</h5>

            <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
             <div class="relative z-0 w-full group ">
           <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
  <select id="classEmp" name="classEmp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option <?php if($class == "D1"){ echo "selected";}  ?> value="D1">D1</option>
             <option <?php if($class == "DM1"){ echo "selected";}  ?> value="DM1">DM1</option>
             <option <?php if($class == "D2"){ echo "selected";}  ?> value="D2">D2</option>
             <option <?php if($class == "DM2"){ echo "selected";}  ?> value="DM2">DM2</option>
             <option <?php if($class == "D3"){ echo "selected";}  ?> value="D3">D3</option>
             <option <?php if($class == "DM3"){ echo "selected";}  ?> value="DM3">DM3</option>
             <option <?php if($class == "M1"){ echo "selected";}  ?> value="M1">M1</option>
             <option <?php if($class == "M2"){ echo "selected";}  ?> value="M2">M2</option>
             <option <?php if($class == "M3"){ echo "selected";}  ?> value="M3">M3</option>
             <option <?php if($class == "M4"){ echo "selected";}  ?> value="M4">M4</option>
             <option <?php if($class == "M5"){ echo "selected";}  ?> value="M5">M5</option>
             <option <?php if($class == "F1"){ echo "selected";}  ?> value="F1">F1</option>
             <option <?php if($class == "F2"){ echo "selected";}  ?> value="F2">F2</option>
  </select>
            </div>
            <div class="mb-5">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
    <input type="number" id="level" name="level" data-default = "<?php echo $level; ?>" value="<?php echo $level; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

  <div class="relative z-0 w-full group ">
           <label for="salaryType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary Type</label>
  <select id="salaryType" name="salaryType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option <?php if($salaryType == "Monthly"){ echo "selected";}  ?>>Monthly</option>
    <option  <?php if($salaryType == "Daily"){ echo "selected";}  ?>>Daily</option>
    
  </select>
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Basic Salary</label>
    <input type="number" id="basicSalary"name="basicSalary" value="<?php echo $basicSalary; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daily</label>
    <input type="number" step="0.01" id="dailySalary" name="dailySalary" value="<?php echo $daily; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Salary</label>
    <input type="number" step="0.01" id="monthlySalary" name="monthlySalary" value="<?php echo $monthlySalary; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Position</h5>
          <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="posPePoint" data-posPePoint="<?php echo $pPEPoint; ?>" id="posPePoint" value="<?php echo $pPEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" name="posAllowance" data-posAllowance="<?php echo $pAllowance; ?>" id="posAllowance" value="<?php echo $pAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="posRank" data-posRank="<?php echo $pRank; ?>" id="posRank" value="<?php echo $pRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Technical Skills / Special Experience</h5>
      <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="tsPEPoint" value="<?php echo $tsPEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="tsAllowance" name="tsAllowance" value="<?php echo $tsAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="tsRank" value="<?php echo $tsRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">License Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">License Fee</label>
    <input type="number" id="leLicenseFee" name="leLicenseFee" value="<?php echo $leLicenseFee; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="lePEPoint" value="<?php echo $lePEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="leAllowance" name="leAllowance" value="<?php echo $leAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="leRank" value="<?php echo $leRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Certification / Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certification Fee</label>
    <input type="number" id="ceCertificateOnFee" name="ceCertificateOnFee" value="<?php echo $ceCertificateOnFee; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="cePEPoint" value="<?php echo $cePEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" name="ceAllowance" id="ceAllowance" value="<?php echo $ceAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="ceRank" value="<?php echo $ceRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Specialization</h5>
          <div class=" col-span-2">
    <input type="number" name="Specialization" value="<?php echo $Specialization; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Information</h5>
      <div class=" col-span-2">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Number</label>

    <input type="text" id="employeeId" name="employeeId" value ="<?php echo $empNo;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

  <div class=" col-span-2">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Name</label>

    <input type="text" value ="<?php echo $employeeName;?>" name="empName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="relative z-0 w-full group ">
        <div class="relative z-0 w-full group ">
                  <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>

              
              <!-- <input type="text" name="department" id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
            
              <select name="department" id="department"  class="form-control js-department-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <!-- <option selected disabled value=" " data-val="">Choose PC Tag:</option> -->
                  <?php
        $selectDepartment = "SELECT DISTINCT  `department` FROM `salaryincrease`";
        $resultDepartment = mysqli_query($con, $selectDepartment);
        while($row=mysqli_fetch_assoc($resultDepartment))
        {
          $department=$row["department"];
          
        ?>
        <option <?php if($department2 == $department){ echo "selected";} ?> ><?php echo $department; ?></option>
      <?php  }   ?>
                  </select>  
                  </div>
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>

    <input type="text" value ="<?php echo $section;?>" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
    <input type="date" id="birthday" name="birthday" value ="<?php $date = DateTime::createFromFormat('d-M-y', $birthday);

// Format the date to mm/dd/yyyy
$formatted_birthday = $date->format('Y-m-d');

// Output the formatted birthday
echo $formatted_birthday;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
    <input type="number" id="age" name="age" <?php $date = DateTime::createFromFormat('d-M-y', $birthday);

// Format the date to mm/dd/yyyy
$formatted_birthday = $date->format('Y-m-d');

// Output the formatted birthday
echo $formatted_birthday;?> value ="<?php // Create a DateTime object from the given birthdate string
$birthdate = DateTime::createFromFormat('d-M-y', $birthday);

// Get the current date
$currentDate = new DateTime();

// Calculate the difference between the birthdate and the current date
$interval = $currentDate->diff($birthdate);

// Get the years from the interval and round down to the nearest whole number
$age1 = floor($interval->y);
echo $age1;?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="relative z-0 w-full group ">
           <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
          <select id="sex" name="sex"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option   disabled>Select Sex</option>

           <option <?php if($sex == "M"){ echo "selected";}  ?> value="M">Male</option>
             <option  <?php if($sex == "F"){ echo "selected";}  ?>  value="F">Female</option>
            
          </select>
            </div>
          </div>

          <div class="grid md:grid-cols-2 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Hired</label>
    <input type="date" id="dateHired" name="dateHired" value="<?php $date1 = DateTime::createFromFormat('d-M-y', $dateHired);

// Format the date to mm/dd/yyyy
$formatted_datehired = $date1->format('Y-m-d');

// Output the formatted birthday
echo $formatted_datehired;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Term</label>
    <input type="number" step="0.01" name="serviceTerm" value="<?php 
// Create a DateTime object from the given birthdate string
$dateHireddate = DateTime::createFromFormat('d-M-y', $dateHired);

// Get the current date
$currentDate = new DateTime();

// Calculate the difference between the dateHireddate and the current date
$interval = $currentDate->diff($dateHireddate);

// Calculate age in years with decimal places for months
$serviceTerm = $interval->y + $interval->m / 12;

// Format the age to display with 2 decimal places
$serviceTermFormatted = number_format($serviceTerm, 2);

// Output the formatted age
echo $serviceTermFormatted;
?>
"id="serviceTerm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Summary</h5>
          <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
    <input type="number" id="totalOverall" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white ">ＵＰ額 <span> <svg aria-hidden="true" id="upLoad" class="ml-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></span></label>
    <input type="number" id="upValue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Percentage <span> <svg aria-hidden="true" id="percentLoad" class="ml-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></span></label>
    <input type="text" id="percentage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>

      </div>
   </div>
   

   <div class="grid md:grid-cols-3 md:gap-6 mt-4">
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 ">
        <div class="relative z-0 w-full group ">
            <input type="text"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 ">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2nd Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-3 md:gap-2 p-2 border border-grey-600 ">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Final Points</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Results</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level Up Points</label>
          </div>  
    </div>


   

  </div>


<div id="save" tabindex="-1" class="bg-[#615eae59] fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8">
            <button type="button" onclick ="openSaveModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Please fill-out this form.</h3>
               
     
               
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nature of Action</label>

    <input type="text" id="natureOfAction"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="mb-4">
  <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Effectivity</label>

<input type="date" id="dateOfEffectivity" name="dateOfEffectivity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
        </div>

        <button type="submit" name="updatesirecord" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Proceed
                </button>
                <button data-modal-toggle="save" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
        </div>
    </div>
</div>
</div>




<?php  }   ?>

<?php  include ("history.php");
 ?>


</form>
</div>
<script type="text/javascript" src="details.js"></script>


