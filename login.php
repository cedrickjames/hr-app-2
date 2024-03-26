<?php
session_start();
include ("includes/connect.php");
if(isset( $_SESSION['connected'])){

  header("location: hr");
  
    }

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql1 = "Select * FROM `user` WHERE `username`='$username'";
  $result = mysqli_query($con, $sql1);
  $numrows = mysqli_num_rows($result);

  while($userRow = mysqli_fetch_assoc($result)){
    $userpass = $userRow['password'];
    if($password == $userpass){
    

      $_SESSION['connected']=true;

      header("location:hr");

    }
  }
}



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
          <div class="mb-6 flex gap-4">

          

          </div>

          <div class="flex justify-between items-center mb-6">
           
            <a
              href="#!"
              class="hidden text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
              >Forgot password?</a
            >
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