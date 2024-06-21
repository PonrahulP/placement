<?php
include("../dbconfig.php");
$mbl=$_GET['mobile'];
$sql="DELETE FROM tblreg1 WHERE contact='$mbl';DELETE FROM tblreg2 WHERE contact='$mbl'";
$res=mysqli_multi_query($conn,$sql);
header('Location:table.php');
?>