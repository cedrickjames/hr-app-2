<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include ("includes/connect.php");
// echo $_SESSION['connected'];
if(isset($_SESSION['logged'])){

  header("location: hr");
  
    }

//     $code = mt_rand(100000, 999999);
// echo $code;

// $codeid = $_GET['codeid'];
// $username = $_GET['username'];



// $sqlcode = "Select * FROM `confirmationcode` WHERE `code`='$codeid'";
// $resultcode = mysqli_query($con, $sqlcode);
// $numrows = mysqli_num_rows($resultcode);
// if($numrows<=0){

//   echo "<script>alert('You cannot enter this page.');</script>";
//   echo "<script> location.href='login.php'; </script>";
//   // header("location:hr");
// }

if(isset($_POST['submitOTP'])){

  $sql4 = "Select * FROM `settings`";
  $result4 = mysqli_query($con, $sql4);
  while ($list4 = mysqli_fetch_assoc($result4)) {
    $link = $list4["link"];
   
  }


  $code1 = $_POST['code-1'];
  $code2 = $_POST['code-2'];
  $code3 = $_POST['code-3'];
  $code4 = $_POST['code-4'];
  $code5 = $_POST['code-5'];
  $code6 = $_POST['code-6'];

  $OTPcode = $code1.$code2.$code3.$code4.$code5.$code6;
  // echo " '.$link.'changePassword.php?codeid='.$OTPcode.'";

$sqlcode = "Select * FROM `confirmationcode` WHERE `code`='$OTPcode'";
$resultcode = mysqli_query($con, $sqlcode);
$numrows = mysqli_num_rows($resultcode);
if($numrows>=1){
  echo "<script> location.href='changePassword.php?codeid=$OTPcode'; </script>";
  // header("location:hr");
}


  // $hash = password_hash($password, PASSWORD_DEFAULT);

  // $sqlinsert = "UPDATE `user` SET `password`='$hash' WHERE `username` = '$username';";
  // // echo $sqlinsert;
  // $resultinsert = mysqli_query($con, $sqlinsert);
  // if($resultinsert){
  //   echo "<script>alert('You have successfully change your password');</script>";
  //   echo "<script> location.href='login.php'; </script>";

  // }
  // else{
  //   // echo $sqlinsert;
  // }



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


        <form  method="post" action="" class="shadow-lg p-10 bg-white">

        <h1 class="text-[#3a394b] text-xl font-bold text-center mb-10">Add your OTP</h1>
        
    <div class="flex  justify-center mb-2 space-x-2 rtl:space-x-reverse">
        <div>
            <label for="code-1" class="sr-only">First code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-next="code-2" id="code-1" name="code-1" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 " required />
        </div>
        <div>
            <label for="code-2" class="sr-only">Second code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-1" data-focus-input-next="code-3" id="code-2" name="code-2" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" required />
        </div>
        <div>
            <label for="code-3" class="sr-only">Third code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-2" data-focus-input-next="code-4" id="code-3" name="code-3" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" required />
        </div>
        <div>
            <label for="code-4" class="sr-only">Fourth code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-3" data-focus-input-next="code-5" id="code-4" name="code-4" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" required />
        </div>
        <div>
            <label for="code-5" class="sr-only">Fifth code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-4" data-focus-input-next="code-6" id="code-5" name="code-5" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" required />
        </div>
        <div>
            <label for="code-6" class="sr-only">Sixth code</label>
            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-5" id="code-6" name="code-6" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 " required />
        </div>
    </div>
    <p id="helper-text-explanation" class="flex  justify-center  mt-2 text-sm text-gray-500 =">Please introduce the 6 digit code we sent via email.</p>
    <button
            type="submit"
            name="submitOTP"
            class="mt-10 inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
           Submit OTP
          </button>


      
          <!-- Submit button -->
          
   
  
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
                        <input type="text" name="usernameForgot" id="usernameForgot" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required />
                    </div>
                   
           
                    <button type="submit" name="sendConfirmation" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Send Confimation Email</button>
                  
                </form>
            </div>
        </div>
    </div>
</div> 

<script src="node_modules/flowbite/dist/flowbite.js"></script>


<script>  

// use this simple function to automatically focus on the next input
function focusNextInput(el, prevId, nextId) {
    if (el.value.length === 0) {
        if (prevId) {
            document.getElementById(prevId).focus();
        }
    } else {
        if (nextId) {
            document.getElementById(nextId).focus();
        }
    }
}

document.querySelectorAll('[data-focus-input-init]').forEach(function(element) {
    element.addEventListener('keyup', function() {
        const prevId = this.getAttribute('data-focus-input-prev');
        const nextId = this.getAttribute('data-focus-input-next');
        focusNextInput(this, prevId, nextId);
    });
    
// Handle paste event to split the pasted code into each input
    element.addEventListener('paste', function(event) {
        event.preventDefault();
        const pasteData = (event.clipboardData || window.clipboardData).getData('text');
        const digits = pasteData.replace(/\D/g, ''); // Only take numbers from the pasted data

        // Get all input fields
        const inputs = document.querySelectorAll('[data-focus-input-init]');
        
        // Iterate over the inputs and assign values from the pasted string
        inputs.forEach((input, index) => {
            if (digits[index]) {
                input.value = digits[index];
                // Focus the next input after filling the current one
                const nextId = input.getAttribute('data-focus-input-next');
                if (nextId) {
                    document.getElementById(nextId).focus();
                }
            }
        });
    });
});

</script>

</body>
</html>