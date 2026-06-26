</main>

<footer class="w-full mt-xl bg-surface-container-low border-t-3 border-on-surface">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile md:px-xl py-lg max-w-container-max mx-auto">
<div class="space-y-md">
  <div class="font-headline-lg text-headline-lg font-black text-on-surface uppercase border-3 border-on-surface bg-accent-cta text-on-accent-cta px-sm py-xs inline-block">SUMMITPEAK</div>
  <p class="text-on-surface-variant text-body-md max-w-xs">Perlengkapan elit untuk puncak tertinggi. Dirancang untuk keandalan, dibuat untuk alam liar.</p>
</div>
<div class="space-y-md">
  <h4 class="font-label-md text-primary uppercase border-b-3 border-on-surface pb-xs inline-block">Produk</h4>
  <nav class="flex flex-col gap-base">
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/produk/kategori/tents">Tenda</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/produk/kategori/backpacks">Ransel</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/produk/kategori/footwear">Sepatu</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/produk/kategori/clothing">Pakaian</a>
  </nav>
</div>
<div class="space-y-md">
  <h4 class="font-label-md text-primary uppercase border-b-3 border-on-surface pb-xs inline-block">Layanan</h4>
  <nav class="flex flex-col gap-base">
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/orders">Pesanan Saya</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/address">Alamat</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/profile">Profil</a>
    <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md border-2 border-transparent hover:border-on-surface px-sm py-xs" href="/keranjang">Keranjang</a>
  </nav>
</div>
<div class="space-y-md">
  <h4 class="font-label-md text-primary uppercase border-b-3 border-on-surface pb-xs inline-block">Kontak</h4>
  <div class="text-on-surface-variant space-y-base font-body-md">
    <p class="border-2 border-on-surface px-sm py-xs">Jl. Gunung Bromo No. 88<br/>Malang, Jawa Timur</p>
    <p class="border-2 border-on-surface px-sm py-xs">info@summitpeak.com</p>
    <p class="border-2 border-on-surface px-sm py-xs">+62 555 1234 5678</p>
  </div>
</div>
</div>
<div class="border-t-3 border-on-surface py-md text-center bg-surface-container">
<p class="font-body-md text-body-md text-on-surface-variant"> &copy; 2024 SUMMITPEAK. DIBUAT UNTUK ALAM LIAR.</p>
</div>
</footer>

<script>
// Theme toggle
const html = document.documentElement;
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');

function setTheme(mode) {
  if (mode === 'light') {
    html.classList.remove('dark');
    html.classList.add('light');
    themeIcon.textContent = 'light_mode';
  } else {
    html.classList.remove('light');
    html.classList.add('dark');
    themeIcon.textContent = 'dark_mode';
  }
  localStorage.setItem('theme', mode);
}

const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    const current = html.classList.contains('dark') ? 'dark' : 'light';
    setTheme(current === 'dark' ? 'light' : 'dark');
  });
}

// Flash message auto-hide
const flashMsg = document.getElementById('flashMsg');
if (flashMsg) {
  setTimeout(() => {
    flashMsg.style.transition = 'opacity 0.5s';
    flashMsg.style.opacity = '0';
    setTimeout(() => flashMsg.remove(), 500);
  }, 4000);
}

// Mobile menu toggle
document.getElementById('menuToggle')?.addEventListener('click', function() {
  const nav = document.querySelector('.hidden.md\\:flex.gap-md');
  if (nav) {
    nav.classList.toggle('hidden');
    nav.classList.toggle('flex');
    nav.classList.toggle('flex-col');
    nav.classList.toggle('absolute');
    nav.classList.toggle('top-full');
    nav.classList.toggle('left-0');
    nav.classList.toggle('w-full');
    nav.classList.toggle('bg-surface');
    nav.classList.toggle('p-md');
    nav.classList.toggle('border-b-3');
    nav.classList.toggle('border-on-surface');
    nav.classList.toggle('z-40');
    nav.classList.toggle('gap-sm');
  }
});
</script>
</body>
</html>
