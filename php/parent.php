<?php
session_start();

$conn = new mysqli("localhost","root","","happybuds");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['parent_email'])){
header("Location: prnt_login.php");
exit();
}

$email = trim($_SESSION['parent_email']);

/* Admission Query */

$admission_query = "SELECT child_name, program, status, submission_date 
FROM admission 
WHERE email='$email'";

$admission_result = $conn->query($admission_query);

/* Contact Query */

$contact_query = "SELECT message, reply, created_at 
FROM contacts 
WHERE email='$email'
ORDER BY created_at DESC";

$contact_result = $conn->query($contact_query);

if(!$contact_result){
die("Contact query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Parent — HappyBuds</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<style>
	header{
background:#4a6cf7;
color:white;
padding:15px;
text-align:center;
}

.container{
width:90%;
margin:30px auto;
}

/* Cards */

.cards{
display:flex;
flex-wrap:wrap;
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
flex:1;
min-width:200px;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
text-align:center;
}

/* Tables */

table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th, td{
text-align:center;
vertical-align:middle;
}
th{
background:#4a6cf7;
color:white;
padding:12px;
}

td{
padding:14px 18px;
border-bottom:1px solid #eee;
}

tr:hover{
background:#f7f9ff;
}

/* Status */

.status{
display:inline-block;
padding:8px 18px;
border-radius:20px;
color:white;
font-size:14px;
font-weight:600;
text-align:center;
min-width:90px;
margin:auto;
}

.pending{
background:orange;
}

.approved{
background:green;
}

.rejected{
background:red;
}

/* Logout button */

.logout{
float:right;
margin-right:20px;
background:#e74c3c;
color:white;
border:none;
padding:8px 15px;
border-radius:5px;
cursor:pointer;
}

/* Mobile */

@media(max-width:768px){

.cards{
flex-direction:column;
}

table{
display:block;
overflow-x:auto;
white-space:nowrap;
}

}

</style>
<body>
	<header>
		<div class="nav-bar">
			 <div class="logo"> <a href="index.php" class="logo-text">
				<span>H</span>
				<span>a</span>
				<span>p</span>
				<span>p</span>
				<span>y</span>
				<span>B</span>
				<span>u</span>
				<span>d</span>
				<span>s</span></a></div>
			<button class="hamburger" id="hamburger" aria-controls="nav-items" aria-expanded="false" aria-label="Toggle navigation">
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
	<?php
	echo "<h3>Welcome ".$email."</h3>";
	?>
		<div class="container">

<h2>Your Child Admission Status</h2>

<table>

<tr>
<th>Child Name</th>
<th>Program</th>
<th>Status</th>
<th>Submitted On</th>
</tr>

<?php
if($admission_result && $admission_result->num_rows > 0){

while($row = $admission_result->fetch_assoc()){

$status = strtolower($row['status']);

echo "<tr>";

echo "<td>".htmlspecialchars($row['child_name'])."</td>";

echo "<td>".htmlspecialchars($row['program'])."</td>";

echo "<td class='status $status'>".htmlspecialchars($row['status'])."</td>";

echo "<td>".htmlspecialchars($row['submission_date'])."</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='4'>No admission records found</td></tr>";

}
?>

</table>

<br><br>

<h2>Your Enquiries & Admin Replies</h2>

<table>

<tr>
<th>Your Message</th>
<th>Admin Reply</th>
<th>Date</th>
</tr>

<?php

if($contact_result && $contact_result->num_rows > 0){

while($row = $contact_result->fetch_assoc()){

echo "<tr>";

echo "<td>".htmlspecialchars($row['message'])."</td>";

if(!empty($row['reply'])){
echo "<td>".htmlspecialchars($row['reply'])."</td>";
}else{
echo "<td style='color:gray;'>No reply yet</td>";
}

echo "<td>".htmlspecialchars($row['created_at'])."</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='3'>No messages found</td></tr>";

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
		const hamburger = document.getElementById('hamburger');
		const navItems = document.getElementById('nav-items');

		function toggleNav(){
			const isActive = navItems.classList.toggle('active');
			hamburger.classList.toggle('active');
			hamburger.setAttribute('aria-expanded', isActive);
		}

		hamburger.addEventListener('click', toggleNav);

		document.querySelectorAll('.nav-items a').forEach(link => {
			link.addEventListener('click', () => {
				navItems.classList.remove('active');
				hamburger.classList.remove('active');
				hamburger.setAttribute('aria-expanded','false');
			});
		});
		const loginBtn = document.querySelector('.login-btn-nav');
const dropdown = document.querySelector('.dropdown-content');

loginBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    dropdown.classList.toggle('show');
});

window.addEventListener('click', function() {
    dropdown.classList.remove('show');
});
	</script>
</body>
</html>
