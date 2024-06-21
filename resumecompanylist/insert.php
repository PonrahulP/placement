<?php
include("../dbconfig.php");
$name=$_POST['name'];
$contact=$_POST['contact'];
$salary=$_POST['salary'];
$place=$_POST['url'];
$role=$_POST['role'];
$sql="INSERT INTO tblresume (company_name,contact,salary,place,job_role) VALUES ('$name','$contact','$salary','$place','$role')";
$res=mysqli_query($conn,$sql);
if($res){
    echo "<script>alert('Record Added');</script>";
}
header('Location:display.php');
?>