<?php
include_once'connection.php';

                $id = $_GET['ID'];
                $result = mysqli_query($con," delete from register where id = '$id'");
				$result = mysqli_query($con," DELETE FROM fees where id ='$id' ");                

                if($result){
                    header("location:studentlist.php?done");
                }else{
                	header("location:studentlist.php?notdone");
                }

?>