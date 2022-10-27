<?php include("header.php"); ?>
<div class="container" >	
<div class="col-lg-6" >
	<h3 class="prs"	 ><b>LIST OF MORNING SHIF STUDENT</b></h3>
	<a href="report.php" class="btn btn-info" >Back</a>&nbsp;
	<p class="btn btn-success">
	Total of student : <?php
	include('connection.php');
		$sql="select count('id') from register WHERE time='morning' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?></p><br><br>
	<table class="table table-hover" >
		
	<tr>
		<th>Student_ID</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Last Name</th>
		<th>Time</th>
	</tr>
		<?php
   			 include("connection.php");
    		 $result = "SELECT * FROM register WHERE time='morning' ORDER BY id DESC ";
    		 $show = mysqli_query($con, $result);
   			 while($row=mysqli_fetch_array($show)){
		?>


	<tr>
		<td><?php  echo $row['id']; ?></td>
		<td><a   href="<?php echo $row['photo']; ?>"> <img src="<?php  echo $row['photo']; ?>" width='50px' height='50px'  style='border-radius:100px;' ></td>
		<td><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['lastname']; ?></td>
		<td><?php  echo $row['time']; ?></td>
		<?php  }  ?>
	</tr>	
	</table>
	</div>
	<div class="col-lg-6" >
	<h3 class="prs"	 ><b>LIST OF AFTERNOON SHIF STUDENT</b></h3>
	<a href="report.php" class="btn btn-info" >Back</a>&nbsp;
	<p class="btn btn-success">
	Total of student : <?php
	include('connection.php');
		$sql="select count('id') from register WHERE time='afternoon' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?></p><br><br>
	<table class="table table-hover" >
	<tr>
		<th>Student_ID</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Last Name</th>
		<th>Time</th>
	</tr>
		<?php
   			 include("connection.php");
    		 $result = "SELECT * FROM register WHERE time='afternoon' ORDER BY id DESC ";
    		 $show = mysqli_query($con, $result);
   			 while($row=mysqli_fetch_array($show)){
		?>


	<tr>
		<td><?php  echo $row['id']; ?></td>
		<td><a   href="<?php echo $row['photo']; ?>"> <img src="<?php  echo $row['photo']; ?>" width='50px' height='50px'  style='border-radius:100px;' ></td>
		<td><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['lastname']; ?></td>
		<td><?php  echo $row['time']; ?></td>



		<?php  }  ?>
	</tr>	
	</table>
	</div>

	</div>
	</div>

<?php include("footer.php"); ?>

