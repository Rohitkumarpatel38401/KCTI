{{-- resources/views/main_site/pages/gallery.blade.php --}}
@extends('main_site.layouts.app')
@section('title', 'Gallery')
@section('meta_desc', 'Kranti Computer Gallery — Events, courses, classroom photos and more.')

@push('styles')
<style>
/* ══════════════════════════════════════
   GALLERY PAGE
══════════════════════════════════════ */

/* ── Filter Tabs ── */
.ms-gal-filter {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: center;
  margin-bottom: 36px;
}
.ms-gal-filter-btn {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 7px 18px;
  border-radius: 50px;
  border: 1.5px solid var(--kc-border);
  background: #fff;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.82rem; font-weight: 600;
  color: var(--kc-text-secondary);
  cursor: pointer;
  transition: all 0.18s;
}
.ms-gal-filter-btn:hover  { border-color: var(--kc-brand); color: var(--kc-brand); background: var(--kc-brand-light); }
.ms-gal-filter-btn.active { background: var(--kc-brand); border-color: var(--kc-brand); color: #fff; box-shadow: 0 4px 12px rgba(79,70,229,0.25); }
.ms-gal-count {
  background: rgba(255,255,255,0.25);
  border-radius: 50px; padding: 1px 6px;
  font-size: 0.68rem; font-weight: 700;
}
.ms-gal-filter-btn:not(.active) .ms-gal-count { background: var(--kc-brand-light); color: var(--kc-brand); }

/* ── Photo Grid ── */
.ms-gal-grid {
  columns: 3;
  column-gap: 16px;
}
.ms-gal-item {
  break-inside: avoid;
  margin-bottom: 16px;
  border-radius: 14px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  display: block;
}
.ms-gal-item[data-hidden="true"] { display: none; }

.ms-gal-img {
  width: 100%;
  display: block;
  transition: transform 0.4s ease;
}
.ms-gal-item:hover .ms-gal-img { transform: scale(1.04); }

/* Overlay */
.ms-gal-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(160deg, rgba(79,70,229,0.82) 0%, rgba(124,58,237,0.88) 100%);
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  gap: 6px; padding: 16px; text-align: center;
  opacity: 0; transition: opacity 0.25s ease;
}
.ms-gal-item:hover .ms-gal-overlay { opacity: 1; }
.ms-gal-overlay-icon  { font-size: 1.6rem; }
.ms-gal-overlay-title { font-size: 0.9rem; font-weight: 800; color: #fff; line-height: 1.3; }
.ms-gal-overlay-cat   {
  font-size: 0.68rem; font-weight: 700; padding: 3px 10px;
  border-radius: 50px; background: rgba(255,255,255,0.2);
  color: rgba(255,255,255,0.9); letter-spacing: 0.04em;
  text-transform: uppercase;
}

/* Placeholder item */
.ms-gal-placeholder-item {
  width: 100%; background: var(--kc-brand-light);
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  gap: 8px; color: var(--kc-brand);
  font-size: 2rem; font-weight: 800;
  border-radius: 14px;
}
.ms-gal-placeholder-item span { font-size: 0.78rem; font-weight: 600; color: var(--kc-text-secondary); }

/* ── Lightbox ── */
.ms-gal-lightbox {
  position: fixed; inset: 0;
  background: rgba(10,8,30,0.95);
  backdrop-filter: blur(8px);
  z-index: 9000;
  display: flex; align-items: center; justify-content: center;
  padding: 20px;
  opacity: 0; visibility: hidden;
  transition: opacity 0.25s ease, visibility 0.25s;
}
.ms-gal-lightbox.open { opacity: 1; visibility: visible; }

.ms-gal-lb-inner {
  position: relative;
  max-width: 900px; width: 100%;
  transform: scale(0.92);
  transition: transform 0.28s cubic-bezier(0.34,1.3,0.64,1);
}
.ms-gal-lightbox.open .ms-gal-lb-inner { transform: scale(1); }

.ms-gal-lb-img {
  width: 100%; max-height: 80vh;
  object-fit: contain; display: block;
  border-radius: 16px;
  box-shadow: 0 24px 80px rgba(0,0,0,0.6);
}

.ms-gal-lb-info {
  padding: 16px 4px 0;
  display: flex; align-items: center; justify-content: space-between; gap: 12px;
}
.ms-gal-lb-title { font-size: 1rem; font-weight: 700; color: #fff; }
.ms-gal-lb-cat   {
  font-size: 0.72rem; font-weight: 700; padding: 4px 12px;
  border-radius: 50px; background: rgba(255,255,255,0.12);
  color: #a5b4fc; border: 1px solid rgba(255,255,255,0.15);
}

/* Close btn */
.ms-gal-lb-close {
  position: absolute; top: -14px; right: -14px;
  width: 38px; height: 38px; border-radius: 50%;
  background: #fff; color: var(--kc-brand);
  border: none; font-size: 1rem; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 16px rgba(0,0,0,0.3);
  transition: background 0.18s, transform 0.18s;
  z-index: 1;
}
.ms-gal-lb-close:hover { background: #f43f5e; color: #fff; transform: scale(1.1); }

/* Prev / Next */
.ms-gal-lb-prev,
.ms-gal-lb-next {
  position: fixed; top: 50%; transform: translateY(-50%);
  width: 44px; height: 44px; border-radius: 50%;
  background: rgba(255,255,255,0.1); border: 1.5px solid rgba(255,255,255,0.2);
  color: #fff; font-size: 1.1rem; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: background 0.18s; z-index: 1;
}
.ms-gal-lb-prev { left: 16px; }
.ms-gal-lb-next { right: 16px; }
.ms-gal-lb-prev:hover,
.ms-gal-lb-next:hover { background: var(--kc-brand); border-color: var(--kc-brand); }

/* Empty state */
.ms-gal-empty {
  text-align: center; padding: 60px 20px;
  grid-column: 1 / -1;
}
.ms-gal-empty-icon  { font-size: 3rem; margin-bottom: 12px; }
.ms-gal-empty-title { font-size: 1rem; font-weight: 700; color: var(--kc-text-primary); margin-bottom: 6px; }
.ms-gal-empty-sub   { font-size: 0.85rem; color: var(--kc-text-muted); }

/* Responsive */
@media (max-width: 768px) { .ms-gal-grid { columns: 2; } }
@media (max-width: 480px) { .ms-gal-grid { columns: 1; } }
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">📸 Campus Life</div>
      <h1 class="ms-page-hero-title">Our <span>Gallery</span></h1>
      <p class="ms-page-hero-sub">
        A glimpse into life at Kranti Computer — events, course launches,
        classroom moments and student achievements.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">🎉 Events</span>
        <span class="ms-page-hero-badge">🖥️ Classroom</span>
        <span class="ms-page-hero-badge">📜 Course Launches</span>
      </div>
    </div>
    <div class="ms-page-hero-media">
      {{-- <img src="{{ asset('images/gallery-hero.png') }}" alt="Gallery" class="ms-page-hero-img"> --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">📸</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">📷 Photos</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── GALLERY ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">

    {{-- Filter Tabs --}}
    <div class="ms-gal-filter" id="msGalFilter">
      <button class="ms-gal-filter-btn active" data-cat="all">
        🗂️ All <span class="ms-gal-count" id="countAll">0</span>
      </button>
      <button class="ms-gal-filter-btn" data-cat="event">
        🎉 Events <span class="ms-gal-count" id="countEvent">0</span>
      </button>
      <button class="ms-gal-filter-btn" data-cat="course">
        📜 Course Launch <span class="ms-gal-count" id="countCourse">0</span>
      </button>
      <button class="ms-gal-filter-btn" data-cat="classroom">
        🖥️ Classroom <span class="ms-gal-count" id="countClassroom">0</span>
      </button>
      <button class="ms-gal-filter-btn" data-cat="students">
        🎓 Students <span class="ms-gal-count" id="countStudents">0</span>
      </button>
      <button class="ms-gal-filter-btn" data-cat="other">
        📌 Other <span class="ms-gal-count" id="countOther">0</span>
      </button>
    </div>

    {{-- Grid --}}
    <div class="ms-gal-grid" id="msGalGrid">

      {{-- ══ ADD PHOTOS YAHAN ══
           Jab bhi photo add karni ho:
           1. Image public/images/gallery/ mein rakho
           2. Neeche wala ek block copy karo
           3. data-cat change karo: event | course | classroom | students | other
           4. data-title aur data-date fill karo
      ══════════════════════════ --}}

      {{-- Example items — real photos aane pe replace karo --}}
      <div class="ms-gal-item"
           data-cat="event"
           data-title="Institute Launch Ceremony"
           data-date="March 2025">
        {{-- Real image: <img src="{{ asset('images/gallery/launch.jpg') }}" alt="Launch" class="ms-gal-img"> --}}
        <div class="ms-gal-placeholder-item" style="height: 220px;">
          🎉<span>Institute Launch</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">Institute Launch Ceremony</div>
          <div class="ms-gal-overlay-cat">Event</div>
        </div>
      </div>

      <div class="ms-gal-item"
           data-cat="course"
           data-title="DCA Course Launch"
           data-date="March 2025">
        <div class="ms-gal-placeholder-item" style="height: 300px;">
          📜<span>DCA Course Launch</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">DCA Course Launch</div>
          <div class="ms-gal-overlay-cat">Course Launch</div>
        </div>
      </div>

      <div class="ms-gal-item"
           data-cat="classroom"
           data-title="Computer Lab"
           data-date="April 2025">
        <div class="ms-gal-placeholder-item" style="height: 200px;">
          🖥️<span>Computer Lab</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">Computer Lab</div>
          <div class="ms-gal-overlay-cat">Classroom</div>
        </div>
      </div>

      <div class="ms-gal-item"
           data-cat="students"
           data-title="First Batch Students"
           data-date="April 2025">
        <div class="ms-gal-placeholder-item" style="height: 260px;">
          🎓<span>First Batch</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">First Batch Students</div>
          <div class="ms-gal-overlay-cat">Students</div>
        </div>
      </div>

      <div class="ms-gal-item"
           data-cat="course"
           data-title="Tally Prime Batch Start"
           data-date="April 2025">
        <div class="ms-gal-placeholder-item" style="height: 180px;">
          📊<span>Tally Prime Batch</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">Tally Prime Batch Start</div>
          <div class="ms-gal-overlay-cat">Course Launch</div>
        </div>
      </div>

      <div class="ms-gal-item"
           data-cat="classroom"
           data-title="Practical Session"
           data-date="April 2025">
        <div class="ms-gal-placeholder-item" style="height: 240px;">
          💻<span>Practical Session</span>
        </div>
        <div class="ms-gal-overlay">
          <div class="ms-gal-overlay-icon">🔍</div>
          <div class="ms-gal-overlay-title">Practical Session</div>
          <div class="ms-gal-overlay-cat">Classroom</div>
        </div>
      </div>

    </div>

  </div>
</section>

{{-- ── LIGHTBOX ── --}}
<div class="ms-gal-lightbox" id="msGalLightbox">
  <button class="ms-gal-lb-prev" id="msGalPrev">&#8249;</button>
  <button class="ms-gal-lb-next" id="msGalNext">&#8250;</button>
  <div class="ms-gal-lb-inner">
    <button class="ms-gal-lb-close" id="msGalClose">✕</button>
    <img src="" alt="" class="ms-gal-lb-img" id="msGalLbImg">
    <div class="ms-gal-lb-info">
      <div>
        <div class="ms-gal-lb-title" id="msGalLbTitle"></div>
        <div style="font-size:0.72rem; color:rgba(255,255,255,0.45); margin-top:3px;" id="msGalLbDate"></div>
      </div>
      <span class="ms-gal-lb-cat" id="msGalLbCat"></span>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  const grid      = document.getElementById('msGalGrid');
  const lightbox  = document.getElementById('msGalLightbox');
  const lbImg     = document.getElementById('msGalLbImg');
  const lbTitle   = document.getElementById('msGalLbTitle');
  const lbDate    = document.getElementById('msGalLbDate');
  const lbCat     = document.getElementById('msGalLbCat');
  const btnClose  = document.getElementById('msGalClose');
  const btnPrev   = document.getElementById('msGalPrev');
  const btnNext   = document.getElementById('msGalNext');

  let allItems    = [];
  let visibleItems = [];
  let currentIdx  = 0;

  // ── Build items array ──
  function buildItems() {
    allItems = Array.from(grid.querySelectorAll('.ms-gal-item'));
  }

  // ── Count badges ──
  function updateCounts() {
    const cats = ['event', 'course', 'classroom', 'students', 'other'];
    const countAll = document.getElementById('countAll');
    if (countAll) countAll.textContent = allItems.length;
    cats.forEach(cat => {
      const el = document.getElementById('count' + cat.charAt(0).toUpperCase() + cat.slice(1));
      if (el) el.textContent = allItems.filter(i => i.dataset.cat === cat).length;
    });
  }

  // ── Filter ──
  const filterBtns = document.querySelectorAll('.ms-gal-filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const cat = this.dataset.cat;
      allItems.forEach(item => {
        item.dataset.hidden = (cat !== 'all' && item.dataset.cat !== cat) ? 'true' : 'false';
      });
      updateVisible();
    });
  });

  function updateVisible() {
    visibleItems = allItems.filter(i => i.dataset.hidden !== 'true');
  }

  // ── Lightbox open ──
  allItems.forEach((item, idx) => {
    item.addEventListener('click', function () {
      currentIdx = visibleItems.indexOf(item);
      if (currentIdx === -1) return;
      openLightbox(visibleItems[currentIdx]);
    });
  });

  function openLightbox(item) {
    const img  = item.querySelector('.ms-gal-img');
    const ph   = item.querySelector('.ms-gal-placeholder-item');
    lbImg.src  = img ? img.src : '';
    lbImg.style.display = img ? 'block' : 'none';
    lbTitle.textContent = item.dataset.title || '';
    lbDate.textContent  = item.dataset.date  || '';
    lbCat.textContent   = item.dataset.cat   || '';

    // If placeholder — show emoji
    if (!img && ph) {
      lbImg.style.display = 'none';
      lbTitle.textContent = item.dataset.title || '';
    }

    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
    lbImg.src = '';
  }

  btnClose.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', function (e) {
    if (e.target === lightbox) closeLightbox();
  });

  // ── Prev / Next ──
  btnPrev.addEventListener('click', function (e) {
    e.stopPropagation();
    currentIdx = (currentIdx - 1 + visibleItems.length) % visibleItems.length;
    openLightbox(visibleItems[currentIdx]);
  });
  btnNext.addEventListener('click', function (e) {
    e.stopPropagation();
    currentIdx = (currentIdx + 1) % visibleItems.length;
    openLightbox(visibleItems[currentIdx]);
  });

  // Keyboard
  document.addEventListener('keydown', function (e) {
    if (!lightbox.classList.contains('open')) return;
    if (e.key === 'Escape')     closeLightbox();
    if (e.key === 'ArrowLeft')  btnPrev.click();
    if (e.key === 'ArrowRight') btnNext.click();
  });

  // ── Init ──
  buildItems();
  updateCounts();
  updateVisible();

});
</script>
@endpush