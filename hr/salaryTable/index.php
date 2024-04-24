<?php 
session_start();

include ("../../includes/connect.php");

// echo $_SESSION['connected'];
// echo "sample: ",$_SESSION['sample'];
// echo $_SESSION['logged'];

$fullName =$_SESSION['name'];

if(isset($_POST['updateAllowance'])){

$id = $_POST['allowanceId'];

$nameAllowance = $_POST['nameAllowance'];
$classAllowance = $_POST['classAllowance'];

$rs = $_POST['rs'];
$r4 = $_POST['r4'];
$r3 = $_POST['r3'];
$r2 = $_POST['r2'];
$r1 = $_POST['r1'];

$updateAllowance = "UPDATE `allowancetable` SET `positionLevel`='$nameAllowance',`r1`='$r1',`r2`='$r2',`r3`='$r3',`r4`='$r4',`r5`='$rs',`class`='$classAllowance' WHERE `id`='$id'; ";
$resultupdateAllowance = mysqli_query($con, $updateAllowance);

if($resultupdateAllowance ){
  echo "<script>alert('Success');</script>";
}

}



if(isset($_POST['updateSalaryTableRank'])){


  $d1l1 = $_POST['d1l1'];
  $d2l1 = $_POST['d2l1'];
  $d3l1 = $_POST['d3l1'];

  
  $updateSalaryTable = "UPDATE `basicallowancesettings` SET `d1l1`='$d1l1 ',`d2l1`='$d2l1',`d3l1`='$d3l1';";
  $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
  
  if($resultupdateSalaryTable ){
    echo "<script>alert('Success');</script>";
  }
  
  }
  if(isset($_POST['updateSalaryTableSuper'])){


    $m1l1 = $_POST['m1l1'];
    $m2l1 = $_POST['m2l1'];
  
    
    $updateSalaryTable = "UPDATE `basicallowancesettings` SET `m1l1`='$m1l1 ',`m2l1`='$m2l1';";
    $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
    
    if($resultupdateSalaryTable ){
      echo "<script>alert('Success');</script>";
    }
    
    }

    if(isset($_POST['updateSalaryTableManager'])){


      $m3l1 = $_POST['m3l1'];
      $m4l1 = $_POST['m4l1'];
      $m5l1 = $_POST['m5l1'];
    
      
      $updateSalaryTable = "UPDATE `basicallowancesettings` SET `m3l1`='$m3l1 ',`m4l1`='$m4l1',`m5l1`='$m5l1';";
      $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
      
      if($resultupdateSalaryTable ){
        echo "<script>alert('Success');</script>";
      }
      
      }

      if(isset($_POST['updateSalaryTableFelow'])){


        $f1l1 = $_POST['f1l1'];
        $f2l1 = $_POST['f2l1'];
       
        
        $updateSalaryTable = "UPDATE `basicallowancesettings` SET `f1l1`='$f1l1 ',`f2l1`='$f2l1';";
        $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
        
        if($resultupdateSalaryTable ){
          echo "<script>alert('Success');</script>";
        }
        
        }












        
if(isset($_POST['updateSalaryTableRankInc'])){


  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $d3 = $_POST['d3'];

  
  $updateSalaryTable = "UPDATE `basicallowancesettings` SET `d1`='$d1 ',`d2`='$d2',`d3`='$d3';";
  $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
  
  if($resultupdateSalaryTable ){
    echo "<script>alert('Success');</script>";
  }
  
  }
  if(isset($_POST['updateSalaryTableSuperInc'])){


    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
  
    
    $updateSalaryTable = "UPDATE `basicallowancesettings` SET `m1`='$m1 ',`m2`='$m2';";
    $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
    
    if($resultupdateSalaryTable ){
      echo "<script>alert('Success');</script>";
    }
    
    }

    if(isset($_POST['updateSalaryTableManagerInc'])){


      $m3 = $_POST['m3'];
      $m4 = $_POST['m4'];
      $m5 = $_POST['m5'];
    
      
      $updateSalaryTable = "UPDATE `basicallowancesettings` SET `m3`='$m3 ',`m4`='$m4',`m5`='$m5';";
      $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
      
      if($resultupdateSalaryTable ){
        echo "<script>alert('Success');</script>";
      }
      
      }

      if(isset($_POST['updateSalaryTableFelowInc'])){


        $f1 = $_POST['f1'];
        $f2 = $_POST['f2'];
       
        
        $updateSalaryTable = "UPDATE `basicallowancesettings` SET `f1`='$f1 ',`f2`='$f2';";
        $resultupdateSalaryTable = mysqli_query($con, $updateSalaryTable);
        
        if($resultupdateSalaryTable ){
          echo "<script>alert('Success');</script>";
        }
        
        }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Table</title>

    <link rel="stylesheet" href="../../fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">

  
     <!-- tailwind play cdn -->
    <script src="../../src/cdn_tailwindcss.js"></script>

    <link rel="shortcut icon" href="../resources/img/ESM LOGO.png">
    <link href="../../node_modules/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../../node_modules/select2/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    


<aside
id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800"
style="background-size: cover;  background-image: url(&quot;../../resources/img/background for sidebar.png&quot;);"
   
   >
   <div class="mt-10 mx-auto"
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../../resources/img/default.png&quot;); position: relative; overflow: hidden;">
       <div class="blueBackground">
        <input type="file" class="editProfile" accept="image/*"><svg aria-hidden="true"
               focusable="false" data-prefix="fas" data-icon="camera"
               class="svg-inline--fa fa-camera fa-3x profilepic__icon" role="img" xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 512 512" style="margin: auto; color: white;">
               <path fill="currentColor"
                   d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z">
               </path>
           </svg></div>
   </div>
   <h1 class="mx-auto text-1xl  sm:text-4xl whitespace-nowrap text-center text-white"><?php echo $_SESSION['name']; ?></h1>
   <h1 class="mx-auto text-1xl  sm:text-2xl whitespace-nowrap text-center text-teal-300" >Administration</h1>


      <ul class="mt-10 space-y-2 font-medium text-white">
         <li>
            <a href="../index.php?dept=all" class="flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-trend-up" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M470.7 9.4c3 3.1 5.3 6.6 6.9 10.3s2.4 7.8 2.4 12.2l0 .1v0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3L310.6 214.6c-11.8 11.8-30.8 12.6-43.5 1.7L176 138.1 84.8 216.3c-13.4 11.5-33.6 9.9-45.1-3.5s-9.9-33.6 3.5-45.1l112-96c12-10.3 29.7-10.3 41.7 0l89.5 76.7L370.7 64H352c-17.7 0-32-14.3-32-32s14.3-32 32-32h96 0c8.8 0 16.8 3.6 22.6 9.3l.1 .1zM0 304c0-26.5 21.5-48 48-48H464c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V304zM48 416v48H96c0-26.5-21.5-48-48-48zM96 304H48v48c26.5 0 48-21.5 48-48zM464 416c-26.5 0-48 21.5-48 48h48V416zM416 304c0 26.5 21.5 48 48 48V304H416zm-96 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"></path></svg>
               <span class="ml-3 ms-3">Salary Increase</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path></svg>
               <span class="ml-3 flex-1 ms-3 whitespace-nowrap">Salary Table</span>
               <!-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-lg " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg>
               <span class=" ml-3 flex-1 ms-3 whitespace-nowrap">User</span>
               <!-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> -->
            </a>
         </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
    
<nav class="absolute top-0  w-full pr-64 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="https://flowbite.com" class="flex ms-2 md:me-24">
          <img src="../../resources/img/ESM LOGO.png" class="h-8 me-3" alt="FlowBite Logo" />
          <span class="self-center text-xl ml-10 font-semibold sm:text-2xl whitespace-nowrap dark:text-white"> HR-App</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../../resources/img/default.png" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Rio Monzon
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  r.monzon@glory.com.ph
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="../../logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
   <h1 class=" text-1xl  sm:text-3xl whitespace-nowrap  ">Salary Table</h1>
   
    
<div class="mt-5 mb-4 border-b border-gray-200 dark:border-gray-700">
<ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Allowance Table</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Salary Table</button>
        </li>
       
    </ul>
</div>

<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <table id="allowanceTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >Annex B - Position Allowance (Management Style)</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>

      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex B'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];

        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"><button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>

<table id="allowanceTableC" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >Annex C - Position Allowance (Specialist Style)</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex C'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];
        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"> <button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td ><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>


<table id="allowanceTableD" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >Annex D - Professional Allowance 1</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
<th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex D'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];
        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"><button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>


<table id="allowanceTableD2" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >Annex D - Professional Allowance 2</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
<th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex D A2'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];
        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"><button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>

<table id="allowanceTableD3" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >Annex D - Professional Allowance 3</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
<th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex D A3'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];
        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"><button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>



<table id="allowanceTableDSpecial" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="9"  >SPECIAL EXPERIENCE ALLOWANCE (Retain)</th>


    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >No.</th>
<th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Action</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; " rowspan="2"  >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;" rowspan="2" >Class</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; text-align: center" colspan="5"  >RANK (for evaluation)</th>
    </tr>
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >RS</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R4</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R3</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R2</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >R1</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `allowancetable` WHERE `annex` = 'Annex D Special'";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $allowanceid=$row["id"];
        $positionLevel=$row["positionLevel"];
        $class=$row["class"];
        $r5=$row["r5"];
        $r4=$row["r4"];
        $r3=$row["r3"];
        $r2=$row["r2"];
        $r1=$row["r1"];
        ?>
            <tr >
             <td><?php echo $no; ?> </td>
             <td class="flex justify-center"><button data-allowanceid = "<?php echo $allowanceid; ?>" data-positionlevel = "<?php echo $positionLevel; ?>" data-classallowance = "<?php echo $class; ?>" data-rs = "<?php echo $r5; ?>" data-r4 = "<?php echo $r4; ?>" data-r3 = "<?php echo $r3; ?>"  data-r2 = "<?php echo $r2; ?>" data-r1 = "<?php echo $r1; ?>"class="editButton block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Edit
</button> </td>
             <td><?php echo $positionLevel; ?> </td>
             <td><?php echo $class;  ?> </td>
             <td><?php echo $r5; ?> </td>
             <td><?php echo $r4; ?> </td>
             <td><?php echo $r3; ?> </td>
             <td><?php echo $r2; ?> </td>
             <td><?php echo $r1; ?> </td>

            </tr>
        <?php
    $no++;
    }
    ?>
  </tbody>
</table>



<!-- Modal toggle -->


<!-- Main modal -->
<div id="allowancetablemodal" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Allowance Table
                </h3>
                <button type="button" onclick="modalAllowance.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        <input type="text"  name="allowanceId" id="allowanceId" class="hidden">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="nameAllowance" id="nameAllowance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                        <input type="text" name="classAllowance" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                    <div>
                        <label for="rs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RS</label>
                        <input type="text" name="rs" id="rs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="r4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R4</label>
                        <input type="text" name="r4" id="r4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="r3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R3</label>
                        <input type="text" name="r3" id="r3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="r2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R2</label>
                        <input type="text" name="r2" id="r2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="r1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R1</label>
                        <input type="text" name="r1" id="r1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>

                    <button type="submit" name="updateAllowance" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 















    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <table id="salaryTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
    <?php
    $sql = "SELECT `id`, `d1`, `d1l1`, `d2`, `d2l1`, `d3`, `d3l1`,`workingdays` FROM `basicallowancesettings`";
    $result = mysqli_query($con, $sql);

   
    while($row=mysqli_fetch_assoc($result))
    {
      $d1=$row["d1"];
      $d1l1=$row["d1l1"];
      $d2=$row["d2"];
      $d2l1=$row["d2l1"];
      $d3=$row["d3"];
      $d3l1=$row["d3l1"];
      $workingdays=$row["workingdays"];

?>
  <thead>
  <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="8"  >Rank & File Employee</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  ><button type="button" data-dropdown-toggle="optionForRankTable" class=" me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><span class="flex items-center rounded-md text-sm px-3 py-1.5">Options</span></button></th>
    </tr>
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="optionForRankTable">
        <ul class="py-2 font-medium" role="none">
          <li>
            <a type="button" data-d1l1 = "<?php echo $d1l1?>" data-d2l1 = "<?php echo $d2l1?>"  data-d3l1 = "<?php echo $d3l1?>" class="changelevel1button block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" >
              <div class="inline-flex items-center">
                Change Level 1
              </div>
            </a>
          </li>
          <li>
            <a type="button" data-d1 = "<?php echo $d1?>" data-d2 = "<?php echo $d2?>"  data-d3 = "<?php echo $d3?>"  class="changelevel1buttonInc block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" >
              <div class="inline-flex items-center">
                Change Increment
              </div>
            </a>
          </li>

          
         
        </ul>
      </div>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $d1l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment: <?php echo $d1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $d2l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment <?php echo $d2?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $d3l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment: <?php echo $d3?></th>
    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(D1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly (DM1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(D2)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(DM2)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(D3)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(DM3)</th>
    </tr>
  </thead>
  <tbody >
    <?php
    for($i=40; $i>=1; $i--){

      $isEven = $i % 2 === 0;
      $rowColor = $isEven ? '#bbebff' : '#ffe6ea';
      $rowColor1 = $isEven ? '#8ecee9' : '#fbc6cf';
      $rowColor2 = $isEven ? '#60b5d9' : '#ff9bab';



      $daily = ($i - 1) * floatval($d1) + floatval($d1l1);
      $monthly = round(floatval($workingdays) * floatval($daily));
      $daily2 = ($i - 1) * floatval($d2) + floatval($d2l1);
      $monthly2 = round(floatval($workingdays) * floatval($daily2));
      $daily3 = ($i - 1) * floatval($d3) + floatval($d3l1);
      $monthly3 = round(floatval($workingdays) * floatval($daily3));
      ?>
<tr>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $daily  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $monthly  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $daily2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $monthly2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"   ><?php echo $daily3  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"   ><?php echo $monthly3  ?></td>
      </tr>
      <?php
    }
    ?>
      
  </tbody>

  <?php
      }

      ?>
  </table>






  <table id="salaryTable2" class="display text-[9px] 2xl:text-sm" style="width:100%">
    <?php
    $sql = "SELECT `id`, `m1`, `m1l1`, `m2`, `m2l1`,`workingdays` FROM `basicallowancesettings`";
    $result = mysqli_query($con, $sql);

   
    while($row=mysqli_fetch_assoc($result))
    {
      $m1=$row["m1"];
      $m1l1=$row["m1l1"];
      $m2=$row["m2"];
      $m2l1=$row["m2l1"];
      $workingdays=$row["workingdays"];

?>
  <thead>
  <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="5"  >Supervisory Employee</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  ><button type="button" data-dropdown-toggle="optionForSupervisoryTable" class=" me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><span class="flex items-center rounded-md text-sm px-3 py-1.5">Options</span></button></th>

      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="optionForSupervisoryTable">
        <ul class="py-2 font-medium" role="none">
          <li>
            <a type="button" data-m1l1 = "<?php echo $m1l1?>" data-m2l1 = "<?php echo $m2l1?>"   class="changelevel1buttonSuper block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" >
              <div class="inline-flex items-center">
                Change Level 1
              </div>
            </a>
          </li>
          <li>
            <a type="button" data-m1 = "<?php echo $m1?>" data-m2 = "<?php echo $m2?>"  class="changelevel1buttonSuperInc block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
                Change Increment
              </div>
            </a>
          </li>

          
         
        </ul>
      </div>

    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $m1l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment: <?php echo $m1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $m2l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment <?php echo $m2?></th>

    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(M1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly (M1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(M2)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(M2)</th>

    </tr>
  </thead>
  <tbody >
    <?php
    for($i=50; $i>=1; $i--){

      $isEven = $i % 2 === 0;
      $rowColor = $isEven ? '#bbffe6' : '#d2c8ec';
      $rowColor1 = $isEven ? '#7dd896' : '#9572f3';




      $daily = ($i - 1) * floatval($m1) + floatval($m1l1);
      $monthly = round(floatval($workingdays) * floatval($daily));
      $daily2 = ($i - 1) * floatval($m2) + floatval($m2l1);
      $monthly2 = round(floatval($workingdays) * floatval($daily2));

      ?>
<tr>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $daily  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $monthly  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $daily2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $monthly2  ?></td>
      </tr>
      <?php
    }
    ?>
      
  </tbody>

  <?php
      }

      ?>
  </table>








  <table id="salaryTable3" class="display text-[9px] 2xl:text-sm" style="width:100%">
    <?php
    $sql = "SELECT `id`, `m3`, `m3l1`, `m4`, `m4l1`, `m5`, `m5l1`,`workingdays` FROM `basicallowancesettings`";
    $result = mysqli_query($con, $sql);

   
    while($row=mysqli_fetch_assoc($result))
    {
      $m3=$row["m3"];
      $m3l1=$row["m3l1"];
      $m4=$row["m4"];
      $m4l1=$row["m4l1"];
      $m5=$row["m5"];
      $m5l1=$row["m5l1"];
      $workingdays=$row["workingdays"];

?>
  <thead>
  <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="8"  >Managerial Employee</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  ><button type="button" data-dropdown-toggle="optionForManagerialTable" class=" me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><span class="flex items-center rounded-md text-sm px-3 py-1.5">Options</span></button></th>

      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="optionForManagerialTable">
        <ul class="py-2 font-medium" role="none">
          <li>
            <a type="button" data-m3l1 = "<?php echo $m3l1?>" data-m4l1 = "<?php echo $m4l1?>"   data-m5l1 = "<?php echo $m5l1?>" class="changelevel1buttonManager block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
                Change Level 1
              </div>
            </a>
          </li>
          <li>
            <a type="button" data-m3 = "<?php echo $m3?>" data-m4 = "<?php echo $m4?>"   data-m5 = "<?php echo $m5?>" class="changelevel1buttonManagerInc block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
                Change Increment
              </div>
            </a>
          </li>

          
         
        </ul>
      </div>
    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $m3l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment: <?php echo $m3?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $m4l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment <?php echo $m4?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $m5l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment <?php echo $m5?></th>
    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(M3)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly (M3)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(M4)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(M4)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(M5)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(M5)</th>
    </tr>
  </thead>
  <tbody >
    <?php
    for($i=50; $i>=1; $i--){

      $isEven = $i % 2 === 0;
      $rowColor = $isEven ? '#cfcfcf' : '#fffe9d';
      $rowColor1 = $isEven ? '#a3a3a3' : '#fff666';
      $rowColor2 = $isEven ? '#919191' : '#f1da22';




      $daily = ($i - 1) * floatval($m3) + floatval($m3l1);
      $monthly = round(floatval($workingdays) * floatval($daily));
      $daily2 = ($i - 1) * floatval($m4) + floatval($m4l1);
      $monthly2 = round(floatval($workingdays) * floatval($daily2));
      $daily3 = ($i - 1) * floatval($m5) + floatval($m5l1);
      $monthly3 = round(floatval($workingdays) * floatval($daily3));
      ?>
<tr>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $daily  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $monthly  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $daily2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $monthly2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"   ><?php echo $daily3  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor2?>"   ><?php echo $monthly3  ?></td>
      </tr>
      <?php
    }
    ?>
      
  </tbody>

  <?php
      }

      ?>
  </table>





  <table id="salaryTable4" class="display text-[9px] 2xl:text-sm" style="width:100%">
    <?php
    $sql = "SELECT `id`, `f1`, `f1l1`, `f2`, `f2l1`,`workingdays` FROM `basicallowancesettings`";
    $result = mysqli_query($con, $sql);

   
    while($row=mysqli_fetch_assoc($result))
    {
      $f1=$row["f1"];
      $f1l1=$row["f1l1"];
      $f2=$row["f2"];
      $f2l1=$row["f2l1"];
      $workingdays=$row["workingdays"];

?>
  <thead>
  <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="5"  >Felow</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  ><button type="button" data-dropdown-toggle="optionForFelowTable" class=" me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><span class="flex items-center rounded-md text-sm px-3 py-1.5">Options</span></button></th>

      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="optionForFelowTable">
        <ul class="py-2 font-medium" role="none">
          <li>
            <a type="button"  data-f1l1 = "<?php echo $f1l1?>" data-f2l1 = "<?php echo $f2l1?>"   class="changelevel1buttonFelow block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
                Change Level 1
              </div>
            </a>
          </li>
          <li>
            <a type="button"  data-f1 = "<?php echo $f1?>" data-f2 = "<?php echo $f2?>"   class="changelevel1buttonFelowInc block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
                Change Increment
              </div>
            </a>
          </li>

          
         
        </ul>
      </div>
    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $f1l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment: <?php echo $f1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="1"  >Level 1: <?php echo $f2l1?></th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center" colspan="2"  >Increment <?php echo $f2?></th>

    </tr>
    <tr>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(F1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly (F1)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Level</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Daily(F2)</th>
      <th style="border: 1px solid gray;  font-size: 16px; text-align: center"   >Monthly(F2)</th>

    </tr>
  </thead>
  <tbody >
    <?php
    for($i=50; $i>=1; $i--){

      $isEven = $i % 2 === 0;
      $rowColor = $isEven ? '#98d8ff' : '#ffd298';
      $rowColor1 = $isEven ? '#56a3ff' : '#ffae56';




      $daily = ($i - 1) * floatval($f1) + floatval($f1l1);
      $monthly = round(floatval($workingdays) * floatval($daily));
      $daily2 = ($i - 1) * floatval($f2) + floatval($f2l1);
      $monthly2 = round(floatval($workingdays) * floatval($daily2));

      ?>
<tr>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $daily  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor?>"   ><?php echo $monthly  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"  ><?php echo $i ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $daily2  ?></td>
      <td style="border: 1px solid gray;  font-size: 16px; text-align: center; background-color: <?php echo $rowColor1?>"   ><?php echo $monthly2  ?></td>
      </tr>
      <?php
    }
    ?>
      
  </tbody>

  <?php
      }

      ?>
  </table>


  <div id="salarytablemodal" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Salary Table
                </h3>
                <button type="button" onclick="modalLevel1.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D1 Level 1</label>
                        <input type="text" name="d1l1" id="d1l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D2 Level 1</label>
                        <input type="text" name="d2l1" id="d2l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                    <div>
                        <label for="rs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D3 Level 1</label>
                        <input type="text" name="d3l1" id="d3l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableRank" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 






<div id="salarytablemodalSuper" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Salary Table
                </h3>
                <button type="button" onclick="modalLevel1Super.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M1 Level 1</label>
                        <input type="text" name="m1l1" id="m1l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M2 Level 1</label>
                        <input type="text" name="m2l1" id="m2l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                  
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableSuper" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 




<div id="salarytablemodalManager" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Salary Table
                </h3>
                <button type="button" onclick="modalLevel1Manager.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M3 Level 1</label>
                        <input type="text" name="m3l1" id="m3l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M4 Level 1</label>
                        <input type="text" name="m4l1" id="m4l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                    <div>
                        <label for="rs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M5 Level 1</label>
                        <input type="text" name="m5l1" id="m5l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableManager" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div>







<div id="salarytablemodalFelow" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Salary Table
                </h3>
                <button type="button" onclick="modalLevel1Felow.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">F1 Level 1</label>
                        <input type="text" name="f1l1" id="f1l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">F2 Level 1</label>
                        <input type="text" name="f2l1" id="f2l1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                  
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableFelow" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 
























<div id="salarytablemodalInc" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Rank and file employee (Increments)
                </h3>
                <button type="button" onclick="modalLevel1Inc.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D1 Increment</label>
                        <input type="text" name="d1" id="d1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D2 Increment</label>
                        <input type="text" name="d2" id="d2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                    <div>
                        <label for="rs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D3 Increment</label>
                        <input type="text" name="d3" id="d3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableRankInc" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 






<div id="salarytablemodalSuperInc" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Supervisory Employee (Increments)
                </h3>
                <button type="button" onclick="modalLevel1SuperInc.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M1 Increment</label>
                        <input type="text" name="m1" id="m1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M2 Increment</label>
                        <input type="text" name="m2" id="m2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                  
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableSuperInc" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 




<div id="salarytablemodalManagerInc" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Managerial Employee (Increments)
                </h3>
                <button type="button" onclick="modalLevel1ManagerInc.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M3 Increment</label>
                        <input type="text" name="m3" id="m3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M4 Increment</label>
                        <input type="text" name="m4" id="m4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                    <div>
                        <label for="rs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M5 Increment</label>
                        <input type="text" name="m5" id="m5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableManagerInc" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div>







<div id="salarytablemodalFelowInc" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Salary Table
                </h3>
                <button type="button" onclick="modalLevel1FelowInc.toggle();" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST">
                        
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">F1 Increments</label>
                        <input type="text" name="f1" id="f1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">F2 Increments</label>
                        <input type="text" name="f2" id="f2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=""  />
                    </div>
                  
               
                  
                  
                  
                    <button type="submit" name="updateSalaryTableFelowInc" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 







  

    </div>
    
</div>
    
</div>


   </div>
   

   















<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/DataTables/datatables.min.js"></script>
<script src="../../node_modules/flowbite/dist/flowbite.js"></script>
<script src="../../node_modules/select2/dist/js/select2.min.js"></script>

<script type="text/javascript" src="index.js"></script>


<script>

    
const $targetModalSave = document.getElementById('allowancetablemodal');

// options with default values
const optionsSave = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    },
};

// instance options object
const instanceOptionsSave = {
  id: 'modalEl',
  override: true
};


const modalAllowance = new Modal($targetModalSave, optionsSave, instanceOptionsSave);

// function openAllowanceModal(){
//     var positionLevel = button.getAttribute('data-positionlevel');
    
//     $('#name').val(positionLevel);

//   modalAllowance.toggle();
// }

$(document).ready(function() {
    // When the button is clicked
    $('.editButton').click(function() {
        modalAllowance.toggle();
        // Get the value of data-positionlevel attribute
        var allowanceid = $(this).data('allowanceid');

        var positionLevel = $(this).data('positionlevel');
        var classallowance = $(this).data('classallowance');
        var rs = $(this).data('rs');
        var r4 = $(this).data('r4');
        var r3 = $(this).data('r3');
        var r2 = $(this).data('r2');
        var r1 = $(this).data('r1');
        

        console.log("asdasd");
        // Put the value into the input field
        $('#allowanceId').val(allowanceid);
        $('#nameAllowance').val(positionLevel);

        $('#class').val(classallowance);
        $('#rs').val(rs);
        $('#r4').val(r4);
        $('#r3').val(r3);
        $('#r2').val(r2);
        $('#r1').val(r1);


    });
});




    
const $targetModalLevel1 = document.getElementById('salarytablemodal');

// options with default values
const optionsLevel1 = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1 = {
  id: 'modalEl',
  override: true
};


const modalLevel1 = new Modal($targetModalLevel1, optionsLevel1, instanceOptionsLevel1);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1button').click(function() {
      modalLevel1.toggle();
        // Get the value of data-positionlevel attribute
        var d1l1 = $(this).data('d1l1');
        var d2l1 = $(this).data('d2l1');
        var d3l1 = $(this).data('d3l1');


        $('#d1l1').val(d1l1);
        $('#d2l1').val(d2l1);
        $('#d3l1').val(d3l1);


    });
});






    
const $targetModalLevel1Super = document.getElementById('salarytablemodalSuper');

// options with default values
const optionsLevel1Super = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1Super = {
  id: 'modalEl',
  override: true
};


const modalLevel1Super = new Modal($targetModalLevel1Super, optionsLevel1Super, instanceOptionsLevel1Super);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonSuper').click(function() {
      modalLevel1Super.toggle();
        // Get the value of data-positionlevel attribute
        var m1l1 = $(this).data('m1l1');
        var m2l1 = $(this).data('m2l1');



        $('#m1l1').val(m1l1);
        $('#m2l1').val(m2l1);



    });
});



const $targetModalLevel1Manager = document.getElementById('salarytablemodalManager');

// options with default values
const optionsLevel1Manager = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1Manager = {
  id: 'modalEl',
  override: true
};


const modalLevel1Manager = new Modal($targetModalLevel1Manager, optionsLevel1Manager, instanceOptionsLevel1Manager);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonManager').click(function() {
      modalLevel1Manager.toggle();
        // Get the value of data-positionlevel attribute
        var m3l1 = $(this).data('m3l1');
        var m4l1 = $(this).data('m4l1');
        var m5l1 = $(this).data('m5l1');



        $('#m3l1').val(m3l1);
        $('#m4l1').val(m4l1);
        $('#m5l1').val(m5l1);



    });
});







    
const $targetModalLevel1Felow = document.getElementById('salarytablemodalFelow');

// options with default values
const optionsLevel1Felow = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1Felow = {
  id: 'modalEl',
  override: true
};


const modalLevel1Felow = new Modal($targetModalLevel1Felow, optionsLevel1Felow, instanceOptionsLevel1Felow);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonFelow').click(function() {
      modalLevel1Felow.toggle();
        // Get the value of data-positionlevel attribute
        var f1l1 = $(this).data('f1l1');
        var f2l1 = $(this).data('f2l1');



        $('#f1l1').val(f1l1);
        $('#f2l1').val(f2l1);



    });
});





















 
const $targetModalLevel1Inc = document.getElementById('salarytablemodalInc');

// options with default values
const optionsLevel1Inc = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1Inc = {
  id: 'modalEl',
  override: true
};


const modalLevel1Inc = new Modal($targetModalLevel1Inc, optionsLevel1Inc, instanceOptionsLevel1Inc);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonInc').click(function() {
      modalLevel1Inc.toggle();
        // Get the value of data-positionlevel attribute
        var d1 = $(this).data('d1');
        var d2 = $(this).data('d2');
        var d3 = $(this).data('d3');


        $('#d1').val(d1);
        $('#d2').val(d2);
        $('#d3').val(d3);


    });
});






    
const $targetModalLevel1SuperInc = document.getElementById('salarytablemodalSuperInc');

// options with default values
const optionsLevel1SuperInc = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1SuperInc = {
  id: 'modalEl',
  override: true
};


const modalLevel1SuperInc = new Modal($targetModalLevel1SuperInc, optionsLevel1SuperInc, instanceOptionsLevel1SuperInc);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonSuperInc').click(function() {
      modalLevel1SuperInc.toggle();
        // Get the value of data-positionlevel attribute
        var m1 = $(this).data('m1');
        var m2 = $(this).data('m2');



        $('#m1').val(m1);
        $('#m2').val(m2);



    });
});



const $targetModalLevel1ManagerInc = document.getElementById('salarytablemodalManagerInc');

// options with default values
const optionsLevel1ManagerInc = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1ManagerInc = {
  id: 'modalEl',
  override: true
};


const modalLevel1ManagerInc = new Modal($targetModalLevel1ManagerInc, optionsLevel1ManagerInc, instanceOptionsLevel1ManagerInc);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonManagerInc').click(function() {
      modalLevel1ManagerInc.toggle();
        // Get the value of data-positionlevel attribute
        var m3 = $(this).data('m3');
        var m4 = $(this).data('m4');
        var m5 = $(this).data('m5');



        $('#m3').val(m3);
        $('#m4').val(m4);
        $('#m5').val(m5);



    });
});







    
const $targetModalLevel1FelowInc = document.getElementById('salarytablemodalFelowInc');

// options with default values
const optionsLevel1FelowInc = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
    backdrop: "static",
    onHide: () => {
        console.log('modal is hidden11');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled11');
    },
};

// instance options object
const instanceOptionsLevel1FelowInc = {
  id: 'modalEl',
  override: true
};


const modalLevel1FelowInc = new Modal($targetModalLevel1FelowInc, optionsLevel1FelowInc, instanceOptionsLevel1FelowInc);


$(document).ready(function() {
    // When the button is clicked
    $('.changelevel1buttonFelowInc').click(function() {
      modalLevel1FelowInc.toggle();
        // Get the value of data-positionlevel attribute
        var f1 = $(this).data('f1');
        var f2 = $(this).data('f2');



        $('#f1').val(f1);
        $('#f2').val(f2);



    });
});

</script>
</body>
</html>