<?php
session_start();

include ("../includes/connect.php");

// echo $_SESSION['connected'];
// echo "sample: ",$_SESSION['sample'];
// echo $_SESSION['logged'];

$fullName =$_SESSION['name'];
// echo $fullName;
if(!isset($_SESSION['logged'])){
  header("location: ../logout.php");
  // echo $_SESSION['logged'];
}

if (isset($_GET['dept'])) {
    $getDepartment = $_GET['dept'];
  } else {
  $getDepartment = "not found";
  
  }
  if (isset($_GET['empNo'])) {
    $getempNo = $_GET['empNo'];
  } else {
  $getempNo = "not found";
  
  }


  if(isset($_POST['generatePAForm'])){

    $natureOfActionPAform  = $_POST['natureOfActionPAform'];
    $dateOfEffectivityPAForm  = $_POST['dateOfEffectivityPAForm'];
    $arrayOfUser  = array($_POST['arrayOfUser']);
    // $arrayOfUserId  = array($_POST['arrayOfUserId']);

    $arrayOfUserId = explode(',', $_POST['arrayOfUserId']);
    
    // Trim each element to remove any leading or trailing spaces
    $arrayOfUserId = array_map('trim', $arrayOfUserId);
    
    // Store the array in the session
    // $_SESSION['arrayOfUserId'] = $arrayOfUserId;


    $_SESSION['natureOfActionPAform']= $natureOfActionPAform;
    $_SESSION['dateOfEffectivityPAForm']= $dateOfEffectivityPAForm;
    $_SESSION['arrayOfUser']= $arrayOfUser;
    $_SESSION['arrayOfUserId']= $arrayOfUserId;

    $_SESSION['selectedDepartment']= $getDepartment;


    header("location:PAreport.php");

  }

if(isset($_POST['updatePassword'])){
  $oldPassword  = $_POST['oldPassword'];
  $hashOldPassword = password_hash($oldPassword, PASSWORD_DEFAULT);
  $newPassword  = $_POST['newPassword'];
  $confirmPassword  = $_POST['confirmPassword'];
$id = $_SESSION['userid'];

  $sql = "SELECT `password` FROM `user` WHERE `id` = '$id'";
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_assoc($result)){
    $password = $row['password'];
  }

  if(password_verify($oldPassword, $password)){
      if($newPassword == $confirmPassword){

        $hash_new_pass = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE `user` SET `password`='$hash_new_pass' WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);
        if($result){
          echo "<script>alert('Success');</script>";
        }
      }
      else{
        echo "<script>alert('Password does not match.');</script>";
      }

  }
  else{
    echo "<script>alert('Wrong old password');</script>";
  }
}

  if(isset($_POST['updateWorkingDays'])){
    $workingDays  = $_POST['workingDays'];
    $sql = "UPDATE `basicallowancesettings` SET `workingdays`='$workingDays'";
    $result = mysqli_query($con, $sql);
    if($result){
      echo "<script>alert('Success');</script>";
    }
    else{
     echo $result; 
    }

  }




    // code for proof for Installed Apps

    $dest_pathApps = "";
    $no=date("ym-dH-is");
    if(isset($_POST['updateProfilePicture'])){ 
        $nullFile =  implode($_FILES['pictureFile']);
    // echo $nullFile;
        if($nullFile != "40"){
            if (isset($_FILES['pictureFile']) && $_FILES['pictureFile']['error'] === UPLOAD_ERR_OK)
            {
            // get details of the uploaded file
            $fileTmpPath = $_FILES['pictureFile']['tmp_name'];
            $fileName = $_FILES['pictureFile']['name'];
        
            $fileSize = $_FILES['pictureFile']['size'];
            $fileType = $_FILES['pictureFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
        
            // sanitize file-name
            //   $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $newFileName = $no .'-'. $fileName;
        
            // check if file has one of the following extensions
            $allowedfileExtensions = array('jpg', 'gif', 'png');
        
            if (in_array($fileExtension, $allowedfileExtensions))
            {
                // directory in which the uploaded file will be moved
                $uploadFileDir = '../resources/img/';
                $dest_pathApps = $uploadFileDir . $newFileName;
        
                if(move_uploaded_file($fileTmpPath,$dest_pathApps)) 
                {
                $messageUpload ='File is successfully uploaded.';
                }
                else 
                {
                $messageUpload = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                }
            }
            else
            {
                $messageUpload = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
            }
            else
            {
            $messageUpload = 'There is some error in the file upload. Please check the following error.<br>';
            $messageUpload .= 'Error:' . $_FILES['pictureFile']['error'];
            }
                
        }
        else {
            $dest_pathApps = "";
            $messageUpload = "";
        }
    
    
        // $month = $_SESSION['selectedMonth'];
        // $selectedYear = $_SESSION['selectedYear'];
        $userid = $_SESSION['userid'];
        // $action = $_POST['scanRemarks'];
    
        $sql = "UPDATE `user` SET `profile_picture`='$newFileName' WHERE `id` = '$userid'";
        $results = mysqli_query($con,$sql);
        if($results){
          echo "<script> alert('Success') </script>";
        }
        
    
    
    
    }
    //end of code




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR-App</title>
    
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" /> -->
    <link rel="stylesheet" href="../fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

  
     <!-- tailwind play cdn -->
    <script src="../src/cdn_tailwindcss.js"></script>

    <link rel="shortcut icon" href="../resources/img/ESM LOGO.png">
    <link href="../node_modules/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../node_modules/select2/dist/css/select2.min.css" rel="stylesheet" />


    <style>
     @font-face {
            font-family: "Arial-Bold";
            src: url("../src/assets/fonts/ARLRDBD.TTF");
        }
    </style>
</head>
<body>
    


<aside
id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800"
style="background-size: cover;  background-image: url(&quot;../resources/img/background for sidebar.png&quot;);"
   
   >
   <div class="mt-10 mx-auto"
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../resources/img/<?php
$userid = $_SESSION['userid'];
$sql = "SELECT `profile_picture`, `approved` FROM `user` WHERE `id` = '$userid'";
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($results)){
       $profile =  $row['profile_picture'];
       if($profile !=""){
echo $profile;
       }
       else{
        echo "default.png";
       }
}

?>&quot;); position: relative; overflow: hidden;">
       <div class="blueBackground">
        <button type="button" data-modal-target="changeProfile" data-modal-toggle="changeProfile" class="editProfile"  ></button><svg aria-hidden="true"
               focusable="false" data-prefix="fas" data-icon="camera"
               class="w-10 h-10 svg-inline--fa fa-camera fa-3x profilepic__icon" role="img" xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 512 512" style="margin: auto; color: white;">
               <path fill="currentColor"
                   d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z">
               </path>
           </svg></div>
   </div>
   <h1 class="mx-auto text-1xl  sm:text-4xl  text-center text-white"><?php echo $_SESSION['name']; ?></h1>
   <h1 class="mx-auto text-1xl  sm:text-2xl  text-center text-teal-300" >Administration</h1>


      <ul class="mt-10 space-y-2 font-medium text-white">
         <li>
            <a href="#" class="flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-trend-up" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M470.7 9.4c3 3.1 5.3 6.6 6.9 10.3s2.4 7.8 2.4 12.2l0 .1v0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3L310.6 214.6c-11.8 11.8-30.8 12.6-43.5 1.7L176 138.1 84.8 216.3c-13.4 11.5-33.6 9.9-45.1-3.5s-9.9-33.6 3.5-45.1l112-96c12-10.3 29.7-10.3 41.7 0l89.5 76.7L370.7 64H352c-17.7 0-32-14.3-32-32s14.3-32 32-32h96 0c8.8 0 16.8 3.6 22.6 9.3l.1 .1zM0 304c0-26.5 21.5-48 48-48H464c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V304zM48 416v48H96c0-26.5-21.5-48-48-48zM96 304H48v48c26.5 0 48-21.5 48-48zM464 416c-26.5 0-48 21.5-48 48h48V416zM416 304c0 26.5 21.5 48 48 48V304H416zm-96 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"></path></svg>
               <span class="ml-3 ms-3">Salary Increase</span>
            </a>
         </li>
         <li>
            <a href="salaryTable/index.php" class="flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path></svg>
               <span class="ml-3 flex-1 ms-3 whitespace-nowrap">Salary Table</span>
               <!-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
            </a>
         </li>
         <li>
            <a href="./user/index.php" class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
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
          <img src="../resources/img/ESM LOGO.png" class="h-8 me-3" alt="FlowBite Logo" />
          <span class="self-center text-xl ml-10 font-semibold sm:text-2xl whitespace-nowrap dark:text-white"> HR-App</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../resources/img/<?php
$userid = $_SESSION['userid'];
$sql = "SELECT `profile_picture`, `approved` FROM `user` WHERE `id` = '$userid'";
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($results)){
       $profile =  $row['profile_picture'];
       if($profile !=""){
echo $profile;
       }
       else{
        echo "default.png";
       }
}

?>" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                <?php echo $_SESSION['name']; ?>
                </p>
              
              </div>
              <ul class="py-1" role="none">
           
                <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  
                  <span class="block pl-2 pr-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
                       <ul id="dropdown-example" class="hidden py-2 space-y-2">
                      
                      <li>
                        <a type="button" data-modal-target="workingDays" data-modal-toggle="workingDays" class="block pl-5 pr-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Update working Hours</a>
                      </li>
                      <li>
                        <a type="button" data-modal-target="changepassword" data-modal-toggle="changepassword" class="block pl-5 pr-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Change Password</a>
                      </li>
                    </ul>
                </li>
               
                <li>
                  <a href="../logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
   <h1 class=" text-1xl  sm:text-3xl whitespace-nowrap  ">Salary Increase</h1>
   
    
<div class="mt-5 mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex mb-px text-sm font-medium text-center relative overflow-x-auto whitespace-nowrap"  style="overflow-x: auto;" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
    <li class="me-2" >
            <a href="/hr-app-2/hr/index.php?dept=all" 
             class="inline-block p-4 border-b-2 rounded-t-lg  <?php 
            if($getDepartment == 'all'){
                echo " text-blue-600 border-b-2 border-blue-600 rounded-t-lg active";
            } ?>" id="<?php echo $department;?>-tab"> All</a>
      
        </li> 
    <?php

     $sql1 = "SELECT DISTINCT department FROM `salaryincrease`";
                                $result = mysqli_query($con, $sql1);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $department=$row["department"];
                                       
                                        ?>

                                    <!-- <option selected  disabled class="text-gray-900">Choose Head:</option>  -->
                                    <li class="me-2" role="presentation">
            <a type="button" href="/hr-app-2/hr/index.php?dept=<?php echo $department;?>" 
             class="inline-block p-4 border-b-2 rounded-t-lg  <?php 
            if($department == $getDepartment){
                echo " text-blue-600 border-b-2 border-blue-600 rounded-t-lg active";
            }
            ?>" id="<?php echo $department;?>-tab"><?php echo $department;?></a>
      
        </li> <?php 
                                        
                                    }    

                                    ?>
        <!-- <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
        </li> -->
    </ul>
</div>
<form action="" method="POST">
<div id="default-tab-content">
  <div class="w-full h-14 flex  justify-end a mb-2 p-2 border rounded-md border-gray-300">
  <button type="button" data-modal-target="paformModal" data-modal-toggle="paformModal"  class="me-2 mx-4 text-sm font-medium text-white text-sm px-5 py-2.5 focus:outline-none bg-white rounded-lg border border-gray-200 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">P.A Form</button>
  <button type="button" data-dropdown-toggle="optionsForTable" class=" me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><span class="flex items-center rounded-md text-sm px-3 py-1.5"><svg class="w-6 h-6 iconColor" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg></span></button>
      <!-- Dropdown -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="optionsForTable">
        <ul class="py-2 font-medium" role="none">
          <li>
            <a type="button" onclick="showAddEmployees()" data-drawer-target="addEmployees" data-drawer-show="addEmployees" aria-controls="addEmployees" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
              <svg class="mr-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
</svg>
          
                Add Employees
              </div>
            </a>
          </li>
          <li>
            <a type="button" onclick="exportEmployees()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
              <svg class="mr-2 h-4 w-4" height="1em" width="1em" aria-hidden="true" stroke="currentColor" fill="currentColor" stroke-width="0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"></path><path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"></path></svg>              

                Export Template
              </div>
            </a>
          </li>
          <li>
            <a type="button" data-modal-target="import" data-modal-toggle="import"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
              <div class="inline-flex items-center">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="mr-2 h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"></path><path d="M14.067 0H7v5a2 2 0 0 1-2 2H0v4h7.414l-1.06-1.061a1 1 0 1 1 1.414-1.414l2.768 2.768a1 1 0 0 1 0 1.414l-2.768 2.768a1 1 0 0 1-1.414-1.414L7.414 13H0v5a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.933-2Z"></path></svg>              
                Import Grades
              </div>
            </a>
          </li>
          
         
        </ul>
      </div>
      <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  

  <input type="text" id="arrayOfUser" name="arrayOfUser" maxlength="4000" class="hidden">
  <input type="text" id="arrayOfUserId" name="arrayOfUserId"  maxlength="4000" class="hidden">


  <div id="paformModal" tabindex="-1" class="bg-[#615eae59] fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8">
            <button type="button" data-modal-hide="paformModal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Please fill-out this form.</h3>
               
     
               
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nature of Action</label>

    <input type="text" id="natureOfActionPAform" name="natureOfActionPAform"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="mb-4">
  <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Effectivity</label>

<input type="date" id="dateOfEffectivityPAForm" name="dateOfEffectivityPAForm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
        
</div>


        <button type="submit"  name="generatePAForm" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Proceed
                </button>
                <button data-modal-toggle="paformModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
        </div>
    </div>
</div>





</div>
</form>
    <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maintable" role="tabpanel" aria-labelledby="profile-tab">
    <table id="deptHeadTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
                <thead>
                        <tr>
                            <th >Select</th>
                            <th >No.</th>
                            <th >Action</th>
                            <th >Department</th>
                            <th >Employee Name</th>
                            <th >Employee Number</th>
                            <th >Position</th>
                            <th >Last Date Modified</th>

         
                            
                            
                            <!-- <th>Days Late</th> -->
                            <!-- <th>Assigned to</th> -->
                        </tr>
                    </thead>
                    <tbody>
                   

                
                <?php
                    $no = 1;
                    if($getDepartment == "all"){
     $sql1 = "SELECT u.*, IFNULL(h.dateModified, '') AS dateModified  FROM salaryincrease u  LEFT JOIN history h ON u.empNo = h.employeeId WHERE (h.id = (SELECT MAX(id) FROM history WHERE employeeId = u.empNo) OR h.id IS NULL)  AND u.deactivated = 0  order by u.department asc ";

                    }
                    else{
     $sql1 = "SELECT u.*, IFNULL(h.dateModified, '') AS dateModified  FROM salaryincrease u  LEFT JOIN history h ON u.empNo = h.employeeId WHERE (h.id = (SELECT MAX(id) FROM history WHERE employeeId = u.empNo) OR h.id IS NULL)  AND u.deactivated = 0 AND u.department = '$getDepartment' order by u.id desc";

                    }
                                $result = mysqli_query($con, $sql1);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $department=$row["department"];
                                        $employeeName=$row["employeeName"];
                                        $empNo=$row["empNo"];
                                        $position=$row["position"];
                                        $dateModified=$row["dateModified"];

                                        ?>
                                        <tr>
                                        <td><input id="checkEmployee<?php echo $no ?>" type="checkbox" data-userid="<?php echo $row['id'];?>" data-useridnumber="<?php echo $row['empNo'];?>" value="<?php echo $row['id'];?>" class=" employee-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></td>  
                                               <td > <?php echo $no;?> </td>  
                                               <td> <a href="/hr-app-2/hr/index.php?dept=<?php echo $getDepartment;?>&empNo=<?php echo $empNo;?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
   Details
   </a> </td>  
                                               <td> <?php echo $department;?> </td>  
                                               <td> <?php echo $employeeName;?> </td>  
                                               <td> <?php echo $empNo;?> </td>  
                                               <td> <?php echo $position;?> </td>  
                                               <td> <?php echo $dateModified;?> </td>  


                                               </tr>

                                <?php 
                                      $no++;
                                        }    

                                    ?>
                
                
                    </tbody>
                    </table>
                    
    </div>
    
</div>


   </div>
   
</div>




<div id="import" tabindex="-1" class="bg-[#615eae59] fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8">
            <button type="button" data-modal-hide="import" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" >
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
<div class="mb-4">
  <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose CSV File</label>

<input type="file" accept=".csv"  id="csvFile" name="csvFile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
        
</div>

        <button type="button" onclick="processCSVData()" name="updatesirecord" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Proceed
                </button>
                <button data-modal-toggle="import" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
        </div>
    </div>
</div>


<div id="workingDays" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Change Working Days
                </h3>
                <button type="button"   data-modal-target="workingDays" data-modal-toggle="workingDays" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
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
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Working Days</label>
                        <?php 
                        $sql = "SELECT `workingdays` FROM `basicallowancesettings`";
                        $result = mysqli_query($con,$sql);

                        while($row = mysqli_fetch_assoc($result)){
                          $workingDays = $row['workingdays'];
?>
                        <input type="text" name="workingDays" value="<?php echo $workingDays; ?>" id="workingDays" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />

<?php
                        }
                        ?>
                    </div>

                    <button type="submit" name="updateWorkingDays" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 


<div id="changepassword" tabindex="-1" aria-hidden="true" class="bg-[#615eae59] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Change Password
                </h3>
                <button type="button" data-modal-target="changepassword" data-modal-toggle="changepassword"  class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
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
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                        <input type="password" name="oldPassword"  id="oldPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                       
                        <input type="password" name="newPassword"  id="newPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                       
                        <input type="password" name="confirmPassword"  id="confirmPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                
                    </div>

                    <button type="submit" name="updatePassword" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
             
                </form>
            </div>
        </div>
    </div>
</div> 






<div id="changeProfile" tabindex="-1" class="bg-[#615eae59] fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-8">
  <form  method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="mt-10 mx-auto" id="profilePictureModal"
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../resources/img/<?php
$userid = $_SESSION['userid'];
$sql = "SELECT `profile_picture`, `approved` FROM `user` WHERE `id` = '$userid'";
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($results)){
       $profile =  $row['profile_picture'];
       if($profile !=""){
echo $profile;
       }
       else{
        echo "default.png";
       }
}

?>&quot;); position: relative; overflow: hidden;">
    
   </div>

<div class="mb-4">
  <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose your profile</label>

<input type="file"   id="pictureFile" name="pictureFile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
        
</div>

        <button type="submit"  name="updateProfilePicture" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Proceed
                </button>
                <button data-modal-toggle="changeProfile" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </form>
              </div>
        
    </div>
</div>



<?php  include ("details.php");?>

<?php  include ("addEmployee.php");?>




<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/DataTables/datatables.min.js"></script>
<script src="../node_modules/flowbite/dist/flowbite.js"></script>
<script src="../node_modules/select2/dist/js/select2.min.js"></script>

<script type="text/javascript" src="index.js"></script>
<script>


function updateProfilePictureModal(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profilePictureModal').css('background-image', 'url(' + e.target.result + ')');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Event listener for file input change using jQuery
    $(document).ready(function() {
        $('#pictureFile').change(function() {
            updateProfilePictureModal(this);
        });
    });



    $('.employee-checkbox').change(function() {
        var arrayOfUser = [];
        var arrayOfUserNumber = [];

        $('.employee-checkbox:checked').each(function() {
            arrayOfUser.push($(this).data('userid'));
            arrayOfUserNumber.push($(this).data('useridnumber'));

        });
        $('#arrayOfUser').val(arrayOfUser.join(','));
        $('#arrayOfUserId').val(arrayOfUserNumber.join(','));

      })


$(document).ready(function(){
    // Attach an event listener to inputs inside the form with id "myForm"
    $('#detailsForm input, select').on('input change', function(){
      var monthlySalary = $("#monthlySalary").val();

      var posAllowance = $("#posAllowance").val();
    var tsAllowance = $("#tsAllowance").val();
    var leLicenseFee = $("#leLicenseFee").val();
    var leAllowance = $("#leAllowance").val();
    var ceCertificateOnFee = $("#ceCertificateOnFee").val();
    var ceAllowance = $("#ceAllowance").val();

    var employeeId = $("#employeeId").val();
var overallNow;
var overallBefore;

// var birthday = new Date(employee.birthday);
            
// var computedAge = (date.getTime() - birthday.getTime()) / (1000 * 60 * 60 * 24 * 365);
// var computedAgeDecimal = computedAge.toFixed(0);
// setage(computedAgeDecimal)


// console.log(monthlySalary, posAllowance, tsAllowance, leLicenseFee, leAllowance, ceCertificateOnFee, ceAllowance)
const num1bs = parseFloat(monthlySalary);
const num2pa = parseFloat(posAllowance);
const num3ts = parseFloat(tsAllowance);
const num4ll = parseFloat(leLicenseFee);
const num5la= parseFloat(leAllowance);
const num6cc = parseFloat(ceCertificateOnFee);
const num7ca = parseFloat(ceAllowance);


const totaloverall = isNaN(num1bs) ? 0 : num1bs + (isNaN(num2pa) ? 0 : num2pa) + (isNaN(num3ts) ? 0 : num3ts)+ (isNaN(num4ll) ? 0 : num4ll)+ (isNaN(num5la) ? 0 : num5la)+ (isNaN(num6cc) ? 0 : num6cc)+ (isNaN(num7ca) ? 0 : num7ca);
// document.getElementById("totalOverall").value = totaloverall;
$("#totalOverall").val(totaloverall);

    });
});




function showAddEmployees(){

  $("#addEmployees").removeClass("hidden");
}
var fullName = "<?php echo $_SESSION['name'];?>";
console.log(fullName);

var unsuccessful= [];
    function downloadCSV(unsuccessful1) {
      var rows2 = [];
    
      var column1 = 'No.';
      var column2 = 'IDNumber';
      var column3 = 'Full Name';
    
      rows2.push([column1, column2, column3]);
    console.log(unsuccessful1)
      for (var i = 0; i < unsuccessful1.length; i++) {

        var acolumn1 = i + 1;
        var acolumn2 = unsuccessful1[i][0];
        var acolumn3 = unsuccessful1[i][1];
    
        rows2.push([acolumn1, acolumn2, acolumn3]);
      }
      var rowcsv;
      var csvContent = "data:text/csv;charset=utf-8,";
    
      /* add the column delimiter as comma(,) and each rowcsv splitted by a new line character (\n) */
      rows2.forEach(function (rowArray) {
        rowcsv = rowArray.join(",");
        csvContent += rowcsv + "\r\n";
      });
    
      /* create a hidden <a> DOM node and set its download attribute */
      var encodedUri = encodeURI(csvContent);
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", "Unsuccessful.csv");
      document.body.appendChild(link);
      /* download the data file named "Unsuccessful.csv" */
      link.click();
    }



    function finalresultImport(empNumber,employeeName,totalPoint, level, empclass, daily, monthlySalary, position, rank, salaryType, id, fullName, resultsLength, index, fh, sh, pepoint, pallowance){

// console.log("These are the data: "+empNumber,employeeName,totalPoint, level, empclass, daily, monthlySalary, position, rank, salaryType, id, fullName, resultsLength, index, fh, sh, pepoint, pallowance);
let levelset;
  let finalResult;
  let firstResult;
  let secondResult;


  let LevelUpPoints;
  let Daily;
  let MonthlySalary;
  let PosRank = rank;
  let Allowance = pallowance;
  let pePoint = pepoint;
  let BasicSalary;
  // console.log("before data: ", employeeName, "Level: ", level, "Class: ", empclass, "Daily: ", daily, "Monthly: ", monthlySalary )
  switch (true) {
    case (fh > 0 && fh <= 1.99):
      firstResult = 'P';
      break;
    case (fh > 1.99 && fh <= 2.99):
      firstResult = 'F';
      break;
    case  (fh > 2.99 && fh <= 3.33):
      firstResult = 'S-';
      break;
    case  (fh > 3.33 && fh <= 3.66):
      firstResult = 'S';
      break;
    case  (fh > 3.66 && fh <= 3.99):
      firstResult = 'S+';
      break;
      case  (fh > 3.99 && fh <= 4.79):
        firstResult = 'G';
        break;
        case  (fh > 4.79 && fh <= 5.00):
          firstResult = 'E';
          break;
          case  (fh > 5):
            firstResult = 'N/A';
            break;
    default:
      firstResult = '';
  }
  switch (true) {
    case (sh > 0 && sh <= 1.99):
      secondResult = 'P';
      break;
    case (sh > 1.99 && sh <= 2.99):
      secondResult = 'F';
      break;
    case  (sh > 2.99 && sh <= 3.33):
      secondResult = 'S-';
      break;
    case  (sh > 3.33 && sh <= 3.66):
      secondResult = 'S';
      break;
    case  (sh > 3.66 && sh <= 3.99):
      secondResult = 'S+';
      break;
      case  (sh > 3.99 && sh <= 4.79):
        secondResult = 'G';
        break;
        case  (sh > 4.79 && sh <= 5.00):
          secondResult = 'E';
          break;
          case  (sh > 5):
            secondResult = 'N/A';
            break;
    default:
      secondResult = '';
  }

  
  switch (true) {
    case (totalPoint > 0 && totalPoint <= 1.99):
      setFinalResult('P');
      finalResult = 'P';
      setLevelUpPoints('1');
      LevelUpPoints ='1';
  setLevel(parseInt(level)+1);

  levelset = parseInt(level)+1
     
      break;
    case (totalPoint > 1.99 && totalPoint <= 2.99):
      setFinalResult('F');
      finalResult = 'F';
      setLevelUpPoints('2');
      LevelUpPoints ='2';
      setLevel(parseInt(level)+2);


      levelset = parseInt(level)+2;

      break;
    case  (totalPoint > 2.99 && totalPoint <= 3.33):
      setFinalResult('S-');
      finalResult = 'S-';
      setLevelUpPoints('3');
      LevelUpPoints ='3';
      setLevel(parseInt(level)+3);

  levelset = parseInt(level)+3;

      break;
    case  (totalPoint > 3.33 && totalPoint <= 3.66):
      setFinalResult('S');
      finalResult = 'S';
      setLevelUpPoints('3');
      LevelUpPoints ='3';
      setLevel(parseInt(level)+3);

  levelset = parseInt(level)+3;

      break;
    case  (totalPoint > 3.66 && totalPoint <= 3.99):
      setFinalResult('S+');
      finalResult = 'S+';
      setLevelUpPoints('3');
      LevelUpPoints ='3';
      setLevel(parseInt(level)+3);

  levelset = parseInt(level)+3;

      break;
      case  (totalPoint > 3.99 && totalPoint <= 4.79):
        setFinalResult('G');
      finalResult = 'G';
      setLevelUpPoints('4');
      LevelUpPoints ='4';
        setLevel(parseInt(level)+4);

  levelset = parseInt(level)+4;

        break;
        case  (totalPoint > 4.79 && totalPoint <= 5.00):
          setFinalResult('E');
      finalResult = 'E';
      setLevelUpPoints('5');
      LevelUpPoints ='5';
          setLevel(parseInt(level)+5);

  levelset = parseInt(level)+5;

          break;
    default:
      finalResult = '';
      setFinalResult('');
      setLevelUpPoints('');
      setLevel(parseInt(level));
      levelset = parseInt(level);


  }

  console.log("After Input: ", employeeName, "Total Point: ", totalPoint, "Grade: ",  finalResult, "Level Up Points: ", LevelUpPoints, "New Level: ",  levelset);
console.log(empclass);
  switch (empclass) {
    case "D1":
Daily =(parseInt(levelset)-1)*parseFloat(d1)+parseFloat(d1L1);
MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays));



      break;
    case "DM1":
Daily =(parseInt(levelset)-1)*parseFloat(d1)+parseFloat(d1L1);
MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays));



      break;
    case "D2":
Daily =(parseInt(levelset)-1)*parseFloat(d2)+parseFloat(d2L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays));

      

      break;
    case "DM2":
      console.log("This is the details: ",levelset, d2, d2L1, workingDays);

Daily =(parseInt(levelset)-1)*parseFloat(d2)+parseFloat(d2L1);
console.log("This is the Salary: ",Daily);

      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays));

      
      console.log("This is the sweldo: ",Math.round(((parseInt(levelset) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));


      break;
    case "D3":
Daily =(parseInt(levelset)-1)*parseFloat(d3)+parseFloat(d3L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays));

      

      break;
      case "DM3":
Daily =(parseInt(levelset)-1)*parseFloat(d3)+parseFloat(d3L1);
        MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays));

        
      break;
      case "M1":
Daily =(parseInt(levelset)-1)*parseFloat(m1)+parseFloat(m1L1);
        MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(m1) + parseFloat(m1L1)) * parseFloat(workingDays));

        
      break;
      case "M2":
Daily =(parseInt(levelset)-1)*parseFloat(m2)+parseFloat(m2L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(m2) + parseFloat(m2L1)) * parseFloat(workingDays));

      
      break;
      case "M3":
Daily =(parseInt(levelset)-1)*parseFloat(m3)+parseFloat(m3L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(m3) + parseFloat(m3L1)) * parseFloat(workingDays));

      
      break;
      case "M4":
Daily =(parseInt(levelset)-1)*parseFloat(m4)+parseFloat(m4L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(m4) + parseFloat(m4L1)) * parseFloat(workingDays));

      
      break;
      case "M5":
Daily =(parseInt(levelset)-1)*parseFloat(m5)+parseFloat(m5L1);
      MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(m5) + parseFloat(m5L1)) * parseFloat(workingDays));

      
      break;
      case "F1":
Daily =(parseInt(levelset)-1)*parseFloat(f1)+parseFloat(f1L1);
        MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(f1) + parseFloat(f1L1)) * parseFloat(workingDays));

        
        break;
        case "F2":
Daily =(parseInt(levelset)-1)*parseFloat(f2)+parseFloat(f2L1);
        MonthlySalary= Math.round(((parseInt(levelset) - 1) * parseFloat(f2) + parseFloat(f2L1)) * parseFloat(workingDays));

        
  
  
        break;
    default:

  }
  
  console.log (employeeName, Daily, MonthlySalary)
  if(salaryType==="Daily"){
  BasicSalary = Daily;
}
else{
  BasicSalary = MonthlySalary;

}

if(totalPoint>=4 && (position !=="Staff" && position !=="Senior Staff" && position !=="Operator" && position !=="Senior Operator")){
console.log(position)

    // setPosRank((isNaN(parseInt(rank)) ? 0 : parseInt(rank)) +1);
    PosRank = (isNaN(parseInt(rank)) ? 0 : parseInt(rank)) +1;
    let samplePosition = position;
   let sampleRank = (isNaN(parseInt(rank)) ? 0 : parseInt(rank)) +1;

  const allowancesArray = arrayOfProfAllowances.find(
    allowances => allowances[0] === samplePosition
  );
console.log(allowancesArray)
  
if (allowancesArray) {
  // If samplePosition is found in arrayOfProfAllowances
  const allowance = allowancesArray[parseInt(sampleRank, 10)];

  console.log('Allowance:', allowance);
  // setPosAllowance(allowance)
  Allowance = allowance;
} else {
  console.log('samplePosition not found in arrayOfProfAllowances');
}
}
else{
  totalPoint = pePoint;
}
// console.log(PosRank, Allowance )

if(empclass === "D1" || empclass === "D2" || empclass === "D3" || empclass === "DM1" || empclass === "DM2" || empclass === "DM3")
{

  if(levelset > 40)
  {
    // unsuccessful.push([empNumber, employeeName]);
    console.log(empNumber)

  }
  else{

    var inputValueDate1 = document.getElementById("dateOfEffectivity").value;
    var date = new Date(inputValueDate1);

// Extract year, month, and day
var year = date.getFullYear();
var month = ("0" + (date.getMonth() + 1)).slice(-2); // Adding 1 because getMonth() returns zero-based index
var day = ("0" + date.getDate()).slice(-2);

// Form the Y-m-d format
var inputValueDate = year + "-" + month + "-" + day;

// console.log('updatesirecordImport.php?from=import&id='+id+'&daily='+Daily+'&level='+levelset+'& basicSalary='+BasicSalary+'&monthlySalary='+MonthlySalary+'&posPe='+totalPoint+'&posAllowance='+Allowance+'&posRank='+PosRank+'&dateOfEffectivity='+inputValueDate+'&empNumber='+empNumber+'&fullName='+fullName+'&firsthp='+fh+'&firsthr='+firstResult+'&secondhp='+sh+'&secondhr='+secondResult+'&finalp='+totalPoint+'&finalr='+finalResult);


    var updatesirecordImport = new XMLHttpRequest();
updatesirecordImport.open('GET', 'updatesirecordImport.php?from=import&id='+id+'&daily='+Daily+'&level='+levelset+'& basicSalary='+BasicSalary+'&monthlySalary='+MonthlySalary+'&posPe='+totalPoint+'&posAllowance='+Allowance+'&posRank='+PosRank+'&dateOfEffectivity='+inputValueDate+'&empNumber='+empNumber+'&fullName='+fullName+'&firsthp='+fh+'&firsthr='+firstResult+'&secondhp='+sh+'&secondhr='+secondResult+'&finalp='+totalPoint+'&finalr='+finalResult,true);
updatesirecordImport.onreadystatechange = function() {
  if (updatesirecordImport.readyState === 4 && updatesirecordImport.status === 200) {
    var responseData = JSON.parse(updatesirecordImport.responseText);

  }}

  updatesirecordImport.send();

    // console.log(fh,firstResult, sh, secondResult, totalPoint, finalResult,)

    // Axios.post("http://192.168.60.53:3001/updatesirecordImport", {
    //   from: "import",
    //   id: id,
    //   daily: Daily,
    //   level :levelset, 
    //   basicSalary :BasicSalary, 
    //   monthlySalary :MonthlySalary, 
    //   posPe :totalPoint, 
    //   posAllowance :Allowance, 
    //   posRank :PosRank, 
    //   dateOfEffectivity: inputValueDate,
    //   empNumber : empNumber,
    //   fullName: fullName,
    //   firsthp:fh,
    //   firsthr:firstResult,
    //   secondhp:sh,
    //   secondhr:secondResult,
    //   finalp:totalPoint,
    //   finalr:finalResult,
    // }).then((response) => {
    //   console.log(response)
    //   // handleCloseModal();
    // });

  }
}



}


function processCSVData() {
            const fileInput = document.getElementById('csvFile');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const csvData = event.target.result;
                    const results = parseCSV(csvData);

                    // Display data in the console
                    // console.log(results.data);

                    // Accessing and iterating over the data array using map
                    let increment = 0;
                    let increment2 = 0;

                    results.data.map((row, index) => {
                      // console.log("this is the results: ", results.data.length, index,row.firsthalf, row.secondhalf);
                        // console.log(increment);
                        increment++;
                        // console.log(results.data.length);
                        if (row.IDNumber !== undefined) {
                            // console.log(row.IDNumber);

                            const totalPoint = Math.round(((isNaN(parseFloat(row.firsthalf)) ? 0 : parseFloat(row.firsthalf)) + (isNaN(parseFloat(row.secondhalf)) ? 0 : parseFloat(row.secondhalf))) / 2 * 100) / 100;
                            // console.log(totalPoint);

                            // var department = urlParams.get('dept');

                          var selectLatest = new XMLHttpRequest();
                          selectLatest.open('GET', 'selectLatest.php?userid='+row.IDNumber, true);
                          selectLatest.onreadystatechange = function() {
                            if (selectLatest.readyState === 4 && selectLatest.status === 200) {
                              var responseData = JSON.parse(selectLatest.responseText);

                              increment2++;
                              if(responseData[0]){
                              // console.log(responseData[0].employeeName)
                              // console.log(responseData)

                                let level = responseData[0].level;
                                let empclass = responseData[0].class;
                                let daily = responseData[0].daily;
                                let monthlySalary = responseData[0].monthlySalary;
                                let position = responseData[0].position;
                                let rank = responseData[0].pRank;
                                let pepoint = responseData[0].pPEPoint;
                                let pallowance = responseData[0].pAllowance;
                                let employeeName = responseData[0].employeeName;
                                let salaryType = responseData[0].salaryType;
                                let id = responseData[0].id;
                                let empNumber = responseData[0].empNo;
                                var levelset;
                                switch (true) {
                                  case (totalPoint > 0 && totalPoint <= 1.99):
                                levelset = parseInt(level)+1
                                  
                                    break;
                                  case (totalPoint > 1.99 && totalPoint <= 2.99):
                                    levelset = parseInt(level)+2;
                              
                                    break;
                                  case  (totalPoint > 2.99 && totalPoint <= 3.33):
                                    
                                levelset = parseInt(level)+3;
                              
                                    break;
                                  case  (totalPoint > 3.33 && totalPoint <= 3.66):
                                    
                                levelset = parseInt(level)+3;
                              
                                    break;
                                  case  (totalPoint > 3.66 && totalPoint <= 3.99):
                                    
                                levelset = parseInt(level)+3;
                              
                                    break;
                                    case  (totalPoint > 3.99 && totalPoint <= 4.79):
                                    
                                levelset = parseInt(level)+4;
                              
                                      break;
                                      case  (totalPoint > 4.79 && totalPoint <= 5.00):
                                      
                                levelset = parseInt(level)+5;
                              
                                        break;
                                  default:
                                  
                                    levelset = parseInt(level);
                                     }

                                    //  console.log(empclass, levelset)
                                    
                                    if(empclass === "D1" || empclass === "D2" || empclass === "D3" || empclass === "DM1" || empclass === "DM2" || empclass === "DM3")
                                    {
                                    
                                      if(levelset > 40)
                                      {
                                // console.log(increment2)
      
                                        unsuccessful.push([empNumber, employeeName]);
                                        console.log(unsuccessful)
      
                                      }
      
                                    }
                                    else{
                                    
                                      if(levelset > 50)
                                      {
                                        console.log(empNumber)
                                    
                                        unsuccessful.push([empNumber, employeeName]);
                                      }
      
                                    }
                                    if(increment2===results.data.length-1){
                                      // console.log(unsuccessful)
                                      downloadCSV(unsuccessful);
                                      alert('Success');
                                    }
                                      // console.log(empNumber)

                                    finalresultImport(empNumber, employeeName, totalPoint, level, empclass, daily, monthlySalary, position, rank, salaryType, id, fullName, results.data.length, index,row.firsthalf, row.secondhalf, pepoint, pallowance);

                              }
                              

                            }
                          }
                          selectLatest.send();


                        }
                    });
                };

                reader.readAsText(file);
              
            } else {
                console.error("No file selected");
            }
        }

        // Function to parse CSV data
        function parseCSV(csvData) {
          const lines = csvData.split('\n');
    const data = [];
    
    // Start the loop from the second line (index 1)
    for (let i = 1; i < lines.length; i++) {
        const line = lines[i];
        const values = [];
        let currentValue = '';
        let insideQuotes = false;

        // Iterate through each character of the line
        for (let j = 0; j < line.length; j++) {
            const char = line[j];
            // If the character is a comma and it's not inside quotes, push the current value to the values array and reset currentValue
            if (char === ',' && !insideQuotes) {
                values.push(currentValue.trim());
                currentValue = '';
            } else if (char === '"') { // Toggle insideQuotes flag when encountering a double quote
                insideQuotes = !insideQuotes;
            } else { // Otherwise, append the character to currentValue
                currentValue += char;
            }
        }
        // Push the last value to the values array
        values.push(currentValue.trim());

        // Assuming the structure is IDNumber, FullName, firsthalf, secondhalf
        data.push({
            IDNumber: values[1],
            FullName: values[2],
            firsthalf: values[3],
            secondhalf: values[4]
            // Add more properties if needed
        });
    }
    
    return { data };
        }


  
function exportEmployees(){


  var department = urlParams.get('dept');

var getEmployees = new XMLHttpRequest();
getEmployees.open('GET', 'getEmployeesByDepartment.php?department='+department, true);
getEmployees.onreadystatechange = function() {
  if (getEmployees.readyState === 4 && getEmployees.status === 200) {
    var responseData = JSON.parse(getEmployees.responseText);
    // console.log(responseData.length)
    var rows =[];
  
      var column1 = 'No.';
      var column2 = 'IDNumber';
      var column3 = 'Full Name';
      var column4 = 'firsthalf';
      var column5 = 'secondhalf';

      rows.push(
          [
              column1,
              column2,
              column3,
              column4,
              column5,
          ]
      );
      
for(var i=0,row; i < responseData.length;i++){
  console.log(responseData[i].employeeName);

      var acolumn1 = parseInt(i) +1;
      var acolumn2 = responseData[i].empNo;
      var acolumn3 = responseData[i].employeeName;
      var acolumn4 = "";
      var acolumn5 = "";

  // console.log(acolumn3);
      
      rows.push(
          [
              acolumn1,
              acolumn2,
              acolumn3,
              acolumn4,
              acolumn5, 
      
          ]
      );

}
var csvContent = "data:text/csv;charset=utf-8,";
   /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
  rows.forEach(function(rowArray){
      row = rowArray.join('","');
      row = '"' + row + '"';
      csvContent += row + "\r\n";
  });

  /* create a hidden <a> DOM node and set its download attribute */
  var encodedUri = encodeURI(csvContent);
  var link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", department+" Employees.csv");
  document.body.appendChild(link);
   /* download the data file named "Stock_Price_Report.csv" */
  link.click();


  }

}

getEmployees.send();
//     console.log(department)
//     Axios.post("http://192.168.60.53:3001/exportEmployees", {
//       department: department,
//     }).then((response) => {
//       console.log(response);
//       var rows =[];
  
//       var column1 = 'No.';
//       var column2 = 'IDNumber';
//       var column3 = 'Full Name';
//       var column4 = 'firsthalf';
//       var column5 = 'secondhalf';

//       rows.push(
//           [
//               column1,
//               column2,
//               column3,
//               column4,
//               column5,
//           ]
//       );
      
// for(var i=0,row; i < response.data.result.length;i++){
//   console.log(response.data.result[i].employeeName);

//       var acolumn1 = parseInt(i) +1;
//       var acolumn2 = response.data.result[i].empNo;
//       var acolumn3 = response.data.result[i].employeeName;
//       var acolumn4 = "";
//       var acolumn5 = "";

//   console.log(acolumn3);
      
//       rows.push(
//           [
//               acolumn1,
//               acolumn2,
//               acolumn3,
//               acolumn4,
//               acolumn5, 
      
//           ]
//       );

// }
// var csvContent = "data:text/csv;charset=utf-8,";
//    /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
//   rows.forEach(function(rowArray){
//       row = rowArray.join('","');
//       row = '"' + row + '"';
//       csvContent += row + "\r\n";
//   });

//   /* create a hidden <a> DOM node and set its download attribute */
//   var encodedUri = encodeURI(csvContent);
//   var link = document.createElement("a");
//   link.setAttribute("href", encodedUri);
//   link.setAttribute("download", "Employees.csv");
//   document.body.appendChild(link);
//    /* download the data file named "Stock_Price_Report.csv" */
//   link.click();

//     });
  }



var arrayOfProfAllowances = [];
var d1;
    var d2;
    var d3;
    var m1;
      var m2;
      var m3;
      var m4;
      var m5;
      var f1;
      var f2;
      
    var d1L1;
    var d2L1;
    var d3L1;

    var m1L1;
    var m2L1;
    var m3L1;
    var m4L1;
    var m5L1;
    var f1L1;
    var f2L1;

    var workingDays;


var xhrAllowance = new XMLHttpRequest();
xhrAllowance.open('GET', 'getAllowanceTable.php', true);
xhrAllowance.onreadystatechange = function() {
  if (xhrAllowance.readyState === 4 && xhrAllowance.status === 200) {
    var responseData = JSON.parse(xhrAllowance.responseText);
    const SeniorManager = [
  responseData[0].positionLevel,
  responseData[0].r1,
  responseData[0].r2,
  responseData[0].r3,
  responseData[0].r4,
  responseData[0].r5
];

const Manager = [
  responseData[1].positionLevel,
  responseData[1].r1,
  responseData[1].r2,
  responseData[1].r3,
  responseData[1].r4,
  responseData[1].r5
];

const SeniorSupervisor = [
  responseData[2].positionLevel,
  responseData[2].r1,
  responseData[2].r2,
  responseData[2].r3,
  responseData[2].r4,
  responseData[2].r5
];

const Supervisor = [
  responseData[3].positionLevel,
  responseData[3].r1,
  responseData[3].r2,
  responseData[3].r3,
  responseData[3].r4,
  responseData[3].r5
];

const AssistantSupervisor = [
  responseData[4].positionLevel,
  responseData[4].r1,
  responseData[4].r2,
  responseData[4].r3,
  responseData[4].r4,
  responseData[4].r5
];

const Leader = [
  responseData[5].positionLevel,
  responseData[5].r1,
  responseData[5].r2,
  responseData[5].r3,
  responseData[5].r4,
  responseData[5].r5
];

const SubLeader = [
  responseData[6].positionLevel,
  responseData[6].r1,
  responseData[6].r2,
  responseData[6].r3,
  responseData[6].r4,
  responseData[6].r5
];

const ProfessionalP5 = [
  responseData[7].positionLevel,
  responseData[7].r1,
  responseData[7].r2,
  responseData[7].r3,
  responseData[7].r4,
  responseData[7].r5
];

const ProfessionalP4 = [
  responseData[8].positionLevel,
  responseData[8].r1,
  responseData[8].r2,
  responseData[8].r3,
  responseData[8].r4,
  responseData[8].r5
];

const ProfessionalP3 = [
  responseData[9].positionLevel,
  responseData[9].r1,
  responseData[9].r2,
  responseData[9].r3,
  responseData[9].r4,
  responseData[9].r5
];

const ProfessionalP2 = [
  responseData[10].positionLevel,
  responseData[10].r1,
  responseData[10].r2,
  responseData[10].r3,
  responseData[10].r4,
  responseData[10].r5
];

const ProfessionalP1 = [
  responseData[11].positionLevel,
  responseData[11].r1,
  responseData[11].r2,
  responseData[11].r3,
  responseData[11].r4,
  responseData[11].r5
];

const SpecialistS2 = [
  responseData[12].positionLevel,
  responseData[12].r1,
  responseData[12].r2,
  responseData[12].r3,
  responseData[12].r4,
  responseData[12].r5
];

const SpecialistS1 = [
  responseData[13].positionLevel,
  responseData[13].r1,
  responseData[13].r2,
  responseData[13].r3,
  responseData[13].r4,
  responseData[13].r5
];

const Lawyer = [
  responseData[14].positionLevel,
  responseData[14].r1,
  responseData[14].r2,
  responseData[14].r3,
  responseData[14].r4,
  responseData[14].r5
];

const CPA = [
  responseData[15].positionLevel,
  responseData[15].r1,
  responseData[15].r2,
  responseData[15].r3,
  responseData[15].r4,
  responseData[15].r5
];

const RegisteredEngineer = [
  responseData[16].positionLevel,
  responseData[16].r1,
  responseData[16].r2,
  responseData[16].r3,
  responseData[16].r4,
  responseData[16].r5
];

const RegisteredNurse = [
  responseData[17].positionLevel,
  responseData[17].r1,
  responseData[17].r2,
  responseData[17].r3,
  responseData[17].r4,
  responseData[17].r5
];

const LicensedCustomBroker = [
  responseData[18].positionLevel,
  responseData[18].r1,
  responseData[18].r2,
  responseData[18].r3,
  responseData[18].r4,
  responseData[18].r5
];

const RegisteredMasterElectrician = [
  responseData[19].positionLevel,
  responseData[19].r1,
  responseData[19].r2,
  responseData[19].r3,
  responseData[19].r4,
  responseData[19].r5
];

const JapaneseInterpreterJLPLevelN1 = [
  responseData[20].positionLevel,
  responseData[20].r1,
  responseData[20].r2,
  responseData[20].r3,
  responseData[20].r4,
  responseData[20].r5
];

const JapaneseInterpreterJLPLevelN2 = [
  responseData[21].positionLevel,
  responseData[21].r1,
  responseData[21].r2,
  responseData[21].r3,
  responseData[21].r4,
  responseData[21].r5
];

const JapaneseInterpreterJLPLevelN3 = [
  responseData[22].positionLevel,
  responseData[22].r1,
  responseData[22].r2,
  responseData[22].r3,
  responseData[22].r4,
  responseData[22].r5
];

const SafetyOfficer3OHSPractitioner = [
  responseData[23].positionLevel,
  responseData[23].r1,
  responseData[23].r2,
  responseData[23].r3,
  responseData[23].r4,
  responseData[23].r5
];

const SafetyOfficer2 = [
  responseData[24].positionLevel,
  responseData[24].r1,
  responseData[24].r2,
  responseData[24].r3,
  responseData[24].r4,
  responseData[24].r5
];


const SafetyOfficer1 = [
  responseData[25].positionLevel,
  responseData[25].r1,
  responseData[25].r2,
  responseData[25].r3,
  responseData[25].r4,
  responseData[25].r5
];

const EnergyConservationOfficer = [
  responseData[26].positionLevel,
  responseData[26].r1,
  responseData[26].r2,
  responseData[26].r3,
  responseData[26].r4,
  responseData[26].r5
];

const PollutionControlOfficer = [
  responseData[27].positionLevel,
  responseData[27].r1,
  responseData[27].r2,
  responseData[27].r3,
  responseData[27].r4,
  responseData[27].r5
];

const RadiationSafetyOfficer = [
  responseData[28].positionLevel,
  responseData[28].r1,
  responseData[28].r2,
  responseData[28].r3,
  responseData[28].r4,
  responseData[28].r5
];

const TechnicalStaff = [
  responseData[29].positionLevel,
  responseData[29].r1,
  responseData[29].r2,
  responseData[29].r3,
  responseData[29].r4,
  responseData[29].r5
];

const CompanyDriverForkliftOperator = [
  responseData[30].positionLevel,
  responseData[30].r1,
  responseData[30].r2,
  responseData[30].r3,
  responseData[30].r4,
  responseData[30].r5
];

const Employeewithspecialexperience = [
  responseData[31].positionLevel,
  responseData[31].r1,
  responseData[31].r2,
  responseData[31].r3,
  responseData[31].r4,
  responseData[31].r5
];

 arrayOfProfAllowances = [
  SeniorManager,
  Manager,
  SeniorSupervisor,
  Supervisor,
  AssistantSupervisor,
  Leader,
  SubLeader,
  ProfessionalP5,
  ProfessionalP4,
  ProfessionalP3,
  ProfessionalP2,
  ProfessionalP1,
  SpecialistS2,
  SpecialistS1,
  Lawyer,
  CPA,
  RegisteredEngineer,
  RegisteredNurse,
  LicensedCustomBroker,
  RegisteredMasterElectrician,
  JapaneseInterpreterJLPLevelN1,
  JapaneseInterpreterJLPLevelN2,
  JapaneseInterpreterJLPLevelN3,
  SafetyOfficer3OHSPractitioner,
  SafetyOfficer2,
  SafetyOfficer1,
  EnergyConservationOfficer,
  PollutionControlOfficer,
  RadiationSafetyOfficer,
  TechnicalStaff,
  CompanyDriverForkliftOperator,
  Employeewithspecialexperience
];
console.log(arrayOfProfAllowances);
};

}
xhrAllowance.send();

var xhrbasicAllowanceSettings = new XMLHttpRequest();
xhrbasicAllowanceSettings.open('GET', 'getBasicAllowanceSettings.php', true);
xhrbasicAllowanceSettings.onreadystatechange = function() {
  if (xhrbasicAllowanceSettings.readyState === 4 && xhrbasicAllowanceSettings.status === 200) {
    var responseData = JSON.parse(xhrbasicAllowanceSettings.responseText);
    d1 = responseData[0].d1;
    d2 = responseData[0].d2;
    d3 = responseData[0].d3;
    m1 = responseData[0].m1;
      m2 = responseData[0].m2;
      m3 = responseData[0].m3;
      m4 = responseData[0].m4;
      m5 = responseData[0].m5;
      f1 = responseData[0].f1;
      f2 = responseData[0].f2;
      
    d1L1 = responseData[0].d1l1;
    d2L1 = responseData[0].d2l1;
    d3L1 = responseData[0].d3l1;

    m1L1 = responseData[0].m1l1;
    m2L1 = responseData[0].m2l1;
    m3L1 = responseData[0].m3l1;
    m4L1 = responseData[0].m4l1;
    m5L1 = responseData[0].m5l1;
    f1L1 = responseData[0].f1l1;
    f2L1 = responseData[0].f2l1;
    workingDays = responseData[0].workingdays;

  };

}
xhrbasicAllowanceSettings.send();


function finalresult(totalPoint){
  var level = document.getElementById("level");
  var levelbg = level.getAttribute('data-default');

  let levelset;
  switch (true) {
    case (totalPoint > 0 && totalPoint <= 1.99):
      setFinalResult('P');
      setLevelUpPoints('1');
  setLevel(parseInt(levelbg)+1);
  // levelset = parseInt(levelbg)+1
  // setLevelSet(levelset);
     
      break;
    case (totalPoint > 1.99 && totalPoint <= 2.99):
      setFinalResult('F');
      setLevelUpPoints('2');
      setLevel(parseInt(levelbg)+2);
      // levelset = parseInt(levelbg)+2;

      break;
    case  (totalPoint > 2.99 && totalPoint <= 3.33):
      setFinalResult('S-');
      setLevelUpPoints('3');
      setLevel(parseInt(levelbg)+3);
      // levelset = parseInt(levelbg)+3;
      // setLevelSet(levelset);

      break;
    case  (totalPoint > 3.33 && totalPoint <= 3.66):
      setFinalResult('S');
      setLevelUpPoints('3');
      setLevel(parseInt(levelbg)+3);
      // levelset = parseInt(levelbg)+3;
      // setLevelSet(levelset);

      break;
    case  (totalPoint > 3.66 && totalPoint <= 3.99):
      setFinalResult('S+');
      setLevelUpPoints('3');
      setLevel(parseInt(levelbg)+3);
      // levelset = parseInt(levelbg)+3;
      // setLevelSet(levelset);

      break;
      case  (totalPoint > 3.99 && totalPoint <= 4.79):
        setFinalResult('G');
        setLevelUpPoints('4');
        setLevel(parseInt(levelbg)+4);
        // levelset = parseInt(levelbg)+4;
        // setLevelSet(levelset);

        break;
        case  (totalPoint > 4.79 && totalPoint <= 5.00):
          setFinalResult('E');
          setLevelUpPoints('5');
          setLevel(parseInt(levelbg)+5);
          // levelset = parseInt(levelbg)+5;
          // setLevelSet(levelset);

          break;
    default:
      setFinalResult('');
      setLevelUpPoints('');
      setLevel(parseInt(levelbg));

  }

  
}
function setLevel(level){
  $('#level').val(level);
}
function setLevelUpPoints(point){
  $('#levelPoint').val(point);
}
function setFinalResult(letter){
  $('#finalResult').val(letter);
}
function setFirstResult(letter){
  $('#firstResult').val(letter);
}
function setSecondResult(letter){
  $('#secondResult').val(letter);
}
function setFinalPoint(point){
  $('#finalPoint').val(point);
}
function setPosPe(point){
  $('#posPePoint').val(point);
}
function setPosRank(rank){
  $('#posRank').val(rank);
}
function setPosAllowance(allowance){
  
  $('#posAllowance').val(allowance);

}

function setDaily(salary){
  console.log("This is the salary: ", salary)
  var selectedValue = $("#salaryType").val();
  console.log(selectedValue)

  if(selectedValue == "Daily"){
    $('#basicSalary').val(salary);
  }
  $('#dailySalary').val(salary);

}

function setMonthlySalary(salary){
  var selectedValue = $("#salaryType").val();
  console.log(selectedValue)

  if(selectedValue == "Monthly"){
    $('#basicSalary').val(salary);
  }
  $('#monthlySalary').val(salary);

}











function levelUp(firstPoint, secondPoint) {
  const point1 = firstPoint;
const totalPoint = Math.round(((  (isNaN(parseFloat(firstPoint)) ? 0 : parseFloat(firstPoint)) +   (isNaN(parseFloat(secondPoint)) ? 0 : parseFloat(secondPoint))) / 2) * 100) / 100;
setFinalPoint(totalPoint)
// setPosPe(totalPoint)

// (isNaN(parseFloat(secondHalf)) ? 0 : parseFloat(secondHalf))

switch (true) {
  case (point1 > 0 && point1 <= 1.99):
    setFirstResult('P');
    break;
  case (point1 > 1.99 && point1 <= 2.99):
    setFirstResult('F');
    break;
  case  (point1 > 2.99 && point1 <= 3.33):
    setFirstResult('S-');
    break;
  case  (point1 > 3.33 && point1 <= 3.66):
    setFirstResult('S');
    break;
  case  (point1 > 3.66 && point1 <= 3.99):
    setFirstResult('S+');
    break;
    case  (point1 > 3.99 && point1 <= 4.79):
      setFirstResult('G');
      break;
      case  (point1 > 4.79 && point1 <= 5.00):
        setFirstResult('E');
        break;
        case  (point1 > 5 ):
        setFirstResult('N/A');
        break;
  default:
    setFirstResult('');
}
finalresult(totalPoint);
setPosPe(totalPoint)

const position =   $('#position').val();

var posRank = document.getElementById('posRank');

// Retrieve the default value from the data-default-value attribute
const posRankbg = posRank.getAttribute('data-posRank');


var posAllowance = document.getElementById('posAllowance');
const posAllowancebg = posAllowance.getAttribute('data-posAllowance');

var posPePoint = document.getElementById('posPePoint');
const posPebg = posPePoint.getAttribute('data-posPePoint');
// const posRankbg =   $('#posRank').val();
// console.log(position);
if(totalPoint>=4 && (position !=="Staff" && position !=="Senior Staff" && position !=="Operator" && position !=="Senior Operator")){
    setPosRank((isNaN(parseInt(posRankbg)) ? 0 : parseInt(posRankbg)) +1);

    let samplePosition = position;
   let sampleRank = (isNaN(parseInt(posRankbg)) ? 0 : parseInt(posRankbg)) +1;

  const allowancesArray = arrayOfProfAllowances.find(
    allowances => allowances[0] === samplePosition
  );
console.log(allowancesArray)
  
if (allowancesArray) {
  // If samplePosition is found in arrayOfProfAllowances
  const allowance = allowancesArray[parseInt(sampleRank, 10)];

  console.log('Allowance:', allowance);
  setPosAllowance(allowance)
} else {
  console.log('samplePosition not found in arrayOfProfAllowances');
}

    }
    else{
        setPosRank(posRankbg);
    setPosAllowance(posAllowancebg);
    setPosPe(posPebg);


    }
    const classEmp =   $('#classEmp').val();
    console.log("class: ",classEmp);
    updateBasicSalary(classEmp);
}


function levelUp2(secondPoint, firstPoint) {
  const point2 = secondPoint;
const totalPoint = Math.round(((  (isNaN(parseFloat(firstPoint)) ? 0 : parseFloat(firstPoint)) +   (isNaN(parseFloat(secondPoint)) ? 0 : parseFloat(secondPoint))) / 2) * 100) / 100;
setFinalPoint(totalPoint)
// setPosPe(totalPoint)

// (isNaN(parseFloat(secondHalf)) ? 0 : parseFloat(secondHalf))

switch (true) {
  case (point2 > 0 && point2 <= 1.99):
    setSecondResult('P');
    break;
  case (point2 > 1.99 && point2 <= 2.99):
    setSecondResult('F');
    break;
  case  (point2 > 2.99 && point2 <= 3.33):
    setSecondResult('S-');
    break;
  case  (point2 > 3.33 && point2 <= 3.66):
    setSecondResult('S');
    break;
  case  (point2 > 3.66 && point2 <= 3.99):
    setSecondResult('S+');
    break;
    case  (point2 > 3.99 && point2 <= 4.79):
      setSecondResult('G');
      break;
      case  (point2 > 4.79 && point2 <= 5.00):
        setSecondResult('E');
        break;
        case  (point2 > 5 ):
        setSecondResult('N/A');
        break;
  default:
    setSecondResult('');
}
finalresult(totalPoint);
setPosPe(totalPoint)

const position =   $('#position').val();

var posRank = document.getElementById('posRank');

// Retrieve the default value from the data-default-value attribute
const posRankbg = posRank.getAttribute('data-posRank');


var posAllowance = document.getElementById('posAllowance');
const posAllowancebg = posAllowance.getAttribute('data-posAllowance');

var posPePoint = document.getElementById('posPePoint');
const posPebg = posPePoint.getAttribute('data-posPePoint');

// console.log(position);
if(totalPoint>=4 && (position !=="Staff" && position !=="Senior Staff" && position !=="Operator" && position !=="Senior Operator")){
    setPosRank((isNaN(parseInt(posRankbg)) ? 0 : parseInt(posRankbg)) +1);

    let samplePosition = position;
   let sampleRank = (isNaN(parseInt(posRankbg)) ? 0 : parseInt(posRankbg)) +1;
   if(sampleRank<=5){
  setPosRank((isNaN(parseInt(posRankbg)) ? 0 : parseInt(posRankbg)) +1);
  console.log(arrayOfProfAllowances);
  const allowancesArray = arrayOfProfAllowances.find(
    allowances => allowances[0] === samplePosition
  );
console.log(allowancesArray)
  
if (allowancesArray) {
  // If samplePosition is found in arrayOfProfAllowances
  const allowance = allowancesArray[parseInt(sampleRank, 10)];

  console.log('Allowance:', allowance);
  setPosAllowance(allowance)
} else {
  console.log('samplePosition not found in arrayOfProfAllowances');
}
}
    }
    else{
        setPosRank(posRankbg);
    setPosAllowance(posAllowancebg);

    setPosPe(posPebg);


    }

    const classEmp =   $('#classEmp').val();
    console.log("class: ",classEmp);
    updateBasicSalary(classEmp);
}

function updateBasicSalary(empClass){

 var level =  $('#level').val();
 console.log("level: ", level)
  switch (empClass) {
    case "D1":
setDaily((parseInt(level)-1)*parseFloat(d1)+parseFloat(d1L1));
setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays)));

      break;
    case "DM1":
setDaily((parseInt(level)-1)*parseFloat(d1)+parseFloat(d1L1));
setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays)));

      break;
    case "D2":
      setDaily((parseInt(level)-1)*parseFloat(d2)+parseFloat(d2L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));

      break;
    case "DM2":
      console.log("This is the details: ",level, d2, d2L1, workingDays);

      setDaily((parseInt(level)-1)*parseFloat(d2)+parseFloat(d2L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));
      console.log("This is the sweldo: ",Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));


      break;
    case "D3":
      setDaily((parseInt(level)-1)*parseFloat(d3)+parseFloat(d3L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays)));

      break;
      case "DM3":
        setDaily((parseInt(level)-1)*parseFloat(d3)+parseFloat(d3L1));
        setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays)));
      break;
      case "M1":
        setDaily((parseInt(level)-1)*parseFloat(m1)+parseFloat(m1L1));
        setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(m1) + parseFloat(m1L1)) * parseFloat(workingDays)));
      break;
      case "M2":
      setDaily((parseInt(level)-1)*parseFloat(m2)+parseFloat(m2L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(m2) + parseFloat(m2L1)) * parseFloat(workingDays)));
      break;
      case "M3":
      setDaily((parseInt(level)-1)*parseFloat(m3)+parseFloat(m3L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(m3) + parseFloat(m3L1)) * parseFloat(workingDays)));
      break;
      case "M4":
      setDaily((parseInt(level)-1)*parseFloat(m4)+parseFloat(m4L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(m4) + parseFloat(m4L1)) * parseFloat(workingDays)));
      break;
      case "M5":
      setDaily((parseInt(level)-1)*parseFloat(m5)+parseFloat(m5L1));
      setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(m5) + parseFloat(m5L1)) * parseFloat(workingDays)));
      break;
      case "F1":
        setDaily((parseInt(level)-1)*parseFloat(f1)+parseFloat(f1L1));
        setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(f1) + parseFloat(f1L1)) * parseFloat(workingDays)));
        break;
        case "F2":
        setDaily((parseInt(level)-1)*parseFloat(f2)+parseFloat(f2L1));
        setMonthlySalary( Math.round(((parseInt(level) - 1) * parseFloat(f2) + parseFloat(f2L1)) * parseFloat(workingDays)));
  
  
        break;
    default:

  }

}

$(document).ready(function(){
    $('#birthday').change(function(){
        var selectedDate = new Date($(this).val());
        var today = new Date();
        var age = today.getFullYear() - selectedDate.getFullYear();
        var monthDiff = today.getMonth() - selectedDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
            age--;
        }
        console.log(age);
        $('#age').val(age);
    });


    $('#dateHired').change(function(){
        var selectedDate = new Date($(this).val());
        var today = new Date();
        var ageInMillis = today - selectedDate;
        var ageInYears = ageInMillis / (1000 * 60 * 60 * 24 * 365.25); // Taking leap years into account
        $('#serviceTerm').val(ageInYears.toFixed(2));
    });





    $('#firstHalf').on('input', function(e) {
    var value = $(this).val();
    var secondHalf = $('#secondHalf').val();

    levelUp(value, secondHalf);
  });

  $('#secondHalf').on('input', function(e) {
    var value = $(this).val();
    var secondHalf = $('#firstHalf').val();

    levelUp2(value, secondHalf);
  });

});





$(".js-example-tags").select2({
  tags: true
});
$('.js-example-tags').on('change', function() {
    var selectedValues = $(this).val();
    console.log(selectedValues);
    document.getElementById("designation").value
  });
    $('.js-example-basic-single').select2();
    
    $(".js-department-tags").select2({
  tags: true
});
$('.js-department-tags').on('change', function() {
    var selectedValues = $(this).val();
    console.log(selectedValues);
    document.getElementById("department").value
  });
    $('.js-department-basic-single').select2();
    


    $(".js-designation1-tags").select2({
  tags: true
});
$('.js-designation1-tags').on('change', function() {
    var selectedValues = $(this).val();
    console.log(selectedValues);
    document.getElementById("designation1").value
  });


  $(".js-department1-tags").select2({
  tags: true
});
$('.js-department1-tags').on('change', function() {
    var selectedValues = $(this).val();
    console.log(selectedValues);
    document.getElementById("department1").value
  });

var urlParams = new URLSearchParams(window.location.search);

// Get the value of the "dept" parameter
var dept = urlParams.get('dept');
var empNo = urlParams.get('empNo');

// Output the value of the "dept" parameter



const $targetEl = document.getElementById('employeesDetails');

// options with default values
const options = {
    placement: 'bottom',
    backdrop: false,
    bodyScrolling: false,
    edge: false,
    edgeOffset: '',
    backdropClasses:
        'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
    onHide: () => {
        console.log('drawer is hidden');
    },
    onShow: () => {
        console.log('drawer is shown');
        $("#employeesDetails").removeClass("hidden");

    },
    onToggle: () => {
        console.log('drawer has been toggled');
    },
};

// instance options object
const instanceOptions = {
  id: 'employeesDetails',
  override: true
};

const drawer = new Drawer($targetEl, options, instanceOptions);


const $targetModalSave = document.getElementById('save');

// options with default values
const optionsSave = {
  
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 relative inset-0 z-40',
    closable: true,
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


const modalSave = new Modal($targetModalSave, optionsSave, instanceOptionsSave);

function openSaveModal(){
  modalSave.toggle();
}


if(empNo !=null){
  console.log("this is: "+empNo)
  drawer.show();
}
else{
  drawer.hide();
  
}

    


function showMain(){
  drawer.show();
}




function setDaily1(salary){
  console.log("This is the salary: ", salary)
  var selectedValue = $("#salaryType1").val();
  console.log(selectedValue)

  if(selectedValue == "Daily"){
    $('#basicSalary1').val(salary);
  }
  $('#dailySalary1').val(salary);

}

function setSpecialization1(){
  let tsAllowanceVal =  $('#tsAllowance1').val();
  let leAllowanceVal =  $('#leAllowance1').val();
  let ceAllowanceVal =  $('#ceAllowance1').val();

 
// Parsing the values to integers or defaulting to 0 if they are not valid numbers
let tsAllowanceInt = parseInt(tsAllowanceVal) || 0;
let leAllowanceInt = parseInt(leAllowanceVal) || 0;
let ceAllowanceInt = parseInt(ceAllowanceVal) || 0;

// Adding the parsed values
console.log(tsAllowanceInt + leAllowanceInt + ceAllowanceInt);


  var specializationTotal = tsAllowanceInt + leAllowanceInt + ceAllowanceInt;
  $('#Specialization1').val(specializationTotal);
}


$('#tsAllowance1').on('input', function(e) {
  // console.log("asdasd");
  setSpecialization1();



});
$('#leAllowance1').on('input', function(e) {
  setSpecialization1();



});
$('#ceAllowance1').on('input', function(e) {
  setSpecialization1();



});




function setSpecialization(){
  let tsAllowanceVal =  $('#tsAllowance').val();
  let leAllowanceVal =  $('#leAllowance').val();
  let ceAllowanceVal =  $('#ceAllowance').val();

 
// Parsing the values to integers or defaulting to 0 if they are not valid numbers
let tsAllowanceInt = parseInt(tsAllowanceVal) || 0;
let leAllowanceInt = parseInt(leAllowanceVal) || 0;
let ceAllowanceInt = parseInt(ceAllowanceVal) || 0;

// Adding the parsed values
console.log(tsAllowanceInt + leAllowanceInt + ceAllowanceInt);


  var specializationTotal = tsAllowanceInt + leAllowanceInt + ceAllowanceInt;
  $('#Specialization').val(specializationTotal);
}


$('#tsAllowance').on('input', function(e) {
  // console.log("asdasd");
  setSpecialization();



});
$('#leAllowance').on('input', function(e) {
  setSpecialization();



});
$('#ceAllowance').on('input', function(e) {
  setSpecialization();



});






function setMonthlySalary1(salary){
  var selectedValue = $("#salaryType1").val();
  console.log(selectedValue)

  if(selectedValue == "Monthly"){
    $('#basicSalary1').val(salary);
  }
  $('#monthlySalary1').val(salary);

}

$('#level1').on('input', function(e) {
    var value = $(this).val();

  

  var enteredValue = parseInt($(this).val());
  
  // Check if the entered value exceeds the maximum
  if (enteredValue > 50) {
    // Set the input value to the maximum allowed value
    $(this).val(50);
  }
  else{
    updateBasicSalary1(enteredValue);
  }


  // updateBasicSalary1()

  });


$("#salaryType1").change(function() {
  var selectedValue = $(this).val();

  var dailyValue =  $("#dailySalary1").val();
  var monthlyValue =  $("#monthlySalary1").val();

  if (selectedValue === "Monthly") {
    $("#basicSalary1").val(monthlyValue);
  }
  else if (selectedValue === "Daily") {
    $("#basicSalary1").val(dailyValue);
  }
});

$("#salaryType").change(function() {
  var selectedValue = $(this).val();

  var dailyValue =  $("#dailySalary").val();
  var monthlyValue =  $("#monthlySalary").val();

  if (selectedValue === "Monthly") {
    $("#basicSalary").val(monthlyValue);
  }
  else if (selectedValue === "Daily") {
    $("#basicSalary").val(dailyValue);
  }
});



function updateBasicSalary1(level){
var empClass = document.getElementById('classEmp1').value
var level =  level;
console.log("level: ", level)
 switch (empClass) {
   case "D1":
setDaily1((parseInt(level)-1)*parseFloat(d1)+parseFloat(d1L1));
setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays)));

     break;
   case "DM1":
setDaily1((parseInt(level)-1)*parseFloat(d1)+parseFloat(d1L1));
setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d1) + parseFloat(d1L1)) * parseFloat(workingDays)));

     break;
   case "D2":
     setDaily1((parseInt(level)-1)*parseFloat(d2)+parseFloat(d2L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));

     break;
   case "DM2":
     console.log("This is the details: ",level, d2, d2L1, workingDays);

     setDaily1((parseInt(level)-1)*parseFloat(d2)+parseFloat(d2L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));
     console.log("This is the sweldo: ",Math.round(((parseInt(level) - 1) * parseFloat(d2) + parseFloat(d2L1)) * parseFloat(workingDays)));


     break;
   case "D3":
     setDaily1((parseInt(level)-1)*parseFloat(d3)+parseFloat(d3L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays)));

     break;
     case "DM3":
       setDaily1((parseInt(level)-1)*parseFloat(d3)+parseFloat(d3L1));
       setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(d3) + parseFloat(d3L1)) * parseFloat(workingDays)));
     break;
     case "M1":
       setDaily1((parseInt(level)-1)*parseFloat(m1)+parseFloat(m1L1));
       setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(m1) + parseFloat(m1L1)) * parseFloat(workingDays)));
     break;
     case "M2":
     setDaily1((parseInt(level)-1)*parseFloat(m2)+parseFloat(m2L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(m2) + parseFloat(m2L1)) * parseFloat(workingDays)));
     break;
     case "M3":
     setDaily1((parseInt(level)-1)*parseFloat(m3)+parseFloat(m3L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(m3) + parseFloat(m3L1)) * parseFloat(workingDays)));
     break;
     case "M4":
     setDaily1((parseInt(level)-1)*parseFloat(m4)+parseFloat(m4L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(m4) + parseFloat(m4L1)) * parseFloat(workingDays)));
     break;
     case "M5":
     setDaily1((parseInt(level)-1)*parseFloat(m5)+parseFloat(m5L1));
     setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(m5) + parseFloat(m5L1)) * parseFloat(workingDays)));
     break;
     case "F1":
       setDaily1((parseInt(level)-1)*parseFloat(f1)+parseFloat(f1L1));
       setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(f1) + parseFloat(f1L1)) * parseFloat(workingDays)));
       break;
       case "F2":
       setDaily1((parseInt(level)-1)*parseFloat(f2)+parseFloat(f2L1));
       setMonthlySalary1( Math.round(((parseInt(level) - 1) * parseFloat(f2) + parseFloat(f2L1)) * parseFloat(workingDays)));
 
 
       break;
   default:

 }

}
</script>
</body>
</html>