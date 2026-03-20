{{-- resources/views/main_site/partials/header.blade.php --}}

{{-- Announcement Banner --}}
<div class="kc-announcement-bar" id="kcAnnouncementBar">
  🎓 New Batch Starting Soon! Use code
  <span class="kc-coupon-badge">KRANTI30</span>
  for 30% OFF on all courses
  <button class="kc-banner-close" aria-label="Close">✕</button>
</div>

{{-- Navbar --}}
<nav class="kc-main-nav" role="navigation" aria-label="Main Navigation">
  <div class="kc-nav-inner">

    {{-- Logo --}}
    <a href="{{ url('/') }}" class="kc-nav-logo" aria-label="Kranti Computer Home">
      <svg class="kc-logo-icon" viewBox="0 0 36 36" fill="none" aria-hidden="true">
        <defs>
          <linearGradient id="kcLogoGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%"   stop-color="#4f46e5"/>
            <stop offset="100%" stop-color="#7c3aed"/>
          </linearGradient>
        </defs>
        <polygon points="18,3 33,12 33,24 18,33 3,24 3,12" fill="url(#kcLogoGrad)" opacity="0.13"/>
        <polygon points="18,7 29,13.5 29,24 18,29 7,24 7,13.5" fill="none" stroke="url(#kcLogoGrad)" stroke-width="1.8"/>
        <polyline points="12,18.5 16,22.5 24,14" stroke="url(#kcLogoGrad)" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="kc-logo-text">
        <span class="kc-logo-name">KRANTI</span><span class="kc-logo-sub"> COMPUTER</span>
      </span>
    </a>

    {{-- Nav Links --}}
    <ul class="kc-nav-links" id="kcNavLinks" role="menubar">

      <li>
        <a href="{{ url('/') }}"
           class="kc-nav-link {{ request()->is('/') ? 'active' : '' }} ">
          Home
        </a>
      </li>

      <li>
        <a href="{{ route('main.courses') }}"
           class="kc-nav-link {{ request()->routeIs('main.courses') ? 'active' : '' }}">
          Courses
        </a>
      </li>

      {{-- Students Dropdown --}}
      <li class="kc-explore-li" id="kcStudentsLi">
        <button class="kc-nav-btn" aria-haspopup="true">
          Students
          <svg class="kc-chevron" viewBox="0 0 12 12" fill="none" aria-hidden="true">
            <path d="M2 4.5L6 8L10 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div class="kc-dropdown" role="menu">
          <a href="{{ route('main.students.registration') }}" class="kc-dd-item" role="menuitem">
            <div class="kc-dd-row">
              <span class="kc-dd-title">New Admission</span>
              <span class="kc-badge kc-badge-new">Open</span>
            </div>
            <div class="kc-dd-desc">Apply for a new course admission directly online.</div>
          </a>
          <div class="kc-dd-divider"></div>
          <a href="{{ route('main.students.verification') }}" class="kc-dd-item" role="menuitem">
            <div class="kc-dd-row">
              <span class="kc-dd-title">Certificate Verify</span>
            </div>
            <div class="kc-dd-desc">Verify your certificate or student ID card.</div>
          </a>
        </div>
      </li>

      <li>
        <a href="{{ route('main.placement') }}"
           class="kc-nav-link {{ request()->routeIs('main.placement') ? 'active' : '' }}">
          Placement
        </a>
      </li>

      <li>
        <a href="{{ route('main.gallery') }}"
           class="kc-nav-link {{ request()->routeIs('main.gallery') ? 'active' : '' }}">
          Gallery
        </a>
      </li>
{{-- 
      <li>
        <a href="{{ route('main.contact') }}"
           class="kc-nav-link {{ request()->routeIs('main.contact') ? 'active' : '' }}">
          Contact
        </a>
      </li> --}}

      {{-- Franchise Dropdown --}}
      <li class="kc-explore-li" id="kcFranchiseLi">
        <button class="kc-nav-btn" aria-haspopup="true">
          Franchise
          <svg class="kc-chevron" viewBox="0 0 12 12" fill="none" aria-hidden="true">
            <path d="M2 4.5L6 8L10 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div class="kc-dropdown" role="menu">
          <a href="{{ route('main.franchise.info') }}" class="kc-dd-item" role="menuitem">
            <div class="kc-dd-row">
              <span class="kc-dd-title">Partnership Info</span>
            </div>
            <div class="kc-dd-desc">Learn about franchise opportunities.</div>
          </a>
          <div class="kc-dd-divider"></div>
          <a href="{{ route('main.franchise.apply') }}" class="kc-dd-item" role="menuitem">
            <div class="kc-dd-row">
              <span class="kc-dd-title">Apply for Franchise</span>
              <span class="kc-badge kc-badge-popular">Earning</span>
            </div>
            <div class="kc-dd-desc">Start your own Kranti Computer center.</div>
          </a>
        </div>
      </li>

      {{-- Mobile only — Contact Us + Login --}}
      <li class="kc-mobile-login-li">
        <a href="{{ route('main.contact') }}" class="kc-btn-login kc-btn-outline">
          Contact Us
        </a>
      </li>
      <li class="kc-mobile-login-li" style="margin-top: 6px;">
        <a href="" class="kc-btn-login">
          Login
        </a>
      </li>

    </ul>

    {{-- Desktop Right --}}
    <div class="kc-nav-right" style="gap: 10px;">
      <a href="{{ route('main.contact') }}" class="kc-btn-login kc-btn-outline ">Contact Us</a>
      <a href="" class="kc-btn-login">Login</a>
    </div>

    <button class="kc-mobile-toggle" id="kcMobileToggle" aria-label="Toggle menu" aria-expanded="false">
      ☰
    </button>

  </div>
</nav>