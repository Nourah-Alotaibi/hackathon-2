<?php

$realestate = $_POST["realestate"];
$area = $_POST["area"];
$address = $_POST["address"];
$ownernum = $_POST["ownernum"];

$availability = $_POST["availability"];

$host= "localhost";
$dbname = "message_db";
$username= "root";
$password= "";

$conn = mysqli_connect($host,$username,$password, $dbname);

if( mysqli_connect_errno()){
	die("Connection error: " .mysqli_connect_error());
}

$sql= "INSERT INTO information (realestate, area, address, ownernum, availability)
		VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssis", $realestate, $area, $address, $ownernum, $availability);

mysqli_stmt_execute($stmt);

echo "Thank you.";

?>