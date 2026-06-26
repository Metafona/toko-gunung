<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<a href="/orders" class="inline-block font-label-md text-primary hover:underline mb-lg">&larr; Kembali ke Pesanan</a>

<div class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<div class="flex justify-between items-start">
<div>
<h2 class="font-headline-lg text-headline-lg">PESANAN #<?= $order['id'] ?></h2>
<p class="text-on-surface-variant font-body-md"><?= date('d M Y H:i', strtotime($order['created_at'])) ?></p>
</div>
<span class="font-label-md px-sm py-xs uppercase border-3 border-on-surface 
<?= $order['status'] === 'pending' ? 'bg-accent-cta text-on-accent-cta' : ($order['status'] === 'shipped' ? 'bg-primary text-on-primary' : 'bg-surface text-on-surface') ?>">
<?= $order['status'] ?>
</span>
</div>

<h3 class="font-label-md text-primary uppercase mt-md">Alamat Pengiriman</h3>
<div class="bg-surface border-3 border-on-surface p-md shadow-neubrutal-sm">
<p class="text-on-surface font-body-md whitespace-pre-line"><?= $order['shipping_address'] ?></p>
</div>

<h3 class="font-label-md text-primary uppercase mt-md">Item Pesanan</h3>
<div class="space-y-sm">
<?php foreach ($items as $item): ?>
<div class="flex items-center gap-md bg-surface border-3 border-on-surface p-md shadow-neubrutal-sm">
<div class="w-16 h-16 bg-surface-container-high border-3 border-on-surface flex-shrink-0 overflow-hidden">
<?php if ($item['product_image']): ?>
<img class="w-full h-full object-cover" src="<?= $item['product_image'] ?>" alt=""/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-outline">image</span></div>
<?php endif; ?>
</div>
<div class="flex-1">
<h4 class="font-label-md text-on-surface"><?= $item['product_name'] ?></h4>
<?php if ($item['variant_name']): ?>
<p class="font-label-sm text-on-surface-variant">Varian: <?= $item['variant_name'] ?></p>
<?php endif; ?>
<p class="font-body-md text-on-surface-variant"><?= $item['quantity'] ?> x Rp <?= number_format($item['price'] * 16000, 0, ',', '.') ?></p>
</div>
<p class="font-label-md text-primary">Rp <?= number_format($item['price'] * $item['quantity'] * 16000, 0, ',', '.') ?></p>
</div>
<?php endforeach; ?>
</div>

<div class="border-t-3 border-on-surface pt-md flex justify-between">
<span class="font-label-md text-on-surface uppercase">Total</span>
<span class="font-headline-md text-primary">Rp <?= number_format($order['total'] * 16000, 0, ',', '.') ?></span>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
