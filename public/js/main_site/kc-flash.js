/* ══════════════════════════════════════
   KC FLASH — Notification System
   File: public/js/main_site/kc-flash.js

   Usage anywhere:
     KcFlash.success('Title', 'Message')
     KcFlash.error('Title', 'Message')
     KcFlash.warning('Title', 'Message')
     KcFlash.info('Title', 'Message')
══════════════════════════════════════ */
const KcFlash = (function () {

  const ICONS    = { success: '✓', error: '✕', warning: '!', info: 'i' };
  const DURATION = 4000;

  function show({ type = 'info', title = '', msg = '', duration = DURATION }) {
    const container = document.getElementById('kc-flash-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = `kc-flash kc-flash--${type}`;
    toast.innerHTML = `
      <div class="kc-flash-icon">${ICONS[type]}</div>
      <div class="kc-flash-content">
        ${title ? `<div class="kc-flash-title">${title}</div>` : ''}
        ${msg   ? `<div class="kc-flash-msg">${msg}</div>`    : ''}
      </div>
      <button class="kc-flash-close" aria-label="Close">✕</button>
      <div class="kc-flash-progress" style="animation-duration:${duration}ms"></div>
    `;

    container.appendChild(toast);
    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('show')));

    let timer = setTimeout(() => dismiss(toast), duration);

    toast.querySelector('.kc-flash-close').addEventListener('click', () => {
      clearTimeout(timer);
      dismiss(toast);
    });

    toast.addEventListener('mouseenter', () => {
      clearTimeout(timer);
      const bar = toast.querySelector('.kc-flash-progress');
      if (bar) bar.style.animationPlayState = 'paused';
    });

    toast.addEventListener('mouseleave', () => {
      const bar = toast.querySelector('.kc-flash-progress');
      if (bar) bar.style.animationPlayState = 'running';
      timer = setTimeout(() => dismiss(toast), 1500);
    });
  }

  function dismiss(toast) {
    toast.classList.remove('show');
    toast.classList.add('hide');
    toast.addEventListener('transitionend', () => toast.remove(), { once: true });
  }

  return {
    show,
    success: (title, msg, dur) => show({ type: 'success', title, msg, duration: dur }),
    error:   (title, msg, dur) => show({ type: 'error',   title, msg, duration: dur }),
    warning: (title, msg, dur) => show({ type: 'warning', title, msg, duration: dur }),
    info:    (title, msg, dur) => show({ type: 'info',    title, msg, duration: dur }),
  };

})();