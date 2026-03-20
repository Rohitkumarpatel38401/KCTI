{{-- resources/views/main_site/pages/franchise/info.blade.php --}}
@extends('main_site.layouts.app')
@section('title', 'Franchise Information')
@section('meta_desc', 'Start your own Kranti Computer franchise center. Learn about partnership opportunities, benefits and requirements.')

@push('styles')
<style>
/* ══════════════════════════════════════
   FRANCHISE INFO PAGE
══════════════════════════════════════ */

/* ── Why Franchise Cards ── */
.ms-fr-why-card {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 16px;
  padding: 24px;
  position: relative;
  overflow: hidden;
  transition: box-shadow 0.25s, transform 0.25s;
}
.ms-fr-why-card:hover {
  box-shadow: 0 8px 28px rgba(79,70,229,0.1);
  transform: translateY(-3px);
}
.ms-fr-why-card::before {
  content: '';
  position: absolute; top: 0; left: 15%; right: 15%;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--kc-brand), transparent);
  box-shadow: 0 0 8px rgba(79,70,229,0.35);
}
.ms-fr-why-icon {
  width: 52px; height: 52px; border-radius: 14px;
  background: var(--kc-brand-light);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem; margin-bottom: 16px;
}
.ms-fr-why-title { font-size: 0.95rem; font-weight: 800; color: var(--kc-text-primary); margin-bottom: 8px; }
.ms-fr-why-desc  { font-size: 0.82rem; color: var(--kc-text-secondary); line-height: 1.65; }

/* ── How it works ── */
.ms-fr-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
}
.ms-fr-steps::before {
  content: '';
  position: absolute;
  top: 26px; left: 12.5%; right: 12.5%;
  height: 2px;
  background: linear-gradient(90deg, var(--kc-brand), #7c3aed);
  z-index: 0;
}
.ms-fr-step {
  display: flex; flex-direction: column;
  align-items: center; text-align: center;
  padding: 0 12px; position: relative; z-index: 1;
}
.ms-fr-step-num {
  width: 52px; height: 52px; border-radius: 50%;
  background: var(--kc-grad-main); color: #fff;
  font-size: 1rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 16px;
  box-shadow: 0 4px 16px rgba(79,70,229,0.3);
  border: 3px solid #fff;
}
.ms-fr-step-title { font-size: 0.88rem; font-weight: 700; color: var(--kc-text-primary); margin-bottom: 6px; }
.ms-fr-step-desc  { font-size: 0.76rem; color: var(--kc-text-muted); line-height: 1.5; }

/* ── Investment Table ── */
.ms-fr-invest-card {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 24px rgba(79,70,229,0.07);
}
.ms-fr-invest-header {
  background: var(--kc-grad-main);
  padding: 20px 28px;
  display: flex; align-items: center; gap: 12px;
}
.ms-fr-invest-header-icon { font-size: 1.6rem; }
.ms-fr-invest-header-title { font-size: 1.05rem; font-weight: 800; color: #fff; }
.ms-fr-invest-header-sub   { font-size: 0.78rem; color: rgba(255,255,255,0.7); margin-top: 2px; }

.ms-fr-invest-row {
  display: flex; align-items: center;
  padding: 14px 28px;
  border-bottom: 1px solid var(--kc-border);
  transition: background 0.15s;
}
.ms-fr-invest-row:last-child { border-bottom: none; }
.ms-fr-invest-row:hover { background: var(--kc-brand-light); }
.ms-fr-invest-label {
  flex: 1; font-size: 0.875rem;
  font-weight: 600; color: var(--kc-text-secondary);
}
.ms-fr-invest-val {
  font-size: 0.9rem; font-weight: 800;
  color: var(--kc-text-primary);
}
.ms-fr-invest-val--brand { color: var(--kc-brand); }
.ms-fr-invest-val--green { color: #059669; }

/* ── Requirements ── */
.ms-fr-req-list {
  display: flex; flex-direction: column; gap: 10px;
}
.ms-fr-req-item {
  display: flex; align-items: flex-start; gap: 12px;
  padding: 14px 16px;
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 12px;
  transition: border-color 0.18s, box-shadow 0.18s;
}
.ms-fr-req-item:hover { border-color: var(--kc-brand); box-shadow: 0 4px 16px rgba(79,70,229,0.08); }
.ms-fr-req-icon {
  width: 34px; height: 34px; border-radius: 10px;
  background: var(--kc-brand-light);
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem; flex-shrink: 0;
}
.ms-fr-req-text strong { font-size: 0.875rem; font-weight: 700; color: var(--kc-text-primary); display: block; margin-bottom: 2px; }
.ms-fr-req-text span   { font-size: 0.78rem; color: var(--kc-text-muted); line-height: 1.4; }

/* ── Support List ── */
.ms-fr-support-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
}
.ms-fr-support-card {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 14px;
  padding: 20px;
  text-align: center;
  transition: box-shadow 0.22s, transform 0.22s;
}
.ms-fr-support-card:hover { box-shadow: 0 6px 20px rgba(79,70,229,0.1); transform: translateY(-2px); }
.ms-fr-support-icon  { font-size: 1.8rem; margin-bottom: 10px; }
.ms-fr-support-title { font-size: 0.875rem; font-weight: 700; color: var(--kc-text-primary); margin-bottom: 4px; }
.ms-fr-support-desc  { font-size: 0.76rem; color: var(--kc-text-muted); line-height: 1.5; }

/* ── CTA ── */
.ms-fr-cta {
  background: var(--kc-grad-main);
  border-radius: 24px; padding: 52px 40px;
  text-align: center; position: relative; overflow: hidden;
}
.ms-fr-cta::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(255,255,255,0.1) 0%, transparent 70%);
  pointer-events: none;
}
.ms-fr-cta-title {
  font-size: clamp(1.5rem, 3vw, 2.2rem);
  font-weight: 800; color: #fff;
  letter-spacing: -0.03em; margin-bottom: 12px;
  position: relative; z-index: 1;
}
.ms-fr-cta-sub {
  font-size: 0.95rem; color: rgba(255,255,255,0.75);
  margin-bottom: 28px; line-height: 1.6;
  position: relative; z-index: 1;
}
.ms-fr-cta-btns {
  display: flex; gap: 12px; justify-content: center;
  flex-wrap: wrap; position: relative; z-index: 1;
}

/* Responsive */
@media (max-width: 900px) {
  .ms-fr-steps        { grid-template-columns: repeat(2, 1fr); gap: 28px; }
  .ms-fr-steps::before { display: none; }
  .ms-fr-support-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .ms-fr-support-grid { grid-template-columns: 1fr; }
  .ms-fr-cta          { padding: 36px 20px; }
  .ms-fr-cta-btns     { flex-direction: column; align-items: center; }
  .ms-fr-cta-btns .kc-btn { width: 100%; justify-content: center; }
}
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">🤝 Partnership</div>
      <h1 class="ms-page-hero-title">Start Your Own <span>Franchise</span></h1>
      <p class="ms-page-hero-sub">
        Partner with Kranti Computer and open your own IT education center.
        We provide full support — training, materials, branding and more.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">💰 Low Investment</span>
        <span class="ms-page-hero-badge">📈 High Returns</span>
        <span class="ms-page-hero-badge">🎓 Full Training</span>
        <span class="ms-page-hero-badge">📜 Govt. Recognized</span>
      </div>
    </div>
    <div class="ms-page-hero-media">
      {{-- <img src="{{ asset('images/franchise-hero.png') }}" alt="Franchise" class="ms-page-hero-img"> --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">🏢</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ Partner</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── WHY FRANCHISE ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Why Us</div>
      <h2 class="ms-section-title">Why Choose Kranti Computer?</h2>
      <p class="ms-section-sub">
        Join a trusted and growing IT education brand with a proven curriculum
        and strong student demand in your area.
      </p>
    </div>

    <div class="ms-grid-3">
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">📜</div>
        <div class="ms-fr-why-title">Government Recognized</div>
        <div class="ms-fr-why-desc">Our courses are government-recognized and in high demand. Students trust certified institutes for their career growth.</div>
      </div>
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">💰</div>
        <div class="ms-fr-why-title">Low Investment, High Returns</div>
        <div class="ms-fr-why-desc">Start with a low investment and earn consistent revenue through course fees. No heavy infrastructure required.</div>
      </div>
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">🎓</div>
        <div class="ms-fr-why-title">Complete Training Provided</div>
        <div class="ms-fr-why-desc">We train your staff from scratch. No prior experience needed. Full operational training and academic support included.</div>
      </div>
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">📦</div>
        <div class="ms-fr-why-title">Ready-Made Study Material</div>
        <div class="ms-fr-why-desc">Get complete course content, study materials, question banks and practical guides — ready to use from day one.</div>
      </div>
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">📣</div>
        <div class="ms-fr-why-title">Marketing Support</div>
        <div class="ms-fr-why-desc">We provide banners, posters, social media templates and campaign support to help you attract students quickly.</div>
      </div>
      <div class="ms-fr-why-card">
        <div class="ms-fr-why-icon">🤝</div>
        <div class="ms-fr-why-title">Dedicated Support Team</div>
        <div class="ms-fr-why-desc">A dedicated team is always available to help you resolve queries, manage operations and grow your center.</div>
      </div>
    </div>
  </div>
</section>

{{-- ── HOW IT WORKS ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Process</div>
      <h2 class="ms-section-title">How to Get Started</h2>
      <p class="ms-section-sub">
        A simple 4-step process to open your own Kranti Computer center.
      </p>
    </div>
    <div class="ms-fr-steps">
      <div class="ms-fr-step">
        <div class="ms-fr-step-num">1</div>
        <div class="ms-fr-step-title">Submit Application</div>
        <div class="ms-fr-step-desc">Fill in the franchise application form with your details and location.</div>
      </div>
      <div class="ms-fr-step">
        <div class="ms-fr-step-num">2</div>
        <div class="ms-fr-step-title">Discussion & Approval</div>
        <div class="ms-fr-step-desc">Our team contacts you, discusses the opportunity and approves your application.</div>
      </div>
      <div class="ms-fr-step">
        <div class="ms-fr-step-num">3</div>
        <div class="ms-fr-step-title">Setup & Training</div>
        <div class="ms-fr-step-desc">We help you set up your center and provide full training to your staff.</div>
      </div>
      <div class="ms-fr-step">
        <div class="ms-fr-step-num">4</div>
        <div class="ms-fr-step-title">Launch & Earn</div>
        <div class="ms-fr-step-desc">Start enrolling students, run courses and grow your business with our support.</div>
      </div>
    </div>
  </div>
</section>

{{-- ── INVESTMENT + REQUIREMENTS ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-grid-2" style="align-items: start; gap: 40px;">

      {{-- Investment --}}
      <div>
        <div class="ms-section-label" style="margin-bottom:8px;">Investment Details</div>
        <h2 style="font-size:1.4rem; font-weight:800; color:var(--kc-text-primary); margin-bottom:24px; letter-spacing:-0.02em;">
          What You Need to Invest
        </h2>
        <div class="ms-fr-invest-card">
          <div class="ms-fr-invest-header">
            <div class="ms-fr-invest-header-icon">💰</div>
            <div>
              <div class="ms-fr-invest-header-title">Franchise Investment Overview</div>
              <div class="ms-fr-invest-header-sub">Estimated costs to start your center</div>
            </div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Franchise Fee</div>
            <div class="ms-fr-invest-val ms-fr-invest-val--brand">Contact Us</div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Space Required</div>
            <div class="ms-fr-invest-val">300 – 500 sq. ft.</div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Computers Required</div>
            <div class="ms-fr-invest-val">Min. 5 Systems</div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Internet Connection</div>
            <div class="ms-fr-invest-val">Broadband / Fiber</div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Revenue Share</div>
            <div class="ms-fr-invest-val ms-fr-invest-val--green">Discuss on Call</div>
          </div>
          <div class="ms-fr-invest-row">
            <div class="ms-fr-invest-label">Agreement Duration</div>
            <div class="ms-fr-invest-val">1 Year (Renewable)</div>
          </div>
        </div>
      </div>

      {{-- Requirements --}}
      <div>
        <div class="ms-section-label" style="margin-bottom:8px;">Requirements</div>
        <h2 style="font-size:1.4rem; font-weight:800; color:var(--kc-text-primary); margin-bottom:24px; letter-spacing:-0.02em;">
          What We Expect From You
        </h2>
        <div class="ms-fr-req-list">
          <div class="ms-fr-req-item">
            <div class="ms-fr-req-icon">🏢</div>
            <div class="ms-fr-req-text">
              <strong>Own Space or Rental</strong>
              <span>A dedicated space of at least 300 sq. ft. in a suitable location.</span>
            </div>
          </div>
          <div class="ms-fr-req-item">
            <div class="ms-fr-req-icon">💻</div>
            <div class="ms-fr-req-text">
              <strong>Minimum 5 Computers</strong>
              <span>Basic computers with Windows OS and internet connection.</span>
            </div>
          </div>
          <div class="ms-fr-req-item">
            <div class="ms-fr-req-icon">📋</div>
            <div class="ms-fr-req-text">
              <strong>Local Registration</strong>
              <span>Valid identity proof and basic local business documentation.</span>
            </div>
          </div>
          <div class="ms-fr-req-item">
            <div class="ms-fr-req-icon">🎯</div>
            <div class="ms-fr-req-text">
              <strong>Commitment & Dedication</strong>
              <span>Willingness to actively manage and grow the center with our support.</span>
            </div>
          </div>
          <div class="ms-fr-req-item">
            <div class="ms-fr-req-icon">📱</div>
            <div class="ms-fr-req-text">
              <strong>Basic Digital Presence</strong>
              <span>WhatsApp or phone availability for student communication.</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ── SUPPORT WE PROVIDE ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">What You Get</div>
      <h2 class="ms-section-title">Full Support From Us</h2>
      <p class="ms-section-sub">
        We don't just give you a license — we partner with you at every step.
      </p>
    </div>
    <div class="ms-fr-support-grid">
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">📚</div>
        <div class="ms-fr-support-title">Study Material</div>
        <div class="ms-fr-support-desc">Complete course content, notes and practical guides for all courses.</div>
      </div>
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">🎓</div>
        <div class="ms-fr-support-title">Staff Training</div>
        <div class="ms-fr-support-desc">We train your teachers and admin staff before your center launches.</div>
      </div>
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">📜</div>
        <div class="ms-fr-support-title">Certificates</div>
        <div class="ms-fr-support-desc">Government-recognized certificates issued to your students on completion.</div>
      </div>
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">📣</div>
        <div class="ms-fr-support-title">Marketing Kit</div>
        <div class="ms-fr-support-desc">Banners, posters, visiting cards and social media templates provided.</div>
      </div>
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">💻</div>
        <div class="ms-fr-support-title">Online Portal</div>
        <div class="ms-fr-support-desc">Access to student management portal for admissions and certificates.</div>
      </div>
      <div class="ms-fr-support-card">
        <div class="ms-fr-support-icon">📞</div>
        <div class="ms-fr-support-title">Ongoing Support</div>
        <div class="ms-fr-support-desc">Dedicated support team available via call and WhatsApp anytime.</div>
      </div>
    </div>
  </div>
</section>

{{-- ── CTA ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-fr-cta">
      <h2 class="ms-fr-cta-title">Ready to Start Your Own Center?</h2>
      <p class="ms-fr-cta-sub">
        Apply today and take the first step toward building your own IT education business.<br>
        Our team will contact you within 24 hours.
      </p>
      <div class="ms-fr-cta-btns">
        <a href="{{ route('main.franchise.apply') }}" class="kc-btn kc-btn-pill-indigo"
           style="background:#fff; color:var(--kc-brand); border-color:#fff;">
          🏢 Apply for Franchise
        </a>
        <a href="{{ route('main.contact') }}" class="kc-btn kc-btn-ghost"
           style="color:#fff; border-color:rgba(255,255,255,0.4);">
          📞 Talk to Us First
        </a>
      </div>
    </div>
  </div>
</section>

@endsection