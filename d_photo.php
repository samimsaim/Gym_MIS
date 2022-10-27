<?php  include'session.php';   ?>
<?php
            include'connection.php';
                $ID = $_GET['ID'];
                $result = mysqli_query($con," delete from gallary where p_id = '$ID'");
                if($result){
                    header("location:setting.php");
                }
                else{
                    header("location:setting.php");
                }


?>