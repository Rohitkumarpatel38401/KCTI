@extends('main_site.layouts.app')
@section('title', 'Certificate Verification')
@section('meta_desc', 'Verify your Kranti Computer certificate or student ID online instantly.')

@push('styles')
<style>
/* ══════════════════════════════════════
   VERIFICATION PAGE
══════════════════════════════════════ */
.ms-verify-section { padding-top: var(--ms-space-lg); padding-bottom: var(--ms-space-xl); }

.ms-verify-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 28px;
  align-items: flex-start;
}

/* ── Search Card ── */
.ms-verify-card {
  background: #fff;
  border: 1px solid var(--kc-border);
  border-radius: 20px;
  padding: 32px;
  margin-bottom: 20px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 4px 24px rgba(79,70,229,0.07);
}
.ms-verify-card::before {
  content: '';
  position: absolute; top: 0; left: 10%; right: 10%;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--kc-brand), transparent);
  box-shadow: 0 0 12px rgba(79,70,229,0.4);
}
.ms-verify-card-head  { margin-bottom: 24px; }
.ms-verify-card-title { font-size: 1.05rem; font-weight: 800; color: var(--kc-text-primary); margin-bottom: 4px; }
.ms-verify-card-sub   { font-size: 0.8rem; color: var(--kc-text-muted); }

/* Tabs */
.ms-verify-tabs {
  display: flex; gap: 8px; margin-bottom: 24px;
  background: var(--kc-brand-light);
  padding: 4px; border-radius: 10px;
}
.ms-verify-tab {
  flex: 1; padding: 8px 12px; border: none; border-radius: 8px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.82rem; font-weight: 600;
  color: var(--kc-text-secondary);
  background: transparent; cursor: pointer;
  transition: all 0.2s; text-align: center;
}
.ms-verify-tab.active {
  background: #fff; color: var(--kc-brand);
  box-shadow: 0 2px 8px rgba(79,70,229,0.12);
}

/* Inputs */
.ms-verify-form-group { margin-bottom: 14px; }
.ms-verify-label {
  display: block; font-size: 0.82rem; font-weight: 600;
  color: var(--kc-text-secondary); margin-bottom: 6px;
}
.ms-verify-input {
  width: 100%; height: 48px; padding: 0 16px;
  border: 1.5px solid var(--kc-border); border-radius: 12px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.95rem; color: var(--kc-text-primary);
  background: #fff; outline: none;
  transition: border-color 0.18s, box-shadow 0.18s;
  letter-spacing: 0.04em;
}
.ms-verify-input:focus { border-color: var(--kc-brand); box-shadow: 0 0 0 3px rgba(79,70,229,0.1); }
.ms-verify-input::placeholder { color: var(--kc-text-muted); letter-spacing: 0; font-size: 0.875rem; }

.ms-verify-divider {
  display: flex; align-items: center; gap: 12px;
  margin: 6px 0 14px;
  font-size: 0.72rem; color: var(--kc-text-muted); font-weight: 600;
  text-transform: uppercase; letter-spacing: 0.06em;
}
.ms-verify-divider::before,
.ms-verify-divider::after { content: ''; flex: 1; height: 1px; background: var(--kc-border); }

/* Button */
.ms-verify-btn {
  width: 100%; height: 50px;
  background: var(--kc-grad-main); color: #fff;
  border: none; border-radius: 12px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.95rem; font-weight: 700; cursor: pointer;
  display: flex; align-items: center; justify-content: center; gap: 8px;
  transition: opacity 0.2s, transform 0.2s, box-shadow 0.2s;
  box-shadow: 0 4px 18px rgba(79,70,229,0.25); margin-top: 8px;
}
.ms-verify-btn:hover { opacity: 0.92; transform: translateY(-1px); box-shadow: 0 6px 24px rgba(79,70,229,0.35); }
.ms-verify-btn:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }
.ms-verify-spinner {
  width: 18px; height: 18px;
  border: 2.5px solid rgba(255,255,255,0.3);
  border-top-color: #fff; border-radius: 50%;
  animation: spin 0.7s linear infinite; display: none;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* ── Result ── */
.ms-verify-result { display: none; }
.ms-verify-result.show { display: block; animation: fadeSlideUp 0.35s ease; }
@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(16px); }
  to   { opacity: 1; transform: translateY(0); }
}

.ms-verify-result-card {
  background: #fff; border-radius: 20px; overflow: hidden;
  border: 1px solid var(--kc-border);
  box-shadow: 0 4px 24px rgba(0,0,0,0.06);
}
.ms-verify-result-header { padding: 20px 24px; display: flex; align-items: center; gap: 14px; }
.ms-verify-result-header--success { background: linear-gradient(135deg, #ecfdf5, #d1fae5); border-bottom: 1px solid #a7f3d0; }
.ms-verify-result-header--error   { background: linear-gradient(135deg, #fff5f7, #fff1f2); border-bottom: 1px solid #fecdd3; }

.ms-verify-result-icon {
  width: 48px; height: 48px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem; font-weight: 800; flex-shrink: 0;
}
.ms-verify-result-icon--success { background: #fff; color: #059669; border: 2px solid rgba(16,185,129,0.3); box-shadow: 0 0 16px rgba(16,185,129,0.25); }
.ms-verify-result-icon--error   { background: #fff; color: #e11d48; border: 2px solid rgba(244,63,94,0.3);  box-shadow: 0 0 16px rgba(244,63,94,0.2); }

.ms-verify-result-title           { font-size: 1rem; font-weight: 800; line-height: 1.2; }
.ms-verify-result-title--success  { color: #059669; }
.ms-verify-result-title--error    { color: #e11d48; }
.ms-verify-result-subtitle        { font-size: 0.78rem; color: var(--kc-text-muted); margin-top: 3px; }

.ms-verify-result-body { padding: 24px; }
.ms-verify-info-grid   { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; }
.ms-verify-info-label  { font-size: 0.68rem; font-weight: 700; color: var(--kc-text-muted); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px; }
.ms-verify-info-value  { font-size: 0.9rem; font-weight: 700; color: var(--kc-text-primary); line-height: 1.3; }

.ms-verify-status { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; }
.ms-verify-status--active { background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; }
.ms-verify-status-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; animation: pulse 1.5s ease infinite; }
@keyframes pulse { 0%,100% { opacity:1; } 50% { opacity:0.35; } }

.ms-verify-download-btn {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  width: 100%; padding: 12px; border-radius: 10px;
  background: var(--kc-brand-light); color: var(--kc-brand);
  border: 1.5px solid var(--kc-border);
  font-size: 0.875rem; font-weight: 700; text-decoration: none;
  transition: background 0.18s, border-color 0.18s;
}
.ms-verify-download-btn:hover { background: var(--kc-brand); color: #fff; border-color: var(--kc-brand); }

.ms-verify-error-body { padding: 24px; text-align: center; }
.ms-verify-error-msg  { font-size: 0.9rem; color: var(--kc-text-secondary); line-height: 1.6; margin-bottom: 16px; }
.ms-verify-error-contact {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 8px 18px; border-radius: 8px;
  background: var(--kc-brand-light); color: var(--kc-brand);
  font-size: 0.82rem; font-weight: 700; text-decoration: none; transition: background 0.18s;
}
.ms-verify-error-contact:hover { background: #e0e7ff; }

/* ── Sidebar ── */
.ms-verify-sidebar { display: flex; flex-direction: column; gap: 16px; position: sticky; top: 84px; }
.ms-vs-card { background: #fff; border: 1px solid var(--kc-border); border-radius: 16px; padding: 20px; }
.ms-vs-card--brand { background: var(--kc-grad-main); border-color: transparent; }
.ms-vs-card-title {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.88rem; font-weight: 800; color: var(--kc-text-primary);
  margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1.5px solid var(--kc-border);
}
.ms-vs-card--brand .ms-vs-card-title { color: #fff; border-bottom-color: rgba(255,255,255,0.2); }
.ms-vs-steps { display: flex; flex-direction: column; gap: 14px; }
.ms-vs-step  { display: flex; align-items: flex-start; gap: 12px; }
.ms-vs-step-num {
  width: 26px; height: 26px; border-radius: 50%;
  background: var(--kc-grad-main); color: #fff;
  font-size: 0.72rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 1px;
}
.ms-vs-step-text { font-size: 0.82rem; color: var(--kc-text-secondary); font-weight: 500; line-height: 1.5; }
.ms-vs-step-text strong { color: var(--kc-text-primary); font-weight: 700; display: block; margin-bottom: 1px; }
.ms-vs-types { display: flex; flex-direction: column; gap: 8px; }
.ms-vs-type-item {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 10px;
  background: var(--kc-brand-light); border: 1px solid var(--kc-border);
}
.ms-vs-type-icon { font-size: 1.1rem; flex-shrink: 0; }
.ms-vs-type-text { font-size: 0.8rem; color: var(--kc-text-secondary); font-weight: 500; line-height: 1.4; }
.ms-vs-type-text strong { color: var(--kc-text-primary); font-weight: 700; display: block; }
.ms-vs-call-btn {
  display: flex; align-items: center; justify-content: center; gap: 7px;
  width: 100%; padding: 10px; border-radius: 10px;
  background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);
  color: #fff; font-size: 0.84rem; font-weight: 700;
  text-decoration: none; margin-bottom: 8px; transition: background 0.18s;
}
.ms-vs-call-btn:last-child { margin-bottom: 0; }
.ms-vs-call-btn:hover { background: rgba(255,255,255,0.25); color: #fff; }
.ms-vs-whatsapp { background: rgba(37,211,102,0.22); border-color: rgba(37,211,102,0.35); }
.ms-vs-whatsapp:hover { background: rgba(37,211,102,0.38); }

/* Responsive */
@media (max-width: 900px) {
  .ms-verify-layout  { grid-template-columns: 1fr; }
  .ms-verify-sidebar { position: static; }
}
@media (max-width: 600px) {
  .ms-verify-card        { padding: 20px; }
  .ms-verify-result-body { padding: 16px; }
  .ms-verify-info-grid   { grid-template-columns: 1fr; gap: 12px; }
}
</style>
@endpush

@section('content')

{{-- ── HERO — Global ms-page-hero use ── --}}
<section class="ms-page-hero">
  <div class="kc-container ms-page-hero-inner">

    {{-- Left — Text --}}
    <div class="ms-page-hero-text">
      <div class="ms-page-hero-label">🔐 Instant Verification</div>
      <h1 class="ms-page-hero-title">
        Verify Your <span>Certificate</span>
      </h1>
      <p class="ms-page-hero-sub">
        Instantly verify the authenticity of any Kranti Computer
        certificate or student ID card online.
      </p>
      <div class="ms-page-hero-badges">
        <span class="ms-page-hero-badge">✓ Instant Result</span>
        <span class="ms-page-hero-badge">🔒 Secure</span>
        <span class="ms-page-hero-badge">📋 Government Recognized</span>
      </div>
    </div>

    {{-- Right — Image / Placeholder --}}
    <div class="ms-page-hero-media">
      {{-- Real image: --}}
      {{-- <img src="{{ asset('images/verify-hero.png') }}" alt="Certificate Verification" class="ms-page-hero-img"> --}}

      {{-- Placeholder --}}
      <div class="ms-page-hero-placeholder">
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--1"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--2"></div>
        <div class="ms-page-hero-ph-circle ms-page-hero-ph-circle--3"></div>
        <div class="ms-page-hero-ph-icon">🏆</div>
        <div class="ms-page-hero-ph-card">
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--short"></div>
          <div class="ms-page-hero-ph-card-line"></div>
          <div class="ms-page-hero-ph-card-line ms-page-hero-ph-card-line--mid"></div>
          <div class="ms-page-hero-ph-badge">✓ Verified</div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ── MAIN SECTION ── --}}
<section class="ms-section ms-section--soft ms-verify-section">
  <div class="kc-container">
    <div class="ms-verify-layout">

      {{-- ── LEFT ── --}}
      <div class="ms-verify-main">

        <div class="ms-verify-card">
          <div class="ms-verify-card-head">
            <div class="ms-verify-card-title">🔍 Enter Verification Details</div>
            <div class="ms-verify-card-sub">Enter your certificate number or student ID to verify.</div>
          </div>

          <div class="ms-verify-tabs">
            <button class="ms-verify-tab active" data-tab="cert">📜 Certificate No</button>
            <button class="ms-verify-tab" data-tab="student">🎓 Student ID</button>
          </div>

          <div id="tabCert">
            <div class="ms-verify-form-group">
              <label class="ms-verify-label">Certificate Number</label>
              <input type="text" id="certNo" class="ms-verify-input"
                     placeholder="e.g. KC/2024/DCA/001" maxlength="30" autocomplete="off">
            </div>
            <div class="ms-verify-divider">Additional Verification</div>
            <div class="ms-verify-form-group">
              <label class="ms-verify-label">Date of Birth</label>
              <input type="date" id="certDob" class="ms-verify-input">
            </div>
          </div>

          <div id="tabStudent" style="display:none;">
            <div class="ms-verify-form-group">
              <label class="ms-verify-label">Student ID / Roll Number</label>
              <input type="text" id="studentId" class="ms-verify-input"
                     placeholder="e.g. KC2024001" maxlength="20" autocomplete="off">
            </div>
            <div class="ms-verify-divider">Additional Verification</div>
            <div class="ms-verify-form-group">
              <label class="ms-verify-label">Date of Birth</label>
              <input type="date" id="studentDob" class="ms-verify-input">
            </div>
          </div>

          <button class="ms-verify-btn" id="verifyBtn">
            <div class="ms-verify-spinner" id="verifySpinner"></div>
            <span id="verifyBtnText">🔍 Verify Now</span>
          </button>
        </div>

        {{-- Result --}}
        <div class="ms-verify-result" id="verifyResult">

          <div class="ms-verify-result-card" id="resultSuccess" style="display:none;">
            <div class="ms-verify-result-header ms-verify-result-header--success">
              <div class="ms-verify-result-icon ms-verify-result-icon--success">✓</div>
              <div>
                <div class="ms-verify-result-title ms-verify-result-title--success">Certificate Verified!</div>
                <div class="ms-verify-result-subtitle">This certificate was issued by Kranti Computer and is valid.</div>
              </div>
            </div>
            <div class="ms-verify-result-body">
              <div class="ms-verify-info-grid">
                <div>
                  <div class="ms-verify-info-label">Student Name</div>
                  <div class="ms-verify-info-value" id="rName">—</div>
                </div>
                <div>
                  <div class="ms-verify-info-label">Course</div>
                  <div class="ms-verify-info-value" id="rCourse">—</div>
                </div>
                <div>
                  <div class="ms-verify-info-label">Certificate No</div>
                  <div class="ms-verify-info-value" id="rCertNo">—</div>
                </div>
                <div>
                  <div class="ms-verify-info-label">Batch / Year</div>
                  <div class="ms-verify-info-value" id="rBatch">—</div>
                </div>
                <div>
                  <div class="ms-verify-info-label">Issue Date</div>
                  <div class="ms-verify-info-value" id="rIssue">—</div>
                </div>
                <div>
                  <div class="ms-verify-info-label">Status</div>
                  <div class="ms-verify-info-value">
                    <span class="ms-verify-status ms-verify-status--active">
                      <span class="ms-verify-status-dot"></span> Active
                    </span>
                  </div>
                </div>
              </div>
              <a href="#" class="ms-verify-download-btn">📥 Download Certificate</a>
            </div>
          </div>

          <div class="ms-verify-result-card" id="resultError" style="display:none;">
            <div class="ms-verify-result-header ms-verify-result-header--error">
              <div class="ms-verify-result-icon ms-verify-result-icon--error">✕</div>
              <div>
                <div class="ms-verify-result-title ms-verify-result-title--error">Certificate Not Found</div>
                <div class="ms-verify-result-subtitle">No record was found for the provided details.</div>
              </div>
            </div>
            <div class="ms-verify-error-body">
              <p class="ms-verify-error-msg">
                The certificate number or student ID you entered does not exist in our records.
                Please double-check the details and try again, or contact us for assistance.
              </p>
              <a href="{{ route('main.contact') }}" class="ms-verify-error-contact">📞 Contact Us</a>
            </div>
          </div>

        </div>

      </div>

      {{-- ── RIGHT — SIDEBAR ── --}}
      <div class="ms-verify-sidebar">

        <div class="ms-vs-card">
          <div class="ms-vs-card-title">🔍 How It Works</div>
          <div class="ms-vs-steps">
            <div class="ms-vs-step">
              <div class="ms-vs-step-num">1</div>
              <div class="ms-vs-step-text">
                <strong>Enter Certificate No</strong>
                Find the number printed on your certificate.
              </div>
            </div>
            <div class="ms-vs-step">
              <div class="ms-vs-step-num">2</div>
              <div class="ms-vs-step-text">
                <strong>Confirm Date of Birth</strong>
                Required for additional security verification.
              </div>
            </div>
            <div class="ms-vs-step">
              <div class="ms-vs-step-num">3</div>
              <div class="ms-vs-step-text">
                <strong>Get Instant Result</strong>
                View details and download your certificate.
              </div>
            </div>
          </div>
        </div>

        <div class="ms-vs-card">
          <div class="ms-vs-card-title">📋 Valid Certificates</div>
          <div class="ms-vs-types">
            <div class="ms-vs-type-item">
              <div class="ms-vs-type-icon">🎓</div>
              <div class="ms-vs-type-text"><strong>Diploma Courses</strong>DCA, ADCA, PGDCA, O Level</div>
            </div>
            <div class="ms-vs-type-item">
              <div class="ms-vs-type-icon">💼</div>
              <div class="ms-vs-type-text"><strong>Accounting</strong>Tally Prime, Busy, GST</div>
            </div>
            <div class="ms-vs-type-item">
              <div class="ms-vs-type-icon">💻</div>
              <div class="ms-vs-type-text"><strong>Technical</strong>Web Design, Python, Photoshop</div>
            </div>
            <div class="ms-vs-type-item">
              <div class="ms-vs-type-icon">📄</div>
              <div class="ms-vs-type-text"><strong>Basic</strong>MS Office, CCC, Typing</div>
            </div>
          </div>
        </div>

        <div class="ms-vs-card ms-vs-card--brand">
          <div class="ms-vs-card-title"><span>📞</span> Need Help?</div>
          <p style="font-size:0.84rem; color:rgba(255,255,255,0.75); margin-bottom:16px; line-height:1.6;">
            Having trouble verifying your certificate? Feel free to contact us anytime.
          </p>
          <a href="tel:+91XXXXXXXXXX" class="ms-vs-call-btn">📞 Call Now</a>
          <a href="https://wa.me/91XXXXXXXXXX" class="ms-vs-call-btn ms-vs-whatsapp">💬 WhatsApp</a>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  const tabs    = document.querySelectorAll('.ms-verify-tab');
  const tabCert = document.getElementById('tabCert');
  const tabStu  = document.getElementById('tabStudent');

  tabs.forEach(tab => {
    tab.addEventListener('click', function () {
      tabs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');
      tabCert.style.display = this.dataset.tab === 'cert' ? '' : 'none';
      tabStu.style.display  = this.dataset.tab === 'cert' ? 'none' : '';
      hideResult();
    });
  });

  const verifyBtn     = document.getElementById('verifyBtn');
  const verifySpinner = document.getElementById('verifySpinner');
  const verifyBtnText = document.getElementById('verifyBtnText');
  const verifyResult  = document.getElementById('verifyResult');
  const resultSuccess = document.getElementById('resultSuccess');
  const resultError   = document.getElementById('resultError');

  function showLoading(state) {
    verifyBtn.disabled          = state;
    verifySpinner.style.display = state ? 'block' : 'none';
    verifyBtnText.textContent   = state ? 'Verifying...' : '🔍 Verify Now';
  }
  function hideResult() {
    verifyResult.classList.remove('show');
    resultSuccess.style.display = 'none';
    resultError.style.display   = 'none';
  }
  function showSuccess(data) {
    document.getElementById('rName').textContent   = data.name;
    document.getElementById('rCourse').textContent = data.course;
    document.getElementById('rCertNo').textContent = data.cert_no;
    document.getElementById('rBatch').textContent  = data.batch;
    document.getElementById('rIssue').textContent  = data.issue_date;
    resultSuccess.style.display = 'block';
    resultError.style.display   = 'none';
    verifyResult.classList.add('show');
    verifyResult.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
  function showError() {
    resultSuccess.style.display = 'none';
    resultError.style.display   = 'block';
    verifyResult.classList.add('show');
    verifyResult.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  verifyBtn.addEventListener('click', function () {
    const activeTab = document.querySelector('.ms-verify-tab.active').dataset.tab;
    const searchVal = activeTab === 'cert'
      ? document.getElementById('certNo').value.trim()
      : document.getElementById('studentId').value.trim();
    const dobVal    = activeTab === 'cert'
      ? document.getElementById('certDob').value
      : document.getElementById('studentDob').value;

    if (!searchVal) {
      KcFlash.warning('Field Empty', activeTab === 'cert'
        ? 'Please enter your certificate number.'
        : 'Please enter your student ID.');
      return;
    }
    if (!dobVal) {
      KcFlash.warning('DOB Required', 'Please enter your date of birth for verification.');
      return;
    }

    hideResult();
    showLoading(true);

    setTimeout(() => {
      showLoading(false);
      const dummyRecords = {
        'KC/2024/DCA/001': {
          name: 'Jaypujan Prajapati',
          course: 'DCA — Diploma in Computer Application',
          cert_no: 'KC/2024/DCA/001',
          batch: '2023 — 2024',
          issue_date: '15 January 2024',
        },
        'KC2024001': {
          name: 'Anubhav Kumar',
          course: 'ADCA — Advanced Diploma in Computer Application',
          cert_no: 'KC/2024/ADCA/002',
          batch: '2023 — 2024',
          issue_date: '20 February 2024',
        },
      };
      const found = dummyRecords[searchVal.toUpperCase()] || dummyRecords[searchVal];
      if (found) {
        showSuccess(found);
        KcFlash.success('Verified!', 'Certificate is valid and authenticated.');
      } else {
        showError();
        KcFlash.error('Not Found', 'No certificate found with the provided details.');
      }
    }, 1800);
  });

  document.querySelectorAll('.ms-verify-input').forEach(input => {
    input.addEventListener('keydown', e => { if (e.key === 'Enter') verifyBtn.click(); });
  });

});
</script>
@endpush