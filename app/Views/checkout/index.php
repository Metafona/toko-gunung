<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">CHECKOUT</h2>

<div class="flex flex-col lg:flex-row gap-lg">
<!-- Form -->
<div class="lg:w-2/3">
<form action="/checkout/process" method="POST" class="bg-surface-container border border-outline-variant p-lg space-y-md">
<h3 class="font-label-md text-primary uppercase">Alamat Pengiriman</h3>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Alamat Lengkap</label>
<textarea name="address" rows="4" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" placeholder="Jl. Contoh No. 123, Kecamatan, Kota, Provinsi, Kode Pos" required></textarea>
</div>
<button type="submit" class="w-full bg-accent-cta text-on-accent-cta font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">Buat Pesanan</button>
</form>
</div>

<!-- Ringkasan -->
<div class="lg:w-1/3">
<div class="bg-surface-container border border-outline-variant p-lg space-y-md">
<h3 class="font-label-md text-primary uppercase">Ringkasan Pesanan</h3>
<div class="space-y-sm">
<?php foreach ($items as $item): ?>
<div class="flex justify-between text-body-md">
<span><?= $item['name'] ?> x<?= $item['quantity'] ?></span>
<span>Rp <?= number_format($item['price'] * $item['quantity'] * 16000, 0, ',', '.') ?></span>
</div>
<?php endforeach; ?>
</div>
<div class="border-t border-outline-variant pt-md flex justify-between">
<span class="font-label-md text-on-surface uppercase">Total</span>
<span class="font-headline-md text-primary">Rp <?= number_format($total * 16000, 0, ',', '.') ?></span>
</div>
</div>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
