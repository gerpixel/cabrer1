<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="assets/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Projects — Klarence Geriz Cabrera</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style (2).css">
</head>
<body>

<?php $currentPage = 'portfolio'; include 'includes/nav.php'; ?>

<section class="portfolio-hero">
  <span class="label">Archive</span>
  <h1>My Projects</h1>
  <p>Photography and filmmaking collection</p>
</section>

<div class="portfolio-grid">

  <div class="port-card" data-cat="photography">
    <img src="assets/sunset high.jfif" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;">Photography</span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;">Sunset High</h3>
    </div>
  </div>

  <div class="port-card" data-cat="photography">
    <img src="assets/sunset3.jfif" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;">Photography</span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;">Sunset III</h3>
    </div>
  </div>

  <div class="port-card" data-cat="filmmaking">
    <video src="assets/HULING SANDALI Film Final Cut.mp4" muted playsinline style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;"></video>
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;">Filmmaking</span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;">Huling Sandali</h3>
    </div>
    <div style="position:absolute;top:1rem;right:1rem;">
      <span style="background:rgba(184,149,106,0.2);border:1px solid rgba(184,149,106,0.4);color:#D4B896;font-size:0.7rem;padding:0.3rem 0.6rem;border-radius:20px;letter-spacing:1px;">Film Festival 2024</span>
    </div>
  </div>

  <div class="port-card" data-cat="photography">
    <img src="assets/lighthouse.jfif" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;">Photography</span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;">Lighthouse</h3>
    </div>
  </div>

  <div class="port-card" data-cat="photography">
    <img src="assets/ocean2.jfif" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;">Photography</span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;">Ocean II</h3>
    </div>
  </div>

</div>

<?php $footerStyle = 'projects'; include 'includes/footer.php'; ?>

<script>
  document.getElementById('hamburger').addEventListener('click', () => {
    document.querySelector('.nav-links').classList.toggle('open');
  });

  document.querySelectorAll('.port-card').forEach(card => {
    const video = card.querySelector('video');
    if (!video) return;
    card.addEventListener('mouseenter', () => video.play());
    card.addEventListener('mouseleave', () => { video.pause(); video.currentTime = 0; });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.port-card').forEach(el => { el.classList.add('animate'); observer.observe(el); });
</script>

</body>
</html>