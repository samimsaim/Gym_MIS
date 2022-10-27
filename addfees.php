<?php include("header.php"); ?>
<div class="container">
<h3 class="prs" ><b>Please Pay Student fees and take care of its month  !</b></h3><hr>
<?php
            include("connection.php");
            $payed = 1;
            if(isset($_POST['fees'])){
                $id=$_POST['id'];
                $fees = $_POST['fees'];
                $month = $_POST['month'];
                $startdate = $_POST['startdate'];
                $enddate = $_POST['enddate'];
                $result = mysqli_query($con, "INSERT INTO fees VALUES ('','$id','$fees','$month','$startdate','$enddate','$payed')");
                if($result){
                    echo "<p class='alert alert-success' >شما موفقانه فیس خود را پرداخت نمودید !</p>";
                }else{
                    echo "<p class='alert alert-danger' >متاسفتم فیس شما پرداخت نشد .  </p>";
                }
        }
            ?>

<form  method="POST" enctype="Multipart/form-data" class="form-horizontal"  >
	<div class="col-lg-6 col-md-6 col-sm-6" >

  <div class="form-group">
  <div class="col-lg-10">
    <p>Select Student Name  : </p>
    <select class="form-control" name="id">
  <option>Select Student name</option>
			    <?php  
			 	 include("connection.php");
			 	$selected = "select id,name,lastname from register order by id DESC";
			    $result = mysqli_query($con , $selected);
			    while($row=mysqli_fetch_array($result)){     	
				?>
 
  <option value="<?php  echo $row['id'];    ?>" ><?php  echo $row['name'] . " - " .  $row['lastname'];    ?></option>
				<?php   } ?>
</select>
</div>
  </div>

  <div class="form-group">
    <p>Fees : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="fees"  placeholder="Fees in Af" required >
    </div>
  </div>

  <div class="form-group">
    <p>Month  : </p>
    <div class="col-sm-10">
      <select class="form-control" name="month" >
      	<option>January</option>
      	<option>Feberuary</option>
      	<option>March</option>
      	<option>April</option>
      	<option>May</option>
      	<option>June</option>
      	<option>July</option>
      	<option>Agust</option>
      	<option>September</option>
      	<option>October</option>
      	<option>November</option>
      	<option>December</option>
      </select>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6" >
  <div class="form-group">
    <p>Start Date : </p>
    <div class="col-sm-10">
      <input type="date" name="startdate" class="form-control" required >
    </div>
  </div>

  <div class="form-group">
    <p>End Date : </p>
    <div class="col-sm-10">
      <input type="date" name="enddate" class="form-control" required >
    </div>
  </div>
</div>
 <div class="form-group">
      <input type="submit" name="register" value="Save" class="btn btn-primary">
      <a href="studentlist.php" class="btn btn-info" >Cancel</a>

  </div>





<p style="color:silver;" ><b>Note</b> : This payment is only for one month and please select the month carefully . </p>
</form>
<?php 

  include("connection.php");
  

?>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("footer.php"); ?>
