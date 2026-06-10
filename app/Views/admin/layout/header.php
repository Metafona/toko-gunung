<!DOCTYPE html>
<html lang="id" class="dark">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin SummitPeak | <?= $title ?? 'Dashboard' ?></title>
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
        surface: "var(--color-surface)",
        "surface-container": "var(--color-surface-container)",
        "surface-container-low": "var(--color-surface-container-low)",
        "surface-container-high": "var(--color-surface-container-high)",
        "on-surface": "var(--color-on-surface)",
        "on-surface-variant": "var(--color-on-surface-variant)",
        background: "var(--color-background)",
        "on-background": "var(--color-on-background)",
        outline: "var(--color-outline)",
        "outline-variant": "var(--color-outline-variant)",
      },
      fontFamily: {
        "headline-md": ["Montserrat"],
        "label-md": ["Inter"],
        "body-md": ["Inter"],
      },
      fontSize: {
        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
        "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.05em", fontWeight: "600" }],
        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
        "label-sm": ["12px", { lineHeight: "16px", fontWeight: "500" }],
      },
      spacing: {
        md: "24px", xs: "4px", "container-max": "1280px",
        sm: "12px", xl: "80px", lg: "48px", base: "8px",
      },
    },
  },
}
</script>
<style>
:root {
  --color-primary: #b0cdbb;
  --color-on-primary: #1c3528;
  --color-surface: #121412;
  --color-surface-container: #1e201f;
  --color-surface-container-low: #1a1c1b;
  --color-surface-container-high: #292a29;
  --color-on-surface: #e3e2e0;
  --color-on-surface-variant: #c2c8c2;
  --color-background: #121412;
  --color-on-background: #e3e2e0;
  --color-outline: #8c928d;
  --color-outline-variant: #424844;
}
html.light {
  --color-primary: #2d4739;
  --color-on-primary: #ffffff;
  --color-surface: #ffffff;
  --color-surface-container: #f0f0ec;
  --color-surface-container-low: #f8f8f4;
  --color-surface-container-high: #e8e8e4;
  --color-on-surface: #1a1c1b;
  --color-on-surface-variant: #4a4c4b;
  --color-background: #f5f5f0;
  --color-on-background: #1a1c1b;
  --color-outline: #8c928d;
  --color-outline-variant: #c8ccc8;
}
body {
  background-color: var(--color-background);
  color: var(--color-on-surface);
  font-family: Inter, sans-serif;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.flash-message {
  position: fixed; top: 20px; right: 24px; z-index: 9999;
  padding: 12px 24px; border-radius: 4px; font-weight: 600;
  font-size: 14px; animation: slideIn 0.3s ease;
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
<div class="flash-message flash-success" id="flashMsg"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
<div class="flash-message flash-error" id="flashMsg"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<nav class="bg-surface-container border-b border-outline-variant px-margin-mobile md:px-xl py-base">
<div class="max-w-container-max mx-auto flex justify-between items-center">
<div class="flex items-center gap-md">
  <a href="/admin" class="font-headline-md text-headline-md font-bold text-primary uppercase tracking-tighter">Admin SummitPeak</a>
</div>
<div class="flex items-center gap-md">
  <button id="themeToggle" class="theme-toggle cursor-pointer p-base hover:bg-surface-container-high rounded-full transition-colors">
    <span class="material-symbols-outlined text-on-surface" id="themeIcon">dark_mode</span>
  </button>
  <a href="/" class="font-label-md text-label-md text-on-surface-variant hover:text-primary uppercase">Lihat Toko</a>
  <a href="/logout" class="font-label-md text-label-md text-on-surface-variant hover:text-primary uppercase">Logout</a>
</div>
</div>
</nav>

<div class="flex max-w-container-max mx-auto px-margin-mobile md:px-xl py-lg gap-lg">
<aside class="w-64 shrink-0 hidden md:block">
<div class="bg-surface-container border border-outline-variant p-md space-y-sm">
  <a href="/admin/dashboard" class="block font-label-md text-label-md text-on-surface-variant hover:text-primary uppercase py-sm">Dashboard</a>
  <a href="/admin/produk" class="block font-label-md text-label-md text-on-surface-variant hover:text-primary uppercase py-sm">Kelola Produk</a>
  <a href="/" class="block font-label-md text-label-md text-on-surface-variant hover:text-primary uppercase py-sm">&larr; Kembali ke Toko</a>
</div>
</aside>
<main class="flex-1 min-w-0">
