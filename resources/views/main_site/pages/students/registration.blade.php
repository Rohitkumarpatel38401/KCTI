@extends('main_site.layouts.app')
@section('title', 'New Admission')
@section('meta_desc', 'Apply for new admission at Kranti Computer — Prayagraj.')

@push('styles')
<style>
/* ══════════════════════════════════════
   REGISTRATION PAGE
══════════════════════════════════════ */
.ms-reg-section { padding-top: var(--ms-space-lg); padding-bottom: var(--ms-space-xl); }

.ms-reg-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 28px;
  align-items: flex-start;
}

.ms-reg-header { margin-bottom: 24px; }
.ms-reg-title {
  font-size: 1.7rem;
  font-weight: 800;
  color: var(--kc-text-primary);
  letter-spacing: -0.03em;
  margin: 6px 0 8px;
}
.ms-reg-subtitle { font-size: 0.85rem; color: var(--kc-text-muted); line-height: 1.5; }
.ms-reg-required { color: #f43f5e; font-weight: 700; }

.ms-reg-block {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 16px;
  padding: 22px 24px;
  margin-bottom: 16px;
}
.ms-reg-block-title {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.9rem;
  font-weight: 800;
  color: var(--kc-text-primary);
  margin-bottom: 18px;
  padding-bottom: 12px;
  border-bottom: 1.5px solid var(--kc-border);
}
.ms-reg-block-icon { font-size: 1rem; }

.ms-reg-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.ms-reg-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }

.ms-reg-block .ms-form-group { margin-bottom: 14px; }
.ms-reg-block .ms-reg-grid-2:last-child .ms-form-group,
.ms-reg-block .ms-reg-grid-3:last-child .ms-form-group,
.ms-reg-block > .ms-form-group:last-child { margin-bottom: 0; }

.ms-reg-form .ms-form-label { font-size: 0.82rem; margin-bottom: 5px; color: var(--kc-text-secondary); }
.ms-reg-form .ms-form-label small { color: var(--kc-text-muted); font-weight: 400; }
.ms-reg-form .ms-form-input,
.ms-reg-form .ms-form-select { height: 40px; font-size: 0.875rem; padding: 0 12px; }

/* ── File upload ── */
.ms-reg-file-wrap { position: relative; }
.ms-reg-file-input {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 85px;
  opacity: 0; cursor: pointer; z-index: 2;
}
.ms-reg-file-wrap:has(.ms-reg-file-preview.show) .ms-reg-file-input { display: none; }

.ms-reg-file-label {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 6px;
  padding: 16px 12px;
  border: 1.5px dashed var(--kc-border);
  border-radius: 10px;
  background: var(--kc-brand-light);
  cursor: pointer;
  transition: border-color 0.18s, background 0.18s;
  text-align: center;
  min-height: 80px;
}
.ms-reg-file-label:hover { border-color: var(--kc-brand); background: #e0e7ff; }
.ms-reg-file-icon        { font-size: 1.4rem; }
.ms-reg-file-text        { font-size: 0.8rem; font-weight: 600; color: var(--kc-brand); }
.ms-reg-file-hint        { font-size: 0.68rem; color: var(--kc-text-muted); }

.ms-reg-file-preview { display: none; margin-top: 10px; position: relative; width: 90px; }
.ms-reg-file-preview.show { display: block; }
.ms-reg-file-preview img {
  width: 90px; height: 110px;
  object-fit: cover; border-radius: 8px;
  border: 2px solid var(--kc-brand); display: block;
}
.ms-reg-file-preview-remove {
  position: absolute;
  top: -8px; right: -8px;
  width: 22px; height: 22px;
  background: #f43f5e; color: #fff;
  border: 2px solid #fff; border-radius: 50%;
  font-size: 0.65rem; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  z-index: 20; pointer-events: all;
  transition: background 0.15s, transform 0.15s;
}
.ms-reg-file-preview-remove:hover { background: #e11d48; transform: scale(1.12); }
.ms-reg-file-name {
  font-size: 0.68rem; color: var(--kc-brand);
  font-weight: 600; margin-top: 5px;
  word-break: break-all; max-width: 90px;
}

/* Submit */
.ms-reg-submit-row { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.ms-reg-submit-btn  { height: 46px; padding: 0 32px; font-size: 0.9rem; }
.ms-reg-submit-note { font-size: 0.78rem; color: var(--kc-text-muted); line-height: 1.4; }

/* ══════════════════════════════════════
   SIDEBAR
══════════════════════════════════════ */
.ms-reg-sidebar {
  display: flex; flex-direction: column; gap: 16px;
  position: sticky; top: 84px;
}
.ms-sidebar-card {
  background: #fff; border: 1px solid var(--kc-border);
  border-radius: 16px; padding: 18px; overflow: hidden;
}
.ms-sidebar-card--brand { background: var(--kc-grad-main); border-color: transparent; }
.ms-sidebar-card-title {
  display: flex; align-items: center; gap: 7px;
  font-size: 0.88rem; font-weight: 800; color: var(--kc-text-primary);
  margin-bottom: 14px; padding-bottom: 10px;
  border-bottom: 1.5px solid var(--kc-border);
}
.ms-sidebar-card--brand .ms-sidebar-card-title { color: #fff; border-bottom-color: rgba(255,255,255,0.2); }

/* News ticker */
.ms-sidebar-news-wrap {
  height: 190px; overflow: hidden; position: relative;
  border-radius: 10px; border: 1px solid var(--kc-border);
  background: var(--ms-bg-soft);
}
.ms-sidebar-news-wrap::before,
.ms-sidebar-news-wrap::after {
  content: ''; position: absolute; left: 0; right: 0; height: 32px; z-index: 2; pointer-events: none;
}
.ms-sidebar-news-wrap::before { top: 0; background: linear-gradient(to bottom, var(--ms-bg-soft) 0%, transparent 100%); }
.ms-sidebar-news-wrap::after  { bottom: 0; background: linear-gradient(to top, var(--ms-bg-soft) 0%, transparent 100%); }

.ms-sidebar-news-track {
  display: flex; flex-direction: column;
  animation: sidebarNewsScroll 12s linear infinite;
  padding: 8px 12px;
}
.ms-sidebar-news-track:hover { animation-play-state: paused; }
@keyframes sidebarNewsScroll {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-50%); }
}
.ms-sidebar-news-item {
  display: flex; align-items: flex-start; gap: 8px;
  padding: 10px 0; border-bottom: 1px solid var(--kc-border); flex-shrink: 0;
}
.ms-sidebar-news-item:last-child { border-bottom: none; }
.ms-sidebar-news-badge {
  display: inline-flex; align-items: center; padding: 2px 7px;
  border-radius: 50px; font-size: 0.6rem; font-weight: 700;
  letter-spacing: 0.04em; flex-shrink: 0; margin-top: 2px;
  background: var(--kc-border); color: var(--kc-text-muted);
  border: 1px solid rgba(0,0,0,0.06);
}
.ms-sidebar-news-badge--new  { background: #d1fae5; color: #065f46; border-color: #a7f3d0; }
.ms-sidebar-news-badge--hot  { background: #fff1f2; color: #e11d48; border-color: #fecdd3; }
.ms-sidebar-news-badge--info { background: #eef2ff; color: #4f46e5; border-color: #c7d2fe; }
.ms-sidebar-news-text { display: flex; flex-direction: column; gap: 2px; }
.ms-sidebar-news-text strong { font-size: 0.8rem; color: var(--kc-text-primary); font-weight: 700; line-height: 1.3; }
.ms-sidebar-news-text span   { font-size: 0.73rem; color: var(--kc-text-secondary); }
.ms-sidebar-news-text time   { font-size: 0.67rem; color: var(--kc-text-muted); margin-top: 1px; }

/* Key points */
.ms-sidebar-key-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 9px; }
.ms-sidebar-key-list li {
  display: flex; align-items: flex-start; gap: 8px;
  font-size: 0.82rem; color: var(--kc-text-secondary); font-weight: 500; line-height: 1.4;
}
.ms-sidebar-key-list li::before {
  content: '✓'; width: 17px; height: 17px;
  background: var(--kc-brand-light); color: var(--kc-brand);
  border-radius: 50%; display: flex; align-items: center; justify-content: center;
  font-size: 0.58rem; font-weight: 800; flex-shrink: 0; margin-top: 1px;
}

/* Call buttons */
.ms-sidebar-call-btn {
  display: flex; align-items: center; justify-content: center; gap: 7px;
  width: 100%; padding: 9px; border-radius: 10px;
  background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);
  color: #fff; font-size: 0.84rem; font-weight: 700;
  text-decoration: none; margin-bottom: 8px; transition: background 0.18s;
}
.ms-sidebar-call-btn:last-child { margin-bottom: 0; }
.ms-sidebar-call-btn:hover      { background: rgba(255,255,255,0.25); color: #fff; }
.ms-sidebar-whatsapp-btn        { background: rgba(37,211,102,0.22); border-color: rgba(37,211,102,0.35); }
.ms-sidebar-whatsapp-btn:hover  { background: rgba(37,211,102,0.38); }

/* Validation */
.ms-input-error {
  border-color: #f43f5e !important;
  background: #fff5f7 !important;
  box-shadow: 0 0 0 3px rgba(244,63,94,0.1) !important;
}
.ms-field-error {
  font-size: 0.72rem; color: #e11d48; font-weight: 600;
  margin-top: 4px; display: flex; align-items: center; gap: 4px;
}
.ms-field-error::before { content: '⚠'; font-size: 0.65rem; }
.ms-reg-file-wrap .ms-field-error { margin-top: 6px; }
.ms-reg-file-error .ms-reg-file-label { border-color: #f43f5e !important; background: #fff5f7 !important; }

/* Responsive */
@media (max-width: 900px) {
  .ms-reg-layout  { grid-template-columns: 1fr; }
  .ms-reg-sidebar { position: static; }
  .ms-reg-grid-3  { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 600px) {
  .ms-reg-grid-2,
  .ms-reg-grid-3     { grid-template-columns: 1fr; }
  .ms-reg-title      { font-size: 1.4rem; }
  .ms-reg-submit-row { flex-direction: column; align-items: flex-start; }
  .ms-reg-submit-btn { width: 100%; justify-content: center; }
}
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">

    {{-- Left — Text --}}
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">🎓 Admissions Open 2025</div>
      <h1 class="ms-page-hero-title">
        Student <span>Application</span> Form
      </h1>
      <p class="ms-page-hero-sub">
        Fill in your details to apply for admission at Kranti Computer.
        Join thousands of students who have built their careers with us.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">✓ Quick Process</span>
        <span class="ms-page-hero-badge">📜 Government Recognized</span>
        <span class="ms-page-hero-badge">💼 100% Placement Support</span>
      </div>
    </div>

    {{-- Right — Image / Placeholder --}}
    <div class="ms-page-hero-media">
      {{-- Real image: --}}
      {{-- <img src="{{ asset('images/admission-hero.png') }}" alt="New Admission" class="ms-page-hero-img"> --}}

      {{-- Placeholder --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">📝</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ Admitted</div>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="ms-section ms-section--soft ms-reg-section">
  <div class="kc-container">
    <div class="ms-reg-layout">

      {{-- ── LEFT — FORM ── --}}
      <div class="ms-reg-main">

        <div class="ms-reg-header">
          <div class="ms-section-label">New Admission</div>
          <h1 class="ms-reg-title">Student Application Form</h1>
          <p class="ms-reg-subtitle">Fill in your details carefully. All fields marked <span class="ms-reg-required">*</span> are required.</p>
        </div>

        <form class="ms-reg-form" id="msRegForm" action="#" method="POST" enctype="multipart/form-data" novalidate>
          @csrf

          {{-- BLOCK 1: Location --}}
          <div class="ms-reg-block">
            <div class="ms-reg-block-title">
              <span class="ms-reg-block-icon">📍</span> Student Location
            </div>
            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Address Line 1 <span class="ms-reg-required">*</span></label>
                <input type="text" name="address1" class="ms-form-input" placeholder="House No, Street, Area">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Address Line 2</label>
                <input type="text" name="address2" class="ms-form-input" placeholder="Landmark (optional)">
              </div>
            </div>
            <div class="ms-reg-grid-3">
              <div class="ms-form-group">
                <label class="ms-form-label">City <span class="ms-reg-required">*</span></label>
                <input type="text" name="city" class="ms-form-input" placeholder="City">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">State <span class="ms-reg-required">*</span></label>
                <input type="text" name="state" class="ms-form-input" placeholder="State">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Pin Code <span class="ms-reg-required">*</span></label>
                <input type="text" name="pin_code" class="ms-form-input" placeholder="6-digit Pin Code" maxlength="6">
              </div>
            </div>
            <div class="ms-form-group">
              <label class="ms-form-label">Centre / Branch</label>
              <input type="text" name="centre" class="ms-form-input" placeholder="Nearest Centre">
            </div>
          </div>

          {{-- BLOCK 2: Course --}}
          <div class="ms-reg-block">
            <div class="ms-reg-block-title">
              <span class="ms-reg-block-icon">🎓</span> Course Selection
            </div>
            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Course Category <span class="ms-reg-required">*</span></label>
                <select name="course_category" class="ms-form-select">
                  <option value="">-- Select Category --</option>
                  <option>Diploma</option>
                  <option>Accounting</option>
                  <option>Office</option>
                  <option>Web Design</option>
                  <option>Programming</option>
                </select>
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Course <span class="ms-reg-required">*</span></label>
                <select name="course" class="ms-form-select">
                  <option value="">-- Select Course --</option>
                  <option>DCA</option><option>ADCA</option><option>PGDCA</option>
                  <option>Tally Prime</option><option>Busy Accounting</option>
                  <option>MS Office</option><option>Web Design</option>
                  <option>Photoshop</option><option>Python</option>
                  <option>O Level</option><option>BCA</option><option>CCC</option>
                </select>
              </div>
            </div>
          </div>

          {{-- BLOCK 3: Personal --}}
          <div class="ms-reg-block">
            <div class="ms-reg-block-title">
              <span class="ms-reg-block-icon">👤</span> Personal Information
            </div>

            <div class="ms-reg-grid-3">
              <div class="ms-form-group">
                <label class="ms-form-label">First Name <span class="ms-reg-required">*</span></label>
                <input type="text" name="first_name" class="ms-form-input" placeholder="First Name">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Middle Name</label>
                <input type="text" name="middle_name" class="ms-form-input" placeholder="Middle Name">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Last Name <span class="ms-reg-required">*</span></label>
                <input type="text" name="last_name" class="ms-form-input" placeholder="Last Name">
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Father's Name <span class="ms-reg-required">*</span></label>
                <input type="text" name="father_name" class="ms-form-input" placeholder="Father's Name">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Mother's Name <span class="ms-reg-required">*</span></label>
                <input type="text" name="mother_name" class="ms-form-input" placeholder="Mother's Name">
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Gender <span class="ms-reg-required">*</span></label>
                <select name="gender" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Male</option><option>Female</option><option>Other</option>
                </select>
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Marital Status</label>
                <select name="marital_status" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Single</option><option>Married</option>
                </select>
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Husband's Name <small>(if married)</small></label>
                <input type="text" name="husband_name" class="ms-form-input" placeholder="Husband's Name">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Phone Number <span class="ms-reg-required">*</span></label>
                <input type="tel" name="phone" class="ms-form-input" placeholder="10-digit mobile number" maxlength="10">
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Qualification <span class="ms-reg-required">*</span></label>
                <select name="qualification" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>8th Pass</option><option>10th Pass</option>
                  <option>12th Pass</option><option>Graduate</option>
                  <option>Post Graduate</option>
                </select>
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Religion</label>
                <select name="religion" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Hindu</option><option>Muslim</option>
                  <option>Christian</option><option>Sikh</option><option>Other</option>
                </select>
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Caste Category</label>
                <select name="caste" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>General</option><option>OBC</option>
                  <option>SC</option><option>ST</option>
                </select>
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Source <small>(how did you hear?)</small></label>
                <select name="source" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Friend / Relative</option><option>Social Media</option>
                  <option>Newspaper</option><option>Hoarding / Banner</option><option>Other</option>
                </select>
              </div>
            </div>

            <div class="ms-reg-grid-2">
              <div class="ms-form-group">
                <label class="ms-form-label">Date of Birth <span class="ms-reg-required">*</span></label>
                <input type="date" name="dob" class="ms-form-input">
              </div>
              <div class="ms-form-group">
                <label class="ms-form-label">Upload Your Photo <span class="ms-reg-required">*</span></label>
                <div class="ms-reg-file-wrap" id="photoWrap">
                  <label for="regPhoto" class="ms-reg-file-label" id="photoLabel">
                    <span class="ms-reg-file-icon">📷</span>
                    <span class="ms-reg-file-text">Choose Photo</span>
                    <span class="ms-reg-file-hint">JPG, PNG — Max 2MB</span>
                  </label>
                  <input type="file" name="photo" id="regPhoto"
                         class="ms-reg-file-input" accept="image/*">
                  <div class="ms-reg-file-preview" id="photoPreview">
                    <img id="photoPreviewImg" src="" alt="Preview">
                    <button type="button" class="ms-reg-file-preview-remove"
                            id="photoRemove" title="Remove">✕</button>
                  </div>
                  <div class="ms-reg-file-name" id="photoFileName"></div>
                </div>
              </div>
            </div>

          </div>

          {{-- Submit --}}
          <div class="ms-reg-submit-row">
            <button type="submit" class="kc-btn kc-btn-solid-indigo ms-reg-submit-btn">
              Submit Application →
            </button>
            <p class="ms-reg-submit-note">
              Submission ke baad hum aapko 24 hours mein contact karenge.
            </p>
          </div>

        </form>
      </div>

      {{-- ── RIGHT — SIDEBAR ── --}}
      <div class="ms-reg-sidebar">

        {{-- Recent News --}}
        <div class="ms-sidebar-card">
          <div class="ms-sidebar-card-title"><span>📰</span> Recent News</div>
          <div class="ms-sidebar-news-wrap">
            <div class="ms-sidebar-news-track" id="sidebarNewsTrack">

              <div class="ms-sidebar-news-item">
                <span class="ms-sidebar-news-badge ms-sidebar-news-badge--new">New</span>
                <div class="ms-sidebar-news-text">
                  <strong>BCA Classes Started</strong>
                  <span>Join Fast and get Discount!</span>
                  <time>23 Jul 2025</time>
                </div>
              </div>

              <div class="ms-sidebar-news-item">
                <span class="ms-sidebar-news-badge ms-sidebar-news-badge--hot">Hot</span>
                <div class="ms-sidebar-news-text">
                  <strong>O Level New Batch — 11AM & 4PM</strong>
                  <span>Join Fast with heavy Discount!</span>
                  <time>08 Jan 2025</time>
                </div>
              </div>

              <div class="ms-sidebar-news-item">
                <span class="ms-sidebar-news-badge ms-sidebar-news-badge--info">Info</span>
                <div class="ms-sidebar-news-text">
                  <strong>ADCA, CCC New Batch — 7AM & 3PM</strong>
                  <span>You can join Now.</span>
                  <time>12 Aug 2024</time>
                </div>
              </div>

              <div class="ms-sidebar-news-item">
                <span class="ms-sidebar-news-badge ms-sidebar-news-badge--new">New</span>
                <div class="ms-sidebar-news-text">
                  <strong>New DCA Batch Starting Soon</strong>
                  <span>Limited seats available.</span>
                  <time>01 Mar 2025</time>
                </div>
              </div>

            </div>
          </div>
        </div>

        {{-- Key Points --}}
        <div class="ms-sidebar-card">
          <div class="ms-sidebar-card-title"><span>⭐</span> Our Key Points</div>
          <ul class="ms-sidebar-key-list">
            <li>Good Facilities & Modern Infrastructure</li>
            <li>Best Library with 400+ Books</li>
            <li>Cisco Routers & High-end Networking Lab</li>
            <li>Staff to impart quality education</li>
            <li>Every year workshops & seminars</li>
            <li>100% Placement Assistance</li>
          </ul>
        </div>

        {{-- Contact --}}
        <div class="ms-sidebar-card ms-sidebar-card--brand">
          <div class="ms-sidebar-card-title" style="color:#fff;"><span>📞</span> Need Help?</div>
          <p style="font-size:0.84rem; color:rgba(255,255,255,0.75); margin-bottom:16px; line-height:1.6;">
            Admission ke liye koi bhi sawaal ho toh call karein ya WhatsApp karein.
          </p>
          <a href="tel:+91XXXXXXXXXX" class="ms-sidebar-call-btn">📞 Call Now</a>
          <a href="https://wa.me/91XXXXXXXXXX" class="ms-sidebar-call-btn ms-sidebar-whatsapp-btn">💬 WhatsApp</a>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── News ticker duplicate ──
  const track = document.getElementById('sidebarNewsTrack');
  if (track) track.innerHTML += track.innerHTML;

  // ── Photo upload preview ──
  const photoInput   = document.getElementById('regPhoto');
  const photoPreview = document.getElementById('photoPreview');
  const photoImg     = document.getElementById('photoPreviewImg');
  const photoRemove  = document.getElementById('photoRemove');
  const photoLabel   = document.getElementById('photoLabel');
  const photoName    = document.getElementById('photoFileName');

  photoInput?.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    if (file.size > 2 * 1024 * 1024) {
      KcFlash.warning('File too large!', 'Photo size 2MB se zyada nahi honi chahiye.');
      this.value = '';
      return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
      photoImg.src             = e.target.result;
      photoPreview.classList.add('show');
      photoLabel.style.display = 'none';
      photoName.textContent    = file.name;
    };
    reader.readAsDataURL(file);
  });

  photoRemove?.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    photoInput.value             = '';
    photoImg.src                 = '';
    photoPreview.classList.remove('show');
    photoLabel.style.display     = '';
    photoName.textContent        = '';
  });

  // ── Form Validation ──
  const form = document.getElementById('msRegForm');
  if (!form) return;

  const rules = {
    address1:        { label: 'Address Line 1',  required: true },
    city:            { label: 'City',             required: true },
    state:           { label: 'State',            required: true },
    pin_code:        { label: 'Pin Code',         required: true, pattern: /^\d{6}$/, patternMsg: 'Valid 6-digit pin code daalo' },
    course_category: { label: 'Course Category',  required: true },
    course:          { label: 'Course',           required: true },
    first_name:      { label: 'First Name',       required: true },
    last_name:       { label: 'Last Name',        required: true },
    father_name:     { label: "Father's Name",    required: true },
    mother_name:     { label: "Mother's Name",    required: true },
    gender:          { label: 'Gender',           required: true },
    phone:           { label: 'Phone Number',     required: true, pattern: /^\d{10}$/, patternMsg: 'Valid 10-digit number daalo' },
    qualification:   { label: 'Qualification',    required: true },
    dob:             { label: 'Date of Birth',    required: true },
    photo:           { label: 'Photo',            required: true, isFile: true },
  };

  function showError(input, msg) {
    clearError(input);
    if (input.type === 'file') {
      input.closest('.ms-reg-file-wrap').classList.add('ms-reg-file-error');
    } else {
      input.classList.add('ms-input-error');
    }
    const err       = document.createElement('div');
    err.className   = 'ms-field-error';
    err.textContent = msg;
    const parent = input.type === 'file'
      ? input.closest('.ms-reg-file-wrap')
      : input;
    parent.parentNode.appendChild(err);
  }

  function clearError(input) {
    if (input.type === 'file') {
      input.closest('.ms-reg-file-wrap')?.classList.remove('ms-reg-file-error');
    } else {
      input.classList.remove('ms-input-error');
    }
    const wrap = input.type === 'file'
      ? input.closest('.ms-form-group')
      : input.parentNode;
    wrap?.querySelectorAll('.ms-field-error').forEach(e => e.remove());
  }

  form.querySelectorAll('input, select').forEach(el => {
    el.addEventListener('input',  () => clearError(el));
    el.addEventListener('change', () => clearError(el));
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    let valid      = true;
    let firstError = null;

    Object.entries(rules).forEach(([name, rule]) => {
      const input = form.querySelector(`[name="${name}"]`);
      if (!input) return;
      clearError(input);

      if (rule.required) {
        const filled = rule.isFile
          ? (input.files && input.files.length > 0)
          : input.value.trim() !== '';
        if (!filled) {
          showError(input, `${rule.label} required hai`);
          valid = false;
          if (!firstError) firstError = input;
          return;
        }
      }

      if (rule.pattern && input.value.trim()) {
        if (!rule.pattern.test(input.value.trim())) {
          showError(input, rule.patternMsg);
          valid = false;
          if (!firstError) firstError = input;
        }
      }
    });

    if (!valid) {
      firstError?.scrollIntoView({ behavior: 'smooth', block: 'center' });
      // ── KcFlash error notification ──
      KcFlash.error('Form Incomplete!', 'Sabhi required fields fill karein.');
      return;
    }

    // ✅ All valid
    // form.submit(); // uncomment when backend ready
    KcFlash.success('Submitted!', 'Hum 24 hours mein aapse contact karenge.');
  });

});
</script>
@endpush