<?php
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
require_once "../application/config/database.php";
extract($db['default']);


$conn2 = new mysqli("localhost", $username, $password, $database);
$conn2->query("SET NAMES utf8");
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = file_get_contents("db.sql");


if ($conn2->multi_query($sql) === true) {
    echo "New records created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn2->close();

@unlink("admin.sql");
@unlink('./index.php');
   header("Location: /");
?>