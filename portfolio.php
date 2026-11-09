<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="assets/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio — Klarence Geriz Cabrera</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style (2).css">
</head>
<body>

<?php $currentPage = 'portfolio'; include 'includes/nav.php'; ?>

<section class="portfolio-hero">
  <span class="label">My Work</span>
  <h1>Portfolio</h1>
  <p>A collection of films, edits, and photographs</p>
</section>

<div class="portfolio-filter">
  <button class="filter-btn active" data-filter="all">All</button>
  <button class="filter-btn" data-filter="filmmaking">Filmmaking</button>
  <button class="filter-btn" data-filter="editing">Editing</button>
  <button class="filter-btn" data-filter="photography">Photography</button>
</div>

<?php
$items = [
  ['cat'=>'filmmaking', 'type'=>'video', 'src'=>'assets/HULING SANDALI Film Final Cut.mp4', 'tag'=>'Filmmaking', 'title'=>'Huling Sandali'],
  ['cat'=>'editing', 'type'=>'video', 'src'=>'assets/Sip Up Coffee - Calvario Meycauayan Demo Reel.mp4', 'tag'=>'Editing', 'title'=>'Sip Up Coffee - Calvario Meycauayan | Demo Reel 2026'],
  ['cat'=>'editing', 'type'=>'video', 'src'=>'assets/demo reel.mp4', 'tag'=>'Editing', 'title'=>'Klarence Geriz Cabrera | Demo Reel 2026'],
  ['cat'=>'filmmaking editing', 'type'=>'video', 'src'=>'assets/Cooking Show Final Video.mp4', 'tag'=>'Filmmaking · Editing', 'title'=>'It\'s Cooking Time'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/sunset high.jfif', 'tag'=>'Photography', 'title'=>'Sunset High'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/sea1.jpg', 'tag'=>'Photography', 'title'=>'Sea'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/gate.jpg', 'tag'=>'Photography', 'title'=>'Cape Santiago'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/shore.jpg', 'tag'=>'Photography', 'title'=>'Shore'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/dawn.jfif', 'tag'=>'Photography', 'title'=>'Dawn'],
  ['cat'=>'photography', 'type'=>'img', 'src'=>'assets/lighthouse.jfif', 'tag'=>'Photography', 'title'=>'Lighthouse'],
];
?>
<div class="portfolio-grid">
<?php foreach ($items as $it): ?>
  <div class="port-card" data-cat="<?= htmlspecialchars($it['cat']) ?>" <?= $it['type'] === 'video' ? 'style="cursor:pointer;"' : '' ?>>
<?php if ($it['type'] === 'video'): ?>
    <video src="<?= $it['src'] ?>" muted loop playsinline style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;"></video>
<?php else: ?>
    <img src="<?= $it['src'] ?>" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
<?php endif; ?>
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.85),transparent 60%);"></div>
    <div style="position:absolute;bottom:1.25rem;left:1.25rem;color:white;">
      <span style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:#D4B896;"><?= htmlspecialchars($it['tag']) ?></span>
      <h3 style="color:white;margin-top:0.25rem;font-size:1.1rem;"><?= htmlspecialchars($it['title']) ?></h3>
    </div>
<?php if ($it['type'] === 'video'): ?>
    <div style="position:absolute;top:1rem;right:1rem;background:rgba(0,0,0,0.5);color:#D4B896;font-size:0.7rem;padding:0.3rem 0.6rem;border-radius:20px;letter-spacing:1px;">▶ Click to play</div>
<?php endif; ?>
  </div>
<?php endforeach; ?>
</div>

<!-- Video Modal (may tunog + controls) -->
<div id="videoModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.92);z-index:2000;align-items:center;justify-content:center;">
  <button id="modalClose" aria-label="Close" style="position:absolute;top:1.25rem;right:1.5rem;background:none;border:none;color:#D4B896;font-size:2rem;cursor:pointer;line-height:1;">&times;</button>
  <video id="modalVideo" controls playsinline style="max-width:90%;max-height:85%;border-radius:8px;"></video>
</div>

<?php $footerStyle = 'portfolio'; include 'includes/footer.php'; ?>

<script>
  document.getElementById('hamburger').addEventListener('click', () => {
    document.querySelector('.nav-links').classList.toggle('open');
  });

  // Hover preview (muted)
  document.querySelectorAll('.port-card').forEach(card => {
    const video = card.querySelector('video');
    if (!video) return;
    card.addEventListener('mouseenter', () => video.play());
    card.addEventListener('mouseleave', () => { video.pause(); video.currentTime = 0; });
  });

  // Click = open modal with sound
  const modal = document.getElementById('videoModal');
  const modalVideo = document.getElementById('modalVideo');

  function closeModal() {
    modalVideo.pause();
    modalVideo.removeAttribute('src');
    modalVideo.load();
    modal.style.display = 'none';
  }

  document.querySelectorAll('.port-card').forEach(card => {
    const v = card.querySelector('video');
    if (!v) return;
    card.addEventListener('click', () => {
      v.pause();
      modalVideo.src = v.getAttribute('src');
      modalVideo.muted = false;
      modal.style.display = 'flex';
      modalVideo.play();
    });
  });

  modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.getElementById('modalClose').addEventListener('click', closeModal);
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  // Filter
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      document.querySelectorAll('.port-card').forEach(card => {
        const cats = card.dataset.cat.split(' ');
        const hide = filter !== 'all' && !cats.includes(filter);
        card.style.transition = 'opacity 0.3s, transform 0.3s';
        if (hide) {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.95)';
          setTimeout(() => card.classList.add('hidden'), 300);
        } else {
          card.classList.remove('hidden');
          setTimeout(() => { card.style.opacity = '1'; card.style.transform = ''; }, 10);
        }
      });
    });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.port-card').forEach(el => { el.classList.add('animate'); observer.observe(el); });

  const glow = document.createElement('div');
  glow.style.cssText = 'position:fixed;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(184,149,106,0.06) 0%,transparent 70%);pointer-events:none;z-index:998;transform:translate(-50%,-50%);transition:opacity 0.3s;opacity:0;';
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => { glow.style.left = e.clientX + 'px'; glow.style.top = e.clientY + 'px'; glow.style.opacity = '1'; });
  document.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
</script>

</body>
</html>