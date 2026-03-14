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
    die("Connection failed: " . $conn->connect_error);
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

$contact_query = "SELECT * FROM contacts";
$contact_result = $conn->query($contact_query);
$contact_query = "SELECT name, email, message, created_at FROM contacts ORDER BY created_at DESC";
$contact_result = $conn->query($contact_query);

$result1 = $conn->query("SELECT COUNT(*) AS total FROM admission WHERE status='Approved'");
$row1 = $result1->fetch_assoc();
$total_students = $row1['total'];

$result2 = $conn->query("SELECT COUNT(*) AS total FROM admission WHERE status='Pending'");
$row2 = $result2->fetch_assoc();
$pending_admission = $row2['total'];

$result3 = $conn->query("SELECT COUNT(*) AS total FROM admission");
$row3 = $result3->fetch_assoc();
$active_parents = $row3['total'];

$teachers_present = 5;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin — HappyBuds</title>
<link rel="stylesheet" href="stylesheet.css">

<style>

/* Container */

.container{
width:90%;
margin:40px auto;
}

/* Dashboard Cards */

.cards{
display:flex;
flex-wrap:wrap;
gap:20px;
margin-bottom:40px;
}

.card{
background:linear-gradient(135deg,#ffffff,#f2f6ff);
flex:1;
min-width:220px;
padding:25px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
text-align:center;
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
box-shadow:0 12px 25px rgba(0,0,0,0.15);
}

.card h3{
color:#555;
margin-bottom:10px;
}

.card p{
font-size:32px;
font-weight:bold;
color:#4a6cf7;
margin:0;
}

/* Headings */

h2{
margin-top:40px;
color:#333;
border-left:5px solid #4a6cf7;
padding-left:10px;
}

/* Table */

table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
margin-top:20px;
}

table th{
background:#4a6cf7;
color:white;
padding:14px;
font-weight:500;
}

table td{
padding:12px;
border-bottom:1px solid #eee;
}

table tr:hover{
background:#f9fbff;
}

/* Status Badge */

.status{
padding:6px 12px;
border-radius:20px;
font-size:13px;
font-weight:600;
color:white;
}

.pending{
background:#ff9800;
}

.approved{
background:#2ecc71;
}

.rejected{
background:#e74c3c;
}

/* Action Buttons */

a{
text-decoration:none;
font-weight:500;
}

a[href*="Approved"]{
color:#2ecc71;
}

a[href*="Rejected"]{
color:#e74c3c;
}

/* Reply Form */

textarea{
width:100%;
padding:8px;
border-radius:6px;
border:1px solid #ddd;
resize:none;
font-family:inherit;
}

button{
background:#4a6cf7;
border:none;
color:white;
padding:8px 16px;
border-radius:6px;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#364fc7;
}

/* Mobile */

@media(max-width:768px){

.cards{
flex-direction:column;
}

table{
font-size:14px;
}

}

@media(max-width:480px){

table{
display:block;
overflow-x:auto;
white-space:nowrap;
}

}
/* -------- MOBILE RESPONSIVE -------- */

@media (max-width:900px){

.nav-bar{
flex-wrap:wrap;
padding:10px;
}

.nav-items{
position:absolute;
top:70px;
right:0;
background:white;
width:100%;
display:none;
flex-direction:column;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
padding:20px 0;
}

.nav-items a{
display:block;
margin:10px 0;
}

.nav-items.active{
display:flex;
}

.hamburger{
display:block;
cursor:pointer;
}

}

/* Cards */

@media (max-width:768px){

.container{
width:95%;
margin:20px auto;
}

.cards{
flex-direction:column;
gap:15px;
}

.card{
min-width:100%;
padding:20px;
}

.card p{
font-size:26px;
}

}

/* Tables */

@media (max-width:768px){

table{
display:block;
overflow-x:auto;
white-space:nowrap;
}

table th, table td{
padding:10px;
font-size:14px;
}

textarea{
width:200px;
}

}

/* Extra Small Devices */

@media (max-width:480px){

h2{
font-size:18px;
}

.card h3{
font-size:16px;
}

.card p{
font-size:22px;
}

button{
padding:6px 12px;
font-size:12px;
}

}

</style>
</head>

<body>

<header>
<div class="nav-bar">

<div class="logo">
<a href="index.php" class="logo-text">
<span>H</span>
<span>a</span>
<span>p</span>
<span>p</span>
<span>y</span>
<span>B</span>
<span>u</span>
<span>d</span>
<span>s</span>
</a>
</div>

<button class="hamburger" id="hamburger">
<span></span>
<span></span>
<span></span>
</button>

<nav class="nav-items" id="nav-items">

<a href="logout.php">
<button style="background:#e74c3c;color:white;">Logout</button>
</a>
</nav>
</div>
</header>

<div class="container">

<div class="cards">

<div class="card">
<h3>Total Students</h3>
<p><?php echo $total_students; ?></p>
</div>

<div class="card">
<h3>Pending Admissions</h3>
<p><?php echo $pending_admission; ?></p>
</div>

<div class="card">
<h3>Active Parents</h3>
<p><?php echo $active_parents; ?></p>
</div>

<div class="card">
<h3>Teachers Present</h3>
<p><?php echo $teachers_present; ?></p>
</div>

</div>


<h2>Recent Admissions</h2>

<table>

<tr>
<th>Child Name</th>
<th>Parent Name</th>
<th>Date of Birth</th>
<th>Program</th>
<th>Status</th>
<th>Action</th>
<th>Submitted On</th>
</tr>
<?php

$sql = "SELECT id, child_name, parent_name, dob, program, status, submission_date
        FROM admission
        ORDER BY submission_date DESC
        LIMIT 5";

$result = $conn->query($sql);

if($result && $result->num_rows > 0){

while($app = $result->fetch_assoc()){

$status = strtolower($app['status']);

echo "<tr>";

echo "<td>".htmlspecialchars($app['child_name'])."</td>";
echo "<td>".htmlspecialchars($app['parent_name'])."</td>";
echo "<td>".htmlspecialchars($app['dob'])."</td>";
echo "<td>".htmlspecialchars($app['program'])."</td>";

echo "<td class='status $status'>".htmlspecialchars($app['status'])."</td>";

echo "<td>
<a href='update_status.php?id=".$app['id']."&status=Approved'><button>Approve</button></a>

<a href='update_status.php?id=".$app['id']."&status=Rejected'><button>Reject</button></a>
</td>";

echo "<td>".htmlspecialchars($app['submission_date'])."</td>";

echo "</tr>";
}
}
if(isset($_POST['send_reply'])){

$contact_id = $_POST['contact_id'];
$reply_message = $_POST['reply_message'];

$stmt = $conn->prepare("UPDATE contacts SET reply=? WHERE id=?");
$stmt->bind_param("si",$reply_message,$contact_id);
$stmt->execute();

echo "<script>alert('Reply sent successfully');</script>";

}

?>

</table>
<h2>Parent Enquiries</h2>

<table border="1" width="100%">
<tr>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Reply</th>
<th>Action</th>
</tr>

<?php

$contact_query = "SELECT * FROM contacts ORDER BY created_at DESC";
$contact_result = $conn->query($contact_query);

while($row = $contact_result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['message']; ?></td>

<td>
<?php
if(isset($row['reply']) && $row['reply'] != ""){
echo $row['reply'];
}else{
echo "No reply yet";
}
?>

</td>

<td>

<form method="POST">

<input type="hidden" name="contact_id" value="<?php echo $row['id']; ?>">

<textarea name="reply_message" placeholder="Write reply..." required></textarea>

<br><br>

<button type="submit" name="send_reply">Send Reply</button>

</form>

</td>

</tr>

<?php
}
?>

</table>
</div>


<footer class="footer">

<div class="footer-container">

<div class="footer-about">
<h2>HappyBuds Kindergarten 🌸</h2>
<p>Where Little Minds Grow Big Dreams 💛</p>
</div>

<div class="footer-links">

<h3>Quick Links</h3>

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="program.php">Programs</a></li>
<li><a href="galary.php">Gallery</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>

</div>

<div class="footer-contact">
<h3>Contact Us</h3>
<p>📍 Kattakkada, Kerala</p>
<p>📞 +91 98765 43210</p>
<p>📧 happybuds@gmail.com</p>
</div>

</div>

<div class="footer-bottom">
<p>© 2026 HappyBuds Kindergarten | All Rights Reserved</p>
</div>

</footer>


<script>

const hamburger=document.getElementById('hamburger');
const navItems=document.getElementById('nav-items');

hamburger.addEventListener('click',()=>{

navItems.classList.toggle('active');
hamburger.classList.toggle('active');

});

const loginBtn=document.querySelector('.login-btn-nav');
const dropdown=document.querySelector('.dropdown-content');

loginBtn.addEventListener('click',function(e){

e.stopPropagation();
dropdown.classList.toggle('show');

});

window.addEventListener('click',function(){

dropdown.classList.remove('show');

});

</script>

</body>
</html>
