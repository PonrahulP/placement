<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Company</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
        input[type="text"], input[list], select {
            background-color: #adb5bd; 
            color:darkgreen; 
            border: 1px solid #333; 
            padding: 10px; 
            font-size: 16px; 
        }
    </style>
<body>
  <?php include("../navbar.php");?>
  <?php include("../sidebar.php");?>
    <div class="container mt-5">
        <h2 class="mb-4">Update Company</h2>
        <form action="update.php?id=<?php echo $_GET['id'];?>" method="POST">
        <div class="row">
           
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="">Home</a></li> -->
                    <li class="breadcrumb-item"><a href="../resumecompanylist/index.php">Add Company</a></li>
                    <li class="breadcrumb-item active">Update Company</li>
                </ol>
            </nav>
            <?php
            include ("../dbconfig.php");
            $id=$_GET['id'];
            $sql="SELECT * FROM tblresume WHERE id='$id'";
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($res)){
            ?>
            <div class="row mb-3">
                <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-label h5">Company Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['company_name'];?>">
            </div>
                  </div>
                <div class="col-md-6">
            <div class="form-group">
                <label for="contact" class="form-label h5">Contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['contact'];?>">
            </div>
              </div>
               </div>
            <div class="row mb-3">
                <div class="col-md-6">
            <div class="form-group">
                <label for="salary" class="form-label h5">salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary'];?>">
            </div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <label for="place" class="form-label h5">Url:</label>
                <input type="text" class="form-control" id="place" name="place" value="<?php echo $row['place'];?>">
            </div>
</div>
</div>
<div class="row mb-3">
<div class="col-md-6">
            <div class="form-group">
                <label for="role" class="form-label h5" hidden>Job Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['job_role'];?>" hidden>
            </div>
            </div>
            <?php
            }
            ?>
</div><br>
            <div>
            <button type="submit" id="btn" name="btn" class="btn btn-primary">Update</button>
</div>
</div>
        </form>
    </div>
</body>
</html>
