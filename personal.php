<?php

$occupation = $_POST["occupation"];
$civilid = $_POST["civilid"];
$company = $_POST["company"];
$salary = $_POST["salary"];


$host= "localhost";
$dbname = "message_db";
$username= "root";
$password= "";

$conn = mysqli_connect($host,$username,$password, $dbname);

if( mysqli_connect_errno()){
	die("Connection error: " .mysqli_connect_error());
}

$sql= "INSERT INTO personal (occupation, civilid, company, salary)
		VALUES (?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sisi", $occupation, $civilid, $company, $salary);

mysqli_stmt_execute($stmt);

echo "Thank you for your info";

?>