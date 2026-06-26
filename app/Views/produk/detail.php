<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="flex flex-col lg:flex-row gap-lg">
<!-- Image -->
<div class="lg:w-1/2">
<div class="aspect-[4/5] border-2 border-on-surface overflow-hidden relative bg-surface-container">
<?php if ($produk['image']): ?>
<img class="w-full h-full object-cover" alt="<?= $produk['name'] ?>" src="<?= $produk['image'] ?>"/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-8xl text-outline">image</span></div>
<?php endif; ?>
<?php if ($produk['badge']): ?>
<div class="absolute top-md left-md"><span class="bg-accent-cta text-on-accent-cta border-2 border-on-surface px-sm py-xs font-label-sm uppercase tracking-tighter"><?= $produk['badge'] ?></span></div>
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

<div class="flex items-center gap-sm">
<?php if ($ratingCount > 0): ?>
<span class="text-accent-cta font-label-md"><?= str_repeat('★', round($avgRating)) . str_repeat('☆', 5 - round($avgRating)) ?></span>
<span class="text-on-surface-variant font-label-sm"><?= $avgRating ?> (<?= $ratingCount ?> ulasan)</span>
<?php endif; ?>
</div>

<p class="text-on-surface-variant font-body-lg"><?= $produk['description'] ?></p>

<div class="flex items-baseline gap-sm">
<span class="font-display-lg text-display-lg-mobile text-primary">Rp <?= number_format($produk['price'] * 16000, 0, ',', '.') ?></span>
</div>

<?php if ($produk['specs']): $specs = explode(',', $produk['specs']); ?>
<div class="space-y-xs">
<h4 class="font-label-sm text-primary uppercase">Spesifikasi</h4>
<div class="flex gap-xs flex-wrap">
<?php foreach ($specs as $s): ?>
<span class="px-sm py-xs bg-surface-container border-2 border-on-surface text-on-surface font-label-sm"><?= trim($s) ?></span>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<!-- Variants -->
<?php if (!empty($variants) && session()->get('isLoggedIn')): ?>
<form action="/keranjang/tambah" method="POST" class="pt-md space-y-sm" id="variantForm">
<input type="hidden" name="product_id" value="<?= $produk['id'] ?>"/>
<input type="hidden" name="variant_id" id="selectedVariantId" value=""/>

<div class="space-y-xs">
<h4 class="font-label-sm text-primary uppercase">Pilih Varian</h4>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-xs" id="variantOptions">
<?php foreach ($variants as $v): ?>
<button type="button"
  class="variant-btn border-3 border-on-surface bg-surface-container px-md py-sm font-label-md text-left hover:bg-surface-container-highest transition-all <?= $v['stock'] < 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
  data-id="<?= $v['id'] ?>"
  data-price="<?= $produk['price'] + $v['price_adjustment'] ?>"
  data-stock="<?= $v['stock'] ?>"
  <?= $v['stock'] < 1 ? 'disabled' : '' ?>>
  <span><?= $v['name'] ?></span>
  <?php if ($v['price_adjustment'] > 0): ?>
  <span class="block text-accent-cta font-label-sm">+Rp <?= number_format($v['price_adjustment'] * 16000, 0, ',', '.') ?></span>
  <?php elseif ($v['price_adjustment'] < 0): ?>
  <span class="block text-green-400 font-label-sm">-Rp <?= number_format(abs($v['price_adjustment']) * 16000, 0, ',', '.') ?></span>
  <?php endif; ?>
  <?php if ($v['stock'] < 1): ?>
  <span class="block text-red-400 font-label-sm">Stok Habis</span>
  <?php endif; ?>
</button>
<?php endforeach; ?>
</div>
</div>

<div class="flex items-center gap-sm pt-sm">
<label class="font-label-sm text-primary uppercase">Jumlah</label>
<input type="number" name="quantity" value="1" min="1" class="w-20 bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0"/>
</div>
<button type="submit" id="addToCartBtn" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal" disabled>Pilih Varian Terlebih Dahulu</button>
</form>

<script>
document.querySelectorAll('.variant-btn:not([disabled])').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.variant-btn').forEach(b => b.classList.remove('bg-accent-cta', 'text-on-accent-cta'));
    this.classList.add('bg-accent-cta', 'text-on-accent-cta');
    document.getElementById('selectedVariantId').value = this.dataset.id;
    const btn2 = document.getElementById('addToCartBtn');
    btn2.disabled = false;
    btn2.textContent = 'Tambah ke Keranjang';
  });
});
</script>
<?php endif; ?>

<?php if (empty($variants)): ?>
<?php if (!empty($variants) && !session()->get('isLoggedIn')): ?>
<div class="pt-md">
<a href="/login?redirect=/produk/<?= $produk['slug'] ?>" class="inline-block bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Login untuk Membeli</a>
</div>
<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>
<form action="/keranjang/tambah" method="POST" class="pt-md space-y-sm">
<input type="hidden" name="product_id" value="<?= $produk['id'] ?>"/>
<div class="flex items-center gap-sm">
<label class="font-label-sm text-primary uppercase">Jumlah</label>
<input type="number" name="quantity" value="1" min="1" class="w-20 bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0"/>
</div>
<button type="submit" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Tambah ke Keranjang</button>
</form>
<?php else: ?>
<div class="pt-md">
<a href="/login?redirect=/produk/<?= $produk['slug'] ?>" class="inline-block bg-accent-cta text-on-accent-cta border-2 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-none">Login untuk Membeli</a>
</div>
<?php endif; ?>
<?php endif; ?>

</div>
</div>

<!-- Reviews Section -->
<section class="mt-xl border-t-3 border-on-surface pt-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">ULASAN PRODUK</h2>

<?php if (session()->get('isLoggedIn')): ?>
<div class="bg-surface-container border-3 border-on-surface p-md mb-lg shadow-neubrutal-sm">
<h3 class="font-label-md text-primary uppercase mb-sm">Tulis Ulasan</h3>
<form action="/review/simpan" method="POST" class="space-y-sm">
<input type="hidden" name="product_id" value="<?= $produk['id'] ?>"/>
<div class="flex gap-xs mb-sm">
<label class="font-label-sm text-on-surface-variant">Rating:</label>
<select name="rating" class="bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0">
<option value="5">★★★★★</option>
<option value="4">★★★★☆</option>
<option value="3">★★★☆☆</option>
<option value="2">★★☆☆☆</option>
<option value="1">★☆☆☆☆</option>
</select>
</div>
<textarea name="comment" rows="3" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" placeholder="Bagikan pengalaman Anda dengan produk ini..." required></textarea>
<button type="submit" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Kirim Ulasan</button>
</form>
</div>
<?php else: ?>
<div class="bg-surface-container border-3 border-on-surface p-md mb-lg shadow-neubrutal-sm">
<p class="text-on-surface-variant font-body-md"><a href="/login?redirect=/produk/<?= $produk['slug'] ?>" class="text-primary hover:underline border-2 border-primary px-sm py-xs">Login</a> untuk menulis ulasan</p>
</div>
<?php endif; ?>

<div class="space-y-md">
<?php if (empty($reviews)): ?>
<p class="text-on-surface-variant font-body-md">Belum ada ulasan untuk produk ini.</p>
<?php else: ?>
<?php foreach ($reviews as $review): ?>
<div class="bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm">
<div class="flex items-center gap-sm mb-sm">
  <div class="w-8 h-8 overflow-hidden bg-primary/20 border-3 border-on-surface flex-shrink-0">
    <?php if ($review['avatar']): ?>
      <img class="w-full h-full object-cover" src="<?= $review['avatar'] ?>" alt=""/>
    <?php else: ?>
      <div class="w-full h-full flex items-center justify-center bg-primary text-on-primary font-label-md font-bold uppercase"><?= substr($review['username'], 0, 1) ?></div>
    <?php endif; ?>
  </div>
  <div>
    <span class="font-label-md text-on-surface"><?= $review['username'] ?></span>
    <span class="text-accent-cta font-label-sm ml-sm"><?= str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']) ?></span>
  </div>
  <span class="ml-auto text-on-surface-variant font-label-sm"><?= date('d M Y', strtotime($review['created_at'])) ?></span>
</div>
<p class="text-on-surface font-body-md"><?= $review['comment'] ?></p>

<!-- Replies -->
<?php if (!empty($review['replies'])): ?>
<div class="ml-lg mt-sm space-y-sm">
<?php foreach ($review['replies'] as $reply): ?>
<div class="bg-surface border-3 border-outline-variant p-sm">
  <div class="flex items-center gap-sm mb-xs">
    <div class="w-6 h-6 overflow-hidden bg-accent-cta/20 border-3 border-on-surface flex-shrink-0">
      <?php if ($reply['avatar']): ?>
        <img class="w-full h-full object-cover" src="<?= $reply['avatar'] ?>" alt=""/>
      <?php else: ?>
        <div class="w-full h-full flex items-center justify-center bg-accent-cta text-on-accent-cta font-label-sm font-bold uppercase"><?= substr($reply['username'], 0, 1) ?></div>
      <?php endif; ?>
    </div>
    <span class="font-label-sm text-accent-cta"><?= $reply['username'] ?></span>
    <span class="text-on-surface-variant font-label-sm"><?= date('d M Y', strtotime($reply['created_at'])) ?></span>
  </div>
  <p class="text-on-surface font-body-md text-sm"><?= $reply['comment'] ?></p>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Reply form -->
<?php if (session()->get('isLoggedIn')): ?>
<form action="/review/balas/<?= $review['id'] ?>" method="POST" class="mt-sm flex gap-xs">
<input type="text" name="comment" class="flex-1 bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="Tulis balasan..." required/>
<button type="submit" class="bg-primary text-on-primary border-3 border-on-surface font-label-sm px-md py-sm hover:brightness-90 transition-all uppercase tracking-widest">Balas</button>
</form>
<?php endif; ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</section>
</section>

<?= $this->include('layout/footer') ?>
