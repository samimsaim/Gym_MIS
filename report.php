
<?php include("header.php"); ?>
<?php require_once("session.php"); ?>
<div class="container-fluid">
<div class="col-lg-6 col-md-6 col-sm-6" ><br>
		<h3 style="color:green;display:inline;" >UNITED GYM STUDENT REPORT </h3>&nbsp;
		<a href="morning.php" class="btn btn-info"  >STUDENT SHIFT</a>
		<br><br>
		<table class="table table-hover" >
		<tr>
			<th>Item Name </th>
			<th>Description</th>
			
		</tr>
		<tr>
			<td>Total of Student </td>
			<td><?php
	include('connection.php');
		$sql="select count('id') from register";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "$row[0]";
		mysqli_close($con);
?></td>
		</tr>

		<tr>
			<td>Total of Student Fees </td>
			<td><?php
	include('connection.php');
		$sql="select SUM(fees) from fees";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "$row[0]";
		mysqli_close($con);
?></td>
		</tr>

		<tr>
			<td>Total Morning Student </td>
			<td><?php
	include('connection.php');
		$sql="select COUNT('id') from register WHERE time='morning' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "$row[0]";
		mysqli_close($con);
?></td>
		</tr>

		<tr>
			<td>Total Afternoon Student </td>
			<td><?php
	include('connection.php');
		$sql="select COUNT('id') from register WHERE time='afternoon' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "$row[0]";
		mysqli_close($con);
?></td>
		</tr>


		</table>

</div>
<div class="col-lg-6 col-md-6 col-sm-6">
	<h3 style="color:green;" > LIST OF UNITED GYM DEVICES WITH DESCRIPTION </h3>
	<?PHP 
		include("connection.php");
		if(isset($_POST['devicename'])){
			$name = $_POST['devicename'];
			$description = $_POST['description'];
			$insert = mysqli_query($con,"INSERT INTO device VALUES('','$name','$description')");
			if($insert){
				echo "done";
			}
			else{
				echo "not done";
			}


		}

	?>
	<form method="POST">
		<input type="text" class="form-control" placeholder="please type the device name with quantity" name="devicename" >	<br>
		<textarea type="text" name="description" class="form-control" rows="10" >
			
		</textarea>
			<br>
		<input type="submit" name="submit" value="Save" class="btn btn-info">
	</form><br>
	<table class="table table-hover" >
		<tr>
			<th>Device ID</th>
			<th>Device Name</th>
			<th>Device Description</th>
			<th>Delete</th>
			
		</tr>
		<?php  
						if(isset($_GET['notdone'])){
							echo "<p style='color:red' >Information about device was not deleted</p>";
						}
					?>
					<?php  
						if(isset($_GET['done'])){
							echo "<p style='color:green' >Information about device was deleted</p>";
						}
					?>
		<?php
			include("connection.php");
			$result = mysqli_query($con,"SELECT * FROM device ORDER BY d_id DESC");
			while($row=mysqli_fetch_array($result)){
		?>
		<tr>

			<td><?php echo $row['d_id'];  ?></td>
			<td><?php echo $row['name'];  ?></td>
			<td><?php echo $row['description'];  ?></td>
			<td ><a  href="d_device.php?ID=<?php echo $row['d_id']; ?>" ><span class="glyphicon glyphicon-trash" ></a></span></td>
		
		</tr>
		<?php  }  ?>
	</table>
</div>
</div>
<?php include("footer.php"); ?>
