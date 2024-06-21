<?php
include("../dbconfig.php");

if(isset($_POST['query'])) {
    $search = $_POST['query'];
    
    $sql = "SELECT * FROM tblresume WHERE company_name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='id'>" . $row["id"] . "</td>";  
            echo "<td>" . $row["company_name"] . "</td>";
            echo "<td>" . $row["contact"] . "</td>";
            echo "<td>" . $row["salary"] . "</td>";
            echo "<td>" . $row["place"] . "</td>";
            echo "<td>" . $row["job_role"] . "</td>";
            echo "<td>";
            echo "<a href='edit.php?id=".$row['id']."'><i class='bi bi-pencil-square h3'></i></a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='delete2.php?id=".$row['id']."'><i class='bi bi-trash3-fill h3'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No results found.</td></tr>";
    }
}
?>
