<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="flex flex-col md:flex-row gap-lg">
<!-- Sidebar Filter -->
<aside class="md:w-64 shrink-0 space-y-md">
<div class="bg-surface-container border-3 border-on-surface p-md space-y-md shadow-neubrutal-sm">
<h3 class="font-label-md text-primary uppercase">Kategori</h3>
<nav class="space-y-xs">
<a href="/produk" class="block font-body-md text-on-surface-variant hover:text-primary transition-colors border-2 border-transparent hover:border-on-surface px-sm py-xs <?= !isset($kategoriAktif) && !isset($brandAktif) ? 'bg-primary text-on-primary font-bold border-on-surface' : '' ?>">Semua Produk</a>
<?php foreach ($kategoris as $k): ?>
<a href="/produk/kategori/<?= $k['slug'] ?>" class="block font-body-md text-on-surface-variant hover:text-primary transition-colors border-2 border-transparent hover:border-on-surface px-sm py-xs <?= ($kategoriAktif ?? '') === $k['slug'] ? 'bg-primary text-on-primary font-bold border-on-surface' : '' ?>"><?= $k['name'] ?></a>
<?php endforeach; ?>
</nav>
</div>

<?php if (!empty($brands)): ?>
<div class="bg-surface-container border-3 border-on-surface p-md space-y-md shadow-neubrutal-sm">
<h3 class="font-label-md text-primary uppercase">Brand</h3>
<nav class="space-y-xs">
<a href="/produk" class="block font-body-md text-on-surface-variant hover:text-primary transition-colors border-2 border-transparent hover:border-on-surface px-sm py-xs <?= !isset($brandAktif) ? 'bg-primary text-on-primary font-bold border-on-surface' : '' ?>">Semua Brand</a>
<?php foreach ($brands as $b): ?>
<?php if ($b['brand']): ?>
<a href="/produk/brand/<?= strtolower($b['brand']) ?>" class="block font-body-md text-on-surface-variant hover:text-primary transition-colors border-2 border-transparent hover:border-on-surface px-sm py-xs <?= strtolower($brandAktif ?? '') === strtolower($b['brand']) ? 'bg-primary text-on-primary font-bold border-on-surface' : '' ?>"><?= $b['brand'] ?></a>
<?php endif; ?>
<?php endforeach; ?>
</nav>
</div>
<?php endif; ?>
</aside>

<!-- Product Grid -->
<div class="flex-1">
<div class="flex justify-between items-center mb-lg">
<h2 class="font-headline-lg text-headline-lg"><?= $title ?></h2>
<span class="text-on-surface-variant font-label-sm border-3 border-on-surface px-sm py-xs"><?= count($produks) ?> produk ditemukan</span>
</div>

<?php if (empty($produks)): ?>
<div class="text-center py-xl border-3 border-on-surface bg-surface-container">
<span class="material-symbols-outlined text-6xl text-outline">inventory_2</span>
<p class="text-on-surface-variant font-body-lg mt-md">Tidak ada produk ditemukan</p>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
<?php foreach ($produks as $p): ?>
<div class="group relative cursor-pointer border-3 border-on-surface bg-surface-container shadow-neubrutal hover:shadow-neubrutal-lg transition-all hover:-translate-y-1">
<div class="aspect-[4/5] overflow-hidden relative">
<?php if ($p['image']): ?>
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?= $p['name'] ?>" src="<?= $p['image'] ?>"/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center bg-surface-container-high">
<span class="material-symbols-outlined text-6xl text-outline">image</span>
</div>
<?php endif; ?>
<?php if ($p['badge']): ?>
<div class="absolute top-md left-md"><span class="bg-accent-cta text-on-accent-cta border-3 border-on-surface px-sm py-xs font-label-sm uppercase tracking-tighter"><?= $p['badge'] ?></span></div>
<?php endif; ?>
</div>
<div class="p-md space-y-xs">
<?php if ($p['brand']): ?>
<p class="font-label-sm text-accent-cta uppercase tracking-wider"><?= $p['brand'] ?></p>
<?php endif; ?>
<div class="flex justify-between items-start">
<h4 class="font-headline-md text-headline-md"><?= $p['name'] ?></h4>
<span class="font-label-md text-primary whitespace-nowrap">Rp <?= number_format($p['price'] * 16000, 0, ',', '.') ?></span>
</div>
<p class="text-on-surface-variant font-label-sm uppercase"><?= $p['category_name'] ?? '' ?></p>
<?php if ($p['specs']): $specs = explode(',', $p['specs']); ?>
<div class="flex gap-xs pt-sm flex-wrap">
<?php foreach ($specs as $s): ?>
<span class="px-xs py-[2px] bg-surface-container border-2 border-on-surface text-on-surface font-label-sm"><?= trim($s) ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
<a href="/produk/<?= $p['slug'] ?>" class="absolute inset-0 z-10"></a>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
