<?php
$conn = new mysqli("localhost","root","","happybuds");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

$recent_admission = [];

$sql = "SELECT child_name, parent_name, dob, program, status, submission_date 
        FROM admission 
        ORDER BY submission_date DESC 
        LIMIT 5";

$result = $conn->query($sql);

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $recent_admission[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin — HappyBuds</title>
	<link rel="stylesheet" href="stylesheet.css">
	<style>
.container {
    width: 90%;
    margin: 30px auto;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.card {
    background: white;
    flex: 1;
    min-width: 200px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.card h3 {
    margin-bottom: 10px;
    color: #333;
}

.card p {
    font-size: 28px;
    font-weight: bold;
    margin: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    margin-top: 20px;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

table th {
    background: #4a6cf7;
    color: white;
}

.status {
    padding: 5px 10px;
    border-radius: 20px;
    color: white;
}

.Pending {
    background: orange;
}

.Approved {
    background: green;
}
.status{
    padding:5px 10px;
    border-radius:20px;
    color:white;
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

/* Mobile Responsive Styles */
@media (max-width: 768px) {
    .container {
        width: 95%;
        margin: 20px auto;
        padding: 0 10px;
    }

    .cards {
        flex-direction: column;
        gap: 15px;
        margin-bottom: 20px;
    }

    .card {
        min-width: 100%;
        flex: none;
        padding: 15px;
    }

    .card p {
        font-size: 24px;
    }

    table {
        font-size: 14px;
    }

    table th, table td {
        padding: 8px;
    }

    h2 {
        font-size: 20px;
        margin-top: 20px;
    }
}

@media (max-width: 480px) {
    .container {
        width: 100%;
        margin: 15px auto;
        padding: 0 5px;
    }

    .cards {
        gap: 10px;
    }

    .card {
        padding: 12px;
        border-radius: 8px;
    }

    .card h3 {
        font-size: 16px;
        margin-bottom: 8px;
    }

    .card p {
        font-size: 20px;
    }

    /* Make table scrollable on small screens */
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
        font-size: 12px;
    }

    table th, table td {
        padding: 6px;
        min-width: 60px;
    }

    h2 {
        font-size: 18px;
        margin: 15px 0 10px 0;
    }
}
</style>
</head>
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
				<a href="about.php">About</a>
				<a href="program.php">Program</a>
				<a href="galary.php">Galary</a>
				<a href="contact.php">Contact</a>
				<a href="application.php"><button>Enroll</button></a>
				<div class="login-dropdown">
                <button class="login-btn-nav">Login ▾</button>
                <div class="dropdown-content">
                <a href="adm_login.php">Admin Login</a>
                <a href="prnt_login.php">Parent Login</a>
                </div>
                </div>
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
        
        <!-- Recent Admissions Table -->
        <h2>Recent Admissions</h2>
        <table>
            <tr>
                <th>Child Name</th>
                <th>Parent Name</th>
                <th>Date of Birth</th>
                <th>Program</th>
                <th>Status</th>
                <th>Submitted On</th>
            </tr>
            <?php
			
$conn = new mysqli("localhost","root","","happybuds");

$sql = "SELECT child_name, parent_name, dob, program, status, submission_date 
        FROM admission 
        ORDER BY submission_date DESC 
        LIMIT 5";

$result = $conn->query($sql);

$recent_admission = [];

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $recent_admission[] = $row;
    }
}
            foreach ($recent_admission as $app) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($app['child_name']) . "</td>";
                echo "<td>" . htmlspecialchars($app['parent_name']) . "</td>";
                echo "<td>" . htmlspecialchars($app['dob']) . "</td>";
                echo "<td>" . htmlspecialchars($app['program']) . "</td>";
                $status = strtolower($app['status']);
                echo "<td class='status $status'>" . htmlspecialchars($app['status']) . "</td>";
                echo "<td>" . htmlspecialchars($app['submission_date']) . "</td>";
                echo "</tr>";
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
