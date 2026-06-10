</main>
</div>

<script>
const html = document.documentElement;
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');

function setTheme(mode) {
  if (mode === 'light') {
    html.classList.remove('dark'); html.classList.add('light');
    if (themeIcon) themeIcon.textContent = 'light_mode';
  } else {
    html.classList.remove('light'); html.classList.add('dark');
    if (themeIcon) themeIcon.textContent = 'dark_mode';
  }
  localStorage.setItem('theme', mode);
}

const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    setTheme(html.classList.contains('dark') ? 'light' : 'dark');
  });
}

const flashMsg = document.getElementById('flashMsg');
if (flashMsg) {
  setTimeout(() => {
    flashMsg.style.transition = 'opacity 0.5s';
    flashMsg.style.opacity = '0';
    setTimeout(() => flashMsg.remove(), 500);
  }, 4000);
}
</script>
</body>
</html>
