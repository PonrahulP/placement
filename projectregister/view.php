<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Registration Table</title>
</head>
<body>
    <?php include("../navbar.php");?>
    <?php include("../sidebar.php");?>
    <div class="container mt-5">
    <div class="row">
        <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Registration Details</h5>
            <a href="index.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Registration</a>
        </div>
        <div class="table-container">
            <div class="row mb-3  table-responsive mt-3">
               <center> <div class="col-md-6"></center>
                    <h4 class="text-center">Student's Details:</h4>
        <table class=" table vertical-table display table-bordered table-success">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Framework</th>
                <th scope="col">Education</th>
                <th scope="col">Joining Date</th>
                </tr>
            </thead>
            <tbody class="table-warning">
               <?php
               include ("../dbconfig.php");
               $mbl=$_GET['mobile'];
               $sql="SELECT * FROM tblreg1 WHERE contact='$mbl'";
               $res=mysqli_query($conn,$sql);
               if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" .$row['name']."</td>";
                    echo "<td>" .$row['contact']."</td>";
                    echo "<td>" .$row['email']."</td>";
                    echo "<td>" .$row['framework']."</td>";
                    echo "<td>" .$row['education']."</td>";
                    echo "<td>" .$row['joining_date']."</td>";
                    echo "</tr>";
                }
               }
               ?>
            </tbody>
        </table>
</div>

        <center><div class="col-md-7"></center>
        <h4 class="text-center">Project Details:</h4>
        <table class="table vertical-table display table-bordered table-success">
            <thead>
                <tr>
                <th scope="col">Project Date</th>
                <th scope="col">Title</th>
                <th scope="col">Complete Date</th>
                <th scope="col">Module</th>
                </tr>
            </thead>
            <tbody class="table-warning">
            <?php
               include ("../dbconfig.php");
               $mbl=$_GET['mobile'];
               $sql="SELECT * FROM tblreg2 WHERE contact='$mbl'";
               $res=mysqli_query($conn,$sql);
               if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" .$row['project_date']."</td>";
                    echo "<td>" .$row['title']."</td>";
                    echo "<td>" .$row['complete_date']."</td>";
                    echo "<td><a href='module.php?mod=" .$row['module']."'>".$row['module']."</td></a>";
                    echo "</tr>";
                }
               }
               ?>
            </tbody>
        </table>
</div>
</div>
    </div>
</div>
</div>
</body>
</html>