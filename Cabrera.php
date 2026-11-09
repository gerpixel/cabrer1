<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="assets/logo.png" />

  <title>Klarence Geriz Cabrera — Portfolio</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style (2).css">
</head>
<body>

<?php $currentPage = 'home'; include 'includes/nav.php'; ?>

<section class="hero">
  <div class="hero-inner">
    <p class="hero-tag">IT Student · Filmmaker · Photographer</p>
    <h1 class="hero-title">Klarence<br>Geriz D.<em> Cabrera</em></h1>
    <p class="hero-sub">Creating visual stories with a cinematic and dreamy aesthetic, where technology meets creativity.</p>
    <div class="hero-cta">
      <a href="portfolio.php" class="btn-primary">View Work</a>
      <a href="contact_about.php" class="btn-ghost">About Me</a>
    </div>
  </div>
  <div class="hero-scroll">scroll ↓</div>
</section>

<section class="featured">
  <div class="section-header">
    <span class="label">Selected Work</span>
    <h2>Featured <em>Projects</em></h2>
  </div>
  <div class="featured-grid">
    <div class="feat-card large">
      <div class="feat-card-media">
        <video src="assets/HULING SANDALI Film Final Cut.mp4" muted loop playsinline></video>
        <div class="feat-card-overlay"></div>
      </div>
      <div class="feat-card-info">
        <span class="feat-tag">Filmmaking</span>
        <h3>Huling Sandali</h3>
        <p>Emmaus Christian School, Inc. Film Festival 2024 — Final Cut<br>Best in Cinematography, and Sound Effects</p>
      </div>
    </div>
    <div class="feat-card">
      <div class="feat-card-media">
        <video src="assets/demo reel.mp4" muted loop playsinline></video>
        <div class="feat-card-overlay"></div>
      </div>
      <div class="feat-card-info">
        <span class="feat-tag">Editing</span>
        <h3>Demo Reel</h3>
        <p>2026 Showreel</p>
      </div>
    </div>
    <div class="feat-card">
      <div class="feat-card-media">
        <video src="assets/Cooking Show Final Video.mp4" muted loop playsinline></video>
        <div class="feat-card-overlay"></div>
      </div>
      <div class="feat-card-info">
        <span class="feat-tag">Filmmaking</span>
        <h3>It's Cooking Time</h3>
        <p>Film Festival 2024</p>
      </div>
    </div>
  </div>
</section>

<section class="skills-section">
  <div class="skills-inner">
    <div class="skills-text">
      <span class="label">What I Do</span>
      <h2>Skills &amp; <em>Expertise</em></h2>
      <p>Combining technical knowledge with creative passion to build meaningful digital and visual experiences.</p>
      <a href="portfolio.php" class="btn-primary">See All Work</a>
    </div>
    <div class="skills-list">
      <div class="skill-item">
        <span class="skill-num">01</span>
        <div>
          <h4>Editing</h4>
          <p>Video editing with cinematic and dreamy aesthetics</p>
        </div>
      </div>
      <div class="skill-item">
        <span class="skill-num">02</span>
        <div>
          <h4>Photography</h4>
          <p>Capturing moments with artistic composition</p>
        </div>
      </div>
      <div class="skill-item">
        <span class="skill-num">03</span>
        <div>
          <h4>Filmmaking</h4>
          <p>Telling stories through film and visual narrative</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-strip">
  <div class="about-strip-inner">
    <div class="about-strip-text">
      <span class="label">About</span>
      <h2>Hello, I'm <em>Klarence.</em></h2>
      <p>I'm a Information Technology student from Pamantasan ng Lungsod ng Valenzuela with a deep love for filmmaking and photography. I create visual stories that feel cinematic and dreamy.</p>
      <a href="contact_about.php" class="btn-ghost">Learn More →</a>
    </div>
    <div class="about-strip-stats">
      <div class="stat-box">
        <span class="stat-num">3</span>
        <span class="stat-label">Years Creating</span>
      </div>
      <div class="stat-box">
        <span class="stat-num">5</span>
        <span class="stat-label">Projects Done</span>
      </div>
      <div class="stat-box">
        <span class="stat-num">3</span>
        <span class="stat-label">Core Skills</span>
      </div>
    </div>
  </div>
</section>

<?php $footerStyle = 'default'; include 'includes/footer.php'; ?>

<script>
  document.getElementById('hamburger').addEventListener('click', () => {
    document.querySelector('.nav-links').classList.toggle('open');
  });

  document.querySelectorAll('.feat-card').forEach(card => {
    const video = card.querySelector('video');
    if (!video) return;
    card.addEventListener('mouseenter', () => video.play());
    card.addEventListener('mouseleave', () => { video.pause(); video.currentTime = 0; });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });

  document.querySelectorAll('.feat-card, .skill-item, .stat-box, .about-strip-text').forEach(el => {
    el.classList.add('animate');
    observer.observe(el);
  });

  // Demo Reel controls
  


  const glow = document.createElement('div');
  glow.style.cssText = 'position:fixed;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(184,149,106,0.06) 0%,transparent 70%);pointer-events:none;z-index:998;transform:translate(-50%,-50%);transition:opacity 0.3s;opacity:0;';
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => {
    glow.style.left = e.clientX + 'px';
    glow.style.top = e.clientY + 'px';
    glow.style.opacity = '1';
  });
  document.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
</script>

</body>
</html>