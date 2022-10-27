
<?php include("header.php"); ?>
<?php require_once("session.php"); ?>

<div class="container-fluid">
		<div class="col-lg-3 col-md-3 col-sm-3" >
		<h4 class="prs" ><b>CHANGE SYSTEM PASSWORD   !</b></h4><hr>
		<?php 
				include("connection.php");
			if(isset($_POST['password'])){
				$username = $_POST['username'];
				$cpassword = $_POST['cpassword'];
				$password = $_POST['password'];
				$confirm = $_POST['confirm'];
				$selected = mysqli_query($con,"SELECT * FROM user WHERE u_id='1' ");
				while ($row=mysqli_fetch_array($selected)) {
					if($cpassword == $row['password'] & $password==$confirm ){
						$updatee = mysqli_query($con,"UPDATE user SET username='$username',password = '$password' WHERE u_id='1' ");
						echo "<p class='alert alert-success' >The Password is Changed</p>";
					}else{
						echo "<p class='alert alert-danger'>Current password or confirm password is incorrect </p>";
					}}}
		?>
		<form method="POST" >
				<input type="text" class="form-control" placeholder='New Username' name="username" required ><br>
				<input type="text" class="form-control" placeholder='Current Password' name="cpassword"required ><br>
				<input type="password" class="form-control" placeholder='New Password' name="password" required ><br>
				<input type="password" class="form-control" placeholder='Confirm Password' name="confirm" required ><br>
				<input type="submit" class="btn btn-success" value="Change" name="submit" >
				<input type="reset" class="btn btn-info" value="Cancel" >
		</form>
		</div>


		<div class="col-lg-3 col-md-3 col-sm-3" >
		<h4 class="prs" ><b>CHANGE BACKGROUND PICTURE   !</b></h4>
		<?php 
    
    if(isset($_POST['send'])){
    $folder = "img/wallpaper/";
   	$path = $folder.basename($_FILES['photo']['name']);
   	if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){
include("connection.php");
   		mysqli_query($con,"INSERT INTO gallary VALUES('','$path')");
   		echo "<p class='alert alert-success' >Uploading Done !</p>";

   	}
   }
 
    ?>
		<form method="POST" enctype="Multipart/form-data" >
				<p>Please Choose Photo to upload </p>
				<input type="file" name="photo"><br>
				<input type="submit" class="btn btn-success" name="send"  value="Upload">
				<hr>
		</form>
		<?php
		include("connection.php");
		$show = mysqli_query($con,"SELECT * FROM gallary ORDER BY p_id DESC ");
		while($row=mysqli_fetch_array($show)){
?>
	<a href="<?php  echo $row['photo']; ?>" ><img src="<?php  echo $row['photo']; ?>"  height="100px" width="100px" style='border-radius:40px;'></a>
	<a href="d_photo.php?ID=<?php echo $row['p_id'];  ?>" class="glyphicon glyphicon-trash" ></a>

	<?php  } ?>
		</div>


<div class="col-lg-3 col-md-3 col-sm-3" >
		<h4 class="prs" ><b>CHANGE USER ACCOUNT PHOTO   !</b></h4>
		<?php 
    
    if(isset($_POST['upload'])){
    $folder = "img/user/";
   	$path = $folder.basename($_FILES['photo']['name']);
   	if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){
include("connection.php");
   		mysqli_query($con,"INSERT INTO userphoto VALUES('','$path')");
   		echo "<p class='alert alert-success' >Uploading Done !</p>";

   	}
   }
 
    ?>
		<form method="POST" enctype="Multipart/form-data" >
				<p>Please Choose Photo to upload </p>
				<input type="file" name="photo"><br>
				<input type="submit" class="btn btn-success" name="upload"  value="Upload">
				<hr>
		</form>
		<?php
		include("connection.php");
		$show = mysqli_query($con,"SELECT * FROM userphoto ORDER BY u_idd DESC ");
		while($row=mysqli_fetch_array($show)){
?>
	<a href="<?php  echo $row['photo']; ?>" ><img src="<?php  echo $row['photo']; ?>"  height="100px" width="100px" style='border-radius:40px;'></a>
	<a href="d_userphoto.php?ID=<?php echo $row['u_idd'];  ?>" class="glyphicon glyphicon-trash" ></a>

	<?php  } ?>
		</div>




</div>
<br>


<?php include("footer.php"); ?>
