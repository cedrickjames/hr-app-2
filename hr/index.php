<?php
session_start();

include ("../includes/connect.php");
if(!isset($_SESSION['connected'])){
  header("location: ../logout.php");
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

</head>
<body>
    


<aside
id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800"
style="background-size: cover;  background-image: url(&quot;../resources/img/background for sidebar.png&quot;);"
   
   >
   <div class="mt-10 mx-auto"
       style="display: flex; align-items: center; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; background-size: cover; background-clip: content-box; box-sizing: border-box; background-image: url(&quot;../resources/img/default.png&quot;); position: relative; overflow: hidden;">
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
   <h1 class="mx-auto text-1xl  sm:text-4xl whitespace-nowrap text-center text-white">Rio Monzon</h1>
   <h1 class="mx-auto text-1xl  sm:text-2xl whitespace-nowrap text-center text-teal-300">Administration</h1>


      <ul class="mt-10 space-y-2 font-medium text-white">
         <li>
            <a href="#" class="flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
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
    
<nav class="fixed top-0  w-full pr-64 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
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
                <img class="w-8 h-8 rounded-full" src="../resources/img/default.png" alt="user photo">
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
   
    
<div class="mt-14 mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex mb-px text-sm font-medium text-center relative overflow-x-auto whitespace-nowrap"  style="overflow-x: auto;" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
    <li class="me-2" role="presentation">
            <a href="http://192.168.60.53/hr-app-2/hr/index.php?dept=all" 
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
            <a href="http://192.168.60.53/hr-app-2/hr/index.php?dept=<?php echo $department;?>" 
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
<div id="default-tab-content">
    <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maintable" role="tabpanel" aria-labelledby="profile-tab">
    <table id="deptHeadTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
                <thead>
                        <tr>
                            
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
                                               <td> <?php echo $no;?> </td>  
                                               <td> <a href="http://192.168.60.53/hr-app-2/hr/index.php?dept=<?php echo $getDepartment;?>&empNo=<?php echo $empNo;?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
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


<?php  include ("details.php");
?>




<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/DataTables/datatables.min.js"></script>
<script src="../node_modules/flowbite/dist/flowbite.js"></script>
<script src="../node_modules/select2/dist/js/select2.min.js"></script>

<script type="text/javascript" src="index.js"></script>
<script>

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
        'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-30',
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
</script>
</body>
</html>