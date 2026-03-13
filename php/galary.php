<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gallery — HappyBuds</title>
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
	<section class="gallery-hero">
    <h1>Our Gallery</h1>
    <p>Explore our beautiful memories</p>
</section>


<section class="gallery-cards">

    <div class="category-card" onclick="openGallery('arts')">
		<img src="art-and-crft/f.jpeg"  alt="art">
        <h3>Arts & Craft</h3>
    </div>

    <div class="category-card" onclick="openGallery('celebrations')">
     <img src="cele/19.jpg" alt="">
		<h3>Celebrations</h3>
    </div>

    <div class="category-card" onclick="openGallery('classrooms')">
        <img src="classroom/9.jpg" alt="">
		<h3>Happy Classrooms</h3>
    </div>

    <div class="category-card" onclick="openGallery('dance')">
        <img src="dance/g.jpg" alt="">
		<h3>Dance & Music</h3>
    </div>

    <div class="category-card" onclick="openGallery('outdoor')">
        <img src="outdoorplay/5.jpg" alt="">
		<h3>Outdoor Play</h3>
    </div>

    <div class="category-card" onclick="openGallery('story')">
		<img src="story-time/m.png" alt="">
        <h3>Story Time</h3>
    </div>

</section>
<div id="galleryModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeGallery()">×</span>
    <h2 id="galleryTitle"></h2>
    <div id="modalImages" class="modal-images"></div>
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

	// Close menu when a link is clicked
	document.querySelectorAll('.nav-items a').forEach(link => {
		link.addEventListener('click', () => {
			navItems.classList.remove('active');
			hamburger.classList.remove('active');
			hamburger.setAttribute('aria-expanded','false');
		});
	});
	function closeGallery() {
    document.getElementById("galleryModal").style.display = "none";
}
const modal = document.getElementById("galleryModal");

window.onclick = function(event) {
  if (event.target === modal) {
    closeGallery();
  }
}
const loginBtn = document.querySelector('.login-btn-nav');
const dropdown = document.querySelector('.dropdown-content');

loginBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    dropdown.classList.toggle('show');
});

window.addEventListener('click', function() {
    dropdown.classList.remove('show');
});
function openGallery(category) {
    const modal = document.getElementById("galleryModal");
    const container = document.getElementById("modalImages");
    const title = document.getElementById("galleryTitle");

    container.innerHTML = "";

    let images = [];

    if (category === "arts") {
        title.innerText = "Arts & Craft";
        images = [
            "/art-and-crft/a.jpg", 
            "/art-and-crft/b.jpg", 
            "/art-and-crft/c.jpg", 
            "/art-and-crft/d.jpg", 
            "/art-and-crft/e.jpg", 
            "/art-and-crft/f.jpeg", 
            "/art-and-crft/g.jpg", 
            "/art-and-crft/h.jpg", 
            "/art-and-crft/i.png", 
            "/art-and-crft/j.jpg", 
            "/art-and-crft/k.jpg", 
            "/art-and-crft/l.jpg", 
            "/art-and-crft/m.jpg", 
            "/art-and-crft/o.jpg", 
            "/art-and-crft/p.jpg", 
            "/art-and-crft/q.jpeg", 
            "/art-and-crft/r.jpeg"
    ];
    }

    if (category === "celebrations") {
        title.innerText = "Celebrations";
        images = ["/cele/1.jpg",
            "/cele/2.jpg", 
            "/cele/3.jpg",
            "/cele/4.jpg",
            "/cele/5.jpg",
            "/cele/6.jpg",
            "/cele/7.jpg",
            "/cele/8.jpg",
            "/cele/9.jpg",
            "/cele/10.jpg",
            "/cele/11.jpg",
            "/cele/12.jpg",
            "/cele/13.jpg",
            "/cele/14.jpg",
            "/cele/15.jpeg",
            "/cele/16.jpg",
            "/cele/17.jpg",
            "/cele/18.png",
            "/cele/19.jpg",
            "/cele/20.jpg",
            "/cele/21.jpg",
            "/cele/IMG_1208.JPG"
        ];
    }

    if (category === "classrooms") {
        title.innerText = "Happy Classrooms";
        images = [
            "/classroom/1.jpg",
            "/classroom/2.jpg",
            "/classroom/3.jpeg",
            "/classroom/4.jpg",
            "/classroom/5.jpg", 
            "/classroom/6.jpg", 
            "/classroom/7.jpg", 
            "/classroom/9.jpg", 
            "/classroom/10.jpg", 
            "/classroom/11.jpg", 
            "/classroom/12.jpg", 
            "/classroom/13.jpg", 
            "/classroom/14.jpg", 
            "/classroom/16.jpg", 
            "/classroom/17.jpg", 
            "/classroom/20.jpg", 
            "/classroom/21.jpg", 
            "/classroom/22.jpg", 
            "/classroom/23.jpg"
        ];
    }

    if (category === "dance") {
        title.innerText = "Dance & Music";
        images = [
            "/classroom/1.jpg", 
            "/classroom/2.jpg", 
            "/classroom/3.jpeg", 
            "/classroom/4.jpg", 
            "/classroom/5.jpg", 
            "/classroom/6.jpg", 
            "/classroom/7.jpg", 
            "/classroom/9.jpg", 
            "/classroom/10.jpg", 
            "/classroom/11.jpg", 
            "/classroom/12.jpg", 
            "/classroom/13.jpg", 
            "/classroom/14.jpg", 
            "/classroom/16.jpg", 
            "/classroom/17.jpg", 
            "/classroom/20.jpg", 
            "/classroom/21.jpg", 
            "/classroom/22.jpg", 
            "/classroom/23.jpg",
            "/music/00.jpg",
            "/music/1.png",
            "/music/2.jpeg",
            "/music/3.jpg",
            "/music/4.jpg",
            "/music/5.jpg",
            "/music/8.jpg",
            "/music/9.jpg",
            "/music/10.jpg",
            "/music/11.jpg",
            "/music/12.jpg",
            "/music/55.jpg",
            "/music/jj.jpg",
            "/music/jk.jpg",
            "/music/k.png",
            "/music/R.png"
        ];
    }

    if (category === "outdoor") {
        title.innerText = "Outdoor Play";
        images = [
            "/outdoorplay/1.jpg",
            "/outdoorplay/2.jpg",
            "/outdoorplay/3.jpg", 
            "/outdoorplay/4.jpg", 
            "/outdoorplay/5.jpg", 
            "/outdoorplay/6.jpg", 
            "/outdoorplay/7.jpg", 
            "/outdoorplay/8.png", 
            "/outdoorplay/9.jpg", 
            "/outdoorplay/10.jpg", 
            "/outdoorplay/11.jpg", 
            "/outdoorplay/12.jpg", 
            "/outdoorplay/13.jpg", 
            "/outdoorplay/14.jpg", 
            "/outdoorplay/78.jpg"
        ];
    
    }

    if (category === "story") {
        title.innerText = "Story Time";
        images = [
            "/story-time/a.jpg", 
            "/story-time/b.jpg", 
            "/story-time/c.jpg", 
            "/story-time/d.jpg", 
            "/story-time/e.jpg", 
            "/story-time/f.jpg", 
            "/story-time/g.jpg", 
            "/story-time/h.jpg", 
            "/story-time/i.jpg", 
            "/story-time/k.jpg", 
            "/story-time/l.jpg", 
            "/story-time/m.png"
        ];
    }

    images.forEach(function(img){
    const image = document.createElement("img");
    const src = img.startsWith("/") ? img.slice(1) : img;
    image.src = src;
    container.appendChild(image);
    console.log(src);
    });

    modal.style.display = "block";
}

</script>
</body>
</html>
