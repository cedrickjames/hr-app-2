<?php
include ("../includes/connect.php");
    require '../dompdf/vendor/autoload.php';
    use Dompdf\Dompdf;
    session_start();

   $natureOfActionPAform =  $_SESSION['natureOfActionPAform'];
   $dateOfEffectivityPAFormValue =  $_SESSION['dateOfEffectivityPAForm'];
   $dateOfEffectivityPAForm = date("F d, Y", strtotime($dateOfEffectivityPAFormValue));
   $arrayOfUser = $_SESSION['arrayOfUser'];
   $arrayOfUserId = $_SESSION['arrayOfUserId'];
   $selectedDepartment =  $_SESSION['selectedDepartment'];

   
   if(isset($_SESSION['arrayOfUser']) && is_array($_SESSION['arrayOfUser'])) {
    $arrayofuser =  implode(', ', $_SESSION['arrayOfUser']);
} else {
  $arrayofuser =  "";
}


$arrayOfUserIdarray1 = [];


if(isset($_SESSION['arrayOfUserId']) && is_array($_SESSION['arrayOfUserId'])) {
  // $arrayofuserid =  implode(', ', $_SESSION['arrayOfUserId']);
  foreach ($_SESSION['arrayOfUserId'] as $userId) {
    $arrayOfUserIdarray1[]=  $userId ;
    // $arrayofuserid .= "'" . $userId . "', ";
  }
  // Remove the trailing comma and space
  // $arrayofuserid = rtrim($arrayofuserid, ', ');

  // echo $arrayofuserid;
} else {
  $arrayofuserid = "";
  

}








  if($arrayofuser != ''){
    $queryCondition = "WHERE si.deactivated = 0 AND id IN  ($arrayofuser)";


    $arrayofuserid = "";
    foreach ($arrayOfUserIdarray1 as $userIdArray) {
      $arrayofuserid .= "'" . $userIdArray . "', ";
    }
    // Remove the trailing comma and space
    $arrayofuserid = rtrim($arrayofuserid, ', ');
 
    


    // echo $arrayofuserid;
  }
  else if($selectedDepartment!="all" && $arrayofuser == ''){
    $queryCondition = "WHERE si.department = '$selectedDepartment' AND si.deactivated = 0";


    $selectedDepartment =  $_SESSION['selectedDepartment'];

  $selectuserid = "SELECT  `empNo` FROM salaryincrease WHERE `department` = '$selectedDepartment'";
  $result1 = mysqli_query($con, $selectuserid);
  $arrayOfUserIdarray = []; // Initialize an empty array to store user IDs
  
  if ($result1) {
    // Fetch associative array
    while ($row = mysqli_fetch_assoc($result1)) {
        $arrayOfUserIdarray[] = $row['empNo']; // Add empNo to the array
    }
    mysqli_free_result($result1); // Free result set
  }
  
  
  $arrayofuserid = "";
  foreach ($arrayOfUserIdarray as $userIdArray) {
    $arrayofuserid .= "'" . $userIdArray . "', ";
  }
  // Remove the trailing comma and space
  $arrayofuserid = rtrim($arrayofuserid, ', ');
 

  }
  else if($selectedDepartment=="all" && $arrayofuser == ''){
    $queryCondition = "WHERE  si.deactivated = 0";
  }

  // echo $queryCondition;
    $html ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personnal Action Form</title>
        <style>
           @page { margin: 15px; }
           body{
            font-family: "Calibri", sans-serif;
            font-size:13px;
        }
         

    .page {
      display: flex;
      flex-direction: row;
      background-color: #0000;
      
    }
    .section {
      margin: 0px;
      padding: 10px;
      flex-grow: 1;
    }
    .header {
      text-align: center;
      margin: 0;
      font-weight: bold;
      font-size:13px;
    }
    .header2 {
        text-align: center;
        margin: 0;
        font-weight: normal;
        font-size: 13px;
      }
      span.underline {
        text-align: center;
        margin: 0;
        font-weight: normal;
        font-size: 13px;
        text-decoration: underline;

      }
      .table {
        display: table;
        border-style: solid;
        border-width: 0;
        border-right-width: 0;
        border-bottom-width: 0;
        width: 100%;

      }
      .tableRow, , .tableCol2, .tableCol3, .tableColTest, .tableColLine, .tableCol2Wage{
        width: 100%;
        margin: 0;
        display: flex;
        flex-direction: row;
        padding: 0;
      }
      .tableRowFT {
        margin: 0;
        margin-top: 10px;
        display: flex;
        flex-direction: row;
      }
      .tableColLine1Effect{
        width: "25%";
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;
        border-bottom-width: 1;
        padding: "8px";
        text-align: center;
      }
      .tableCol1, .tableCol1Effect, .tableColLine1 {
        width: 25%;
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;
      }
      .tableCol1Effect, .tableColLine1Effect {
        padding: 8px;
      }
      .tableCol{
        width: 33.33%;
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;"
    
        place-content: space-between;
      }
      .license{
          font-size: 12px;
      }
      .tableCol3 {
        width: 43.33%;
      }
      .tableColTest {
        border-width: 1px;
      }
      .tableCell {
        margin: auto;
        font-size: 10px;
        padding: 0;
      }
      .tableCellLeft {
        font-size: 10px;
        text-align: left;
      }
      .tableCellLeft1 {
        font-size: 9px;
        text-align: left;
      }
      .pagebreak {
        break-after: always;
      }
      .first{
        width: 25%;
    }
    .second{
        width: 30%;

    }
    .third{
        width: 33%;
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;
        border-bottom-width: 1;
       
        text-align: center;
        padding: 0;
    }
    .approve{
      width: 33%;
      border-style: solid;
      border-width: 0;
      border-left-width: 0;
      border-top-width: 1;
      border-bottom-width: 0;
     
      text-align: center;
      padding: 0;
    }
    .natureOfAction{
      width: 33.33%;
    }
    .natureOfActionChild{
      width: 66.67%;
      border-style: solid;
      border-width: 0;
      border-left-width: 0;
      border-top-width: 0;
      border-bottom-width: 1;
      font-weight: bold;
      text-align: center;
    }
    .fromto{
      width: 33%;
      text-align: center;
      font-weight: bold;

    }
    .fourth{
        width: 25%;

    }
  
  </style>

  <script src="../src/cdn_tailwindcss.js"></script>
    
       
    </head>
    <body style="margin: 0px; padding: 0px; ">
    <div class="page">';
    $sql1 = "SELECT
    si.empNo AS employeeId,
    COALESCE(MAX(CASE WHEN h.field = 'department' THEN h.hr_from END), si.department) AS department,
    COALESCE(MAX(CASE WHEN h.field = 'section' THEN h.hr_from END), si.section) AS section,
    COALESCE(MAX(CASE WHEN h.field = 'employeeName' THEN h.hr_from END), si.employeeName) AS employeeName,
    COALESCE(MAX(CASE WHEN h.field = 'sex' THEN h.hr_from END), si.sex) AS sex,
    COALESCE(MAX(CASE WHEN h.field = 'birthday' THEN h.hr_from END), si.birthday) AS birthday,
    COALESCE(MAX(CASE WHEN h.field = 'age' THEN h.hr_from END), si.age) AS age,
    COALESCE(MAX(CASE WHEN h.field = 'dateHired' THEN h.hr_from END), si.dateHired) AS dateHired,
    COALESCE(MAX(CASE WHEN h.field = 'serviceTerm' THEN h.hr_from END), si.serviceTerm) AS serviceTerm,
    COALESCE(MAX(CASE WHEN h.field = 'position' THEN h.hr_from END), si.position) AS 'position',
    COALESCE(MAX(CASE WHEN h.field = 'designation' THEN h.hr_from END), si.designation) AS designation,
    COALESCE(MAX(CASE WHEN h.field = 'class' THEN h.hr_from END), si.class) AS class,
    COALESCE(MAX(CASE WHEN h.field = 'level' THEN h.hr_from END), si.level) AS level,
    COALESCE(MAX(CASE WHEN h.field = 'salaryType' THEN h.hr_from END), si.salaryType) AS salaryType,
    COALESCE(MAX(CASE WHEN h.field = 'basicSalary' THEN h.hr_from END), si.basicSalary) AS basicSalary,
    COALESCE(MAX(CASE WHEN h.field = 'daily' THEN h.hr_from END), si.daily) AS daily,
    COALESCE(MAX(CASE WHEN h.field = 'monthlySalary' THEN h.hr_from END), si.monthlySalary) AS monthlySalary,
    COALESCE(MAX(CASE WHEN h.field = 'pPEPoint' THEN h.hr_from END), si.pPEPoint) AS pPEPoint,
    COALESCE(MAX(CASE WHEN h.field = 'pAllowance' THEN h.hr_from END), si.pAllowance) AS pAllowance,
    COALESCE(MAX(CASE WHEN h.field = 'pRank' THEN h.hr_from END), si.pRank) AS pRank,
    COALESCE(MAX(CASE WHEN h.field = 'tsPEPoint' THEN h.hr_from END), si.tsPEPoint) AS tsPEPoint,
    COALESCE(MAX(CASE WHEN h.field = 'tsAllowance' THEN h.hr_from END), si.tsAllowance) AS tsAllowance,
    COALESCE(MAX(CASE WHEN h.field = 'tsRank' THEN h.hr_from END), si.tsRank) AS tsRank,
    COALESCE(MAX(CASE WHEN h.field = 'leLicenseFee' THEN h.hr_from END), si.leLicenseFee) AS leLicenseFee,
    COALESCE(MAX(CASE WHEN h.field = 'lePEPoint' THEN h.hr_from END), si.lePEPoint) AS lePEPoint,
    COALESCE(MAX(CASE WHEN h.field = 'leAllowance' THEN h.hr_from END), si.leAllowance) AS leAllowance,
    COALESCE(MAX(CASE WHEN h.field = 'leRank' THEN h.hr_from END), si.leRank) AS leRank,
    COALESCE(MAX(CASE WHEN h.field = 'ceCertificateOnFee' THEN h.hr_from END), si.ceCertificateOnFee) AS ceLicenseFee,
    COALESCE(MAX(CASE WHEN h.field = 'cePEPoint' THEN h.hr_from END), si.cePEPoint) AS cePEPoint,
    COALESCE(MAX(CASE WHEN h.field = 'ceAllowance' THEN h.hr_from END), si.ceAllowance) AS ceAllowance,
    COALESCE(MAX(CASE WHEN h.field = 'ceRank' THEN h.hr_from END), si.ceRank) AS ceRank,
    COALESCE(MAX(CASE WHEN h.field = 'Specialization' THEN h.hr_from END), si.Specialization) AS Specialization,
    
    si.total,
    si.employeeName as newEmployeeName,
    si.empNo as newEmpNo,
    si.dateHired as newDateHired,
    si.section as newSection,
    si.department as newDepartment,
    si.position as newPosition,
    si.designation as newDesignation,
    si.class as newClass,
    si.level as newLevel,
    si.salaryType as newSalaryType,
    si.basicSalary as newBasicSalary,
    si.pAllowance as newPAllowance,
    si.Specialization as newSpecialization,
    si.leAllowance as newLEAllowance,
    si.ceAllowance as newCEAllowance,
    si.leLicenseFee as newleLicenseFee,
    si.ceCertificateOnFee as newceCertificateOnFee
   
  FROM
    salaryincrease si
  LEFT JOIN (
    SELECT
      h1.employeeId,
      h1.field,
      h1.hr_from
    FROM
      history h1
      JOIN (
        SELECT
          employeeId,
          MAX(dateOfEffectivity) AS maxDate
        FROM
          history
        GROUP BY
          employeeId
      ) subquery ON h1.employeeId = subquery.employeeId AND h1.dateOfEffectivity = subquery.maxDate
    WHERE
      (h1.employeeId, h1.dateOfEffectivity, h1.field, h1.id) IN (
        SELECT
          employeeId,
          dateOfEffectivity,
          field,
          MAX(id)
        FROM
          history
        WHERE
          (employeeId, dateOfEffectivity, field) IN (
            SELECT
              employeeId,
              dateOfEffectivity,
              field
            FROM
              history WHERE employeeId IN ($arrayofuserid)
            GROUP BY
              employeeId,
              dateOfEffectivity,
              field
            HAVING
              MAX(id) = MAX(CASE WHEN dateOfEffectivity = subquery.maxDate THEN id END)
          )
        GROUP BY
          employeeId,
          dateOfEffectivity,
          field
      )
  ) h ON si.empNo = h.employeeId $queryCondition 
  GROUP BY
    si.empNo
  ORDER BY
    si.employeeName;";
// echo $sql1;
    // echo $sql1;
                                $result = mysqli_query($con, $sql1);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        
                                      $name=$row["employeeName"];
                                      $employeeId = $row["employeeId"];
                                      $department = $row["department"];
                                      $section = $row["section"];
                                      $employeeName = $row["employeeName"];
                                      $sex = $row["sex"];
                                      $birthday = $row["birthday"];
                                      $age = $row["age"];
                                      $dateHired = $row["dateHired"];
                                      $serviceTerm = $row["serviceTerm"];
                                      $position = $row["position"];
                                      $designation = $row["designation"];
                                      $class = $row["class"];
                                      $level = $row["level"];
                                      $salaryType = $row["salaryType"];
                                      $basicSalary = number_format($row["basicSalary"], 2, '.', ','); 
                                      $daily = $row["daily"];
                                      $monthlySalary = $row["monthlySalary"];
                                      $pPEPoint = $row["pPEPoint"];
                                      $pAllowance = $row["pAllowance"];
                                      $pRank = $row["pRank"];
                                      $tsPEPoint = $row["tsPEPoint"];
                                      $tsAllowance = $row["tsAllowance"];
                                      $tsRank = $row["tsRank"];
                                      $leLicenseFee =$row["leLicenseFee"];
                                      $lePEPoint = $row["lePEPoint"];
                                      $leAllowance = $row["leAllowance"];
                                      $leRank = $row["leRank"];
                                      $ceLicenseFee = $row["ceLicenseFee"];
                                      $cePEPoint = $row["cePEPoint"];
                                      $ceAllowance =$row["ceAllowance"];
                                      $ceRank = $row["ceRank"];
                                      $Specialization = $row["Specialization"];
                                      $total = $row["total"]; 
                                      $newEmployeeName = $row["newEmployeeName"];
                                      $newEmpNo = $row["newEmpNo"];
                                      $newDateHired = $row["newDateHired"];
                                      $newSection = $row["newSection"];
                                      $newDepartment = $row["newDepartment"];
                                      $newPosition = $row["newPosition"];
                                      $newDesignation = $row["newDesignation"];
                                      $newClass = $row["newClass"];
                                      $newLevel = $row["newLevel"];
                                      $newSalaryType = $row["newSalaryType"];
                                      $newBasicSalary = number_format($row["newBasicSalary"], 2, '.', ',');
                                      $newPAllowance =$row["newPAllowance"];
                                      $newSpecialization = $row["newSpecialization"];
                                      $newLEAllowance = $row["newLEAllowance"];
                                      $newCEAllowance = $row["newCEAllowance"];
                                      $newleLicenseFee = $row["newleLicenseFee"];
                                      $newceCertificateOnFee = $row["newceCertificateOnFee"];    
                                      
if($section==""){$section = "-";}
if($newSection==""){$newSection = "-";}
if($department==""){$department = "-";}
if($position==""){$position = "-";}
if($newPosition==""){$newPosition = "-";}
if($position==""){$position = "-";}
if($designation==""){$designation = "-";}
if($level==""){$level = "-";}
if($newLevel==""){$newLevel = "-";}
if($salaryType==""){$salaryType = "-";}
if($newSalaryType==""){$newSalaryType = "-";}
if($class==""){$class = "-";}
if($newClass==""){$newClass = "-";}
if($basicSalary==""){$basicSalary = "-";}
if($newBasicSalary==""){$newBasicSalary = "-";}
if($pAllowance==""){$pAllowance = "-";} else { $pAllowance = number_format($pAllowance, 2, '.', ',');}
if($newPAllowance==""){$newPAllowance = "-";}else { $newPAllowance = number_format($newPAllowance, 2, '.', ',');}
if($tsAllowance==""){$tsAllowance = "-";}
if($leAllowance==""){$leAllowance = "-";}
if($newLEAllowance==""){$newLEAllowance = "-";}
if($ceAllowance==""){$ceAllowance = "-";}
if($newCEAllowance==""){$newCEAllowance = "-";}
if($Specialization=="" || $Specialization=="0"){$Specialization = "-";}else { $Specialization = number_format($Specialization, 2, '.', ',');}
if($newSpecialization==""){$newSpecialization = "-";}else { $newSpecialization = number_format($newSpecialization, 2, '.', ',');}
if($leLicenseFee==""){$leLicenseFee = "-";}else { $leLicenseFee = number_format($leLicenseFee, 2, '.', ',');}
if($newleLicenseFee==""){$newleLicenseFee = "-";}else { $newleLicenseFee = number_format($newleLicenseFee, 2, '.', ',');}
if($ceLicenseFee==""){$ceLicenseFee = "-";}else { $ceLicenseFee = number_format($ceLicenseFee, 2, '.', ',');}
if($newceCertificateOnFee==""){$newceCertificateOnFee = "-";}else { $newceCertificateOnFee = number_format($newceCertificateOnFee, 2, '.', ',');}



    $html.='<div class="section">
      <h1 class="header">GLORY (PHILIPPINES), INC.</h1>
      <h2 class="header2">Administration Department / HR Section</h2>
      <h1 class="header">PERSONNEL ACTION FORM</h1>
      <h2 class="header2">PAF01<span class="underline">WI14</span>-09-051523</h2>
      <table style="width: 100%; margin-bottom: -7px">
      <tr>
      <td class="first"><span class="label"></span><span style="align-text: right"></span></td>
      <td class="second"> <span style="text-transform: uppercase;" class="child"></span></td>
      <td><span class="label">EFFECTIVE DATE: </span></td>
      <td class="fourth tableColLine1Effect"><span class="child">'.$dateOfEffectivityPAForm.'</span></td>
      </tr>

  </table>
  <table style="width: 100%; margin-bottom: -6px" >
     <tr>
      <td class="tableCol" ><span >NAME OF EMPLOYEE</span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; 	&nbsp; 	&nbsp; 	:</span></td>
      <td class="third "> <span  class="child">'.$newEmployeeName.'</span></td>
      <td><span class="label"></span></td>
      </tr>
  </table>
  <table style="width: 100%; margin-bottom: -6px">
  <tr>
   <td class="tableCol" ><span >EMPLOYEE NO.</span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   :</span></td>
   <td class="third "> <span  class="child">'.$newEmpNo.'</span></td>
   <td><span class="label"></span></td>
   </tr>
</table>
<table style="width: 100%; margin-bottom: 5px">
<tr>
 <td class="tableCol" ><span >HIRING DATE</span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$newDateHired.'</span></td>
 <td><span class="label"></span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span ></span></td>
 <td class="fromto"> <span  class="child">FROM</span></td>
 <td class="fromto"><span >TO</span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >A. SECTION </span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$section.'</span></td>
 <td class="third "> <span  class="child">'.$newSection.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >B. DEPARTMENT</span> <span style="">		&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$department.'</span></td>
 <td class="third "> <span  class="child">'.$newDepartment.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >C. POSITION LEVEL</span> <span style="">&nbsp; &nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$position.'</span></td>
 <td class="third "> <span  class="child">'.$newPosition.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >D. DESIGNATION</span> <span style="">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$designation.'</span></td>
 <td class="third "> <span  class="child">'.$newDesignation.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >E. SALARY CLASS </span> <span style="">	 &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$class.'</span></td>
 <td class="third "> <span  class="child">'.$newClass.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >F. SALARY LEVEL </span> <span style="">		&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$level.'</span></td>
 <td class="third "> <span  class="child">'.$newLevel.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >G. SALARY TYPE </span> <span style="">	&nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;   :</span></td>
 <td class="third "> <span  class="child">'.$salaryType.'</span></td>
 <td class="third "> <span  class="child">'.$newSalaryType.'</span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >H. COMPENSATION & BENEFITS</span></td>
 <td class=" "> <span  class="child"></span></td>
 <td class=" "> <span  class="child"></span></td>
 </tr>
</table>


<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >&nbsp;&nbsp;	&nbsp;	&nbsp;BASIC SALARY &nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;:</span></td>
 <td class="third "> <span  class="child">'.$basicSalary.'</span></td>
 <td class=" third"> <span  class="child">'.$newBasicSalary.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >&nbsp;&nbsp;	&nbsp;	&nbsp;POSITION ALLOWANCE(per month):</span></td>
 <td class="third "> <span  class="child">'.$pAllowance.'</span></td>
 <td class=" third"> <span  class="child">'.$newPAllowance.'</span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="" ><span >&nbsp; &nbsp;	&nbsp;&nbsp;PROFESSIONAL ALLOWANCE (per month)</span></td>
 <td class=" "> <span  class="child"></span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="license tableCol" ><span >	&nbsp;	&nbsp; &nbsp;&nbsp;	&nbsp;	&nbsp; SPECIALIZATION &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  :</span></td>
 <td class=" third"> <span  class="child">'.$Specialization.'</span></td>
 <td class=" third"> <span  class="child">'.$newSpecialization.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="license tableCol" ><span>	&nbsp;	&nbsp; &nbsp; &nbsp;	&nbsp;	&nbsp;LICENSURE  &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</span></td>
 <td class=" third"> <span  class="child">'.$leLicenseFee.'</span></td>
 <td class=" third"> <span  class="child">'.$newleLicenseFee.'</span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="license tableCol" ><span >	&nbsp;	&nbsp; &nbsp;&nbsp;	&nbsp;	&nbsp; CERTIFICATION  &nbsp; &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  :</span></td>
 <td class=" third"> <span  class="child">'.$ceLicenseFee.'</span></td>
 <td class=" third"> <span  class="child">'.$newceCertificateOnFee.'</span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="natureOfAction" ><span >I. NATURE OF ACTION </span></td>
 <td class="natureOfActionChild"> <span  >'.$natureOfActionPAform.'</span></td>
 </tr>
</table>
<br>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="natureOfAction" ><span >&nbsp; &nbsp;	&nbsp;&nbsp;Recommending Approval &nbsp; &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; :</span></td>
 
 </tr>
</table>

<br>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span> </span> <span style=""></span></td>
 <td class=" approve"> <span  class="child">Administration Head</span></td>
 <td class=" approve"> <span  class="child">President</span></td>
 </tr>
</table>


<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="natureOfAction" ><span >&nbsp; &nbsp;	&nbsp;&nbsp;Received by:</span></td>
 </tr>
</table>

<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >&nbsp; &nbsp;	&nbsp;&nbsp;Employee  &nbsp; &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  :</span></td>
 <td class=" third"> <span  class="child"></span></td>
 <td><span class="label"></span></td>
 </tr>
</table>
<table style="width: 100%; margin-bottom: -6px">
<tr>
 <td class="tableCol" ><span >&nbsp; &nbsp;	&nbsp;&nbsp;Date  &nbsp; &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  :</span></td>
 <td class=" third"> <span  class="child"></span></td>
 <td><span class="label"></span></td>
 </tr>
</table>

    </div>';

                                    }

  
 $html .=' </div>
        
    </body>
    </html>';   
    $dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Monthly Report.pdf', ['Attachment' => 0]);












?>

