<?php
session_start();
$conn = new mysqli("localhost", "root", "", "happybuds");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM parent_users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['parent_id'] = $id;
            $_SESSION['parent_email'] = $email;

            header("Location: parent_dashboard.php");
            exit();
        } else {
            $error = "Invalid Password!";
        }
    } else {
        $error = "Email not found!";
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login — HappyBuds</title>
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
<?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
<section class="login-section">
    <div class="login-container">

        <h2>Parent Login</h2>
        <p>Access your child’s dashboard</p>

        <form action="parent.php" method="post">
            <div class="input-group">
                <label>Email</label>
                <input type="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" placeholder="Enter your password" required>
            </div>

            <div class="login-options">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

    </div>
</section>

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

	// Close menu when a link is clicked
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

