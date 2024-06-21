<?php
include("../dbconfig.php");
$contact=$_POST['contact'];
$company=$_POST['company'];
$salary=$_POST['salary'];
$rdate=$_POST['rdate'];
$type=$_POST['type'];
$sql="INSERT INTO tblent (contact,company_name,salary,resume_date,type) VALUES ('$contact','$company','$salary','$rdate','$type')";
$res=mysqli_query($conn,$sql);


if(isset($type) && $type=='Resume'){
$sql1="UPDATE tblreg1 SET resume=resume+1 WHERE contact='$contact'";
$res=mysqli_query($conn,$sql1);
} 
if(isset($type)&& $type=='Task'){
$sql2="UPDATE tblreg1 SET task=task+1 WHERE contact='$contact'";
$res=mysqli_query($conn,$sql2);
}
?>