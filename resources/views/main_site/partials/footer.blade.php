{{-- resources/views/layouts/partials/ms-footer.blade.php --}}

<footer class="kc-footer" role="contentinfo">
  <div class="kc-container">

    <div class="kc-footer-top">

      {{-- Col 1: About --}}
      <div class="kc-footer-col">
        <a href="{{ url('/') }}" class="kc-nav-logo mb-3 d-inline-flex" style="text-decoration:none;">
          <svg class="kc-logo-icon me-2" viewBox="0 0 36 36" fill="none" aria-hidden="true">
            <defs>
              <linearGradient id="kcFooterGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#818cf8"/>
                <stop offset="100%" stop-color="#a78bfa"/>
              </linearGradient>
            </defs>
            <polygon points="18,3 33,12 33,24 18,33 3,24 3,12" fill="url(#kcFooterGrad)" opacity="0.15"/>
            <polygon points="18,7 29,13.5 29,24 18,29 7,24 7,13.5" fill="none" stroke="url(#kcFooterGrad)" stroke-width="1.8"/>
            <polyline points="12,18.5 16,22.5 24,14" stroke="url(#kcFooterGrad)" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="kc-logo-text" style="color:#fff;">KRANTI <span style="color:#a5b4fc;">COMPUTER</span></span>
        </a>
        <p class="kc-footer-about-text">
          Established in 2016, Kranti Computer is a leading IT education provider.
          We pioneer quality computer education and stay current with the latest
          technology developments to empower our students.
        </p>
        <a href="" class="kc-footer-read-more">About Us →</a>
      </div>

      {{-- Col 2: Quick Links --}}
      <div class="kc-footer-col">
        <div class="kc-footer-col-title">Quick Links</div>
        <ul class="kc-query-links ps-0">
          <li><a href="">Courses</a></li>
          <li><a href="">Placement</a></li>
          <li><a href="">Gallery</a></li>
          <li><a href="">Downloads</a></li>
          <li><a href="">Admissions</a></li>
          <li><a href="">Verify Certificate</a></li>
          <li><a href="">Franchise</a></li>
        </ul>
      </div>

      {{-- Col 3: Contact --}}
      <div class="kc-footer-col">
        <div class="kc-footer-col-title">Contact Us</div>
        <ul class="kc-contact-list ps-0">
          <li class="kc-contact-item">
            <div class="kc-contact-icon" aria-hidden="true">📍</div>
            <span class="kc-contact-text">
              Kranti Computer Training Institute, Near Sita Ram Inter college Babuganj,<br>Prayagraj 221507.
            </span>
          </li>
          <li class="kc-contact-item">
            <div class="kc-contact-icon" aria-hidden="true">✉️</div>
            <span class="kc-contact-text">
              <a href="mailto:kranti.computer@gmail.com" style="color:inherit;">
                kranti.computer@gmail.com
              </a>
            </span>
          </li>
          <li class="kc-contact-item">
            <div class="kc-contact-icon" aria-hidden="true">📞</div>
            <span class="kc-contact-text">
              <a href="tel:919839019108" style="color:inherit;">9839019108</a>,
              <a href="tel:918953524310" style="color:inherit;">8953524310</a>
            </span>
          </li>
        </ul>
      </div>

    </div>

    {{-- Footer Bottom --}}
    <div class="kc-footer-bottom">
      <span class="kc-footer-copy">
        © {{ date('Y') }}, Kranti Computer. All rights reserved.
      </span>
      <span class="kc-footer-tagline">
        Empowering students through quality IT education
      </span>
    </div>

  </div>
</footer>
