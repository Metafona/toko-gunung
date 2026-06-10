<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="flex flex-col lg:flex-row gap-lg">
<!-- Image -->
<div class="lg:w-1/2">
<div class="aspect-[4/5] border border-outline-variant overflow-hidden relative bg-surface-container">
<?php if ($produk['image']): ?>
<img class="w-full h-full object-cover" alt="<?= $produk['name'] ?>" src="<?= $produk['image'] ?>"/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-8xl text-outline">image</span></div>
<?php endif; ?>
<?php if ($produk['badge']): ?>
<div class="absolute top-md left-md"><span class="bg-primary text-on-primary px-sm py-xs font-label-sm uppercase tracking-tighter"><?= $produk['badge'] ?></span></div>
<?php endif; ?>
</div>
</div>

<!-- Detail -->
<div class="lg:w-1/2 space-y-md">
<nav class="flex gap-xs text-on-surface-variant font-label-sm uppercase">
<a href="/" class="hover:text-primary">Beranda</a>
<span>/</span>
<a href="/produk" class="hover:text-primary">Produk</a>
<?php if ($produk['category_name']): ?>
<span>/</span>
<a href="/produk/kategori/<?= $produk['category_slug'] ?>" class="hover:text-primary"><?= $produk['category_name'] ?></a>
<?php endif; ?>
</nav>

<?php if ($produk['brand']): ?>
<p class="font-label-md text-accent-cta uppercase tracking-wider"><?= $produk['brand'] ?></p>
<?php endif; ?>
<h1 class="font-display-lg-mobile md:font-headline-lg text-headline-lg"><?= $produk['name'] ?></h1>
<p class="text-on-surface-variant font-body-lg"><?= $produk['description'] ?></p>

<div class="flex items-baseline gap-sm">
<span class="font-display-lg text-display-lg-mobile text-primary">Rp <?= number_format($produk['price'] * 16000, 0, ',', '.') ?></span>
</div>

<?php if ($produk['specs']): $specs = explode(',', $produk['specs']); ?>
<div class="space-y-xs">
<h4 class="font-label-sm text-primary uppercase">Spesifikasi</h4>
<div class="flex gap-xs flex-wrap">
<?php foreach ($specs as $s): ?>
<span class="px-sm py-xs bg-outline-variant text-on-surface font-label-sm border border-outline"><?= trim($s) ?></span>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>
<form action="/keranjang/tambah" method="POST" class="pt-md space-y-sm">
<input type="hidden" name="product_id" value="<?= $produk['id'] ?>"/>
<div class="flex items-center gap-sm">
<label class="font-label-sm text-primary uppercase">Jumlah</label>
<input type="number" name="quantity" value="1" min="1" class="w-20 bg-surface border border-outline text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT"/>
</div>
<button type="submit" class="bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">Tambah ke Keranjang</button>
</form>
<?php else: ?>
<div class="pt-md">
<a href="/login?redirect=/produk/<?= $produk['slug'] ?>" class="inline-block bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">Login untuk Membeli</a>
</div>
<?php endif; ?>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
