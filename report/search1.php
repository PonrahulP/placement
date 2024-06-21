<?php
include("../dbconfig.php");

if(isset($_POST['query'])) {
    $search = $_POST['query'];


    // Query to search for records based on the 'name' column
    $sql = "SELECT * FROM tblreg1 WHERE name LIKE '%$search%' OR contact LIKE '$search'";
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


    $sql1 = "SELECT * FROM tblresume WHERE company_name LIKE '%$search%' OR contact LIKE '%$search%'";
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

    $sql2 = "SELECT * FROM addedcompany WHERE company_name LIKE '%$search%' OR student_mobile LIKE '%$search%'";
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
    $sql3 = "SELECT * FROM tblent WHERE company_name LIKE '%$search%' OR type LIKE '%$search%' OR contact LIKE '%$search%'";
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
