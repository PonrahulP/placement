<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Table Resume</title>
</head>
<body>
    <?php include("../navbar.php");?>
    <?php include("../sidebar.php");?>
    <div class="container mt-5">
    <div class="row">
        <?php
        $mobile=$_GET['mobile'];?>
    <h5 class="text-center">Mobile No:<span id="mbl"><?php echo $mobile;?></span></h5>

        <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Company Details</h5>
            <a href="index.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Company</a>
        </div>
        <div class="me-2">
        <input type="text" id="searchInput" class="form-label" placeholder="Search...">

        </div>
        <div class="col-md-12 table-responsive mt-3">
            <table id="example" class="display table-bordered" style="width:100%">
                <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>Company Name</th>
                    <th>Contact</th>
                    <th>Salary</th>
                    <th>URL</th>
                    <!-- <th>Job Role</th> -->
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include("../dbconfig.php");
                $sql = "SELECT * FROM tblresume";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<td class='id'>" . $row["id"] . "</td>";
                        echo "<td>" . $row["company_name"] . "</td>";
                        echo "<td id='mbl'>" . $row["contact"] . "</td>";
                        echo "<td>" . $row["salary"] . "</td>";
                        echo "<td>" . $row["place"] . "</td>";
                        // echo "<td>" . $row["job_role"] . "</td>";
                        echo "<td>";
                        echo "<a class='delete'><i class='bi bi-x-circle h3'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-sm mt-5">
    <form action="mail.php?mbl=<?php echo $_GET['mobile'];?>" method="POST">
<div class="card">
  <h5 class="card-header text-center">Added Company</h5>
  <div class="card-body">
  <table class="table" id="employeeTable">
  <thead>
    <tr>
      <th scope="col">Company Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Salary</th>
      <th scope="col">URL</th>
      <!-- <th scope="col">Job Role</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- Dynamic content will be added here -->
  </tbody>
</table>
<a href="mail.php?mbl=<?php echo $_GET['mobile'];?>"><button type="submit" name="send" class='btn btn-primary'>Send</button></a>
  </div>
            </form>
</div>
</div>
</body>
<script>
    $(document).ready(function(){
        // Move row from example table to employeeTable
        $("#example").on("click", ".delete", function(){
            var row = $(this).closest("tr").detach();
            row.find(".delete").removeClass("delete").addClass("delete1");
            $("#employeeTable tbody").append(row);
            var contact = row.find("td:eq(1)").html();
            var mbl = $("#mbl").text();
            $.ajax({
                url: "delete.php",
                method: "GET",
                data: { "contact": contact, "mbl": mbl },
                success: function(response) {
                    alert("Record moved successfully");
                },
                error: function() {
                    alert("Error moving record");
                }
            });
        });

        // Move row from employeeTable back to example
        $("#employeeTable").on("click", ".delete1", function(){
            var row = $(this).closest("tr").detach();
            row.find(".delete1").removeClass("delete1").addClass("delete");
            $("#example tbody").append(row);
            var contact = row.find("td:eq(1)").html();
            $.ajax({
                url: "delete1.php",
                method: "GET",
                data: { "contact": contact },
                success: function(response) {
                    alert("Record moved back successfully");
                },
                error: function() {
                    alert("Error moving record back");
                }
            });
        });
    });

$(document).ready(function() {
    $('#searchInput').on('input', function() {
        const query = $(this).val();

        $.ajax({
            url: 'search1.php',
            method: 'POST',
            data: { query: query },
            success: function(data) {
                $('#example tbody').html(data);
            },
            error: function(err) {
                console.error('Error:', err);
            }
        });
    });
});
</script>
</html>
