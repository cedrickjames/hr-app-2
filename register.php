<?php
session_start();
include ("includes/connect.php");
// echo $_SESSION['connected'];
if(isset($_SESSION['logged'])){

  header("location: hr");
  
    }

if(isset($_POST['register'])){



  $username = $_POST['username'];
  $password = $_POST['password'];

  $name = $_POST['name'];

  $confirmpassword = $_POST['confirm-password'];


  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql1 = "Select * FROM `user` WHERE `username`='$username'";
  $result = mysqli_query($con, $sql1);
  $numrows = mysqli_num_rows($result);

  if($numrows ==0){

   
      if($password == $confirmpassword){

        $hash_new_pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `user`(`name`, `username`, `password`, `level`, `profile_picture`, `approved`) VALUES ('$name','$username','$hash_new_pass','manager','', 0)";
        $result = mysqli_query($con, $sql);
        if($result){
          echo "<script>alert('Your account is now subject for approval');</script>";
        }
      }
      else{
        echo "<script>alert('Password does not match.');</script>";
      }

  }
  else{

    $sqlcheck = "Select * FROM `user` WHERE `username`='$username'";
    $resultcheck = mysqli_query($con, $sqlcheck);
    $numrowscheck = mysqli_num_rows($resultcheck);
  
    while($userRow = mysqli_fetch_assoc($resultcheck)){
      $approved = $userRow['approved'];

      if($approved == 1){
        echo "<script>alert('This user is already registered.');</script>";

      }
      else{
    echo "<script>alert('This user is subject for approval.');</script>";

      }
    }
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


       

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl mb-10">
                  Create and account
              </h1>
              <form class="space-y-4 md:space-y-6 " action="" method="POST">
              <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
                      <input  name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Your User Name</label>
                      <input  name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>
                      <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
        
                  <button type="submit" name="register" class="mt-10 inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full">Create an account</button>
                  <p class="mt-4 text-sm font-light text-gray-500">
                      Already have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline ">Login here</a>
                  </p>
              </form>
  
       
      </div>

      <footer class="w-full  m-4">


<span class="block text-sm  text-center dark:text-gray-400">  <a href="https://flowbite.com/" class="hover:underline">Designed By</a> Cedrick James - MIS Section</span>

</div>
</footer>
    </div>
     

  </div>
  
</section>

<script src="node_modules/flowbite/dist/flowbite.js"></script>


<script>  

</script>

</body>
</html>