<?php
include("../dbconfig.php");

if(isset($_POST['code'])){
    $category = $_POST['code'];
    $sql = "SELECT joining_date,name,resume FROM tblreg1 WHERE contact='$category'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }
}
?>
