<?php

$conn = new mysqli("localhost","root","","happybuds");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE admission SET status='$status' WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: admin.php");
} else {
    echo "Error updating status";
}

?>