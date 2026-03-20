{{-- resources/views/main_site/pages/franchise/apply.blade.php --}}
@extends('main_site.layouts.app')
@section('title', 'Apply for Franchise')
@section('meta_desc', 'Apply for a Kranti Computer franchise and start your own IT education center.')

@push('styles')
<style>
/* ══════════════════════════════════════
   FRANCHISE APPLY PAGE
══════════════════════════════════════ */
.ms-fr-apply-section { padding-top: var(--ms-space-lg); padding-bottom: var(--ms-space-xl); }

.ms-fr-apply-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 28px;
  align-items: flex-start;
}

/* ── Form Card ── */
.ms-fr-form-card {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 20px;
  padding: 32px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 4px 24px rgba(79,70,229,0.07);
}
.ms-fr-form-card::before {
  content: '';
  position: absolute; top: 0; left: 10%; right: 10%;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--kc-brand), transparent);
  box-shadow: 0 0 12px rgba(79,70,229,0.4);
}

.ms-fr-form-head { margin-bottom: 28px; }
.ms-fr-form-title { font-size: 1.1rem; font-weight: 800; color: var(--kc-text-primary); margin-bottom: 4px; }
.ms-fr-form-sub   { font-size: 0.82rem; color: var(--kc-text-muted); line-height: 1.5; }

/* Block titles */
.ms-fr-block {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 14px;
  padding: 20px 22px;
  margin-bottom: 16px;
}
.ms-fr-block-title {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.88rem; font-weight: 800;
  color: var(--kc-text-primary);
  margin-bottom: 18px;
  padding-bottom: 12px;
  border-bottom: 1.5px solid var(--kc-border);
}

/* Grids */
.ms-fr-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.ms-fr-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }

.ms-fr-block .ms-form-group { margin-bottom: 14px; }
.ms-fr-block .ms-fr-grid-2:last-child .ms-form-group,
.ms-fr-block .ms-fr-grid-3:last-child .ms-form-group,
.ms-fr-block > .ms-form-group:last-child { margin-bottom: 0; }

/* Form inputs */
.ms-fr-form .ms-form-label { font-size: 0.82rem; margin-bottom: 5px; color: var(--kc-text-secondary); }
.ms-fr-form .ms-form-label small { color: var(--kc-text-muted); font-weight: 400; }
.ms-fr-form .ms-form-input,
.ms-fr-form .ms-form-select { height: 40px; font-size: 0.875rem; padding: 0 12px; }

/* Required */
.ms-fr-required { color: #f43f5e; font-weight: 700; }

/* Submit */
.ms-fr-submit-row {
  display: flex; align-items: center; gap: 16px; flex-wrap: wrap;
  margin-top: 4px;
}
.ms-fr-submit-note { font-size: 0.78rem; color: var(--kc-text-muted); line-height: 1.4; }

/* Validation */
.ms-fr-input-error {
  border-color: #f43f5e !important;
  background: #fff5f7 !important;
  box-shadow: 0 0 0 3px rgba(244,63,94,0.1) !important;
}
.ms-fr-field-error {
  font-size: 0.72rem; color: #e11d48; font-weight: 600;
  margin-top: 4px; display: flex; align-items: center; gap: 4px;
}
.ms-fr-field-error::before { content: '⚠'; font-size: 0.65rem; }

/* ── SIDEBAR ── */
.ms-fr-sidebar {
  display: flex; flex-direction: column; gap: 16px;
  position: sticky; top: 84px;
}
.ms-fr-sidebar-card {
  background: #fff; border: 1px solid var(--kc-border);
  border-radius: 16px; padding: 18px; overflow: hidden;
}
.ms-fr-sidebar-card--brand {
  background: var(--kc-grad-main); border-color: transparent;
}
.ms-fr-sidebar-card-title {
  display: flex; align-items: center; gap: 7px;
  font-size: 0.88rem; font-weight: 800; color: var(--kc-text-primary);
  margin-bottom: 14px; padding-bottom: 10px;
  border-bottom: 1.5px solid var(--kc-border);
}
.ms-fr-sidebar-card--brand .ms-fr-sidebar-card-title {
  color: #fff; border-bottom-color: rgba(255,255,255,0.2);
}

/* Benefits list */
.ms-fr-benefit-list { display: flex; flex-direction: column; gap: 9px; }
.ms-fr-benefit-item {
  display: flex; align-items: flex-start; gap: 8px;
  font-size: 0.82rem; color: var(--kc-text-secondary);
  font-weight: 500; line-height: 1.4;
}
.ms-fr-benefit-item::before {
  content: '✓';
  width: 18px; height: 18px;
  background: var(--kc-brand-light); color: var(--kc-brand);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.58rem; font-weight: 800;
  flex-shrink: 0; margin-top: 1px;
}

/* Quick info */
.ms-fr-quick-list { display: flex; flex-direction: column; gap: 10px; }
.ms-fr-quick-item {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 10px;
  background: var(--kc-brand-light); border: 1px solid var(--kc-border);
}
.ms-fr-quick-icon  { font-size: 1rem; flex-shrink: 0; }
.ms-fr-quick-text  { font-size: 0.78rem; color: var(--kc-text-secondary); font-weight: 500; line-height: 1.3; }
.ms-fr-quick-text strong { color: var(--kc-text-primary); font-weight: 700; display: block; }

/* Call btns */
.ms-fr-call-btn {
  display: flex; align-items: center; justify-content: center; gap: 7px;
  width: 100%; padding: 9px; border-radius: 10px;
  background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);
  color: #fff; font-size: 0.84rem; font-weight: 700;
  text-decoration: none; margin-bottom: 8px; transition: background 0.18s;
}
.ms-fr-call-btn:last-child { margin-bottom: 0; }
.ms-fr-call-btn:hover      { background: rgba(255,255,255,0.25); color: #fff; }
.ms-fr-whatsapp            { background: rgba(37,211,102,0.22); border-color: rgba(37,211,102,0.35); }
.ms-fr-whatsapp:hover      { background: rgba(37,211,102,0.38); }

/* Responsive */
@media (max-width: 900px) {
  .ms-fr-apply-layout { grid-template-columns: 1fr; }
  .ms-fr-sidebar      { position: static; }
  .ms-fr-grid-3       { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 600px) {
  .ms-fr-form-card    { padding: 20px; }
  .ms-fr-grid-2,
  .ms-fr-grid-3       { grid-template-columns: 1fr; }
  .ms-fr-submit-row   { flex-direction: column; align-items: flex-start; }
  .ms-fr-submit-row .kc-btn { width: 100%; justify-content: center; }
}
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">🏢 Apply Now</div>
      <h1 class="ms-page-hero-title">Franchise <span>Application</span></h1>
      <p class="ms-page-hero-sub">
        Fill in your details below to apply for a Kranti Computer franchise.
        Our team will contact you within 24 hours.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">⚡ Quick Process</span>
        <span class="ms-page-hero-badge">📞 24hr Response</span>
        <span class="ms-page-hero-badge">💰 Low Investment</span>
      </div>
    </div>
    <div class="ms-page-hero-media">
      {{-- <img src="{{ asset('images/franchise-apply-hero.png') }}" alt="Apply" class="ms-page-hero-img"> --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">📋</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ Applied</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── MAIN SECTION ── --}}
<section class="ms-section ms-section--soft ms-fr-apply-section">
  <div class="kc-container">
    <div class="ms-fr-apply-layout">

      {{-- ── LEFT — FORM ── --}}
      <div>

        <div class="ms-fr-form-card">
          <div class="ms-fr-form-head">
            <div class="ms-section-label" style="margin-bottom:6px;">Franchise Application</div>
            <div class="ms-fr-form-title">Complete the Application Form</div>
            <div class="ms-fr-form-sub">All fields marked <span class="ms-fr-required">*</span> are required. We will review your application and contact you shortly.</div>
          </div>

          <form class="ms-fr-form" id="msFrApplyForm" action="#" method="POST" novalidate>
            @csrf

            {{-- BLOCK 1: Personal Info --}}
            <div class="ms-fr-block">
              <div class="ms-fr-block-title">
                <span>👤</span> Personal Information
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Full Name <span class="ms-fr-required">*</span></label>
                  <input type="text" name="full_name" class="ms-form-input" placeholder="Your full name">
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Father's Name <span class="ms-fr-required">*</span></label>
                  <input type="text" name="father_name" class="ms-form-input" placeholder="Father's name">
                </div>
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Phone Number <span class="ms-fr-required">*</span></label>
                  <input type="tel" name="phone" class="ms-form-input" placeholder="10-digit mobile" maxlength="10">
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">WhatsApp Number</label>
                  <input type="tel" name="whatsapp" class="ms-form-input" placeholder="WhatsApp number" maxlength="10">
                </div>
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Email Address</label>
                  <input type="email" name="email" class="ms-form-input" placeholder="your@email.com">
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Date of Birth <span class="ms-fr-required">*</span></label>
                  <input type="date" name="dob" class="ms-form-input">
                </div>
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Qualification <span class="ms-fr-required">*</span></label>
                  <select name="qualification" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>10th Pass</option>
                    <option>12th Pass</option>
                    <option>Graduate</option>
                    <option>Post Graduate</option>
                  </select>
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Occupation</label>
                  <select name="occupation" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>Student</option>
                    <option>Job / Service</option>
                    <option>Business</option>
                    <option>Teacher / Educator</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- BLOCK 2: Location --}}
            <div class="ms-fr-block">
              <div class="ms-fr-block-title">
                <span>📍</span> Location Details
              </div>

              <div class="ms-form-group">
                <label class="ms-form-label">Full Address <span class="ms-fr-required">*</span></label>
                <input type="text" name="address" class="ms-form-input" placeholder="House No, Street, Area">
              </div>

              <div class="ms-fr-grid-3">
                <div class="ms-form-group">
                  <label class="ms-form-label">City <span class="ms-fr-required">*</span></label>
                  <input type="text" name="city" class="ms-form-input" placeholder="City">
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">District <span class="ms-fr-required">*</span></label>
                  <input type="text" name="district" class="ms-form-input" placeholder="District">
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Pin Code <span class="ms-fr-required">*</span></label>
                  <input type="text" name="pin_code" class="ms-form-input" placeholder="Pin Code" maxlength="6">
                </div>
              </div>

              <div class="ms-form-group" style="margin-bottom:0;">
                <label class="ms-form-label">State <span class="ms-fr-required">*</span></label>
                <input type="text" name="state" class="ms-form-input" placeholder="State">
              </div>
            </div>

            {{-- BLOCK 3: Center Details --}}
            <div class="ms-fr-block">
              <div class="ms-fr-block-title">
                <span>🏢</span> Proposed Center Details
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Space Available <span class="ms-fr-required">*</span></label>
                  <select name="space" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>Less than 200 sq. ft.</option>
                    <option>200 – 300 sq. ft.</option>
                    <option>300 – 500 sq. ft.</option>
                    <option>More than 500 sq. ft.</option>
                  </select>
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Space Type</label>
                  <select name="space_type" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>Own Property</option>
                    <option>Rented</option>
                    <option>Looking for Space</option>
                  </select>
                </div>
              </div>

              <div class="ms-fr-grid-2">
                <div class="ms-form-group">
                  <label class="ms-form-label">Computers Available</label>
                  <select name="computers" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>None — Will Arrange</option>
                    <option>1 – 3 Systems</option>
                    <option>4 – 6 Systems</option>
                    <option>More than 6</option>
                  </select>
                </div>
                <div class="ms-form-group">
                  <label class="ms-form-label">Investment Capacity <span class="ms-fr-required">*</span></label>
                  <select name="investment" class="ms-form-select">
                    <option value="">-- Select --</option>
                    <option>Less than ₹50,000</option>
                    <option>₹50,000 – ₹1,00,000</option>
                    <option>₹1,00,000 – ₹2,00,000</option>
                    <option>More than ₹2,00,000</option>
                  </select>
                </div>
              </div>

              <div class="ms-form-group" style="margin-bottom:0;">
                <label class="ms-form-label">When Do You Plan to Start?</label>
                <select name="start_plan" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Immediately</option>
                  <option>Within 1 Month</option>
                  <option>Within 3 Months</option>
                  <option>Just Exploring</option>
                </select>
              </div>
            </div>

            {{-- BLOCK 4: Additional --}}
            <div class="ms-fr-block">
              <div class="ms-fr-block-title">
                <span>📝</span> Additional Information
              </div>

              <div class="ms-form-group">
                <label class="ms-form-label">How did you hear about us?</label>
                <select name="source" class="ms-form-select">
                  <option value="">-- Select --</option>
                  <option>Friend / Relative</option>
                  <option>Social Media</option>
                  <option>Google Search</option>
                  <option>Newspaper / Pamphlet</option>
                  <option>Other</option>
                </select>
              </div>

              <div class="ms-form-group" style="margin-bottom:0;">
                <label class="ms-form-label">Any Questions or Comments?</label>
                <textarea name="message" class="ms-form-textarea" style="min-height:90px;"
                          placeholder="Write any questions you have about the franchise..."></textarea>
              </div>
            </div>

            {{-- Submit --}}
            <div class="ms-fr-submit-row">
              <button type="submit" class="kc-btn kc-btn-solid-indigo" style="height:46px; padding:0 32px; font-size:0.9rem;">
                Submit Application →
              </button>
              <p class="ms-fr-submit-note">
                Our team will contact you within 24 hours of submission.
              </p>
            </div>

          </form>
        </div>

      </div>

      {{-- ── RIGHT — SIDEBAR ── --}}
      <div class="ms-fr-sidebar">

        {{-- Benefits --}}
        <div class="ms-fr-sidebar-card">
          <div class="ms-fr-sidebar-card-title"><span>✅</span> What You Get</div>
          <div class="ms-fr-benefit-list">
            <div class="ms-fr-benefit-item">Complete study material & curriculum</div>
            <div class="ms-fr-benefit-item">Staff training & onboarding support</div>
            <div class="ms-fr-benefit-item">Government recognized certificates</div>
            <div class="ms-fr-benefit-item">Marketing kit — banners, posters</div>
            <div class="ms-fr-benefit-item">Student management portal access</div>
            <div class="ms-fr-benefit-item">Dedicated support via call & WhatsApp</div>
          </div>
        </div>

        {{-- Quick Info --}}
        <div class="ms-fr-sidebar-card">
          <div class="ms-fr-sidebar-card-title"><span>ℹ️</span> Quick Info</div>
          <div class="ms-fr-quick-list">
            <div class="ms-fr-quick-item">
              <div class="ms-fr-quick-icon">🏢</div>
              <div class="ms-fr-quick-text">
                <strong>Min. Space</strong>
                300 sq. ft. required
              </div>
            </div>
            <div class="ms-fr-quick-item">
              <div class="ms-fr-quick-icon">💻</div>
              <div class="ms-fr-quick-text">
                <strong>Min. Systems</strong>
                5 computers
              </div>
            </div>
            <div class="ms-fr-quick-item">
              <div class="ms-fr-quick-icon">📅</div>
              <div class="ms-fr-quick-text">
                <strong>Agreement</strong>
                1 Year (Renewable)
              </div>
            </div>
            <div class="ms-fr-quick-item">
              <div class="ms-fr-quick-icon">📞</div>
              <div class="ms-fr-quick-text">
                <strong>Response Time</strong>
                Within 24 hours
              </div>
            </div>
          </div>
        </div>

        {{-- Contact --}}
        <div class="ms-fr-sidebar-card ms-fr-sidebar-card--brand">
          <div class="ms-fr-sidebar-card-title"><span>📞</span> Talk to Us First</div>
          <p style="font-size:0.84rem; color:rgba(255,255,255,0.75); margin-bottom:16px; line-height:1.6;">
            Have questions before applying? Call or WhatsApp us — we are happy to help.
          </p>
          <a href="tel:+919026043415" class="ms-fr-call-btn">📞 Call Now</a>
          <a href="https://wa.me/919026043415" class="ms-fr-call-btn ms-fr-whatsapp">💬 WhatsApp</a>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('msFrApplyForm');
  if (!form) return;

  const rules = {
    full_name:    { label: 'Full Name',          required: true },
    father_name:  { label: "Father's Name",       required: true },
    phone:        { label: 'Phone Number',        required: true, pattern: /^\d{10}$/, patternMsg: 'Enter a valid 10-digit number.' },
    dob:          { label: 'Date of Birth',       required: true },
    qualification:{ label: 'Qualification',       required: true },
    address:      { label: 'Address',             required: true },
    city:         { label: 'City',                required: true },
    district:     { label: 'District',            required: true },
    pin_code:     { label: 'Pin Code',            required: true, pattern: /^\d{6}$/, patternMsg: 'Enter a valid 6-digit pin code.' },
    state:        { label: 'State',               required: true },
    space:        { label: 'Space Available',     required: true },
    investment:   { label: 'Investment Capacity', required: true },
  };

  function showError(input, msg) {
    clearError(input);
    input.classList.add('ms-fr-input-error');
    const err       = document.createElement('div');
    err.className   = 'ms-fr-field-error';
    err.textContent = msg;
    input.parentNode.appendChild(err);
  }

  function clearError(input) {
    input.classList.remove('ms-fr-input-error');
    const old = input.parentNode.querySelector('.ms-fr-field-error');
    if (old) old.remove();
  }

  form.querySelectorAll('input, select, textarea').forEach(el => {
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

      if (rule.required && !input.value.trim()) {
        showError(input, `${rule.label} is required.`);
        valid = false;
        if (!firstError) firstError = input;
        return;
      }
      if (rule.pattern && input.value.trim() && !rule.pattern.test(input.value.trim())) {
        showError(input, rule.patternMsg);
        valid = false;
        if (!firstError) firstError = input;
      }
    });

    if (!valid) {
      firstError?.scrollIntoView({ behavior: 'smooth', block: 'center' });
      KcFlash.error('Form Incomplete', 'Please fill all required fields correctly.');
      return;
    }

    // form.submit(); // uncomment when backend ready
    KcFlash.success('Application Submitted!', 'Our team will contact you within 24 hours.');
  });

});
</script>
@endpush