
<?php
date_default_timezone_set('Asia/Manila'); // You can change the timezone as per your requirement


if(isset($_POST['addEmployee'])){
$daily = $_POST['dailySalary1'];
$level = $_POST['level1'];
$basicSalary = $_POST['basicSalary1'];
$monthlySalary = $_POST['monthlySalary1'];
$posPe = $_POST['posPePoint1'];
$posAllowance = $_POST['posAllowance1'];
$posRank = $_POST['posRank1'];
$empNumber = $_POST['employeeId1'];
$department = $_POST['department1'];
$section = $_POST['section1'];
$empName = $_POST['empName1'];
$position = $_POST['position1'];
$classEmp = $_POST['classEmp1'];
$designation = "";

    $designation = $_POST['designation1'];

    if($designation!=""){
      
    $designation = implode(', ', $designation);
    }
    $salary =$_POST['salaryType1'];
    $tsPEPoint =$_POST['tsPEPoint1'];
    $tsAllowance =$_POST['tsAllowance1'];
    $tsRank =$_POST['tsRank1'];
    $leLicenseFee =$_POST['leLicenseFee1'];
    $lePEPoint =$_POST['lePEPoint1'];
    $leAllowance =$_POST['leAllowance1'];
    $leRank =$_POST['leRank1'];
    $ceCertificateOnFee =$_POST['ceCertificateOnFee1'];
    $cePEPoint =$_POST['cePEPoint1'];
    $ceAllowance =$_POST['ceAllowance1'];
    $ceRank =$_POST['ceRank1'];
    $Specialization =$_POST['Specialization1'];
    $newBirthday =$_POST['birthday1'];
    $birthday = date('j-M-y', strtotime($newBirthday));
    $age =$_POST['age1'];
    $sex =$_POST['sex1'];
    
    $newDateHired =$_POST['dateHired1'];
    $dateHired = date('j-M-y', strtotime($newDateHired));
  
    $addEmployee = "INSERT INTO salaryincrease( `department`, `section`, `employeeName`, `sex`, `birthday`, `age`, `empNo`, `dateHired`, `position`, `designation`, `class`, `level`, `salaryType`, `basicSalary`, `daily`, `monthlySalary`, `pPEPoint`, `pAllowance`, `pRank`, `tsPEPoint`, `tsAllowance`, `tsRank`, `leLicenseFee`, `lePEPoint`, `leAllowance`, `leRank`, `ceCertificateOnFee`, `cePEPoint`, `ceAllowance`, `ceRank`, `Specialization`) VALUES ('$department', '$section', '$empName', '$sex', '$birthday','$age', '$empNumber','$dateHired', '$position', '$designation', '$classEmp', '$level', '$salary', '$basicSalary', '$daily', '$monthlySalary', '$posPe', '$posAllowance', '$posRank', '$tsPEPoint', '$tsAllowance', '$tsRank', '$leLicenseFee', '$lePEPoint', '$leAllowance', '$leRank', '$ceCertificateOnFee', '$cePEPoint', '$ceAllowance', '$ceRank', '$Specialization')";
    $resultAddEmployee = mysqli_query($con, $addEmployee);



  }
?>

<div id="addEmployees" class=" hidden h-full fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none" tabindex="-1" aria-labelledby="drawer-bottom-label">
<form action="" method="POST">

<div class="h-14 bg-blue-900 grid grid-cols-2 gap-4 place-content-between content-center px-4">
  
<h5 id="drawer-bottom-label" class="text-white font-medium rounded-lg text-sm content-center"></h5>
<div class="flex justify-end">
<button  type="submit" name="addEmployee" class="mr-4 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
   Save
   </button>
    <button type="button" data-drawer-hide="addEmployees" aria-controls="addEmployees" class="text-white font-medium rounded-lg text-sm  " >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
</div>

</div>    

   </button>
   <div class="p-4">
   
  <div class="grid md:grid-cols-3 md:gap-6 mt-4">
      <div class="md:gap-2 p-2 border border-grey-600">
           <div class="relative z-0 w-full group ">
           <label for="position1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select position</label>
  <select id="position1" name="position1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option value="Staff" >Staff</option>
    <option value="Senior Staff" >Senior Staff</option>
    <option value="Operator" >Operator</option>
    <option value="Senior Operator" >Senior Operator</option>
    <?php
   $selectPosition = "SELECT * FROM `allowancetable`";
   $resultPosition = mysqli_query($con, $selectPosition);
   while($row=mysqli_fetch_assoc($resultPosition))
   {
    $positionLevel=$row["positionLevel"];
    
  ?>
  <option ><?php echo $positionLevel; ?></option>
<?php  }   ?>
  </select>
            </div>
            <div class="relative z-0 w-full group ">
            <label for="designation1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Designation</label>

         
        <!-- <input type="text" name="designation1" id="designation1" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
       
        <select name="designation1[]" id="designation1" multiple="multiple" class="form-control js-designation1-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             <!-- <option selected disabled value=" " data-val="">Choose PC Tag:</option> -->
             <?php
   $selectPosition1 = "SELECT `positionLevel` as 'label' FROM `allowancetable` WHERE `annex` LIKE '%Annex D%'";
   $resultPosition1 = mysqli_query($con, $selectPosition1);
   while($row=mysqli_fetch_assoc($resultPosition1))
   {
    $positionLevel=$row["label"];
    
  ?>
  <?php 
    echo " <option >$positionLevel</option>";

   ?>

<?php  }  ?>
            </select>  
            </div>

            <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Salary</h5>

            <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
             <div class="relative z-0 w-full group ">
           <label for="classEmp1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
  <select id="classEmp1" name="classEmp1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option  value="D1">D1</option>
             <option  value="DM1">DM1</option>
             <option  value="D2">D2</option>
             <option  value="DM2">DM2</option>
             <option  value="D3">D3</option>
             <option  value="DM3">DM3</option>
             <option  value="M1">M1</option>
             <option  value="M2">M2</option>
             <option  value="M3">M3</option>
             <option  value="M4">M4</option>
             <option  value="M5">M5</option>
             <option  value="F1">F1</option>
             <option  value="F2">F2</option>
  </select>
            </div>
            <div class="mb-5">
    <label for="level1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
    <input type="number" id="level1" max="50" name="level1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>

  <div class="relative z-0 w-full group ">
           <label for="salaryType1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary Type</label>
  <select id="salaryType1" name="salaryType1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <option disabled selected>Select</option>

    <option>Monthly</option>
    <option>Daily</option>
    
  </select>
            </div>
            <div class="">
    <label for="basicSalary1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Basic Salary</label>
    <input type="number" id="basicSalary1"name="basicSalary1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="dailySalary1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daily</label>
    <input type="number" step="0.01" id="dailySalary1" name="dailySalary1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="monthlySalary1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Salary</label>
    <input type="number" step="0.01" id="monthlySalary1" name="monthlySalary1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>

          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Position</h5>
          <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="posPePoint1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="posPePoint1"  id="posPePoint1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="posAllowance1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" name="posAllowance1"  id="posAllowance1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="posRank1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="posRank1"  id="posRank1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Technical Skills / Special Experience</h5>
      <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="tsPEPoint1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="tsPEPoint1" id="tsPEPoint1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="tsAllowance1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="tsAllowance1" name="tsAllowance1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="tsRank1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="tsRank1" id="tsRank1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">License Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="leLicenseFee1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">License Fee</label>
    <input type="number" id="leLicenseFee1" name="leLicenseFee1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          <div class="">
    <label for="lePEPoint1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="lePEPoint1" id="lePEPoint1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="leAllowance1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="leAllowance1" name="leAllowance1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="leRank1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="leRank1" id="leRank1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Certification / Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="ceCertificateOnFee1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certification Fee</label>
    <input type="number" id="ceCertificateOnFee1" name="ceCertificateOnFee1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          <div class="">
    <label for="cePEPoint1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" name="cePEPoint1" id="cePEPoint1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="ceAllowance1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" name="ceAllowance1" id="ceAllowance1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="ceRank1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" name="ceRank1" id="ceRank1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Specialization</h5>
          <div class=" col-span-2">
    <input type="number" name="Specialization1" id="Specialization1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Information</h5>
      <div class=" col-span-2">
    <label for="employeeId1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Number</label>

    <input type="text" id="employeeId1" name="employeeId1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>

  <div class=" col-span-2">
    <label for="empName1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Name</label>

    <input type="text"  name="empName1" id="empName1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="relative z-0 w-full group ">
        <div class="relative z-0 w-full group ">
                  <label for="department1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>

              
              <!-- <input type="text" name="department" id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
            
              <select name="department1" id="department1"  class="form-control js-department1-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected disabled >Choose department:</option>
                  <?php
        $selectDepartment = "SELECT DISTINCT  `department` FROM `salaryincrease`";
        $resultDepartment = mysqli_query($con, $selectDepartment);
        while($row=mysqli_fetch_assoc($resultDepartment))
        {
          $department=$row["department"];
          
        ?>
        <option  ><?php echo $department; ?></option>
      <?php  }   ?>
                  </select>  
                  </div>
            </div>
            <div class="">
    <label for="section1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>

    <input type="text"  name="section1" id="section1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="birthday1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
    <input type="date" id="birthday1" name="birthday1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="">
    <label for="age1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
    <input type="number" id="age1" name="age1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>
  <div class="relative z-0 w-full group ">
           <label for="sex1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
          <select id="sex1" name="sex1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option   disabled>Select Sex</option>

           <option  value="M">Male</option>
             <option   value="F">Female</option>
            
          </select>
            </div>
          </div>

          <div class="grid md:grid-cols-2 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="dateHired1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Hired</label>
    <input type="date" id="dateHired1" name="dateHired1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
  </div>


          </div>


      </div>
   </div>
   




</div>








</form>
</div>
<script type="text/javascript" src="details.js"></script>


