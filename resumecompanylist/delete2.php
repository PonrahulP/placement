<?php
            include ("../dbconfig.php");
            $id=$_GET['id'];
            $sql1="DELETE FROM tblresume WHERE id='$id'";
            $result=mysqli_query($conn,$sql1);
            header('Location:display.php');
            ?>