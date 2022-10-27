<?php
include_once'connection.php';

                $id = $_GET['ID'];
                $result = mysqli_query($con," delete from device where d_id = '$id'");
				
                if($result){
                    header("location:report.php?done");
                }else{
                	header("location:report.php?notdone");
                }

?>