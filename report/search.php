<?php
include("../dbconfig.php");

if (isset($_POST['min_date']) && isset($_POST['max_date'])) {
    $min_date = $_POST['min_date'];
    $max_date = $_POST['max_date'];


    // Query to search for records based on the 'name' column
    $sql = "SELECT * FROM tblreg1 WHERE DATE(created_at) BETWEEN '$min_date' AND '$max_date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>Registration</td>";
                                echo "<td>" .$row['contact']."</td>";
                                echo "</tr>";
        }
    } 


    $sql1 = "SELECT * FROM tblresume WHERE DATE(created_at) BETWEEN '$min_date' AND '$max_date'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
             echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['company_name']."</td>";
                                echo "<td>Company</td>";
                                echo "<td>".$row['contact']."</td>";
                                echo "</tr>";
        }
    } 

    $sql2 = "SELECT * FROM addedcompany WHERE DATE(created_at) BETWEEN '$min_date' AND '$max_date'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
            echo "<td>".$row['company_name']."</td>";
            echo "<td>Mail</td>";
            echo "<td>".$row['student_mobile']."</td>";
            echo "</tr>";
        }
    } 
    $sql3 = "SELECT * FROM tblent WHERE DATE(created_at) BETWEEN '$min_date' AND '$max_date'";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0) {
        while($row = $result3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
            echo "<td>".$row['company_name']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['contact']."</td>";
            echo "</tr>";
        }
    } 

}
?>
