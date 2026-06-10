<!DOCTYPE html>
<html lang="id" class="dark">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SummitPeak | <?= $title ?? 'Beranda' ?></title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: "var(--color-primary)",
        "on-primary": "var(--color-on-primary)",
        "primary-container": "var(--color-primary-container)",
        "on-primary-container": "var(--color-on-primary-container)",
        surface: "var(--color-surface)",
        "surface-dim": "var(--color-surface-dim)",
        "surface-bright": "var(--color-surface-bright)",
        "surface-container": "var(--color-surface-container)",
        "surface-container-low": "var(--color-surface-container-low)",
        "surface-container-high": "var(--color-surface-container-high)",
        "surface-container-highest": "var(--color-surface-container-highest)",
        "on-surface": "var(--color-on-surface)",
        "on-surface-variant": "var(--color-on-surface-variant)",
        background: "var(--color-background)",
        "on-background": "var(--color-on-background)",
        outline: "var(--color-outline)",
        "outline-variant": "var(--color-outline-variant)",
        secondary: "var(--color-secondary)",
        "on-secondary": "var(--color-on-secondary)",
        "accent-cta": "var(--color-accent-cta)",
        "on-accent-cta": "var(--color-on-accent-cta)",
      },
      borderRadius: {
        DEFAULT: "0.125rem",
        lg: "0.25rem",
        xl: "0.5rem",
        full: "0.75rem"
      },
      spacing: {
        md: "24px",
        xs: "4px",
        "container-max": "1280px",
        sm: "12px",
        xl: "80px",
        "margin-mobile": "16px",
        lg: "48px",
        gutter: "24px",
        base: "8px"
      },
      fontFamily: {
        "body-lg": ["Inter"],
        "label-sm": ["Inter"],
        "headline-lg": ["Montserrat"],
        "display-lg": ["Montserrat"],
        "label-md": ["Inter"],
        "display-lg-mobile": ["Montserrat"],
        "headline-md": ["Montserrat"],
        "body-md": ["Inter"]
      },
      fontSize: {
        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
        "label-sm": ["12px", { lineHeight: "16px", fontWeight: "500" }],
        "headline-lg": ["32px", { lineHeight: "40px", fontWeight: "700" }],
        "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
        "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.05em", fontWeight: "600" }],
        "display-lg-mobile": ["36px", { lineHeight: "42px", letterSpacing: "-0.01em", fontWeight: "700" }],
        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }]
      }
    },
  },
}
</script>
<style>
:root {
  --color-primary: #b0cdbb;
  --color-on-primary: #1c3528;
  --color-primary-container: #2d4739;
  --color-on-primary-container: #98b5a3;
  --color-surface: #121412;
  --color-surface-dim: #121412;
  --color-surface-bright: #383938;
  --color-surface-container: #1e201f;
  --color-surface-container-low: #1a1c1b;
  --color-surface-container-high: #292a29;
  --color-surface-container-highest: #343533;
  --color-on-surface: #e3e2e0;
  --color-on-surface-variant: #c2c8c2;
  --color-background: #121412;
  --color-on-background: #e3e2e0;
  --color-outline: #8c928d;
  --color-outline-variant: #424844;
  --color-secondary: #c8c6c5;
  --color-on-secondary: #313030;
  --color-accent-cta: #d97706;
  --color-on-accent-cta: #ffffff;
}

html.light {
  --color-primary: #2d4739;
  --color-on-primary: #ffffff;
  --color-primary-container: #98b5a3;
  --color-on-primary-container: #1c3528;
  --color-surface: #ffffff;
  --color-surface-dim: #f5f5f0;
  --color-surface-bright: #ffffff;
  --color-surface-container: #f0f0ec;
  --color-surface-container-low: #f8f8f4;
  --color-surface-container-high: #e8e8e4;
  --color-surface-container-highest: #ddddd8;
  --color-on-surface: #1a1c1b;
  --color-on-surface-variant: #4a4c4b;
  --color-background: #f5f5f0;
  --color-on-background: #1a1c1b;
  --color-outline: #8c928d;
  --color-outline-variant: #c8ccc8;
  --color-secondary: #5a5a5a;
  --color-on-secondary: #ffffff;
  --color-accent-cta: #c2410c;
  --color-on-accent-cta: #ffffff;
}

body {
  background-color: var(--color-background);
  color: var(--color-on-surface);
  font-family: Inter, sans-serif;
  overflow-x: hidden;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.spec-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 1px;
  background-color: var(--color-outline-variant);
}
.spec-item {
  background-color: var(--color-surface-container-low);
  padding: 1rem;
}
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
.theme-toggle {
  cursor: pointer;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 9999px;
  transition: background-color 0.3s;
}
.theme-toggle:hover {
  background-color: var(--color-surface-container-highest);
}
.flash-message {
  position: fixed;
  top: 80px;
  right: 24px;
  z-index: 9999;
  padding: 12px 24px;
  border-radius: 4px;
  font-weight: 600;
  font-size: 14px;
  animation: slideIn 0.3s ease;
}
.flash-success { background: var(--color-primary); color: var(--color-on-primary); }
.flash-error { background: #dc2626; color: white; }
@keyframes slideIn {
  from { transform: translateX(100%); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}
</style>
</head>
<body>

<?php if (session()->getFlashdata('success')): ?>
<div class="flash-message flash-success" id="flashMsg">
  <?= session()->getFlashdata('success') ?>
</div>
<?php elseif (session()->getFlashdata('error')): ?>
<div class="flash-message flash-error" id="flashMsg">
  <?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>

<header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant transition-all duration-300">
<nav class="flex justify-between items-center px-margin-mobile md:px-xl py-base max-w-container-max mx-auto">
<div class="font-headline-md text-headline-md font-bold text-on-surface tracking-tighter">
  <a href="/">SummitPeak</a>
</div>
<div class="hidden md:flex gap-md items-center">
  <a class="font-label-md text-label-md uppercase tracking-wider text-primary border-b-2 border-primary pb-1" href="/">Beranda</a>
  <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-colors" href="/produk">Produk</a>
  <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-colors" href="/produk/kategori/tents">Tenda</a>
  <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-colors" href="/produk/kategori/backpacks">Ransel</a>
  <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-colors" href="/produk/kategori/footwear">Sepatu</a>
  <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-colors" href="/produk/kategori/clothing">Pakaian</a>
</div>
<div class="flex items-center gap-base">
  <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme">
    <span class="material-symbols-outlined text-on-surface" id="themeIcon">dark_mode</span>
  </button>
  <a href="/keranjang" class="p-base hover:bg-surface-container-highest/10 transition-all rounded-full relative">
    <span class="material-symbols-outlined text-on-surface">shopping_cart</span>
  </a>
  <?php if (session()->get('isLoggedIn')): ?>
  <div class="hidden md:flex items-center gap-sm">
    <span class="font-label-sm text-on-surface-variant"><?= session()->get('username') ?></span>
    <a href="/admin" class="font-label-md text-label-md text-primary hover:text-on-surface transition-colors uppercase">Admin</a>
    <a href="/logout" class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors uppercase">Logout</a>
  </div>
  <?php else: ?>
  <a href="/login" class="hidden md:inline-block border border-outline text-on-surface font-label-md px-md py-sm hover:bg-surface-container-highest transition-all uppercase tracking-widest rounded-DEFAULT">Login</a>
  <a href="/register" class="hidden md:inline-block bg-primary text-on-primary font-label-md px-md py-sm hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">Daftar</a>
  <?php endif; ?>
  <button class="md:hidden p-base" id="menuToggle">
    <span class="material-symbols-outlined text-on-surface">menu</span>
  </button>
</div>
</nav>
</header>

<main class="pt-[72px]">
