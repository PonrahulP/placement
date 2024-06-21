<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Company List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        input[type="text"], input[list], select {
            background-color: #adb5bd; 
            color: #fff; 
            border: 1px solid #333; 
            padding: 10px; 
            font-size: 16px; 
        }
    </style>
</head>
<body>
  <?php include("../navbar.php");?>
    <div class="container mt-5">
        <h2 class="mb-4">Company List</h2>
        <form action="insert.php" method="POST">
            <div class="row">
                <hr>
                <nav class="my-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../resumecompanylist/display.php">Company Details</a></li>
                        <li class="breadcrumb-item active">Add Company List</li>
                    </ol>
                </nav>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label h5">Company Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact" class="form-label h5">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="salary" class="form-label h5">Salary:</label>
                            <select class="form-select" name="salary" id="salary">
                                <option selected>Choose</option>
                                <option value="2-3LPA">2-3LPA</option>
                                <option value="3-4LPA">3-4LPA</option>
                                <option value="4-5LPA">4-5LPA</option>
                                <option value="5-6LPA">5-6LPA</option>
                                <option value="7-8LPA">7-8LPA</option>
                                <option value="8-9LPA">8-9LPA</option>
                                <option value="9-10LPA">9-10LPA</option>
                                <option value="10-11LPA">10-11LPA</option>
                                <option value="11-12LPA">11-12LPA</option>
                                <option value="12-13LPA">12-13LPA</option>
                                <option value="13-14LPA">13-14LPA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-label h5">URL:</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter the URL">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="form-label h5" hidden>Job Role:</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Enter the Job Role" hidden>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit" id="btn" name="btn" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
