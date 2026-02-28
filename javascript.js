function openGallery(category) {
    const modal = document.getElementById("galleryModal");
    const container = document.getElementById("modalImages");
    const title = document.getElementById("galleryTitle");

    container.innerHTML = "";

    let images = [];

    if (category === "arts") {
        title.innerText = "Arts & Craft";
        images = ["art-and-crft/a.jpg", "art-and-crft/b.jpg", "art-and-crft/c.jpg", "art-and-crft/d.jpg", "art-and-crft/e.jpg", "art-and-crft/f.jpeg", "art-and-crft/g.jpg", "art-and-crft/h.jpg", "art-and-crft/i.png", "art-and-crft/j.jpg", "art-and-crft/k.jpg", "art-and-crft/l.jpg", "art-and-crft/m.jpg", "art-and-crft/o.jpg", "art-and-crft/p.jpg", "art-and-crft/q.jpeg", "art-and-crft/r.jpeg"];
    }

    if (category === "celebrations") {
        title.innerText = "Celebrations";
        images = ["cele/1.jpg", "cele/2.jpg", "cele/3.jpg", "cele/4.jpg", "cele/5.jpg", "cele/6.jpg", "cele/7.jpg", "cele/8.jpg", "cele/9.jpg", "cele/10.jpg", "cele/11.jpg", "cele/12.jpg", "cele/13.jpg", "cele/14.jpg", "cele/15.jpeg", "cele/16.jpg", "cele/17.jpg", "cele/18.png", "cele/19.jpg", "cele/20.jpg", "cele/21.jpg", "cele/IMG_1208.JPG"];
    }

    if (category === "classrooms") {
        title.innerText = "Happy Classrooms";
        images = ["classroom/1.jpg", "classroom/2.jpg", "classroom/3.jpeg", "classroom/4.jpg", "classroom/5.jpg", "classroom/6.jpg", "classroom/7.jpg", "classroom/9.jpg", "classroom/10.jpg", "classroom/11.jpg", "classroom/12.jpg", "classroom/13.jpg", "classroom/14.jpg", "classroom/16.jpg", "classroom/17.jpg", "classroom/20.jpg", "classroom/21.jpg", "classroom/22.jpg", "classroom/23.jpg"];
    }

    if (category === "dance") {
        title.innerText = "Dance & Music";
        images = ["classroom/1.jpg", "classroom/2.jpg", "classroom/3.jpeg", "classroom/4.jpg", "classroom/5.jpg", "classroom/6.jpg", "classroom/7.jpg", "classroom/9.jpg", "classroom/10.jpg", "classroom/11.jpg", "classroom/12.jpg", "classroom/13.jpg", "classroom/14.jpg", "classroom/16.jpg", "classroom/17.jpg", "classroom/20.jpg", "classroom/21.jpg", "classroom/22.jpg", "classroom/23.jpg","music/00.jpg","music/1.png","music/2.jpeg","music/3.jpg","music/4.jpg","music/5.jpg","music/8.jpg","music/9.jpg","music/10.jpg","music/11.jpg","music/12.jpg","music/55.jpg","music/jj.jpg","music/jk.jpg","music/k.png","music/R.png"];
    }

    if (category === "outdoor") {
        title.innerText = "Outdoor Play";
        images = ["outdoorplay/1.jpg", "outdoorplay/2.jpg", "outdoorplay/3.jpg", "outdoorplay/4.jpg", "outdoorplay/5.jpg", "outdoorplay/6.jpg", "outdoorplay/7.jpg", "outdoorplay/8.png", "outdoorplay/9.jpg", "outdoorplay/10.jpg", "outdoorplay/11.jpg", "outdoorplay/12.jpg", "outdoorplay/13.jpg", "outdoorplay/14.jpg", "outdoorplay/78.jpg"];
    }

    if (category === "story") {
        title.innerText = "Story Time";
        images = ["story-time/a.jpg", "story-time/b.jpg", "story-time/c.jpg", "story-time/d.jpg", "story-time/e.jpg", "story-time/f.jpg", "story-time/g.jpg", "story-time/h.jpg", "story-time/i.jpg", "story-time/k.jpg", "story-time/l.jpg", "story-time/m.png"];
    }

    images.forEach(src => {
        const img = document.createElement("img");
        img.src = src;
        container.appendChild(img);
    });

    modal.style.display = "block";
}