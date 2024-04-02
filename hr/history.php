<div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="history">
<table id="historyTable" class="display text-[9px] 2xl:text-sm" style="width:100%">
<thead>
                        <tr>
                             <th >No.</th> 
                            <th >Date</th>
                            <th >Category</th>
                            <th >Field</th>
                            <th >From</th>
                            <th >To</th>
                            <th >Modifier</th>
                            <th >Date of Effectivity</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $no = 1;
                     $sqlHis = "SELECT * FROM `history` WHERE `employeeId` = '$getempNo' order by id desc";
                     $resultHis = mysqli_query($con, $sqlHis);
                     while($row=mysqli_fetch_assoc($resultHis))
                     {
                        $employeeId=$row["employeeId"];
                        $dateModified=$row["dateModified"];
                        $category=$row["category"];
                        $field=$row["field"];
                        $hr_from=$row["hr_from"];
                        $hr_to=$row["hr_to"];
                        $modifier=$row["modifier"];
                        $dateOfEffectivity=$row["dateOfEffectivity"];
                ?>
                            <tr>
                            <td> <?php echo $no;?> </td>  
                            <td> <?php echo $dateModified;?> </td>  
                            <td> <?php echo $category;?> </td>  
                            <td> <?php echo $field;?> </td>  
                            <td> <?php echo $hr_from;?> </td>  
                            <td> <?php echo $hr_to;?> </td>  
                            <td> <?php echo $modifier;?> </td>  
                            <td> <?php echo $dateOfEffectivity;?> </td>  



                            </tr>
                            <?php  $no++;  }
                    ?>
                    </tbody>
                    
</table>
</div>