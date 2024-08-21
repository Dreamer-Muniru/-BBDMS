<?php
$requester_name=$_PORT['full_name'];
$requester_age=$_PORT['age_of_requester'];
$requester_gender=$_PORT['gender_of_requester'];
$requester_address=$_PORT['address_of_requester'];
$requester_blood=$_PORT['blood_request'];
$conn=mysqli_connect("localhost","root","","request_blood") or die("Connection error");

$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");

$sql= "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}')";
$sql= "INSERT INTO request_blood(requester_name, requester_age, requester_gender, requester_address, blood_requested) value('{$requester_name}', '{$requester_age}', '{$requester_gender}', '{$requester_address}', '{$requester_blood}' )";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");

header("Location: http://localhost/BDMS/home.php");

mysqli_close($conn);
 ?>
