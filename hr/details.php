
<div id="employeesDetails" class=" hidden h-full fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none" tabindex="-1" aria-labelledby="drawer-bottom-label">

<?php
   $selectEmp = "SELECT * FROM `salaryincrease` WHERE `empNo` = '$getempNo' ";
   $resultEmp = mysqli_query($con, $selectEmp);
   while($row=mysqli_fetch_assoc($resultEmp))
   {
    $employeeName=$row["employeeName"];
    $department2=$row["department"];
    $position=$row["position"];
    $designation=$row["designation"];
    $section=$row["section"];
    $sex=$row["sex"];
    $birthday=$row["birthday"];
    $age=$row["age"];
    $dateHired=$row["dateHired"];
    $serviceTerm=$row["serviceTerm"];
    $salaryType=$row["salaryType"];
    $class=$row["class"];




    $empNo=$row["empNo"];
    $level=$row["level"];
    $basicSalary=$row["basicSalary"];
    $daily=$row["daily"];
    $monthlySalary=$row["monthlySalary"];
    $pPEPoint=$row["pPEPoint"];
    $pAllowance=$row["pAllowance"];
     $pRank = $row["pRank"];  
     $tsPEPoint = $row["tsPEPoint"];
     $tsAllowance = $row["tsAllowance"];
     $tsRank = $row["tsRank"];
     $leLicenseFee = $row["leLicenseFee"];
     $lePEPoint = $row["lePEPoint"];
     $leAllowance = $row["leAllowance"];
     $leRank = $row["leRank"];
     $ceCertificateOnFee = $row["ceCertificateOnFee"];
     $cePEPoint = $row["cePEPoint"];
     $ceAllowance = $row["ceAllowance"];
     $ceRank = $row["ceRank"];
     $Specialization = $row["Specialization"];
     $total = $row["total"];
     $fstHalfPoint = $row["fstHalfPoint"];
     $fstHalfResult = $row["fstHalfResult"];
     $sndHalfPoint = $row["sndHalfPoint"];
     $sndHalfResult = $row["sndHalfResult"];
     $FinalPoint = $row["FinalPoint"];
     $FinalResult = $row["FinalResult"];
     $LevelUpPoints = $row["LevelUpPoints"];




    
  ?>

<div class="h-14 bg-blue-900 grid grid-cols-2 gap-4 place-content-between p-4">
  
<h5 id="drawer-bottom-label" class="text-white font-medium rounded-lg text-sm "><?php echo $employeeName; ?></h5>
    <button type="button" data-drawer-hide="employeesDetails" aria-controls="employeesDetails" class="text-white font-medium rounded-lg text-sm  flex justify-end" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
</div>    

   </button>
   <div class="p-4">
   <div class="grid md:grid-cols-3 md:gap-6">
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 bg-[#f3fff0]">
        <div class="relative z-0 w-full group ">
            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 bg-[#e1f1ff]">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2nd Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-3 md:gap-2 p-2 border border-grey-600 bg-orange-100">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Final Points</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Results</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level Up Points</label>
          </div>  
    </div>


   

  </div>
  <div class="grid md:grid-cols-3 md:gap-6 mt-4">
      <div class="md:gap-2 p-2 border border-grey-600">
           <div class="relative z-0 w-full group ">
           <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select position</label>
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option <?php if($position == "Staff"){ echo "selected";} ?>>Staff</option>
    <option <?php if($position == "Senior Staff"){ echo "selected";} ?>>Senior Staff</option>
    <option <?php if($position == "Operator"){ echo "selected";} ?>>Operator</option>
    <option <?php if($position == "Senior Operator"){ echo "selected";} ?>>Senior Operator</option>
    <?php
   $selectPosition = "SELECT * FROM `allowancetable`";
   $resultPosition = mysqli_query($con, $selectPosition);
   while($row=mysqli_fetch_assoc($resultPosition))
   {
    $positionLevel=$row["positionLevel"];
    
  ?>
  <option <?php if($position == $positionLevel){ echo "selected";} ?>><?php echo $positionLevel; ?></option>
<?php  }   ?>
  </select>
            </div>
            <div class="relative z-0 w-full group ">
            <label for="designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Designation</label>

         
        <!-- <input type="text" name="designation" id="designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
       
        <select name="designation[]" id="designation" multiple="multiple" class="form-control js-example-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             <!-- <option selected disabled value=" " data-val="">Choose PC Tag:</option> -->
             <?php
   $selectPosition1 = "SELECT `positionLevel` as 'label' FROM `allowancetable` WHERE `annex` LIKE '%Annex D%'";
   $resultPosition1 = mysqli_query($con, $selectPosition1);
   while($row=mysqli_fetch_assoc($resultPosition1))
   {
    $positionLevel=$row["label"];
    
  ?>
  <?php if($designation != ""){
    echo " <option >$positionLevel</option>";

  } ?>

<?php  }   echo " <option selected >$designation</option>"; ?>
            </select>  
            </div>

            <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Salary</h5>

            <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
             <div class="relative z-0 w-full group ">
           <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option <?php if($class == "D1"){ echo "selected";}  ?> value="D1">D1</option>
             <option <?php if($class == "DM1"){ echo "selected";}  ?> value="DM1">DM1</option>
             <option <?php if($class == "D2"){ echo "selected";}  ?> value="D2">D2</option>
             <option <?php if($class == "DM2"){ echo "selected";}  ?> value="DM2">DM2</option>
             <option <?php if($class == "D3"){ echo "selected";}  ?> value="D3">D3</option>
             <option <?php if($class == "DM3"){ echo "selected";}  ?> value="DM3">DM3</option>
             <option <?php if($class == "M1"){ echo "selected";}  ?> value="M1">M1</option>
             <option <?php if($class == "M2"){ echo "selected";}  ?> value="M2">M2</option>
             <option <?php if($class == "M3"){ echo "selected";}  ?> value="M3">M3</option>
             <option <?php if($class == "M4"){ echo "selected";}  ?> value="M4">M4</option>
             <option <?php if($class == "M5"){ echo "selected";}  ?> value="M5">M5</option>
             <option <?php if($class == "F1"){ echo "selected";}  ?> value="F1">F1</option>
             <option <?php if($class == "F2"){ echo "selected";}  ?> value="F2">F2</option>
  </select>
            </div>
            <div class="mb-5">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
    <input type="number" value="<?php echo $level; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

  <div class="relative z-0 w-full group ">
           <label for="salaryType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary Type</label>
  <select id="salaryType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option <?php if($salaryType == "Monthly"){ echo "selected";}  ?>>Monthly</option>
    <option  <?php if($salaryType == "Daily"){ echo "selected";}  ?>>Daily</option>
    
  </select>
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Basic Salary</label>
    <input type="number" value="<?php echo $basicSalary; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daily</label>
    <input type="number" value="<?php echo $daily; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Salary</label>
    <input type="number" id="monthlySalary" value="<?php echo $monthlySalary; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Position</h5>
          <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" value="<?php echo $pPEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="posAllowance" value="<?php echo $pAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="text" value="<?php echo $pRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Technical Skills / Special Experience</h5>
      <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" value="<?php echo $tsPEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="tsAllowance" value="<?php echo $tsAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" value="<?php echo $tsRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">License Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">License Fee</label>
    <input type="number" id="leLicenseFee" value="<?php echo $leLicenseFee; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" value="<?php echo $lePEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="leAllowance" value="<?php echo $leAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" value="<?php echo $leRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>
          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Certification / Evaluation</h5>
      <div class="grid md:grid-cols-4 md:gap-2 p-2 col-span-2">
      <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certification Fee</label>
    <input type="number" id="ceCertificateOnFee" value="<?php echo $ceCertificateOnFee; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PE Point</label>
    <input type="number" value="<?php echo $cePEPoint; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowance</label>
    <input type="number" id="ceAllowance" value="<?php echo $ceAllowance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
    <input type="number" value="<?php echo $ceRank; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Specialization</h5>
          <div class=" col-span-2">
    <input type="number" value="<?php echo $Specialization; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>


      </div>
      <div class=" md:gap-2 p-2 border border-grey-600">
      <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Basic Information</h5>
      <div class=" col-span-2">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Number</label>

    <input type="text" id="employeeId" value ="<?php echo $empNo;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

  <div class=" col-span-2">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Name</label>

    <input type="text" value ="<?php echo $employeeName;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="relative z-0 w-full group ">
        <div class="relative z-0 w-full group ">
                  <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>

              
              <!-- <input type="text" name="department" id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
            
              <select name="department" id="department"  class="form-control js-department-tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <!-- <option selected disabled value=" " data-val="">Choose PC Tag:</option> -->
                  <?php
        $selectDepartment = "SELECT DISTINCT  `department` FROM `salaryincrease`";
        $resultDepartment = mysqli_query($con, $selectDepartment);
        while($row=mysqli_fetch_assoc($resultDepartment))
        {
          $department=$row["department"];
          
        ?>
        <option <?php if($department2 == $department){ echo "selected";} ?> ><?php echo $department; ?></option>
      <?php  }   ?>
                  </select>  
                  </div>
            </div>
            <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>

    <input type="text" value ="<?php echo $section;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
    <input type="date" id="birthday" value ="<?php $date = DateTime::createFromFormat('d-M-y', $birthday);

// Format the date to mm/dd/yyyy
$formatted_birthday = $date->format('Y-m-d');

// Output the formatted birthday
echo $formatted_birthday;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
    <input type="number" id="age" <?php $date = DateTime::createFromFormat('d-M-y', $birthday);

// Format the date to mm/dd/yyyy
$formatted_birthday = $date->format('Y-m-d');

// Output the formatted birthday
echo $formatted_birthday;?> value ="<?php // Create a DateTime object from the given birthdate string
$birthdate = DateTime::createFromFormat('d-M-y', $birthday);

// Get the current date
$currentDate = new DateTime();

// Calculate the difference between the birthdate and the current date
$interval = $currentDate->diff($birthdate);

// Get the years from the interval and round down to the nearest whole number
$age1 = floor($interval->y);
echo $age1;?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="relative z-0 w-full group ">
           <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
          <select id="sex"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option   disabled>Select Sex</option>

           <option <?php if($sex == "M"){ echo "selected";}  ?> value="M">Male</option>
             <option  <?php if($sex == "F"){ echo "selected";}  ?>  value="F">Female</option>
            
  </select>
            </div>
          </div>

          <div class="grid md:grid-cols-2 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Hired</label>
    <input type="date" id="dateHired" value="<?php $date1 = DateTime::createFromFormat('d-M-y', $dateHired);

// Format the date to mm/dd/yyyy
$formatted_datehired = $date1->format('Y-m-d');

// Output the formatted birthday
echo $formatted_datehired;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Term</label>
    <input type="number" value="<?php 
// Create a DateTime object from the given birthdate string
$dateHireddate = DateTime::createFromFormat('d-M-y', $dateHired);

// Get the current date
$currentDate = new DateTime();

// Calculate the difference between the dateHireddate and the current date
$interval = $currentDate->diff($dateHireddate);

// Calculate age in years with decimal places for months
$serviceTerm = $interval->y + $interval->m / 12;

// Format the age to display with 2 decimal places
// $serviceTermFormatted = number_format($serviceTerm, 2);

// Output the formatted age
echo $serviceTerm;
?>
"id="serviceTerm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>

          </div>

          <h5 id="drawer-bottom-label" class=" font-medium rounded-lg text-lg col-span-2">Summary</h5>
          <div class="grid md:grid-cols-3 md:gap-2 p-2 col-span-2">
          <div class="">
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
    <input type="number" id="totalOverall" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white ">ＵＰ額 <span> <svg aria-hidden="true" id="upLoad" class="ml-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></span></label>
    <input type="number" id="upValue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="">
    <label for="level" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Percentage <span> <svg aria-hidden="true" id="percentLoad" class="ml-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></span></label>
    <input type="text" id="percentage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
          </div>

      </div>
   </div>
   

   <div class="grid md:grid-cols-3 md:gap-6 mt-4">
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 ">
        <div class="relative z-0 w-full group ">
            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-2 p-2 border border-grey-600 ">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2nd Half Point</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Result</label>
        </div>
    </div>
    <div class="grid md:grid-cols-3 md:gap-2 p-2 border border-grey-600 ">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Final Points</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Results</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level Up Points</label>
          </div>  
    </div>


   

  </div>


</div>
<?php  }   ?>

<?php  include ("history.php");
 ?>
</div>
<script type="text/javascript" src="details.js"></script>


