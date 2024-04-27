<?php 
session_start();

include ("../../includes/connect.php");

if(isset($_POST['activateDeactivate'])){
    $userid= $_POST['userid'];
    $sqlCheck = "SELECT * FROM `user` WHERE `id` = '$userid'";
    $result= mysqli_query($con, $sqlCheck);
        while($row = mysqli_fetch_assoc($result)){
            $approved = $row['approved'];
        }

        if($approved == '1'){
            $sqlUpdate = "UPDATE `user` SET `approved`='0' WHERE `id` = '$userid'";
            $resultUpdate= mysqli_query($con, $sqlUpdate);

            if($resultUpdate){
                echo "<script> alert('Success') </script>";
            }
        }
        else{
            $sqlUpdate = "UPDATE `user` SET `approved`='1' WHERE `id` = '$userid'";
            $resultUpdate= mysqli_query($con, $sqlUpdate);

            if($resultUpdate){
                echo "<script> alert('Success') </script>";
            }
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
                $uploadFileDir = '../../resources/img/';
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
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../../resources/img/<?php
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
            <a href="../user/index.php" class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
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
                <img class="w-8 h-8 rounded-full" src="../../resources/img/<?php
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
   <h1 class=" text-1xl  sm:text-3xl whitespace-nowrap mb-10 ">List of HR System Users</h1>
   
    


<div id="default-tab-content">
<table id="allowanceTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
  <thead>
   
    <tr>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; "   >No.</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; "   >Name</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >Username</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >Level</th>

      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px; "   >Status</th>
      <th style="border: 1px solid gray; font-weight: bold; font-size: 16px;"  >Action</th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($con, $sql);

    $no =1;
    while($row=mysqli_fetch_assoc($result))
    {
      $id=$row["id"];

        $name=$row["name"];
        $username=$row["username"];
        $level=$row["level"];
        $approved=$row["approved"];
        ?>
            <tr>
             <td><?php echo $no; ?> </td>
             
             <td><?php echo $name; ?> </td>
             <td><?php echo $username;  ?> </td>
             <td><?php echo $level;  ?> </td>

             <td><?php echo ($approved == 1) ? "Activated" : "Deactivated"; ?> </td>
             <td class="flex justify-center"><button data-userid="<?php echo $id;?>" data-status="<?php echo $approved;?>" class="changeUserStatus block text-white bg-<?php echo ($approved == 1) ? "red" : "blue"; ?>-700 hover:bg-<?php echo ($approved == 1) ? "red" : "blue"; ?>-800 focus:ring-4 focus:outline-none focus:ring-<?php echo ($approved == 1) ? "red" : "blue"; ?>-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-<?php echo ($approved == 1) ? "red" : "blue"; ?>-600 dark:hover:bg-<?php echo ($approved == 1) ? "red" : "blue"; ?>-700 dark:focus:ring-<?php echo ($approved == 1) ? "red" : "blue"; ?>-800" type="button">
             <?php echo ($approved == 1) ? "Deactivate" : "Activate"; ?> 
</button> </td>


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
   

   
<div id="areyousureUser" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" onclick="modalActivateUser.toggle();" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="" method="POST"> 
                <input type="text" class="hidden" id="userid" name="userid">
                 <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to <span id="activateDeactivate"></span> this user?</h3>
                <button type="submit" name="activateDeactivate" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button onclick="modalActivateUser.toggle();" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </form>
          
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
                <button type="button" data-modal-target="workingDays" data-modal-toggle="workingDays" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"onclick ="openAllowanceModal()">
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
                <button data-modal-target="changepassword" data-modal-toggle="changepassword"  type="button"  class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
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
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../../resources/img/<?php
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











<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/DataTables/datatables.min.js"></script>
<script src="../../node_modules/flowbite/dist/flowbite.js"></script>
<script src="../../node_modules/select2/dist/js/select2.min.js"></script>

<script type="text/javascript" src="index.js"></script>


<script>

    
const $targetModalActivate = document.getElementById('areyousureUser');

// options with default values
const optionsActivate = {
  
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
const instanceOptionsActivate = {
  id: 'modalEl',
  override: true
};


const modalActivateUser = new Modal($targetModalActivate, optionsActivate, instanceOptionsActivate);

// function openAllowanceModal(){
//     var positionLevel = button.getAttribute('data-positionlevel');
    
//     $('#name').val(positionLevel);

//   modalActivateUser.toggle();
// }

$(document).ready(function() {
    // When the button is clicked
    $('.changeUserStatus').click(function() {
        modalActivateUser.toggle();
        // Get the value of data-positionlevel attribute
        var userid = $(this).data('userid');
        var status = $(this).data('status');

        if(status=="1"){
            $('#activateDeactivate').append('deactivate');
        }
        else{
            $('#activateDeactivate').append('activate');
        }
       
        // Put the value into the input field
        $('#userid').val(userid);


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