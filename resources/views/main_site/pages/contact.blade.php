{{-- resources/views/main_site/pages/contact.blade.php --}}
@extends('main_site.layouts.app')
@section('title', 'Contact Us')
@section('meta_desc', 'Contact Kranti Computer — Address, Phone, Email and Inquiry Form.')

@push('styles')
<style>
/* ══════════════════════════════════════
   CONTACT PAGE
══════════════════════════════════════ */
.ms-contact-input-error {
  border-color: #f43f5e !important;
  background: #fff5f7 !important;
  box-shadow: 0 0 0 3px rgba(244,63,94,0.1) !important;
}
.ms-contact-field-error {
  font-size: 0.72rem; color: #e11d48; font-weight: 600;
  margin-top: 4px; display: flex; align-items: center; gap: 4px;
}
.ms-contact-field-error::before { content: '⚠'; font-size: 0.65rem; }
</style>
@endpush

@section('content')

{{-- ── PAGE HERO ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">📞 Get In Touch</div>
      <h1 class="ms-page-hero-title">Contact <span>Us</span></h1>
      <p class="ms-page-hero-sub">
        Have a question or want to enroll? We are here to help.
        Reach out via call, email or fill in the inquiry form.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">📍 Prayagraj</span>
        <span class="ms-page-hero-badge">⏰ Mon–Sat 9AM–7PM</span>
        <span class="ms-page-hero-badge">💬 Quick Response</span>
      </div>
    </div>
    <div class="ms-page-hero-media">
      {{-- <img src="{{ asset('images/contact-hero.png') }}" alt="Contact Us" class="ms-page-hero-img"> --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">💬</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ We Reply Fast</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── CONTACT CONTENT ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-grid-2" style="align-items: start; gap: 40px;">

      {{-- ── LEFT — Contact Info ── --}}
      <div>
        <div class="ms-section-label" style="margin-bottom: 8px;">Our Details</div>
        <h2 style="font-size:1.5rem; font-weight:800; color:var(--kc-text-primary); margin-bottom:24px; letter-spacing:-0.02em;">
          Find Us Here
        </h2>

        <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:16px;">

          <li style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:44px; height:44px; border-radius:50%; background:var(--kc-brand-light); border:1.5px solid var(--kc-border); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">📍</div>
            <div>
              <div style="font-size:0.75rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:var(--kc-text-muted); margin-bottom:4px;">Address</div>
              <div style="font-size:0.9rem; color:var(--kc-text-secondary); line-height:1.5; font-weight:500;">
                Kranti Computer Training Institute, Near Sita Ram Inter college Babuganj,<br>Prayagraj 221507.
              </div>
            </div>
          </li>

          <li style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:44px; height:44px; border-radius:50%; background:var(--kc-brand-light); border:1.5px solid var(--kc-border); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">📞</div>
            <div>
              <div style="font-size:0.75rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:var(--kc-text-muted); margin-bottom:4px;">Phone</div>
              <div style="font-size:0.9rem; line-height:1.7;">
                <a href="tel:9839019108" style="color:var(--kc-brand); font-weight:600; text-decoration:none;">9839019108</a><br>
                <a href="tel:8953524310" style="color:var(--kc-brand); font-weight:600; text-decoration:none;">8953524310</a>
              </div>
            </div>
          </li>

          <li style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:44px; height:44px; border-radius:50%; background:var(--kc-brand-light); border:1.5px solid var(--kc-border); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">✉️</div>
            <div>
              <div style="font-size:0.75rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:var(--kc-text-muted); margin-bottom:4px;">Email</div>
              <a href="mailto:kranti.computer@gmail.com" style="font-size:0.9rem; color:var(--kc-brand); font-weight:600; text-decoration:none;">
                kranti.computer@gmail.com
              </a>
            </div>
          </li>

          <li style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:44px; height:44px; border-radius:50%; background:var(--kc-brand-light); border:1.5px solid var(--kc-border); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">⏰</div>
            <div>
              <div style="font-size:0.75rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:var(--kc-text-muted); margin-bottom:4px;">Timings</div>
              <div style="font-size:0.9rem; color:var(--kc-text-secondary); font-weight:500;">
                Monday – Saturday<br>9:00 AM – 7:00 PM
              </div>
            </div>
          </li>

          <li style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,211,102,0.12); border:1.5px solid rgba(37,211,102,0.3); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">💬</div>
            <div>
              <div style="font-size:0.75rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:var(--kc-text-muted); margin-bottom:6px;">WhatsApp</div>
              <a href="https://wa.me/9026043415" target="_blank"
                 class="kc-btn kc-btn-pill-indigo"
                 style="height:34px; padding:0 16px; font-size:0.8rem;">
                💬 Chat on WhatsApp
              </a>
            </div>
          </li>

        </ul>
      </div>

      {{-- ── RIGHT — Inquiry Form ── --}}
      <div class="ms-card" style="padding:32px; border-radius:20px; position:relative; overflow:hidden;">

        {{-- Top neon line --}}
        <div style="position:absolute; top:0; left:10%; right:10%; height:2px; background:linear-gradient(90deg, transparent, var(--kc-brand), transparent); box-shadow:0 0 12px rgba(79,70,229,0.4);"></div>

        <div style="margin-bottom:24px;">
          <div class="ms-section-label" style="margin-bottom:6px;">Quick Inquiry</div>
          <h3 style="font-size:1.15rem; font-weight:800; color:var(--kc-text-primary); margin:0;">
            Send Us a Message
          </h3>
        </div>

        @if(session('success'))
          <div style="background:#d1fae5; color:#065f46; padding:12px 16px; border-radius:10px; margin-bottom:20px; font-size:0.875rem; font-weight:600; border:1px solid #a7f3d0;">
            ✅ {{ session('success') }}
          </div>
        @endif

        <form action="/" method="POST" id="contactForm" novalidate>
          @csrf

          <div class="ms-form-group">
            <label class="ms-form-label" for="ct_name">
              Full Name <span style="color:#f43f5e;">*</span>
            </label>
            <input type="text" id="ct_name" name="name"
                   class="ms-form-input @error('name') ms-contact-input-error @enderror"
                   value="{{ old('name') }}" placeholder="Your full name">
            @error('name')
              <div class="ms-contact-field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="ms-form-group">
            <label class="ms-form-label" for="ct_phone">
              Phone Number <span style="color:#f43f5e;">*</span>
            </label>
            <input type="tel" id="ct_phone" name="phone"
                   class="ms-form-input @error('phone') ms-contact-input-error @enderror"
                   value="{{ old('phone') }}" placeholder="10-digit mobile number" maxlength="10">
            @error('phone')
              <div class="ms-contact-field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="ms-form-group">
            <label class="ms-form-label" for="ct_email">Email Address</label>
            <input type="email" id="ct_email" name="email"
                   class="ms-form-input @error('email') ms-contact-input-error @enderror"
                   value="{{ old('email') }}" placeholder="your@email.com">
            @error('email')
              <div class="ms-contact-field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="ms-form-group">
            <label class="ms-form-label" for="ct_course">Interested Course</label>
            <select id="ct_course" name="course" class="ms-form-select">
              <option value="">-- Select a Course --</option>
              <option value="dca"    {{ old('course') == 'dca'    ? 'selected' : '' }}>DCA</option>
              <option value="adca"   {{ old('course') == 'adca'   ? 'selected' : '' }}>ADCA</option>
              <option value="pgdca"  {{ old('course') == 'pgdca'  ? 'selected' : '' }}>PGDCA</option>
              <option value="tally"  {{ old('course') == 'tally'  ? 'selected' : '' }}>Tally Prime</option>
              <option value="web"    {{ old('course') == 'web'    ? 'selected' : '' }}>Web Design</option>
              <option value="python" {{ old('course') == 'python' ? 'selected' : '' }}>Python</option>
              <option value="olevel" {{ old('course') == 'olevel' ? 'selected' : '' }}>O Level</option>
              <option value="other"  {{ old('course') == 'other'  ? 'selected' : '' }}>Other</option>
            </select>
          </div>

          <div class="ms-form-group">
            <label class="ms-form-label" for="ct_message">Message</label>
            <textarea id="ct_message" name="message" class="ms-form-textarea"
                      placeholder="Write your question or inquiry here...">{{ old('message') }}</textarea>
          </div>

          <button type="submit" class="kc-btn kc-btn-solid-indigo"
                  style="width:100%; height:46px; font-size:0.9rem;">
            Send Inquiry →
          </button>

        </form>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('contactForm');
  if (!form) return;

  const rules = {
    name:  { label: 'Full Name',    required: true },
    phone: { label: 'Phone Number', required: true, pattern: /^\d{10}$/, patternMsg: 'Enter a valid 10-digit phone number.' },
    email: { label: 'Email',        required: false, pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, patternMsg: 'Enter a valid email address.' },
  };

  function showError(input, msg) {
    clearError(input);
    input.classList.add('ms-contact-input-error');
    const err     = document.createElement('div');
    err.className = 'ms-contact-field-error';
    err.textContent = msg;
    input.parentNode.appendChild(err);
  }

  function clearError(input) {
    input.classList.remove('ms-contact-input-error');
    const old = input.parentNode.querySelector('.ms-contact-field-error');
    if (old) old.remove();
  }

  // Live clear on input
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

      const val = input.value.trim();

      // Required check
      if (rule.required && !val) {
        showError(input, `${rule.label} is required.`);
        valid = false;
        if (!firstError) firstError = input;
        return;
      }

      // Pattern check — only if value exists
      if (rule.pattern && val && !rule.pattern.test(val)) {
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

    // ✅ Valid — submit
    // form.submit(); // uncomment when backend ready
    KcFlash.success('Message Sent!', 'We will get back to you within 24 hours.');
    form.reset();
  });

});
</script>
@endpush