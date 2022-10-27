<?php  include'session.php';   ?>
<?php
            include'connection.php';
                $ID = $_GET['ID'];
                $result = mysqli_query($con," delete from userphoto where u_idd = '$ID'");
                if($result){
                    header("location:setting.php");
                }
                else{
                    header("location:setting.php");
                }


?>