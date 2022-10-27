<?php include("header.php"); ?>
<div class="container">
<h3 class="prs" ><b>Please Pay Student fees and take care of its month  !</b></h3><hr>

<?php 
     include("connection.php");
      $id = $_GET['ID'];
         $result = "SELECT fees.fees,register.name,fees.month,register.time,register.photo,register.id,fees.startdate,fees.enddate,register.lastname FROM fees INNER JOIN  register ON  fees.id=register.id WHERE fees.f_id='$id' ";
         $show = mysqli_query($con, $result);
         while($row=mysqli_fetch_array($show)){
    ?>

<form  method="POST" enctype="Multipart/form-data" class="form-horizontal"  >
	<div class="col-lg-6 col-md-6 col-sm-6" >

  <div class="form-group">
    <p>Student Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name"   value="<?php echo $row['name'] ," - ", $row['lastname']; ?>" disabled >
    </div>
  </div>

  <div class="form-group">
    <p>Fees : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="fees"  placeholder="Fees" value="<?php echo $row['fees']; ?>">
    </div>
  </div>

  <div class="form-group">
    <p>Month  : </p>
    <div class="col-sm-10">
      <select class="form-control" name="month" >
      	<option <?php  if($row['month']=='January') echo "selected";   ?> >January</option>
      	<option <?php  if($row['month']=='Feberuary') echo "selected";  ?> >Feberuary</option>
      	<option <?php  if($row['month']=='March') echo "selected";   ?> >March</option>
      	<option <?php  if($row['month']=='April') echo "selected";   ?> >April</option>
      	<option <?php  if($row['month']=='May') echo "selected";   ?> >May</option>
      	<option <?php  if($row['month']=='June') echo "selected";   ?> >June</option>
      	<option <?php  if($row['month']=='July') echo "selected";   ?> >July</option>
      	<option <?php  if($row['month']=='Aguest') echo "selected";   ?> >Agust</option>
      	<option <?php  if($row['month']=='September') echo "selected";   ?> >September</option>
      	<option <?php  if($row['month']=='October') echo "selected";   ?> >October</option>
      	<option <?php  if($row['month']=='November') echo "selected";   ?>  >November</option>
      	<option <?php  if($row['month']=='December') echo "selected";   ?> >December</option>
      </select>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6" >
  <div class="form-group">
    <p>Start Date : </p>
    <div class="col-sm-10">
      <input type="date" name="startdate" class="form-control" value="<?php echo $row['startdate'];  ?>" >
    </div>
  </div>

  <div class="form-group">
    <p>End Date : </p>
    <div class="col-sm-10">
      <input type="date" name="enddate" class="form-control" value="<?php echo $row['enddate'];  ?>" >
    </div>
  </div>
</div>
<?php } ?>
 <div class="form-group">
      <input type="submit" name="register" value="Save" class="btn btn-primary">
      <a href="studentlist.php" class="btn btn-info" >Cancel</a>

  </div>





<p style="color:silver;" ><b>Note</b> : This payment is only for one month and please select the month carefully . </p>
</form>

    <?php
            include("connection.php");
             $id = $_GET['ID'];
            if(isset($_POST['fees'])){
                $fees = $_POST['fees'];
                $month = $_POST['month'];
                $startdate = $_POST['startdate'];
                $enddate = $_POST['enddate'];
                $result = mysqli_query($con, "UPDATE fees SET fees='$fees', month='$month',startdate='$startdate',enddate='$enddate', payed='1'  WHERE f_id='$id' ");
                if($result){
                    echo "<p class='alert alert-success' >DONE SUCCESSFULLY  </p>";
                }else{
                    echo "<p class='alert alert-danger' >SORRY ITS NOT DONE WELL !</p>";
                }
        }
            ?>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("footer.php"); ?>
