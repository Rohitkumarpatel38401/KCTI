{{-- resources/views/main_site/pages/courses.blade.php --}}
@extends('main_site.layouts.app')

@section('title', 'Courses')
@section('meta_desc', 'Kranti Computer ke sab courses — DCA, ADCA, Tally, MS Office, Web Design aur bahut kuch.')

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">

    {{-- Left — Text --}}
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">📚 What We Offer</div>
      <h1 class="ms-page-hero-title">
        Our <span>Courses</span>
      </h1>
      <p class="ms-page-hero-sub">
        Job-oriented, government-recognized computer courses.
        Choose the right course for your career goals.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">🎓 Government Recognized</span>
        <span class="ms-page-hero-badge">💼 Job Oriented</span>
        <span class="ms-page-hero-badge">📜 Certified</span>
      </div>
    </div>

    {{-- Right — Image / Placeholder --}}
    <div class="ms-page-hero-media">
      {{-- Real image: --}}
      {{-- <img src="{{ asset('images/courses-hero.png') }}" alt="Our Courses" class="ms-page-hero-img"> --}}

      {{-- Placeholder --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">💻</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">🎓 Certified</div>
        </div>
      </div>
    </div>

  </div>
</section>

  {{-- ── COURSES SECTION ── --}}
  <section class="ms-section ms-section--white">
    <div class="kc-container">

      {{-- Filter Tabs --}}
      <div class="ms-filter-bar" id="msCourseFilterBar">
        <button class="ms-filter-btn active" data-filter="all">
          All Courses <span class="ms-filter-count">{{ count($courses) }}</span>
        </button>
        @foreach($categories as $cat)
          <button class="ms-filter-btn" data-filter="{{ $cat['slug'] }}">
            {{ $cat['label'] }}
            <span class="ms-filter-count">{{ $cat['count'] }}</span>
          </button>
        @endforeach
      </div>

      {{-- Course Cards Grid --}}
      <div class="ms-grid-3" id="msCourseGrid">
        @foreach($courses as $course)
          <div class="ms-course-card"
               data-category="{{ $course['category'] }}"
               data-hidden="false">

            <div class="ms-course-card-top">
              <span class="ms-course-badge ms-course-badge--{{ $course['badge'] }}">
                {{ ucfirst($course['badge']) }}
              </span>
              <div class="ms-course-title">{{ $course['name'] }}</div>
              <div class="ms-course-desc">{{ $course['short_desc'] }}</div>
              <div class="ms-course-tags">
                @foreach($course['tags'] as $tag)
                  <span class="ms-course-tag">{{ $tag }}</span>
                @endforeach
              </div>
            </div>

            <div class="ms-course-card-bottom">
              <div>
                <div class="ms-course-meta">⏱ {{ $course['duration'] }}</div>
                <div class="ms-course-meta" style="margin-top:3px;">🎓 {{ $course['eligibility'] }}</div>
              </div>
              <button
                class="kc-btn kc-btn-outline-indigo ms-syllabus-btn"
                style="height:36px; padding:0 16px; font-size:0.8rem; flex-shrink:0;"
                data-course="{{ $course['name'] }}"
                data-duration="{{ $course['duration'] }}"
                data-eligibility="{{ $course['eligibility'] }}"
                data-fee="{{ $course['fee'] }}"
                data-desc="{{ $course['full_desc'] }}"
                data-syllabus="{{ json_encode($course['syllabus']) }}"
              >
                Syllabus
              </button>
            </div>

          </div>
        @endforeach
      </div>

      {{-- No results --}}
      <div id="msNoResults" style="display:none; text-align:center; padding:60px 0;">
        <div style="font-size:2.5rem; margin-bottom:12px;">🔍</div>
        <p style="color:var(--kc-text-muted); font-weight:600;">Is category mein koi course nahi mila.</p>
      </div>

    </div>
  </section>

  {{-- ── CTA ── --}}
  <section class="ms-section ms-section--dark">
    <div class="kc-container ms-text-center">
      <h2 class="ms-section-title" style="color:#fff; margin-bottom:12px;">Course pasand aa gaya?</h2>
      <p style="color:#a5b4fc; margin-bottom:28px; max-width:460px; margin-inline:auto; line-height:1.65;">
        Aaj hi admission lo aur apni IT journey shuru karo.
      </p>
      <a href="{{ route('main.students.registration') }}" class="kc-btn kc-btn-neon-red">
        🚀 Apply for Admission
      </a>
    </div>
  </section>

  {{-- ── SYLLABUS MODAL ── --}}
  <div class="ms-modal-overlay" id="msSyllabusModal" role="dialog" aria-modal="true" aria-labelledby="msModalTitle">
    <div class="ms-modal">
      <div class="ms-modal-header">
        <div>
          <div class="ms-modal-title" id="msModalTitle"></div>
          <div class="ms-modal-subtitle" id="msModalSubtitle"></div>
        </div>
        <button class="ms-modal-close" id="msModalClose" aria-label="Close modal">✕</button>
      </div>
      <div class="ms-modal-body">
        <div class="ms-course-info-row" id="msModalInfoRow"></div>
        <p id="msModalDesc" style="font-size:0.9rem; color:var(--kc-text-secondary); line-height:1.75; margin-bottom:22px;"></p>
        <div id="msModalSyllabus"></div>
        <a href="{{ route('main.students.registration') }}"
           class="kc-btn kc-btn-solid-indigo"
           style="width:100%; margin-top:10px; height:46px;">
          Enroll Now →
        </a>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script>
(function () {

  /* ── Filter ── */
  const filterBar = document.getElementById('msCourseFilterBar');
  const grid      = document.getElementById('msCourseGrid');
  const noResults = document.getElementById('msNoResults');

  filterBar?.addEventListener('click', function (e) {
    const btn = e.target.closest('.ms-filter-btn');
    if (!btn) return;
    filterBar.querySelectorAll('.ms-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.dataset.filter;
    let visible = 0;
    grid.querySelectorAll('.ms-course-card').forEach(card => {
      const show = filter === 'all' || card.dataset.category === filter;
      card.dataset.hidden = show ? 'false' : 'true';
      if (show) visible++;
    });
    noResults.style.display = visible === 0 ? 'block' : 'none';
  });

  /* ── Modal ── */
  const modal         = document.getElementById('msSyllabusModal');
  const modalTitle    = document.getElementById('msModalTitle');
  const modalSub      = document.getElementById('msModalSubtitle');
  const modalDesc     = document.getElementById('msModalDesc');
  const modalInfo     = document.getElementById('msModalInfoRow');
  const modalSyllabus = document.getElementById('msModalSyllabus');
  const modalClose    = document.getElementById('msModalClose');

  const pill = (icon, text) =>
    `<span class="ms-course-info-pill">${icon} ${text}</span>`;

  document.querySelectorAll('.ms-syllabus-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const syllabus = JSON.parse(this.dataset.syllabus);
      modalTitle.textContent = this.dataset.course;
      modalSub.textContent   = `${this.dataset.duration} • ${this.dataset.eligibility}`;
      modalDesc.textContent  = this.dataset.desc;
      modalInfo.innerHTML    =
        pill('⏱', this.dataset.duration) +
        pill('🎓', this.dataset.eligibility) +
        pill('💰', this.dataset.fee);

      modalSyllabus.innerHTML = syllabus.map(sec => `
        <div class="ms-syllabus-section">
          <div class="ms-syllabus-section-title">${sec.section}</div>
          <ul class="ms-syllabus-list">
            ${sec.topics.map(t => `<li>${t}</li>`).join('')}
          </ul>
        </div>
      `).join('');

      modal.classList.add('open');
      document.body.style.overflow = 'hidden';
    });
  });

  const closeModal = () => {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  };

  modalClose?.addEventListener('click', closeModal);
  modal?.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

})();
</script>
@endpush