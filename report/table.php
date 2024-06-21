<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>Report Page</title>
</head>
<style>
    .search{
        margin-left:900px;
        margin-top:10px;
    }
</style>
<body>
    <?php include("../navbar.php");?>
    <?php include("../sidebar.php");?>
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-3">
                <h5><i class="bi bi-journal-richtext"></i> Report Details</h5>
            </div>
            <div class="col-md-12">
                <div class="filter-section row mb-3">
                    <div class="col">
                        <label for="min-date" class="form-label">Min Date:</label>
                        <input type="date" id="min-date" class="form-control" placeholder="dd-mm">
                    </div>
                    <div class="col">
                        <label for="max-date" class="form-label">Max Date:</label>
                        <input type="date" id="max-date" class="form-control" placeholder="dd-mm">
                    </div>
                </div>
                <div class="search">
        <input type="text" id="searchInput" class="form-label" placeholder="Search...">

        </div>
                <div class="col-md-12 table-responsive table table-success mt-3">
                    <table id="example" class="display table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Details</th>
                                <th>Type</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody class="table-warning">
                            <?php
                            include("../dbconfig.php");
                            $sql="SELECT * FROM tblreg1";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>Registration</td>";
                                echo "<td>" .$row['contact']."</td>";
                                echo "</tr>";
                            }
                            ?>
                            <?php
                            include("../dbconfig.php");
                            $sql="SELECT * FROM tblresume";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['company_name']."</td>";
                                echo "<td>Company</td>";
                                echo "<td>".$row['contact']."</td>";
                                echo "</tr>";
                            }
                            ?>
                            <?php
                            include("../dbconfig.php");
                            $sql="SELECT * FROM addedcompany";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['company_name']."</td>";
                                echo "<td>Mail</td>";
                                echo "<td>".$row['student_mobile']."</td>";
                                echo "</tr>";
                            }
                            ?>
                            <?php
                            include("../dbconfig.php");
                            $sql="SELECT * FROM tblent";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>".date('d-m', strtotime($row['created_at']))."</td>";
                                echo "<td>".$row['company_name']."</td>";
                                echo "<td>".$row['type']."</td>";
                                echo "<td>".$row['contact']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
   $(document).ready(function(){
    $("#min-date, #max-date").on("change", function(){
                const minDate = $("#min-date").val();
                const maxDate = $("#max-date").val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: { min_date: minDate, max_date: maxDate },
                    success: function(data) {
                        $('#example tbody').html(data);
                    },
                    error: function(err) {
                        console.error('Error:', err);
                    }
                });
            });
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
</body>
</html>
