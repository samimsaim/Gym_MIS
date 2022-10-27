<html>
<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<br><br><br><br>
	<div class="col-lg-4 col-md-4 col-sm-4">
		
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" style="background-color:silver; padding:100px; border-radius:200px; " >
	<div>
	<div align="center" >
	<?php 
			include("connection.php");
			$result = mysqli_query($con,"SELECT * FROM userphoto ORDER BY u_idd desc LIMIT 1 ");
			while($row=mysqli_fetch_array($result)){
	?>
	<img src="<?php  echo $row['photo']; ?>" width="300px"; height="300px" style="border-radius:300px;" >

	<?php   } ?>
	<?php
			$selectt = mysqli_query($con,"SELECT username FROM user WHERE u_id='1' ");
			while($row=mysqli_fetch_array($selectt)){
	?>
		<h3 style="color:white;" ><b><?php   echo $row['username'];  ?></b></h3>
	<?php  } ?>
	</div>

	<h2  align="center" style="color:green;" >SIGN IN </h2><hr>
		<?php
		require_once'connection.php';
		if(isset($_POST['username'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $select = "select * from user where username='$username' and password='$password'";

                $selected = mysqli_query($con,$select);
                if(mysqli_num_rows($selected)>0){
                    session_start();
                    $_SESSION['login'] = $username;
                    header("location:index.php");

                }else{
                    echo "<p class='alert alert-warning' role='alert' align='center' style='color:white;display:inline; background-color:brown;'>Sorry your user name or password is incorrect! Please Try again</p>";
                }
            }

?>
		
		<form method="POST" action="#" >
		<br>
		
		<input type="text" class="form-control"  name="username"  placeholder="Your Name" required >
		<br>
		<input type="password" class="form-control" name="password"   placeholder="Password" required ><br>
		 
		<input type="submit" class="btn btn-primary" value="Login">
		<a href="login.php" class="btn btn-info">Cancel</a>
		</form>
		</div>
		</div>
</body>
</html>