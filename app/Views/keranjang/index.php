<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">KERANJANG BELANJA</h2>

<?php if (empty($items)): ?>
<div class="text-center py-xl border-3 border-on-surface bg-surface-container shadow-neubrutal-sm">
<span class="material-symbols-outlined text-6xl text-outline">shopping_cart</span>
<p class="text-on-surface-variant font-body-lg mt-md">Keranjang belanja kosong</p>
<a href="/produk" class="inline-block mt-md bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Belanja Sekarang</a>
</div>
<?php else: ?>

<div class="space-y-sm">
<?php foreach ($items as $item): ?>
<div class="flex items-center gap-md bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm">
<div class="w-24 h-24 bg-surface-container-high shrink-0 border-3 border-on-surface overflow-hidden">
<?php if ($item['variant_image']): ?>
<img class="w-full h-full object-cover" alt="<?= $item['name'] ?>" src="<?= $item['variant_image'] ?>"/>
<?php elseif ($item['image']): ?>
<img class="w-full h-full object-cover" alt="<?= $item['name'] ?>" src="<?= $item['image'] ?>"/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-outline">image</span></div>
<?php endif; ?>
</div>
<div class="flex-1 min-w-0">
<h4 class="font-headline-md text-headline-md truncate"><?= $item['name'] ?></h4>
<?php if ($item['variant_name']): ?>
<p class="font-label-sm text-accent-cta"><?= $item['variant_name'] ?></p>
<?php endif; ?>
<p class="font-label-md text-primary">Rp <?= number_format(($item['price'] + ($item['price_adjustment'] ?? 0)) * 16000, 0, ',', '.') ?></p>
</div>
<form action="/keranjang/update/<?= $item['id'] ?>" method="POST" class="flex items-center gap-sm">
<input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="0" class="w-16 bg-surface border-3 border-on-surface text-on-surface px-sm py-sm font-body-md focus:border-primary focus:ring-0 text-center"/>
<button type="submit" class="font-label-sm text-primary border-3 border-primary px-sm py-sm hover:bg-primary hover:text-on-primary transition-all uppercase">Update</button>
</form>
<div class="text-right">
<p class="font-label-md text-on-surface">Rp <?= number_format(($item['price'] + ($item['price_adjustment'] ?? 0)) * $item['quantity'] * 16000, 0, ',', '.') ?></p>
<a href="/keranjang/hapus/<?= $item['id'] ?>" class="font-label-sm text-red-400 border-3 border-red-400 px-sm py-sm hover:bg-red-400 hover:text-white transition-all uppercase" onclick="return confirm('Hapus item ini?')">Hapus</a>
</div>
</div>
<?php endforeach; ?>
</div>

<div class="mt-lg flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md bg-surface-container border-3 border-on-surface p-md shadow-neubrutal">
<div>
<p class="text-on-surface-variant font-body-md">Total Belanja</p>
<p class="font-display-lg text-display-lg-mobile text-primary">Rp <?= number_format($total * 16000, 0, ',', '.') ?></p>
</div>
<a href="/checkout" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Lanjut ke Checkout</a>
</div>

<?php endif; ?>
</section>

<?= $this->include('layout/footer') ?>
