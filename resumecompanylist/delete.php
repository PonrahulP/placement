<?php
include ("../dbconfig.php");
$del=$_GET ['contact'];
$mbl=$_GET['mbl'];
$sql="SELECT * from tblresume WHERE contact='$del'";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $name=$row['company_name'];
        $contact=$row['contact'];
        $salary=$row['salary'];
        $place=$row['place'];
        $role=$row['job_role'];
        $sql1="INSERT INTO addedcompany(company_name,company_contact,salary,place,job_role,student_mobile) VALUES ('$name','$contact','$salary','$place','$role','$mbl')";
$res=mysqli_query($conn,$sql1);
if($res){
    echo "Added Success";
}else{
    echo "Added Failed";
}

      
    }
}
$sql="DELETE FROM tblresume WHERE contact='$del'";
$result=mysqli_query($conn,$sql);
if($result){
    echo "Record deleted Successfully";
}



?>