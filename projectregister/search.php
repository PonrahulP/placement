<?php
include("../dbconfig.php");

if(isset($_POST['query'])) {
    $search = $_POST['query'];

    // Query to search for records based on the 'name' column
    $sql = "SELECT * FROM tblreg1 WHERE name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='id'>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["contact"] . "</td>";
            echo "<td>" . $row["framework"] . "</td>";
            echo "<td>" . $row["mail"] . "</td>";
            echo "<td>" . $row["resume"] . "</td>";
            echo "<td>" . $row["task"] . "</td>";
            echo "<td>";
            echo "<a href='view.php?mobile=".$row['contact']."'><i class='bi bi-eye h3'></i></a> ";
            echo "</td>";
            echo "<td>";
            echo "<a href='../resumecompanylist/tableres.php?mobile=".$row['contact']."'><i class='bi bi-envelope-arrow-up h3'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>No matching records found</td></tr>";
    }
}
?>
