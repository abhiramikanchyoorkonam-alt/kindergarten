<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Parent — HappyBuds</title>
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
				<a href="logout.php">
				<button style="background:#e74c3c;color:white;">Logout</button>
				</a>
			</nav>
		</div>
	</header>

	<main class="page-content">
		<section class="hero">
			<div class="hero-text">
				<h2>For Parents</h2>
				<p>Information and resources for families at HappyBuds.</p>
			</div>
			<div class="hero-img">
				<img src="../log/logo_home.png" alt="logo">
			</div>
		</section>
	</main>

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
