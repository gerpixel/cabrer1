<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About — Klarence Geriz</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style (2).css">
</head>
<body>

<?php $currentPage = 'about'; include 'includes/nav.php'; ?>

<section class="about-page">
  <div class="about-page-inner">

    <div class="about-img-wrap">
      <img src="assets/me.jpg" alt="Klarence Geriz">
    </div>

    <div class="about-content">
      <span class="label">About Me</span>
      <h1>Klarence Geriz D.<em> Cabrera</h1>
      <p class="hero-tag">IT Student · Filmmaker · Photographer</p>

      <p>I am currently pursuing a Bachelor of Science in Information Technology at Pamantasan ng Lungsod ng Valenzuela, where I am developing my skills in technology, design, and problem-solving.</p>

      <p>Beyond academics, I have a strong passion for photography and filmmaking. I enjoy capturing moments and transforming them into visual stories with a cinematic and dreamy aesthetic.</p>

      <p>By combining my technical knowledge with my creative interests, I aim to create meaningful and engaging digital experiences through both technology and visual storytelling.</p>

      <p><strong style="color:var(--accent-light);">Interests:</strong> Editing · Photography · Filmmaking</p>

      <div class="edu-list">
        <span class="label" style="margin-top:2rem;">Education & Experience</span>
        <div class="edu-item">
          <span class="edu-year">2011 – 2016</span>
          <div class="edu-detail">
            <h4>Luis Francisco Elementary School</h4>
            <p>Elementary Education</p>
          </div>
        </div>
        <div class="edu-item">
          <span class="edu-year">2017 – 2023</span>
          <div class="edu-detail">
            <h4>Emmaus Christian School, Inc.</h4>
            <p>Junior & Senior High School</p>
          </div>
        </div>
        <div class="edu-item">
          <span class="edu-year">2024 – Present</span>
          <div class="edu-detail">
            <h4>Pamantasan ng Lungsod ng Valenzuela</h4>
            <p>BS Information Technology</p>
          </div>
        </div>
        <div class="edu-item">
          <span class="edu-year">Skills</span>
          <div class="edu-detail">
            <h4>Creative Skills</h4>
            <p>Basic-Intermediate Editing · Photography · Videography · Filmmaking</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<?php $footerStyle = 'default'; include 'includes/footer.php'; ?>

<script>
  document.getElementById('hamburger').addEventListener('click', () => {
    document.querySelector('.nav-links').classList.toggle('open');
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.edu-item, .stat-box').forEach(el => { el.classList.add('animate'); observer.observe(el); });

  // Form submit feedback
  document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    btn.textContent = 'Sent ✓';
    btn.style.background = 'rgba(184,149,106,0.3)';
    btn.style.color = '#D4B896';
    btn.style.borderColor = 'rgba(184,149,106,0.4)';
    setTimeout(() => { btn.textContent = 'Send Message'; btn.style = ''; }, 3000);
  });

  // Cursor glow
  const glow = document.createElement('div');
  glow.style.cssText = 'position:fixed;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(184,149,106,0.06) 0%,transparent 70%);pointer-events:none;z-index:998;transform:translate(-50%,-50%);transition:opacity 0.3s;opacity:0;';
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => { glow.style.left = e.clientX + 'px'; glow.style.top = e.clientY + 'px'; glow.style.opacity = '1'; });
  document.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
</script>

</body>
</html>