<?php include("header.php"); ?>
<div class="container" >	
	<h3 class="prs"	 ><b>List of student which payed their fees in december month !</b></h3><hr>
	<table class="table table-hover" >
		<a href="studentlist.php" class="btn btn-info" >Back</a>&nbsp;
	<p class="btn btn-success">
	Total of student : <?php
	include('connection.php');
		$sql="select count('f_id') from fees WHERE month='december' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?> </p> &nbsp; <P class="btn btn-danger" >
Total of Fees :
<?php
	include('connection.php');
		$sql="select SUM(fees) from fees WHERE month='december' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?></P>
	<tr>
		<th>Student_ID</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Last Name</th>
		<th>Fees</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Time</th>
		<th>Month</th>
		<td>Update</td>
	</tr>
		<?php
   			 include("connection.php");
    		 $result = "SELECT fees.f_id,fees.fees,register.name,fees.month,register.time,register.photo,register.id,fees.startdate,fees.enddate,register.lastname FROM fees INNER JOIN  register ON  fees.id=register.id WHERE fees.month='december' ORDER BY f_id DESC ";
    		 $show = mysqli_query($con, $result);
   			 while($row=mysqli_fetch_array($show)){
		?>


	<tr>
		<td><?php  echo $row['id']; ?></td>
		<td><a   href="<?php echo $row['photo']; ?>"> <img src="<?php  echo $row['photo']; ?>" width='50px' height='50px'  style='border-radius:100px;' ></td>
		<td><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['lastname']; ?></td>
		<td><?php  echo $row['fees']; ?> af</td>
		<td><?php  echo $row['startdate']; ?></td>
		<td><?php  echo $row['enddate']; ?></td>
		<td><?php  echo $row['time']; ?></td>
		<td><?php  echo $row['month']; ?></td>
		<td align="center" ><a  href="payfees.php?ID=<?php echo $row['f_id']; ?>" ><span class="btn btn-success" >Update</a></span></td>
		



		<?php  }  ?>
	</tr>	
	</table>
	</div>
		</div>
</div>
<?php include("footer.php"); ?>

