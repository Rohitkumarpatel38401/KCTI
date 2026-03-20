{{-- resources/views/main_site/pages/index.blade.php --}}
@extends('main_site.layouts.app')

@section('title', 'Home')
@section('meta_desc', 'Kranti Computer — Leading IT Education Institute in Prayagraj. DCA, ADCA, Tally & more.')

@push('styles')
<style>
  

</style>
@endpush
@section('content')

{{-- ── 1. HERO SLIDER (Swiper.js) ── --}}
<section class="ms-hero-slider">
  <div class="swiper ms-swiper-hero" id="msHeroSwiper">
    <div class="swiper-wrapper">

      {{-- Slide 1 --}}
      <div class="swiper-slide">
        <div class="ms-hero-slide-bg" style="background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);"></div>
        <div class="kc-container ms-hero-slide-inner">
          <div class="ms-hero-slide-text">
            <span class="ms-hero-label">🎓 Admissions Open 2025</span>
            <h1 class="ms-hero-title">
              Learn . Build .<span class="ms-accent">Succeed</span>
            </h1>
            <p class="ms-hero-sub">
              Prayagraj ka sabse trusted IT education center.<br>
              Industry-ready courses jo aapko job dilaye.
            </p>
            <div class="ms-hero-actions">
              <a href="{{ route('main.students.registration') }}" class="kc-btn kc-btn-solid-indigo">Apply Now →</a>
              <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-ghost">View Courses</a>
            </div>
          </div>
          <div class="ms-hero-slide-media">
            {{-- <img src="{{ asset('images/hero-1.jpg') }}" alt=""> --}}
            <div class="ms-hero-slide-placeholder">🎓</div>
          </div>
        </div>
      </div>

      {{-- Slide 2 --}}
      <div class="swiper-slide">
        <div class="ms-hero-slide-bg" style="background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);"></div>
        <div class="kc-container ms-hero-slide-inner">
          <div class="ms-hero-slide-text">
            <span class="ms-hero-label">💼 100% Placement Support</span>
            <h1 class="ms-hero-title">
              Job-Ready <span class="ms-accent">Skills</span>
            </h1>
            <p class="ms-hero-sub">
              Resume building se interview prep tak —<br>
              hum aapke saath hain har kadam pe.
            </p>
            <div class="ms-hero-actions">
              <a href="{{ route('main.placement') }}" class="kc-btn kc-btn-solid-indigo">Placement Info →</a>
              <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-ghost">View Courses</a>
            </div>
          </div>
          <div class="ms-hero-slide-media">
            {{-- <img src="{{ asset('images/hero-2.jpg') }}" alt=""> --}}
            <div class="ms-hero-slide-placeholder">💼</div>
          </div>
        </div>
      </div>

      {{-- Slide 3 --}}
      <div class="swiper-slide">
        <div class="ms-hero-slide-bg" style="background: linear-gradient(135deg, #faf5ff 0%, #ede9fe 100%);"></div>
        <div class="kc-container ms-hero-slide-inner">
          <div class="ms-hero-slide-text">
            <span class="ms-hero-label">📜 Government Recognized</span>
            <h1 class="ms-hero-title">
              Certified <span class="ms-accent">Courses</span>
            </h1>
            <p class="ms-hero-sub">
              DCA, ADCA, PGDCA, Tally, O Level —<br>
              sarkari manyata prapt certificates.
            </p>
            <div class="ms-hero-actions">
              <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-solid-indigo">Explore Courses →</a>
              <a href="{{ route('main.students.registration') }}" class="kc-btn kc-btn-ghost">Apply Now</a>
            </div>
          </div>
          <div class="ms-hero-slide-media">
            {{-- <img src="{{ asset('images/hero-3.jpg') }}" alt=""> --}}
            <div class="ms-hero-slide-placeholder">📜</div>
          </div>
        </div>
      </div>

    </div>

    {{-- Pagination dots --}}
    <div class="swiper-pagination" id="msHeroPagination"></div>

    {{-- Arrows --}}
    <div class="swiper-button-prev ms-swiper-prev"></div>
    <div class="swiper-button-next ms-swiper-next"></div>

  </div>
</section>
@push('scripts')
<script>
  new Swiper('#msHeroSwiper', {
    loop:           true,
    speed:          700,
    autoplay:       { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
    effect:         'slide',          // 'fade' | 'slide' | 'coverflow'
    pagination:     { el: '#msHeroPagination', clickable: true },
    navigation:     { prevEl: '.ms-swiper-prev', nextEl: '.ms-swiper-next' },
    grabCursor:     true,
    keyboard:       { enabled: true },
  });
</script>
@endpush

{{-- ── 2. STATS ── --}}
<section class="ms-section ms-section--white" style="padding: 24px 0;">
  <div class="kc-container">
    <div class="ms-grid-4">
      <div class="ms-stat">
        <div class="ms-stat-number">2000+</div>
        <div class="ms-stat-label">Students Trained</div>
      </div>
      <div class="ms-stat">
        <div class="ms-stat-number">50+</div>
        <div class="ms-stat-label">Courses Offered</div>
      </div>
      <div class="ms-stat">
        <div class="ms-stat-number">95%</div>
        <div class="ms-stat-label">Placement Rate</div>
      </div>
      <div class="ms-stat">
        <div class="ms-stat-number">8+</div>
        <div class="ms-stat-label">Years Experience</div>
      </div>
    </div>
  </div>
</section>

{{-- ── 3. FEATURED COURSES ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">What We Offer</div>
      <h2 class="ms-section-title">The Best Courses In Our Coaching Center</h2>
      <p class="ms-section-sub">Government-recognized, job-oriented computer courses for every student.</p>
    </div>

    <div class="ms-grid-3">

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--popular">Popular</span>
          <div class="ms-course-title">Diploma Courses</div>
          <div class="ms-course-desc">DCA, ADCA, PGDCA — complete computer diploma programs recognized by government.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">DCA</span>
            <span class="ms-course-tag">ADCA</span>
            <span class="ms-course-tag">PGDCA</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 6–12 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--hot">Hot</span>
          <div class="ms-course-title">Diploma in Data Entry Operator</div>
          <div class="ms-course-desc">Fast typing, data entry skills aur MS Office — sarkari aur private jobs ke liye must.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">Typing</span>
            <span class="ms-course-tag">MS Excel</span>
            <span class="ms-course-tag">Data Entry</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 3 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--new">Govt</span>
          <div class="ms-course-title">NIELIT Courses</div>
          <div class="ms-course-desc">O Level, A Level, CCC — National Institute of Electronics & IT certified courses.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">O Level</span>
            <span class="ms-course-tag">CCC</span>
            <span class="ms-course-tag">A Level</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 3–12 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--popular">Popular</span>
          <div class="ms-course-title">Programming Languages</div>
          <div class="ms-course-desc">C++, Python, Java — industry-standard programming languages for software jobs.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">C++</span>
            <span class="ms-course-tag">Python</span>
            <span class="ms-course-tag">Java</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 3–6 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--new">New</span>
          <div class="ms-course-title">Web Design & Development</div>
          <div class="ms-course-desc">HTML, CSS, JavaScript se professional websites banana seekho. Freelance ready course.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">HTML/CSS</span>
            <span class="ms-course-tag">JavaScript</span>
            <span class="ms-course-tag">Freelance</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 3 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

      <div class="ms-course-card">
        <div class="ms-course-card-top">
          <span class="ms-course-badge ms-course-badge--popular">Hot</span>
          <div class="ms-course-title">Tally Prime with GST</div>
          <div class="ms-course-desc">Business accounting, GST filing aur payroll — har company mein demand.</div>
          <div class="ms-course-tags">
            <span class="ms-course-tag">Accounting</span>
            <span class="ms-course-tag">GST</span>
            <span class="ms-course-tag">Tally</span>
          </div>
        </div>
        <div class="ms-course-card-bottom">
          <span class="ms-course-meta">⏱ 3 Months</span>
          <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-outline-indigo" style="height:34px;padding:0 16px;font-size:0.8rem;">Details</a>
        </div>
      </div>

    </div>

    <div class="ms-text-center" style="margin-top: 36px;">
      <a href="{{ route('main.courses') }}" class="kc-btn kc-btn-gradient">View All Courses →</a>
    </div>
  </div>
</section>

{{-- ── 4. TOP ALUMNI ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Success Stories</div>
      <h2 class="ms-section-title">Top Alumni Students</h2>
      <p class="ms-section-sub">Hamare students jo aaj successful careers mein hain.</p>
    </div>

    <div class="ms-grid-4">

      <div class="ms-alumni-card">
        <div class="ms-alumni-photo-wrap">
          <img src="{{ asset('images/photo.jpg') }}" alt="Rohit Patel" class="ms-alumni-photo">
          <div class="ms-alumni-shine"></div>
        </div>
        <div class="ms-alumni-footer">
          <div class="ms-alumni-footer-name">Jaypujan Prajapati</div>
          <div class="ms-alumni-footer-course">ADCA Graduate · Software Developer</div>
        </div>
      </div>

      <div class="ms-alumni-card">
        <div class="ms-alumni-photo-wrap">
           <img src="{{ asset('images/sumit.jpeg') }}" alt="Sumit" class="ms-alumni-photo">
          <div class="ms-alumni-shine"></div>
        </div>
        <div class="ms-alumni-footer">
          <div class="ms-alumni-footer-name">Sumit Kumar</div>
          <div class="ms-alumni-footer-course">DCA Graduate · Data Entry Expert</div>
        </div>
      </div>

      <div class="ms-alumni-card">
        <div class="ms-alumni-photo-wrap">
          <img src="{{ asset('images/photo.jpg') }}" alt="Jaypujan Prajapati" class="ms-alumni-photo">
          <div class="ms-alumni-shine"></div>
        </div>
        <div class="ms-alumni-footer">
          <div class="ms-alumni-footer-name">Rohit Patel</div>
          <div class="ms-alumni-footer-course">ADCA Graduate · Software Developer</div>
        </div>
      </div>

      <div class="ms-alumni-card">
        <div class="ms-alumni-photo-wrap">
           <img src="{{ asset('images/sumit.jpeg') }}" alt="Sumit" class="ms-alumni-photo">
          <div class="ms-alumni-shine"></div>
        </div>
        <div class="ms-alumni-footer">
          <div class="ms-alumni-footer-name">Sumit Kumar</div>
          <div class="ms-alumni-footer-course">DCA Graduate · Data Entry Expert</div>
        </div>
      </div>


    </div>

    <div class="ms-text-center" style="margin-top: 40px;">
      <a href="{{ route('main.placement') }}" class="kc-btn kc-btn-outline-indigo">View All Alumni →</a>
    </div>
  </div>
</section>

{{-- ── 5. OUR TEACHERS ── --}}
<section class="ms-teacher-section">
  <div class="kc-container">

    {{-- Header row --}}
    <div class="ms-teacher-header">
      <div>
        <div class="ms-section-label" style="color:#818cf8; margin-bottom:8px;">Our Faculty</div>
        <h2 class="ms-section-title" style="color:#fff;">Our Instructor</h2>
        <p class="ms-section-sub" style="color:rgba(255,255,255,0.45); margin-top:10px;">
          Discover brilliance in teaching with our expert instructors. Passionate mentors dedicated to
          fueling your learning journey at Kranti Computer.
        </p>
      </div>
      <div class="ms-teacher-arrows">
        <button class="ms-teacher-prev" aria-label="Previous">
          <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="ms-teacher-next" aria-label="Next">
          <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
            <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>

    {{-- Swiper --}}
    <div class="swiper ms-teacher-swiper">
      <div class="swiper-wrapper">

        {{-- Slide 1 --}}
        <div class="swiper-slide">
          <div class="ms-teacher-slide-card">
            <div class="ms-teacher-slide-photo">
              <div class="ms-tsc-ring ms-tsc-ring--1"></div>
              <div class="ms-tsc-ring ms-tsc-ring--2"></div>
              <div class="ms-tsc-ring ms-tsc-ring--3"></div>
              <img src="{{ asset('images/teacher/') }}" alt="Himanshu" class="ms-teacher-slide-img">
            </div>
            <div class="ms-teacher-slide-info">
              <h3 class="ms-teacher-slide-name">Mr. Himanshu</h3>
              <div class="ms-teacher-slide-role">Computer Hardware & Software, Instructor @Kranti Computer</div>
              <p class="ms-teacher-slide-bio">
                Mr. Himanshu is an experienced computer hardware and software trainer with
                <strong>10+ years</strong> in the field. Known for his simplified and practical teaching style,
                he has trained hundreds of students who are now working in reputed organizations.
                His expertise in <strong>DCA, ADCA</strong> curriculum makes complex topics easy to grasp.
              </p>
              <div class="ms-teacher-slide-meta">
                <span class="ms-teacher-slide-badge">⭐ 10+ Years Exp</span>
                <span class="ms-teacher-slide-badge">🎓 DCA / ADCA</span>
                <span class="ms-teacher-slide-badge">🖥️ Hardware Expert</span>
              </div>
              <div class="ms-teacher-slide-socials">
                <a href="#" class="ms-teacher-slide-social" title="LinkedIn">
                  <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="mailto:#" class="ms-teacher-slide-social" title="Email">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </a>
                <a href="tel:#" class="ms-teacher-slide-social" title="Phone">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        {{-- Slide 2 --}}
        <div class="swiper-slide">
          <div class="ms-teacher-slide-card">
            <div class="ms-teacher-slide-photo">
              <div class="ms-tsc-ring ms-tsc-ring--1"></div>
              <div class="ms-tsc-ring ms-tsc-ring--2"></div>
              <div class="ms-tsc-ring ms-tsc-ring--3"></div>
              {{-- <div class="ms-teacher-slide-initials">SH</div> --}}
              <img src="{{ asset('images/teacher/rohit.png') }}" alt="Rohit" class="ms-teacher-slide-img">

            </div>
            <div class="ms-teacher-slide-info">
              <h3 class="ms-teacher-slide-name">Mr. Rohit</h3>
              <div class="ms-teacher-slide-role">Web Design & Programming, Instructor @Kranti Computer</div>
              <p class="ms-teacher-slide-bio">
                Mr. Rohit is a passionate web design and programming expert with <strong>6+ years</strong>
                of hands-on experience. He specializes in <strong>HTML, CSS, JavaScript</strong> and modern
                web technologies. Students trained by him have successfully built real-world projects and
                landed jobs in top IT companies.
              </p>
              <div class="ms-teacher-slide-meta">
                <span class="ms-teacher-slide-badge">⭐ 6+ Years Exp</span>
                <span class="ms-teacher-slide-badge">💻 Web Design</span>
                <span class="ms-teacher-slide-badge">⚡ JavaScript</span>
              </div>
              <div class="ms-teacher-slide-socials">
                <a href="#" class="ms-teacher-slide-social" title="LinkedIn">
                  <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="mailto:#" class="ms-teacher-slide-social" title="Email">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </a>
                <a href="tel:#" class="ms-teacher-slide-social" title="Phone">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        {{-- Slide 3 --}}
        <div class="swiper-slide">
          <div class="ms-teacher-slide-card">
            <div class="ms-teacher-slide-photo">
              <div class="ms-tsc-ring ms-tsc-ring--1"></div>
              <div class="ms-tsc-ring ms-tsc-ring--2"></div>
              <div class="ms-tsc-ring ms-tsc-ring--3"></div>
              {{-- <div class="ms-teacher-slide-initials">SV</div> --}}
              <img src="{{ asset('images/teacher/') }}" alt="Jaypujan" class="ms-teacher-slide-img">

            </div>
            <div class="ms-teacher-slide-info">
              <h3 class="ms-teacher-slide-name">Mr. Jaypujan Sir</h3>
              <div class="ms-teacher-slide-role">Computer Software Specialist, Instructor @Kranti Computer</div>
              <p class="ms-teacher-slide-bio">
                Mr. Jaypujan brings <strong>5+ years</strong> of expertise in computer software
                and applications. His specialization in <strong>MS Office, DCA & ADCA</strong> curriculum
                has helped countless students crack government exams and secure private sector jobs.
                Known for his patient and detailed approach to teaching.
              </p>
              <div class="ms-teacher-slide-meta">
                <span class="ms-teacher-slide-badge">⭐ 5+ Years Exp</span>
                <span class="ms-teacher-slide-badge">🖥️ Software</span>
                <span class="ms-teacher-slide-badge">📄 MS Office</span>
              </div>
              <div class="ms-teacher-slide-socials">
                <a href="#" class="ms-teacher-slide-social" title="LinkedIn">
                  <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="mailto:#" class="ms-teacher-slide-social" title="Email">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </a>
                <a href="tel:#" class="ms-teacher-slide-social" title="Phone">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

  </div>
</section>

@push('scripts')
  <script>
    new Swiper('.ms-teacher-swiper', {
      loop:          true,
      speed:         800,
      effect:        'creative',
      grabCursor:    true,
      simulateTouch: true,
      creativeEffect: {
        prev: {
          translate: ['-110%', 0, -200],
          opacity:   0,
        },
        next: {
          translate: ['110%', 0, -200],
          opacity:   0,
        },
      },
      autoplay: {
        delay:                5000,
        disableOnInteraction: false,
        pauseOnMouseEnter:    true,
      },
      navigation: {
        prevEl: '.ms-teacher-prev',
        nextEl: '.ms-teacher-next',
      },
      keyboard: { enabled: true },
    });
  </script>
@endpush

{{-- ── 6. GALLERY PREVIEW ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Campus Life</div>
      <h2 class="ms-section-title">Our Classroom</h2>
      <p class="ms-section-sub">Modern infrastructure aur latest technology ke saath equipped classrooms.</p>
    </div>

    <div class="ms-gallery-grid">

      {{-- Large --}}
      <div class="ms-gallery-item ms-gallery-item--large">
        <img src="{{ asset('images/gallery/center.jpeg') }}" alt="Computer Lab" class="ms-gallery-img">
        <div class="ms-gallery-overlay">
          <div class="ms-gallery-overlay-title">Computer Lab</div>
          <div class="ms-gallery-overlay-sub">State-of-the-art machines</div>
        </div>
        <span class="ms-gallery-tag">Computer Lab</span>
      </div>

      {{-- Item 2 --}}
      <div class="ms-gallery-item">
        <img src="{{ asset('images/gallery/center.jpeg') }}" alt="Library" class="ms-gallery-img">
        <div class="ms-gallery-overlay">
          <div class="ms-gallery-overlay-title">Library</div>
          <div class="ms-gallery-overlay-sub">400+ Books & Resources</div>
        </div>
        <span class="ms-gallery-tag">Library</span>
      </div>

      {{-- Item 3 --}}
      <div class="ms-gallery-item">
        <img src="{{ asset('images/gallery/center.jpeg') }}" alt="Classroom" class="ms-gallery-img">
        <div class="ms-gallery-overlay">
          <div class="ms-gallery-overlay-title">Classroom</div>
          <div class="ms-gallery-overlay-sub">AC & Projector Equipped</div>
        </div>
        <span class="ms-gallery-tag">Classroom</span>
      </div>

      {{-- Item 4 --}}
      <div class="ms-gallery-item">
        <img src="{{ asset('images/gallery/center.jpeg') }}" alt="Awards" class="ms-gallery-img">
        <div class="ms-gallery-overlay">
          <div class="ms-gallery-overlay-title">Awards</div>
          <div class="ms-gallery-overlay-sub">Excellence in Education</div>
        </div>
        <span class="ms-gallery-tag">Awards</span>
      </div>

      {{-- Item 5 --}}
      <div class="ms-gallery-item">
        <img src="{{ asset('images/gallery/center.jpeg') }}" alt="Practical Lab" class="ms-gallery-img">
        <div class="ms-gallery-overlay">
          <div class="ms-gallery-overlay-title">Practical Lab</div>
          <div class="ms-gallery-overlay-sub">Hands-on Training</div>
        </div>
        <span class="ms-gallery-tag">Practical Lab</span>
      </div>

    </div>

    <div class="ms-text-center" style="margin-top: 36px;">
      <a href="{{ route('main.gallery') }}" class="kc-btn kc-btn-outline-indigo">View Full Gallery →</a>
    </div>
  </div>
</section>

{{-- ── 7. RECENT NEWS ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Latest Updates</div>
      <h2 class="ms-section-title">Recent News</h2>
    </div>

    <div class="ms-news-list">
      <div class="ms-news-track" id="msNewsTrack">

        <div class="ms-news-item">
          <div class="ms-news-date">23 Jul 2025</div>
          <div class="ms-news-content">
            <div class="ms-news-title">BCA (Bachelor of Computer Application) Classes Started</div>
            <div class="ms-news-desc">BCA classes started — Join Fast and get Discount!</div>
          </div>
          <span class="ms-news-badge ms-news-badge--new">New</span>
        </div>

        <div class="ms-news-item">
          <div class="ms-news-date">08 Jan 2025</div>
          <div class="ms-news-content">
            <div class="ms-news-title">O Level New Batch — 11AM & 4PM</div>
            <div class="ms-news-desc">Dear Students, O Level New batch Start at 11AM, 4PM. Join Fast with heavy Discount!</div>
          </div>
          <span class="ms-news-badge ms-news-badge--hot">Hot</span>
        </div>

        <div class="ms-news-item">
          <div class="ms-news-date">09 Jan 2024</div>
          <div class="ms-news-content">
            <div class="ms-news-title">New Batch Starting — O Level</div>
            <div class="ms-news-desc">Dear Students O Level New Batch Start. Admission Open — Harry up!</div>
          </div>
          <span class="ms-news-badge">Info</span>
        </div>

        <div class="ms-news-item">
          <div class="ms-news-date">12 Aug 2021</div>
          <div class="ms-news-content">
            <div class="ms-news-title">ADCA, CCC, O Level New Batch — 7AM & 3PM</div>
            <div class="ms-news-desc">ADCA, CCC, O Level New Batch Start at 7:00 AM, 3:00 PM. You can join Now.</div>
          </div>
          <span class="ms-news-badge">Info</span>
        </div>

      </div>
    </div>

  </div>
</section>

@push('scripts')
<script>
  // Seamless loop — items duplicate karo
  const track = document.getElementById('msNewsTrack');
  if (track) track.innerHTML += track.innerHTML;
</script>
@endpush

{{-- ── 8. KEY POINTS ── --}}
<section class="ms-section ms-section--white">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Why Choose Us</div>
      <h2 class="ms-section-title">Our Key Points</h2>
    </div>

    <div class="ms-grid-3">
      <div class="ms-card">
        <div class="ms-card-icon">🏛️</div>
        <div class="ms-card-title">Good Facilities</div>
        <div class="ms-card-text">Modern computer lab, AC classrooms aur high-speed internet ke saath best learning environment.</div>
      </div>
      <div class="ms-card">
        <div class="ms-card-icon">📚</div>
        <div class="ms-card-title">Best Library</div>
        <div class="ms-card-text">IT books, study material aur reference guides ki comprehensive library students ke liye available.</div>
      </div>
      <div class="ms-card">
        <div class="ms-card-icon">🌐</div>
        <div class="ms-card-title">Networking Lab</div>
        <div class="ms-card-text">Cisco routers aur high-end networking equipment ke saath hands-on networking training.</div>
      </div>
      <div class="ms-card">
        <div class="ms-card-icon">👨‍🏫</div>
        <div class="ms-card-title">Quality Faculty</div>
        <div class="ms-card-text">Experienced staff jo students ko quality education aur practical training deta hai.</div>
      </div>
      <div class="ms-card">
        <div class="ms-card-icon">🎤</div>
        <div class="ms-card-title">Workshops & Seminars</div>
        <div class="ms-card-text">Every year workshops aur seminars conduct hote hain jo students ko competitive banate hain.</div>
      </div>
      <div class="ms-card">
        <div class="ms-card-icon">🏆</div>
        <div class="ms-card-title">Government Recognized</div>
        <div class="ms-card-text">Sarkari manyata prapt institute jahan certificates ki poori value hai har sector mein.</div>
      </div>
    </div>
  </div>
</section>

{{-- ── 9. ONLINE COURSES VIDEO ── --}}
<section class="ms-section ms-section--soft">
  <div class="kc-container">
    <div class="ms-section-head">
      <div class="ms-section-label">Learn Online</div>
      <h2 class="ms-section-title">Online Computer Courses</h2>
      <p class="ms-section-sub">Ghar baithe seekho — hamare online video courses se.</p>
    </div>

    <div class="ms-video-banner">
      <div class="ms-video-icon">▶</div>
      <div class="ms-video-text">
        <div class="ms-video-title">Click here to learn online computer courses</div>
        <div class="ms-video-sub">Free aur paid video lectures available hain</div>
      </div>
      <a href="#" class="kc-btn kc-btn-solid-indigo">Watch Now →</a>
    </div>
  </div>
</section>

{{-- ── 10. CTA ── --}}
<section class="ms-section ms-section--dark">
  <div class="kc-container ms-text-center">
    <h2 class="ms-section-title" style="color:#fff; margin-bottom:12px;">Ready to Start Your IT Career?</h2>
    <p style="color:#a5b4fc; margin-bottom:28px; max-width:480px; margin-inline:auto; line-height:1.65;">
      Aaj hi apply karo aur apna future secure karo.
    </p>
    <a href="{{ route('main.students.registration') }}" class="kc-btn kc-btn-neon-red">🚀 Apply for Admission</a>
  </div>
</section>

@endsection