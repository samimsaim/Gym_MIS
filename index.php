
<?php include("header.php"); ?>
<?php require_once("session.php"); ?>
<div class="fluid-container">
<?php
		include("connection.php");
		$show = mysqli_query($con,"SELECT * FROM gallary ORDER BY p_id DESC LIMIT 1");
		while($row=mysqli_fetch_array($show)){
?>
	<img src="<?php  echo $row['photo']; ?>"  height="700px" width="1858px">
	<?php  } ?>
</div>
<?php include("footer.php"); ?>
