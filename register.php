<?php include("header.php"); ?>
<head>
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<div class="container">
	<h3 class="prs" ><b>PLEASE REGISTER STUDENT CAREFULLY AND FILL THE BLANKS !</b></h3><hr>
	<?php
            include("connection.php");
            if(isset($_POST['name'])){

                $name=$_POST['name'];
                $fathername = $_POST['fathername'];
                $lastname = $_POST['lastname'];
                $g_f_name = $_POST['g/f/name'];
                $nationalid = $_POST['nationalid'];
                $time = $_POST['time'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $lockerid= $_POST['lockerid'];
                $folder = "img/";
   				$path = $folder.basename($_FILES['photo']['name']);
   				if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){
                $result = mysqli_query($con, "INSERT INTO register VALUES ('','$name','$fathername','$lastname','$g_f_name','$nationalid','$time','$phone','$address','$lockerid','$path')");
                if($result){
                    echo "<p class='alert alert-success' >شما موفقانه راجستر شدید </p>";
                }else{
                    echo "<p class='alert alert-danger' >متاسفم شما راجستر نده اید لطفا دوباره کوشش نمایید </p>";
                }

            }
        }
            ?>
	<form  method="POST" enctype="Multipart/form-data" class="form-horizontal"  >
	<div class="col-lg-6 col-md-6 col-sm-6" >

  <div class="form-group">
    <p>Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Name" required >
    </div>
  </div>
  <div class="form-group">
    <p>Father Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fathername"  placeholder="Father Name " required >
    </div>
  </div>

  <div class="form-group">
    <p>Last Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname"  placeholder="Last Name " required >
    </div>
  </div>

  <div class="form-group">
    <p>Grand Father Name  : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="g/f/name" placeholder="Grand Father Name " required >
    </div>
  </div>
  <div class="form-group">
    <p>National ID : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="nationalid" placeholder="National ID" required >
    </div>
  </div>
   </div>
<div class="col-lg-6 col-md-6 col-sm-6" >


  <div class="form-group">
    <p>Time : </p>
    <div class="col-sm-10">
      <select class="form-control" name="time" >
      	<option>Morning</option>
      	<option>Afternoon</option>
      	
      </select>
    </div>
  </div>

  <div class="form-group">
    <p>Phone Number : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="phone"  placeholder="Phone Number" required >
    </div>
  </div>
  <div class="form-group">
    <p>Address : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address"  placeholder="Home Address " required >
    </div>
  </div>

  <div class="form-group">
    <p>Locker ID  : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="lockerid" placeholder="Locker ID" required value="0" >
    </div>
  </div>

  <div class="form-group">
    <p>Photo  : </p>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="photo" placeholder="Upload Photo">
    </div>
  </div>

  <div class="form-group">
      <input type="submit" name="register" value="Register" class="btn btn-primary">
      <a href="index.php" class="btn btn-info" >Cancel</a>
        
  </div>
  <hr>
  </div>

</form>

</div>
<br><br><br><br>
<?php include("footer.php"); ?>
