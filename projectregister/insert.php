<?php
include("../dbconfig.php");
$name = $_POST['name'];
$contact = $_POST['contact'];
$mail = $_POST['email'];
$framework=implode(',',$_POST['framework']);
$edu = $_POST['education'];
$joindate = $_POST['jdate'];
$sql="INSERT INTO tblreg1 (name,contact,email,framework,education,joining_date) VALUES ('$name','$contact','$mail','$framework','$edu','$joindate')";
$res=mysqli_query($conn,$sql);

$targetDir = "docs/";
$projectdate = $_POST['pdate'];
$title = $_POST['title'];
$completedate = $_POST['cdate'];
if(!empty(array_filter($_FILES['module']['name']))) {
    foreach($_FILES['module']['name'] as $key => $val) {
        $ss_title=$title[$key];
        $ss_pdate=$projectdate[$key];
        $ss_cdate=$completedate[$key];

        $fileName = basename($_FILES['module']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;

        // Upload file to server
        if(move_uploaded_file($_FILES['module']['tmp_name'][$key], $targetFilePath)) {
            // Insert file information into database
            $sql = "INSERT INTO tblreg2 (contact,project_date,title,module,complete_date) VALUES ('$contact','$ss_pdate','$ss_title','$fileName','$ss_cdate')";
            if($conn->query($sql) === TRUE) {
                echo "File '$fileName' uploaded and saved successfully.<br>";
            } else {
                echo "Error saving file information for '$fileName': " . $conn->error . "<br>";
            }
        } else {
            echo "Error uploading file '$fileName'.<br>";
        }
    }
    header('Location:table.php');
}

    
?>