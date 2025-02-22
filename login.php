<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include ("includes/connect.php");
// echo $_SESSION['connected'];
if(isset($_SESSION['logged'])){

  header("location: hr");
  
    }



 if(isset($_POST['sendConfirmation'])){

      $code = mt_rand(100000, 999999);
// echo $code;




  $usernameForgot = $_POST['usernameForgot'];

  $sqlinsert = "INSERT INTO `confirmationcode` (`code`) VALUES ('$code')";
  $resultinsert = mysqli_query($con, $sqlinsert);
  if($resultinsert){
    


    $sql2 = "Select * FROM `sender`";
    $result2 = mysqli_query($con, $sql2);
    while ($list = mysqli_fetch_assoc($result2)) {
      $account = $list["email"];
      $accountpass = $list["password"];
    }
  
  
    
    $sql3 = "Select * FROM `user` WHERE `username` = '$usernameForgot'";
    // echo $sql3;
    $result3 = mysqli_query($con, $sql3);
    while ($list2 = mysqli_fetch_assoc($result3)) {
      $useremail = $list2["email"];
      $userFullName = $list2["name"];
  
  // echo $userFullName;
    }

    
    $sql4 = "Select * FROM `settings`";
    $result4 = mysqli_query($con, $sql4);
    while ($list4 = mysqli_fetch_assoc($result4)) {
      $link = $list4["link"];
     
    }

  
  
    $resetLink = "changePassword.php";
    $subject = 'Change Password';
    $message = '<div style="width: 1000px; font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px; border: 3px solid red; border-radius: 8px; ">
         
        <p>Hi <strong>' . $userFullName . '</strong>,</p>
        <p>It seems like you want to change your password. Please click the button below for confirmation</p>
        
              <p style="text-align: center;">
          <a href="'.$link.'changePassword.php?codeid='.$code.'&username='.$usernameForgot.'"
         style="background-color: #007BFF; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 16px;">
          Reset Password
      </a>
      </p>
        
        <p>Yours truly, </p>
        
        <p>HR-App</p>
        
              <p style="font-size: 12px; color: #0073e6;">
                  <em>This is a generated email. Please do not reply.</em>
              </p>
              
              
          </div>';
    require 'vendor/autoload.php';
  
      $mail = new PHPMailer(true);
      //  email the admin               
      try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.glorylocal.com.ph';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $account;     // Your Email/ Server Email
        $mail->Password = $accountpass;                     // Your Password
        $mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          )
        );
        $mail->SMTPSecure = 'none';
        $mail->Port = 465;
  
        //Send Email
        // $mail->setFrom('Helpdesk'); //eto ang mag front  notificationsys01@gmail.com
  
        //Recipients
        $mail->setFrom('hrapp@glorylocal.com.ph', 'HR App');
        $mail->addAddress($useremail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
  
        echo "<script>alert('We have just sent a confirmation to your email. Please check it.') </script>";
        echo "<script> location.href='login.php'; </script>";
  
  
        // header("location: form.php");
      } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        echo "<script>alert('Message could not be sent. Mailer Error.') </script>";
      }


  }




 }
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql1 = "Select * FROM `user` WHERE `username`='$username'";
  $result = mysqli_query($con, $sql1);
  $numrows = mysqli_num_rows($result);

  if($numrows >=1){
    while($userRow = mysqli_fetch_assoc($result)){
      $hash_password = $userRow['password'];

      if (!password_verify($password, $hash_password)){
        echo "<script>alert('Wrong password.');</script>";
      }
      else{
        $approved = $userRow['approved'];
        if($approved == 1){
          $_SESSION['logged']=true;
          $_SESSION['sample']=true;
          $_SESSION['name']=$userRow['name'];
          $_SESSION['userid']=$userRow['id'];
    
          if($_SESSION['logged']){
            header("location:hr/index.php?dept=all");
    
          }
    
        }
        else{
          echo "<script>alert('Your account is subject for approval.');</script>";
        }
       
  
       
      }

    }
  }
  else{
    echo "<script>alert('User not found.');</script>";
  }

}

// $ictApprovalDate1 = new DateTime('2024-04-25 13:54:00');
// $dateResponded2 = new DateTime('2024-04-25 13:55:00');
// $ictApprovalDate1->setTime($ictApprovalDate1->format('H'), 0, 0);
// $dateResponded2->setTime($dateResponded2->format('H'), 0, 0);

// $ictApprovalDate3 = new DateTime('2024-04-25 13:54:00');
// $dateResponded4 = new DateTime('2024-04-25 13:55:00');

//     // Define holidays array
//     $sqlHoli = "SELECT holidaysDate FROM holidays";
//     $resultHoli = mysqli_query($con, $sqlHoli);
// $holidays = array(
//     '2024-04-15',
//     '2024-04-16',

// );
//     $interval = $ictApprovalDate1->diff($dateResponded2);
//     $hours = $interval->days * 8 + $interval->h;
  
//     $start = clone $ictApprovalDate1;
//     $end = clone $dateResponded2;
//     $interval_days = new DateInterval('P1D');
//     $period = new DatePeriod($start, $interval_days, $end);
//     // echo $hours, " ";
//     foreach ($period as $day) {
//         if ($day->format('N') >= 6 || in_array($day->format('Y-m-d'), $holidays)) {
            
//             $hours -= 8; // Subtract 24 hours for each weekend day or holiday
//             // echo $hours, " ";
//         }
//     }
//     $hours1 = $end->format('H');

//     // if($hours1 <=11 ){
//     // $finalHours = $hours - 15;
//     // echo $hours;

    
//     // }
//     // else if($hours1 ==12 ){
//     // $finalHours = $hours - 16;

    
//     // echo $hours;
//     // }
//     // else if($hours1 >12 ){
//     $finalHours = $hours;
//     $minutes1 = $ictApprovalDate3->format('i');
//     $minutes1_decimal = $minutes1 / 60;

//     $minutes2 = $dateResponded4->format('i');
//     $minutes2_decimal = $minutes2/ 60;


//     // echo $finalHours;

//     // echo $minutes1_decimal;

//     // echo $minutes2_decimal;


//     $finalHours = ($finalHours -$minutes1_decimal)+$minutes2_decimal ;
//     // }

 
//     echo $finalHours;

    



// // Define the two dates
// $date1 = new DateTime('2024-04-13 14:46:00');
// $date2 = new DateTime('2024-04-13 15:48:00');

// // Define holidays array
// $holidays = array(
//     '2024-04-15',
//     '2024-04-16',

// );

// // Calculate the difference
// $interval = $date1->diff($date2);

// // Get the difference in hours considering weekends and holidays
// $hours = $interval->days * 8 + $interval->h;

// // Check if there are Saturdays, Sundays, and holidays within the interval
// $start = clone $date1;
// $end = clone $date2;
// $interval_days = new DateInterval('P1D');
// $period = new DatePeriod($start, $interval_days, $end);

// foreach ($period as $day) {
//     if ($day->format('N') >= 6 || in_array($day->format('Y-m-d'), $holidays)) {
//         $hours -= 8; // Subtract 24 hours for each weekend day or holiday
//     }
// }

// $hours1 = $end->format('H');

// if($hours1 <=11 ){
//   $finalHours = $hours - 15;
// echo "The difference in hours considering weekends and holidays is: $finalHours";

// }
// else if($hours1 ==12 ){
//   $finalHours = $hours - 16;
//   echo "The difference in hours considering weekends and holidays is: $finalHours";
// }
// else if($hours1 >12 ){
//   $finalHours = $hours;
//   echo "The difference in hours considering weekends and holidays is: $finalHours";
// }





// // echo "hour: $sample";

// // $date1 = new DateTime('2024-04-12 13:00:00');
// // $date2 = new DateTime('2024-04-12 16:00:00');

// // $interval = $date2->diff($date1);
// // echo $interval->format('%H hours, %i minutes');

// // $date3 = new DateTime('2024-04-17 07:00:00');
// // $date4 = new DateTime('2024-04-17 10:00:00');

// // $interval1 = $date4->diff($date3);
// // echo $interval1->format('%H hours, %i minutes');



?>









<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR-App</title>
    
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" /> -->
    <link rel="stylesheet" href="./fontawesome-free-6.2.0-web/css/all.min.css">
  
     <!-- tailwind play cdn -->
    <script src="./src/cdn_tailwindcss.js"></script>


    <!-- <script src="Snowstorm-master/snowstorm.js"></script> -->


     <!-- from flowbite cdn -->
    <link rel="stylesheet" href="node_modules/flowbite/dist/flowbite.min.css" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" /> -->


    <link rel="shortcut icon" href="resources/img/ESM LOGO.png">



<style>
  
.logo-container {
  position: relative;
  animation: floatAnimation 2s ease-in-out infinite;
}



@keyframes floatAnimation {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}


</style>

</head>
<body  class="static bg-[#f2f5fff2]"  >

    <!-- nav -->
    <?php require_once 'nav_login.php';?>


<!-- main -->


<section class="h-screen" >
  <div class="m-auto container px-6 py-4 h-full">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
    
      <div class="sm:p-28 w-full md:w-8/12 lg:w-6/12 mb-12 md:mb-0 ">


        <form  method="post" action="login.php" class="shadow-lg p-10 bg-white">

        <h1 class="text-[#3a394b] text-xl font-bold text-center mb-10">Login</h1>
        <!-- <h1 class="text-gray-400 text-xl font-bold text-center mb-10">Welcome to Helpdesk System</h1> -->

          <!-- password input -->
          <div class="mb-6">
            <input
              type="text"
              name="username"
              autocomplete="off"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="User Name"
            />
          </div>

          <!-- Password input -->
          <div class="mb-6">
            <input
              type="password"
              name="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              placeholder="Password"
            />
          </div>
     

      
          <!-- Submit button -->
          <button
            type="submit"
            name="login"
            class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
            Sign in
          </button>
          <div class="flex justify-between items-center mb-6">
           
           <a
             data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
             class=" text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
             >Forgot password?</a
           >
         </div>

          <p class="mt-10 text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="register.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p>
  
        </form>

      </div>

      <footer class="w-full  m-4">


<span class="block text-sm  text-center dark:text-gray-400">  <a href="https://flowbite.com/" class="hover:underline">Designed By</a> Cedrick James - ICT</span>

</div>
</footer>
    </div>
     

  </div>
  
</section>

<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Forgot password?
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your Username</label>
                        <input type="text" name="usernameForgot" id="usernameForgot" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder="name@company.com" required />
                    </div>
                   
           
                    <button type="submit" name="sendConfirmation" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Send Confimation Email</button>
                  
                </form>
            </div>
        </div>
    </div>
</div> 

<script src="node_modules/flowbite/dist/flowbite.js"></script>


<script>  

</script>

</body>
</html>