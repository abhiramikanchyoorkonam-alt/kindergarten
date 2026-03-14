<?php
session_start();

if(!isset($_SESSION['admin_email'])){
header("Location: adm_login.php");
exit();
}

$conn = new mysqli(
"sql300.infinityfree.com",
"if0_41292570",
"WtMNYf4eoUr4qr",
"if0_41292570_happybuds"
);

if($conn->connect_error){
die("Connection failed: ".$conn->connect_error);
}

if(isset($_GET['id']) && isset($_GET['status'])){

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $conn->prepare("UPDATE admission SET status=? WHERE id=?");
$stmt->bind_param("si",$status,$id);
$stmt->execute();

header("Location: admin.php");
exit();

}else{

echo "Invalid request";

}
?>