<?php include("header.php"); ?>
<div class="container">
	<h3 class="prs" ><b>LIST OF STUDENTS WHICH DO NOT PAYED THEIR FEES THIS MONTH   !</b></h3>
	<table class="table table-hover" >
	<a href="studentlist.php" class="btn btn-info" >Back</a>&nbsp;
	<p class="btn btn-success">
	Total of student : <?php
	include('connection.php');
		$sql="select count('f_id') from fees WHERE payed='0' ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?> </p> &nbsp; <P class="btn btn-danger" >
Total of Fees :
<?php
	include('connection.php');
		$sql="select SUM(fees) from fees WHERE payed='0' ";
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
		<th>Pay fees</th>
	</tr>
		<?php
			$showdate =  date("Y-m-d");
   			 include("connection.php");
   			 $show = mysqli_query($con,"SELECT * from fees WHERE payed = '1' AND enddate='$showdate' ");
   			 while ($rows = mysqli_fetch_array($show)) {	
  				mysqli_query($con,"UPDATE fees SET payed='0' WHERE enddate='$showdate' ");
   			 }
    		 $result = "SELECT fees.f_id,fees.fees,register.name,fees.month,register.time,register.photo,register.id,fees.startdate,fees.enddate,register.lastname FROM fees INNER JOIN  register ON  fees.id=register.id WHERE fees.payed='0' or fees.enddate='$showdate' ";
    		
    		 $show = mysqli_query($con, $result);
   			 while($row=mysqli_fetch_array($show)){
		?>


	<tr>
		<td  ><?php  echo $row['id']; ?></td>
		<td><a   href="<?php echo $row['photo']; ?>"> <img src="<?php  echo $row['photo']; ?>" width='50px' height='50px'  style='border-radius:100px;' ></td>
		<td class="danger" ><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['lastname']; ?></td>
		<td><?php  echo $row['fees']; ?></td>
		<td><?php  echo $row['startdate']; ?></td>
		<td class="danger" ><?php  echo $row['enddate']; ?></td>
		<td><?php  echo $row['time']; ?></td>
		<td><?php  echo $row['month']; ?></td>
		<td align="center" ><a  href="payfees.php?ID=<?php echo $row['f_id']; ?>" ><span class="btn btn-danger" >PayFees</a></span></td>
		
		<?php  }  ?>
	</tr>	
	</table>
</div>
<?php include("footer.php"); ?>
