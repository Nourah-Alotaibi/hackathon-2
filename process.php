<?php

$visitor_name = $_POST["visitor_name"];
$visitor_email = $_POST["visitor_email"];
$visitor_phone = $_POST["visitor_phone"];
$checkin = $_POST["checkin"];
$time = $_POST["time"];
$visitor_message = $_POST["visitor_message"];

$host= "localhost";
$dbname = "message_db";
$username= "root";
$password= "";

$conn = mysqli_connect($host,$username,$password, $dbname);

if( mysqli_connect_errno()){
	die("Connection error: " .mysqli_connect_error());
}

$sql= "INSERT INTO message (name, email, phone, checkin, time, body)
		VALUES (?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssisss", $visitor_name, $visitor_email, $visitor_phone, $checkin, $time, $visitor_message);

mysqli_stmt_execute($stmt);

echo "Thank you for your reservation, See you soon.";

?>