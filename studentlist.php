<?php include("header.php"); ?>
<div class="fluid-container" style="margin:20px;"  >
	<h3 class="prs" ><b>LIST OF UNITED STUDENT GYM </b></h3>
	<table class="table table-hover" ><p class="btn btn-success">
	Total of student : <?php
	include('connection.php');
		$sql="select count('id') from register";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		echo "($row[0])";
		mysqli_close($con);
?>
	<?php  
						if(isset($_GET['notdone'])){
							echo "<p class='alert alert-danger' >Student not deleted</p>";
						}
					?>
					<?php  
						if(isset($_GET['done'])){
							echo "<p class='alert alert-success'>Student Deleted</p>";
						}
					?></p> &nbsp;
<a href="addfees.php" class="btn btn-warning" >Add Student Fees</a>&nbsp;
	<a href="january.php" class="btn btn-default" >January</a>&nbsp;
	<a href="feberuary.php" class="btn btn-default" >Feberuary</a>&nbsp;
	<a href="march.php" class="btn btn-default" >March</a>&nbsp;
	<a href="april.php" class="btn btn-default" >April</a>&nbsp;
	<a href="may.php" class="btn btn-default" >May</a>&nbsp;
	<a href="june.php" class="btn btn-default" >June</a>&nbsp;
	<a href="july.php" class="btn btn-default" >July</a>&nbsp;
	<a href="aguest.php" class="btn btn-default" >Aguest</a>&nbsp;
	<a href="september.php" class="btn btn-default" >September</a>&nbsp;
	<a href="october.php" class="btn btn-default" >October</a>&nbsp;
	<a href="november.php" class="btn btn-default" >Novermber</a>&nbsp;
	<a href="december.php" class="btn btn-default" >December</a>&nbsp;
	<a href="dfees.php" class="btn btn-link" >Student which do not payed their fees</a>&nbsp;





					
	<tr>
		<th>Photo</th>
		<th>ID</th>
		<th>Locker ID</th>
		<th>Name</th>
		<th>Father Name </th>
		<th>Last Name</th>
		<th>G/F/Name</th>
		<th>National ID</th>
		<th>Time</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Delete</th>
		<th>Update</th>
	</tr>
		<?php
   			 include("connection.php");
    		 $result = "SELECT * FROM register ORDER BY id DESC ";
   			 $show = mysqli_query($con, $result);
   			 while($row=mysqli_fetch_array($show)){
		?>


	<tr>
		<td><a   href="<?php echo $row['photo']; ?>"> <img src="<?php  echo $row['photo']; ?>" width='50px' height='50px'  style='border-radius:100px;' ></td>
		<td><?php  echo $row['id']; ?></td>
		<td><?php  echo $row['lockerid']; ?></td>
		<td><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['fathername']; ?></td>
		<td><?php  echo $row['lastname']; ?></td>
		<td><?php  echo $row['grandfname']; ?></td>
		<td><?php  echo $row['nationalid']; ?></td>
		<td><?php  echo $row['time']; ?></td>
		<td><?php  echo $row['phone']; ?></td>
		<td><?php  echo $row['address']; ?></td>
		<td><a  href="d_student.php?ID=<?php echo $row['id']; ?>" ><span class="btn btn-danger" >Delete</a></span></td>
		<td><a  href="update_student.php?ID=<?php echo $row['id']; ?>" ><span class="btn btn-success" >Update</a></span></td>
		
		<?php  }  ?>
		
	</tr>	
	</table>
</div>
<?php include("footer.php"); ?>
