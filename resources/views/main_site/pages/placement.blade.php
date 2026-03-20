{{-- resources/views/main_site/pages/placement.blade.php --}}
@extends('main_site.layouts.app')
@section('title', 'Placement')
@section('meta_desc', 'Kranti Computer Placement — 100% placement support for all students.')

@push('styles')
<style>
/* ══════════════════════════════════════
   PLACEMENT PAGE
══════════════════════════════════════ */

/* ── Stats — Neon Red ── */
.ms-pl-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.ms-pl-stat-card {
  background: #fff;
  border: 1px solid rgba(244,63,94,0.2);
  border-radius: 16px;
  padding: 20px 16px;
  text-align: center;
  position: relative;
  overflow: hidden;
  transition: box-shadow 0.28s, transform 0.28s;
  box-shadow: 0 4px 20px rgba(244,63,94,0.06);
}
.ms-pl-stat-card:hover {
  box-shadow: 0 8px 32px rgba(244,63,94,0.18);
  transform: translateY(-4px);
}
.ms-pl-stat-card::before {
  content: '';
  position: absolute; top: 0; left: 15%; right: 15%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #f43f5e, transparent);
  box-shadow: 0 0 10px rgba(244,63,94,0.6);
}
.ms-pl-stat-card::after {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0;
  height: 60px;
  background: linear-gradient(to top, rgba(244,63,94,0.04) 0%, transparent 100%);
  pointer-events: none;
}
.ms-pl-stat-icon  { font-size: 1.5rem; margin-bottom: 8px; filter: drop-shadow(0 0 8px rgba(244,63,94,0.3)); }
.ms-pl-stat-num   { font-size: 1.8rem; font-weight: 800; color: #f43f5e; letter-spacing: -0.04em; line-height: 1; margin-bottom: 4px; text-shadow: 0 0 20px rgba(244,63,94,0.3); }
.ms-pl-stat-label { font-size: 0.75rem; font-weight: 600; color: var(--kc-text-secondary); }

/* ── Process ── */
.ms-pl-process {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
}
.ms-pl-process::before {
  content: '';
  position: absolute;
  top: 28px; left: 12.5%; right: 12.5%;
  height: 2px;
  background: linear-gradient(90deg, var(--kc-brand), #7c3aed);
  z-index: 0;
}
.ms-pl-process-step {
  display: flex; flex-direction: column; align-items: center;
  text-align: center; padding: 0 12px;
  position: relative; z-index: 1;
}
.ms-pl-process-num {
  width: 56px; height: 56px; border-radius: 50%;
  background: var(--kc-grad-main); color: #fff;
  font-size: 1.1rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 16px;
  box-shadow: 0 4px 16px rgba(79,70,229,0.3);
  border: 3px solid #fff;
}
.ms-pl-process-title { font-size: 0.9rem; font-weight: 700; color: var(--kc-text-primary); margin-bottom: 6px; }
.ms-pl-process-desc  { font-size: 0.78rem; color: var(--kc-text-muted); line-height: 1.5; }

/* ── Coming Soon ── */
.ms-pl-coming {
  text-align: center;
  padding: 52px 32px;
  background: #fff;
  border: 1.5px dashed var(--kc-border);
  border-radius: 20px;
  max-width: 560px;
  margin: 0 auto;
}
.ms-pl-coming-icon  { font-size: 3rem; margin-bottom: 16px; }
.ms-pl-coming-title { font-size: 1.1rem; font-weight: 800; color: var(--kc-text-primary); margin-bottom: 10px; }
.ms-pl-coming-sub   { font-size: 0.875rem; color: var(--kc-text-muted); line-height: 1.7; }

/* ── CTA ── */
.ms-pl-cta {
  background: var(--kc-grad-main);
  border-radius: 24px; padding: 52px 40px;
  text-align: center; position: relative; overflow: hidden;
}
.ms-pl-cta::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(255,255,255,0.1) 0%, transparent 70%);
  pointer-events: none;
}
.ms-pl-cta-title {
  font-size: clamp(1.5rem, 3vw, 2.2rem);
  font-weight: 800; color: #fff;
  letter-spacing: -0.03em; margin-bottom: 12px;
  position: relative; z-index: 1;
}
.ms-pl-cta-sub {
  font-size: 0.95rem; color: rgba(255,255,255,0.75);
  margin-bottom: 28px; line-height: 1.6;
  position: relative; z-index: 1;
}
.ms-pl-cta-btns {
  display: flex; gap: 12px; justify-content: center;
  flex-wrap: wrap; position: relative; z-index: 1;
}

/* Responsive */
@media (max-width: 900px) {
  .ms-pl-stats   { grid-template-columns: repeat(2, 1fr); }
  .ms-pl-process { grid-template-columns: repeat(2, 1fr); gap: 32px; }
  .ms-pl-process::before { display: none; }
}
@media (max-width: 600px) {
  .ms-pl-stats { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  .ms-pl-cta   { padding: 36px 20px; }
  .ms-pl-cta-btns { flex-direction: column; align-items: center; }
  .ms-pl-cta-btns .kc-btn { width: 100%; justify-content: center; }
}
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">💼 Career Support</div>
      <h1 class="ms-page-hero-title">Our <span>Placement</span> Program</h1>
      <p class="ms-page-hero-sub">
        We don't just teach — we help you get placed. Our placement
        program supports every student from resume building to job offers.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">✓ 100% Support</span>
        <span class="ms-page-hero-badge">🏢 Local & National Jobs</span>
        <span class="ms-page-hero-badge">📄 Resume Help</span>
      </div>
    </div>
    <div class="ms-page-hero-media">
      {{-- <img src="{{ asset('images/placement-hero.png') }}" alt="Placement" class="ms-page-hero-img"> --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">🚀</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ Placed</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── STATS ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-pl-stats">
      <div class="ms-pl-stat-card">
        <div class="ms-pl-stat-icon">🎓</div>
        <div class="ms-pl-stat-num">50+</div>
        <div class="ms-pl-stat-label">Students Enrolled</div>
      </div>
      <div class="ms-pl-stat-card">
        <div class="ms-pl-stat-icon">📚</div>
        <div class="ms-pl-stat-num">10+</div>
        <div class="ms-pl-stat-label">Courses Available</div>
      </div>
      <div class="ms-pl-stat-card">
        <div class="ms-pl-stat-icon">👨‍🏫</div>
        <div class="ms-pl-stat-num">4</div>
        <div class="ms-pl-stat-label">Expert Faculty</div>
      </div>
      <div class="ms-pl-stat-card">
        <div class="ms-pl-stat-icon">🏆</div>
        <div class="ms-pl-stat-num">1</div>
        <div class="ms-pl-stat-label">Year of Excellence</div>
      </div>
    </div>
  </div>
</section>

{{-- ── PLACEMENT PROCESS ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">How It Works</div>
      <h2 class="ms-section-title">Our Placement Process</h2>
      <p class="ms-section-sub">
        A simple 4-step process to help you land your first job after completing your course.
      </p>
    </div>
    <div class="ms-pl-process">
      <div class="ms-pl-process-step">
        <div class="ms-pl-process-num">1</div>
        <div class="ms-pl-process-title">Complete Your Course</div>
        <div class="ms-pl-process-desc">Successfully finish your chosen course with a minimum passing score.</div>
      </div>
      <div class="ms-pl-process-step">
        <div class="ms-pl-process-num">2</div>
        <div class="ms-pl-process-title">Resume Building</div>
        <div class="ms-pl-process-desc">Our team helps you create a professional resume tailored to your skills.</div>
      </div>
      <div class="ms-pl-process-step">
        <div class="ms-pl-process-num">3</div>
        <div class="ms-pl-process-title">Interview Preparation</div>
        <div class="ms-pl-process-desc">We conduct mock interviews and guide you on how to present yourself.</div>
      </div>
      <div class="ms-pl-process-step">
        <div class="ms-pl-process-num">4</div>
        <div class="ms-pl-process-title">Job Placement</div>
        <div class="ms-pl-process-desc">We connect you with local businesses, firms and our hiring partners.</div>
      </div>
    </div>
  </div>
</section>

{{-- ── PLACED STUDENTS — Coming Soon ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Success Stories</div>
      <h2 class="ms-section-title">Our Placed Students</h2>
      <p class="ms-section-sub">
        We are just getting started. Our first batch is currently training — placement results coming soon.
      </p>
    </div>
    <div class="ms-pl-coming">
      <div class="ms-pl-coming-icon">🚀</div>
      <div class="ms-pl-coming-title">First Batch In Progress</div>
      <div class="ms-pl-coming-sub">
        Our students are currently completing their courses. Placement drive will begin soon.
        Check back in a few months to see our success stories.
      </div>
      <a href="{{ route('main.students.registration') }}"
         class="kc-btn kc-btn-solid-indigo"
         style="margin-top: 24px;">
        Be Part of Our First Batch →
      </a>
    </div>
  </div>
</section>

{{-- ── TESTIMONIALS — Coming Soon ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">What Students Say</div>
      <h2 class="ms-section-title">Student Testimonials</h2>
      <p class="ms-section-sub">
        Our students are currently training. Testimonials will be added soon.
      </p>
    </div>
    <div class="ms-pl-coming">
      <div class="ms-pl-coming-icon">💬</div>
      <div class="ms-pl-coming-title">Reviews Coming Soon</div>
      <div class="ms-pl-coming-sub">
        We have just started and our students are actively learning.
        Once they complete their courses, their feedback will appear here.
      </div>
    </div>
  </div>
</section>

{{-- ── CTA ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-pl-cta">
      <h2 class="ms-pl-cta-title">Ready to Start Your Career?</h2>
      <p class="ms-pl-cta-sub">
        Enroll today and take the first step toward a successful career.<br>
        Our team is here to support you every step of the way.
      </p>
      <div class="ms-pl-cta-btns">
        {{-- Global kc-btn classes use kar rahe hain ── --}}
        <a href="{{ route('main.students.registration') }}"
           class="kc-btn kc-btn-pill-indigo">
          🎓 Apply Now
        </a>
        <a href="{{ route('main.contact') }}"
           class="kc-btn kc-btn-ghost"
           style="color:#fff; border-color:rgba(255,255,255,0.4);">
          📞 Talk to Us
        </a>
      </div>
    </div>
  </div>
</section>

@endsection