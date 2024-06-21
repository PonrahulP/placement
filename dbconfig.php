<?php
$servername="localhost";
$username="root";
$password="";
$db="placement";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed:".$conn->connection_error);
}
return $conn;
?>