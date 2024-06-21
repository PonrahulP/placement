<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Registration</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    input[type="text"],input[type="date"] ,input[type="file"],input[list="select"]{
    background-color:  #adb5bd; 
    color: #dc3545; 
    border: 1px solid #333; 
    padding: 10px; 
    font-size: 16px; 
}
</style>
<body>
  <?php include("../navbar.php");?>
  <?php include("../sidebar.php");?>
  <div class="container mt-5">
        <div class="row">
            <h5><a><i class="bi bi-journal-richtext"></i>Project Register Report</a></h5>
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="">Home</a></li> -->
                    <li class="breadcrumb-item"><a href="../projectregister/table.php">Report</a></li>
                    <li class="breadcrumb-item active">Project Registration</li>
                </ol>
            </nav>
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="name">Name:</label>
                            <input type="text"  class="form-control" name="name" id="name" placeholder="Enter Your Name">
                        </div>
                        <div class="col-md-2">
                            <label for="contact">Contact:</label>
                            <input type="text"  class="form-control" name="contact" id="contact" placeholder="Enter Your Contact Number">
                        </div>
                        <div class="col-md-3">
                            <label for="email">Email Id:</label>
                            <input type="text"  class="form-control" name="email" id="email" placeholder="Enter Your Mail Id" >
                        </div>
                        <div class="col-md-3">
                            <label for="framework">Framework:</label><br>
                            <input class="form-check-input" type="checkbox" value="php" id="framework" name="framework[]">
                            <label class="form-check-label" for="framework">
                                php
                             </label>
                             <input class="form-check-input" type="checkbox" value="Nodejs" id="framework" name="framework[]">
                            <label class="form-check-label" for="framework">
                                Nodejs
                             </label>
                             <input class="form-check-input" type="checkbox" value="Java" id="framework" name="framework[]">
                            <label class="form-check-label" for="framework">
                                Java
                             </label>
                             <input class="form-check-input" type="checkbox" value="Csharp" id="framework" name="framework[]">
                            <label class="form-check-label" for="framework">
                                Csharp
                             </label><br>
                             <input class="form-check-input" type="checkbox" value="python" id="framework" name="framework[]">
                            <label class="form-check-label" for="framework">
                                python
                             </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                        <label for="education">Education:</label><br>
                        <select class="form-select" aria-label="Default select example" name="education" id="education">
                       <option selected>Choose the education</option>
                        <option value="Diploma">Diploma</option>
                        <option value="UG">UG</option>
                        <option value="PG">PG</option>
                        <option value="Bcom">Bcom</option>
                        <option value="Engineering">Engineering</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                        <label for="jdate">Joining Date:</label>
                        <input type="date"  class="form-control" name="jdate" id="jdate" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="card">
  <div class="card-body">
                    <div class="table-responsive">
            <table class="table table-bordered" id="salesTable">
                <thead>
                    <tr>
                        <th>Project Date</th>
                        <th>Title</th>
                        <th>Module</th>
                        <th>Complete Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="pdate[]" class="form-control" value="<?php echo date('Y-m-d'); ?>"></td>
                        <td><input type="text" name="title[]" class="form-control" required></td>
                        <td><input type="file" name="module[]" class="form-control" required></td>
                        <td><input type="date" name="cdate[]" class="form-control" value="<?php echo date('Y-m-d'); ?>"></td>
                        <td><i class="bi bi-x-circle-fill btn btn-danger h5 removeRow"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <i class="bi bi-plus-square-fill btn btn-primary" id="addRow"></i>
        <button type="submit"  id="btn" name="btn" class="btn btn-success">Submit</button>
                </div>
                </div>
                </form>
            <!-- row end -->
        </div>
        <!-- Container end -->
    </div>
</body>
<script>
$(document).ready(function(){
    $("#addRow").click(function(){
        var newRow = '<tr>' +
                        '<td><input type="date" name="pdate[]" class="form-control" value="<?php echo date('Y-m-d'); ?>"></td>'+
                        '<td><input type="text" name="title[]" class="form-control"  required></td>'+
                        '<td><input type="file" name="module[]" class="form-control" required></td>'+
                        '<td><input type="date" name="cdate[]" class="form-control" value="<?php echo date('Y-m-d'); ?>"></td>'+
                        '<td><i class="bi bi-x-circle-fill btn btn-danger h5 removeRow"></i></td>'+
            '</tr>';
        $("#salesTable tbody").append(newRow);
    });
    $(document).on('click', '.removeRow', function(){
        $(this).closest('tr').remove();
    });
});
    </script>
</html>
