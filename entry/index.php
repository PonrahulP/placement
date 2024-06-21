<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Page</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  <?php include("../navbar.php");?>
  <?php include("../sidebar.php");?>
  <div class="container mt-5">
        <div class="row">
            <h5><a><i class="bi bi-journal-richtext"></i>Entry page</a></h5>
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                </ol>
            </nav>
            <form id="entryForm" action="" method="POST">
                <div class="row mb-3">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Contact</th>
                                                <th>Company</th>
                                                <th>Salary</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input list="contact" name="contact" class="form-control" required>
                            <datalist id="contact">
                         <?php
                         include ("../dbconfig.php");
                            $sel_cus = "select contact from tblreg1";
                            $res_cus = mysqli_query($conn, $sel_cus);
                            while ($row = mysqli_fetch_array($res_cus)) {
                           echo "<option value=".$row['contact']."></option>";
                            } 
                            ?>
                            </datalist></td>
                                                <td><input list="company" name="company" class="form-control" required>
                            <datalist id="company">
                         <?php
                            $sel_cus = "select company_name from addedcompany";
                            $res_cus = mysqli_query($conn, $sel_cus);
                            while ($row = mysqli_fetch_array($res_cus)) {
                           echo "<option value=".$row['company_name']."></option>";
                            } 
                            ?>
                            </datalist> </td>
                                                <td> 
                                                    <select class="form-select" aria-label="Default select example" name="salary" id="salary">
                                                        <option selected>Choose</option>
                                                        <option value="10k">10k</option>
                                                        <option value="10k-20k">10k-20k</option>
                                                        <option value="20k-30k">20k-30k</option>
                                                    </select>
                                                </td>
                                                <td> 
                                                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                                                        <option selected>Choose...</option>
                                                        <option value="Resume">Resume</option>
                                                        <option value="Task">Task</option>
                                                        <option value="Offerletter">Offer letter</option>
                                                    </select>
                                                </td>
                                                <td><input type="date" name="rdate" class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                               <button type="button" id="addRow" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="width: 13rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center fs-3 text-bg-success">RESUME</h5><hr>
                                <label for="date">Joining Date:</label>
                                <p class="jdate"></p>
                                <label for="name">Name:</label>
                                <p class="name"></p>
                                <p class="card-text resume text-center fw-bold fs-1"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-sm mt-5">
                    <div class="card">
                        <h5 class="card-header text-center text-bg-primary">Added Company</h5>
                        <div class="card-body">
                            <table class="table" id="employeeTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $("#addRow").click(function(e){
            e.preventDefault(); // Prevent form submission
           
            // Select the row to be cloned
            var row = $("#example tbody tr:first");

            // Get values from the input/select elements
            var contact = row.find('input[list="contact"]').val();
            var company = row.find('input[list="company"]').val();
            var salary = row.find('select[name="salary"] option:selected').text();
            var rdate = row.find('input[name="rdate"]').val();
            var type = row.find('select[name="type"] option:selected').text();

            // Create a new row with the extracted values
            var newRow = `<tr>
                <td>${contact}</td>
                <td>${company}</td>
                <td>${salary}</td>
                <td>${type}</td>
                <td>${rdate}</td>
                <td><a class='delete1'><i class='bi bi-x-circle h3'></i></a></td>
            </tr>`;

            // Append the new row to the employeeTable
            $("#employeeTable tbody").append(newRow);

            $.ajax({
                url:"insert.php",
                method:"POST",
                data: $("#entryForm").serialize(), // Serialize form data
                success: function(response) {
                    console.log("Data inserted successfully:", response);
                },
                error: function(xhr, status, error) {
                    console.error("Data insertion failed:", error);
                }
            });

        });

        $(document).on('change', 'input[list="contact"]', function(){
            var code = $(this).val();
            var row = $(this).closest('tr');
            if (code) {
                $.ajax({
                    url: "get_products.php",
                    method: "POST",
                    data: { code: code },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('.jdate').text(data.joining_date);
                            $('.name').text(data.name);
                            $('.resume').text(data.resume);
                        } else {
                            $('.name').text("");
                            $('.jdate').text("");
                            $('.resume').text("");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch product data:", error);
                    }
                });
            } else {
                $('.name').text("");
                $('.jdate').text("");
                $('.resume').text("");
            }
        });

        // Delete row functionality
        $(document).on('click', '.delete1', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
</html>
