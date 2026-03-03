<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About — HappyBuds</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<header>
		<div class="nav-bar">
			 <div class="logo"> <a href="index.html" class="logo-text">
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
				<a href="about.html">About</a>
                <a href="program.html">Program</a>
                <a href="galary.html">Galary</a>
                <a href="contact.html">Contact</a>
                <a href="application.html"><button>Enroll</button></a>
                <div class="login-dropdown">
                <button class="login-btn-nav">Login ▾</button>
                <div class="dropdown-content">
                <a href="adm_login.html">Admin Login</a>
                <a href="prnt_login.html">Parent Login</a>
                </div>
                </div>
            </nav>
        </div>
		</header>
		<!-- HERO SECTION -->
<section class="about-hero">
    <h1>Nurturing Young Minds for a Bright Future</h1>
    <p>We provide a safe, joyful, and inspiring environment where children grow, learn, and explore.</p>
</section>

<!-- OUR STORY -->
<section class="about-story">
    <div class="story-container">
        <div class="story-image">
            <img src="log/school.png" alt="School Image">
        </div>
        <div class="story-text">
            <h2>Our Story</h2>
            <p>
                Founded in 2015, our kindergarten focuses on play-based learning 
                and holistic child development. We believe every child is unique 
                and deserves a caring and creative environment to grow.
            </p>
            <p>
                Our experienced teachers guide children through engaging activities 
                that develop confidence, communication, and curiosity.
            </p>
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section class="mission-vision">
    <div class="mv-card">
        <h3>Our Mission</h3>
        <p>
            To provide quality early childhood education in a safe and 
            nurturing environment.
        </p>
    </div>

    <div class="mv-card">
        <h3>Our Vision</h3>
        <p>
            To shape confident, creative, and responsible young learners 
            prepared for future success.
        </p>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="why-us">
    <h2>Why Choose Us?</h2>
    <div class="why-container">
        <div class="why-card">
            <h4>Experienced Teachers</h4>
            <p>Qualified and caring educators.</p>
        </div>

        <div class="why-card">
            <h4>Safe Campus</h4>
            <p>Secure and child-friendly environment.</p>
        </div>

        <div class="why-card">
            <h4>Activity-Based Learning</h4>
            <p>Fun and engaging learning methods.</p>
        </div>

        <div class="why-card">
            <h4>Parent Communication</h4>
            <p>Regular updates and meetings.</p>
        </div>
    </div>
</section>

<!-- PRINCIPAL SECTION -->
<section class="principal">
    <div class="principal-container">
        <div class="principal-image">
            <img src="https://img.freepik.com/premium-photo/indian-male-teacher-teaching-classroom_601128-13288.jpg" alt="Principal">
        </div>
        <div class="principal-text">
            <h2>Message from the Principal</h2>
            <p>
                "We are committed to creating a supportive and inspiring 
                environment where every child feels valued and encouraged 
                to reach their full potential."
            </p>
            <h4>- Mr.Vishnu</h4>
        </div>
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
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="program.html">Programs</a></li>
					<li><a href="galary.html">Gallery</a></li>
					<li><a href="contact.html">Contact</a></li>
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
			hamburger.setAttribute('aria-expanded', 'false');
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
