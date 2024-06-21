<?php
include("../dbconfig.php");
$mbl1=$_GET['contact'];
$sql="SELECT * from addedcompany WHERE company_contact='$mbl1'";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $name1=$row['company_name'];
        $contact1=$row['company_contact'];
        $salary1=$row['salary'];
        $place1=$row['place'];
        $role1=$row['job_role'];
        $sql3="INSERT INTO tblresume(company_name,contact,salary,place,job_role) VALUES ('$name1','$contact1','$salary1','$place1','$role1')";
$res3=mysqli_query($conn,$sql3);
if($res3){
    echo "Added Success";
}else{
    echo "Added Failed";
}

      
    }
}
$sql4="DELETE FROM addedcompany WHERE company_contact='$mbl1'";
$result4=mysqli_query($conn,$sql4);
if($result4){
    echo "Record deleted Successfully";
}


?>