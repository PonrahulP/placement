<?php
include("../dbconfig.php");
$mbl=$_GET['mbl'];
if(isset($_POST['send'])){
    $sql2="SELECT COUNT(company_name) AS rahul FROM addedcompany WHERE student_mobile='$mbl'";
    $query=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_array($query);
    $rahul=$row['rahul'];
    // echo $rahul; 
    $sql3="UPDATE tblreg1 SET mail='$rahul' WHERE contact='$mbl'";
    $res=mysqli_query($conn,$sql3);
}
$sql1="SELECT * FROM tblreg1 WHERE contact='$mbl'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$mail1=$row1['email'];
$sql="SELECT * FROM addedcompany WHERE student_mobile='$mbl'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
$company=$row['company_name'];
$contact=$row['company_contact'];
$salary=$row['salary'];
$place=$row['place'];
$role=$row['job_role'];}

use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail=new PHPMailer(true);

try{
// $mail->SMTPDebug=3;
$mail->isSMTP();
$mail->Host='SMTP.gmail.com';
$mail->SMTPAuth=true;
$mail->Username    =  'ponrahulp069@gmail.com';
$mail->Password    =   'kcwpyhoktgfcoksv';
$mail->SMTPSecure  = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port=465;

$mail->setFrom('from@example.com','rahul');
$mail->addAddress($mail1);

$message="company name".$company."/&"."contact".$contact."/&"."salary".$salary."/&"."place".$place."/&"."job role".$role;

$mail->isHTML(true);
$mail->Subject='Hi I am Rahul';
$mail->Body=$message;
$mail->AltBody='This is the not-HTML clients';

$mail->send();
echo "message sent successfully";
}catch(Exception $e){
    echo "Message could not be sent .Mailer Error:{$mail->ErrorInfo}";
}
?>