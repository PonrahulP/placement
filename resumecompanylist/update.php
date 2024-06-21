<?php
include ("../dbconfig.php");
$id=$_GET['id'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$salary=$_POST['salary'];
$place=$_POST['place'];
$role=$_POST['role'];
$sql="UPDATE tblresume SET company_name='$name',contact='$contact',salary='$salary',place='$place',job_role='$role' WHERE id='$id'";
$res=mysqli_query($conn,$sql);
header('Location:display.php');
?>