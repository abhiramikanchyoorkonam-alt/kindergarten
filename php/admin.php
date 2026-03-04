<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin — HappyBuds</title>
	<link rel="stylesheet" href="stylesheet.css">
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

		<?php
session_start();

// Optional security (keep if using login)
if (!isset($_SESSION['admin_id'])) {
    header("Location: adm_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - HappyBuds</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            background: #f4f6f9;
        }

        .card-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 20px;
            width: 200px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card h3 {
            margin: 10px 0;
        }

        .logout {
            margin-top: 30px;
            display: inline-block;
            background: red;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>HappyBuds Admin</h2>
    <a href="#">Dashboard</a>
    <a href="#">Applications</a>
    <a href="#">Parents</a>
    <a href="#">Gallery</a>
    <a href="#">Contact Messages</a>
    <a href="admin_logout.php">Logout</a>
</div>

<div class="main-content">
    <h1>Welcome, Admin 👋</h1>
    <p>Manage your kindergarten system here.</p>

    <div class="card-container">
        <div class="card">
            <h3>📋 Applications</h3>
            <p>View & manage student applications</p>
        </div>

        <div class="card">
            <h3>👨‍👩‍👧 Parents</h3>
            <p>Manage parent accounts</p>
        </div>

        <div class="card">
            <h3>🖼 Gallery</h3>
            <p>Add or remove images</p>
        </div>

        <div class="card">
            <h3>📩 Messages</h3>
            <p>View contact form messages</p>
        </div>
    </div>
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
