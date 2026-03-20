{{-- Flash Notification Container --}}
<div id="kc-flash-container"></div>

{{-- Laravel Session Flash — auto show ──
  Controller mein:
    return redirect()->with('success', 'Form submitted!');
    return redirect()->with('error', 'Kuch galat hua!');
    return redirect()->with('warning', 'Dhyan dein!');
    return redirect()->with('info', 'Nayi batch shuru!');
--}}
@if(session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', () =>
      KcFlash.success('Success!', '{{ session('success') }}')
    );
  </script>
@endif
@if(session('error'))
  <script>
    document.addEventListener('DOMContentLoaded', () =>
      KcFlash.error('Error!', '{{ session('error') }}')
    );
  </script>
@endif
@if(session('warning'))
  <script>
    document.addEventListener('DOMContentLoaded', () =>
      KcFlash.warning('Dhyan dein!', '{{ session('warning') }}')
    );
  </script>
@endif
@if(session('info'))
  <script>
    document.addEventListener('DOMContentLoaded', () =>
      KcFlash.info('Info', '{{ session('info') }}')
    );
  </script>
@endif