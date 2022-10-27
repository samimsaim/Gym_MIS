<?php include("header.php"); ?>
<head>
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<div class="container">
	<h3 class="prs" ><b>PLEASE UPDATE STUDETN INFORMATION CORRECTLY  !</b></h3><hr>
  <?php
            include("connection.php");
             $id = $_GET['ID'];
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
              if($_FILES['photo'] ['name'] !=" "){
                $path = $folder.basename($_FILES['photo']['name']);
              if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){
                }else{
                  $select = mysqli_query($con,"SELECT photo FROM register WHERE id = '$id' ");
                  while($show=mysqli_fetch_array($select)){
                    $path = $show['photo'];
                  }
                

                $result = mysqli_query($con, "UPDATE register SET name='$name',fathername='$fathername',lastname='$lastname',grandfname='$g_f_name',nationalid='$nationalid',time='$time',phone='$phone',address='$address',lockerid='$lockerid', photo='$path' WHERE id='$id' ");
                
                if($result){
                    echo "<p class='alert alert-success' >YOU ARE UPDATED SUCCESSFULLY </p>";
                }else{
                    echo "<p class='alert alert-danger' >SORRY YOU INFORMATION IS NOT UPDATED SUCCESSFULLY</p>";
                }

            }
          }
          
        
            ?>
	
            <?php

            include("connection.php");
             $id = $_GET['ID'];
            $result = mysqli_query($con , "SELECT * FROM register WHERE id ='$id' ");
            while($row=mysqli_fetch_array($result)){

            ?>
            

	<form  method="POST" enctype="Multipart/form-data" class="form-horizontal"  >
	<div class="col-lg-6 col-md-6 col-sm-6" >

  <div class="form-group">
    <p>Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php echo $row['name'];  ?>" >
    </div>
  </div>
  <div class="form-group">
    <p>Father Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fathername" value="<?php echo $row['fathername'];  ?>"  >
    </div>
  </div>

  <div class="form-group">
    <p>Last Name : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname"  value="<?php echo $row['lastname'];  ?>" >
    </div>
  </div>

  <div class="form-group">
    <p>Grand Father Name  : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="g/f/name" value="<?php echo $row['grandfname'];  ?>" >
    </div>
  </div>
  <div class="form-group">
    <p>National ID : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="nationalid" value="<?php echo $row['nationalid'];  ?>" >
    </div>
  </div>
  <img src="<?php echo $row['photo'];  ?>" width="200px" height='200px' style='border-radius:50px;' >
   </div>
<div class="col-lg-6 col-md-6 col-sm-6" >


  <div class="form-group">
    <p>Time : </p>
    <div class="col-sm-10">
      <select class="form-control" name="time" >
      	<option <?php  if($row['time']=='Morning') echo "selected";   ?> >Morning</option>
        <option <?php  if($row['time']=='Afternoon') echo "selected";  ?> >Afternoon</option>
      	
      </select>
    </div>
  </div>

  <div class="form-group">
    <p>Phone Number : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="phone" value="<?php echo $row['phone'];  ?>"  >
    </div>
  </div>
  <div class="form-group">
    <p>Address : </p>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address"  value="<?php echo $row['address'];  ?>" >
    </div>
  </div>

  <div class="form-group">
    <p>Locker ID  : </p>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="lockerid"  value="<?php echo $row['lockerid'];  ?>" >
    </div>
  </div>

  <div class="form-group">
    <p>Photo  : </p>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="photo" placeholder="Upload Photo">

    </div>
  </div>
<?php  } ?>
  <div class="form-group">
      <input type="submit" name="update" value="Update" class="btn btn-primary">
      <a href="studentlist.php" class="btn btn-info" >Cancel</a>        
  </div>
  <hr>
  </div>

</form>

</div>

<br><br><br><br>
<?php include("footer.php"); ?>
