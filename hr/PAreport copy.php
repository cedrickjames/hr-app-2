
<?php
include ("../includes/connect.php");
session_start();
$arrayOfUser = $_SESSION['arrayOfUser'];

// echo implode(', ', $arrayOfUser);




// $selectedDepartment =  $_SESSION['selectedDepartment'];

// $selectuserid = "SELECT  `empNo` FROM salaryincrease WHERE `department` = '$selectedDepartment'";
// $result1 = mysqli_query($con, $selectuserid);
// $arrayOfUserIdarray = []; // Initialize an empty array to store user IDs

// if ($result1) {
//   // Fetch associative array
//   while ($row = mysqli_fetch_assoc($result1)) {
//       $arrayOfUserIdarray[] = $row['empNo']; // Add empNo to the array
//   }
//   mysqli_free_result($result1); // Free result set
// }


// $arrayofuseridArray = "";
// foreach ($arrayOfUserIdarray as $userIdArray) {
//   $arrayofuseridArray .= "'" . $userIdArray . "', ";
// }
// // Remove the trailing comma and space
// $arrayofuseridArray = rtrim($arrayofuseridArray, ', ');

// echo $arrayofuseridArray;

if(isset($_SESSION['arrayOfUserId']) && is_array($_SESSION['arrayOfUserId'])) {
  // Encode the PHP array to JSON format
  $jsonArray = json_encode($_SESSION['arrayOfUserId']);
  
  // Output JavaScript code to log the JSON array to the console
  echo "<script>";
  echo "console.log(" . $jsonArray . ");";
  echo "</script>";
}

?>
<!DOCTYPE html>
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
        width: auto;
        border-style: solid;
        border-width: 0;
        border-right-width: 0;
        border-bottom-width: 0;
      }
      .tableRow {
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
      .tableCol1, .tableCol1Effect, .tableColLine1, .tableColLine1Effect {
        width: 25%;
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;
      }
      .tableCol1Effect, .tableColLine1Effect {
        padding: 8px;
      }
      .tableCol, .tableCol2, .tableCol3, .tableColTest, .tableColLine, .tableCol2Wage {
        width: 33.33%;
        border-style: solid;
        border-width: 0;
        border-left-width: 0;
        border-top-width: 0;
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
  </style>

  <script src="../src/cdn_tailwindcss.js"></script>
    
       
    </head>
    <body style="margin: 0px; padding: 0px; ">
    <div class="page">
    <div class="section">
      <h1 class="header">GLORY (PHILIPPINES), INC.</h1>
      <h2 class="header2">Administration Department / HR Section</h2>
      <h1 class="header">PERSONNEL ACTION FORM</h1>
      <h2 class="header2">PAF01<span class="underline">WI14</span>-09-051523</h2>
      <table style="width: 100%; margin: 0">
      <tr>
      <td class="first"><span class="label"></span><span style="align-text: right"></span></td>
      <td class="second"> <span style="text-transform: uppercase;" class="child"></span></td>
      <td><span class="label">EFFECTIVE DATE: </span></td>
      <td class="fourth tableColLine1Effect"><span class="child">April 11, 2024 </span></td>
      </tr>

  </table>
  <table style="width: 100%">
     <tr>
      <td class="tableCol" ><span >NAME OF EMPLOYEE</span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; 	&nbsp; 	&nbsp; 	:</span></td>
      <td class="third "> <span  class="child">Cedrick James Orozo</span></td>
      <td><span class="label"></span></td>
      </tr>
  </table>
  <table style="width: 100%">
  <tr>
   <td class="tableCol" ><span >EMPLOYEE NO.</span> <span style="">	&nbsp; 	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; 	&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   :</span></td>
   <td class="third "> <span  class="child">GP-22-722</span></td>
   <td><span class="label"></span></td>
   </tr>
</table>
    </div>
  </div>
        
    </body>
    </html>