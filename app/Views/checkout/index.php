<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">CHECKOUT</h2>

<div class="flex flex-col lg:flex-row gap-lg">
<!-- Form -->
<div class="lg:w-2/3">
<form action="/checkout/process" method="POST" class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<h3 class="font-label-md text-primary uppercase">Alamat Pengiriman</h3>

<?php if (!empty($addresses)): ?>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Pilih Alamat Tersimpan</label>
<div class="space-y-xs">
<?php foreach ($addresses as $addr): ?>
<label class="flex items-start gap-sm border-3 border-on-surface p-sm bg-surface cursor-pointer hover:bg-surface-container-highest transition-all">
<input type="radio" name="address_id" value="<?= $addr['id'] ?>" class="mt-1 accent-accent-cta" <?= $addr['is_default'] ? 'checked' : '' ?>/>
<div>
  <span class="font-label-md text-on-surface"><?= $addr['label'] ?: 'Alamat' ?></span>
  <?php if ($addr['is_default']): ?><span class="bg-accent-cta text-on-accent-cta font-label-sm px-xs py-[1px] border-3 border-on-surface ml-sm">Utama</span><?php endif; ?>
  <p class="text-on-surface-variant font-body-md"><?= $addr['recipient'] ?> - <?= $addr['phone'] ?></p>
  <p class="text-on-surface-variant font-body-md"><?= $addr['address'] ?>, <?= $addr['city'] ?>, <?= $addr['province'] ?> <?= $addr['postal_code'] ?></p>
</div>
</label>
<?php endforeach; ?>
</div>
<p class="font-label-sm text-on-surface-variant">Atau masukkan alamat baru:</p>
</div>
<?php endif; ?>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Alamat Lengkap</label>
<textarea name="address" rows="4" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" placeholder="Jl. Contoh No. 123, Kecamatan, Kota, Provinsi, Kode Pos"></textarea>
</div>

<a href="/address" class="inline-block font-label-sm text-primary hover:underline">+ Kelola Alamat</a>

<h3 class="font-label-md text-primary uppercase mt-md">Ringkasan Pesanan</h3>
<div class="space-y-sm bg-surface border-3 border-on-surface p-md shadow-neubrutal-sm">
<?php foreach ($items as $item): ?>
<div class="flex justify-between text-body-md">
<div>
<span><?= $item['name'] ?></span>
<?php if ($item['variant_name']): ?>
<span class="text-on-surface-variant font-label-sm"> - <?= $item['variant_name'] ?></span>
<?php endif; ?>
<span class="text-on-surface-variant"> x<?= $item['quantity'] ?></span>
</div>
<span>Rp <?= number_format(($item['price'] + ($item['price_adjustment'] ?? 0)) * $item['quantity'] * 16000, 0, ',', '.') ?></span>
</div>
<?php endforeach; ?>
</div>

<div class="border-t-3 border-on-surface pt-md flex justify-between">
<span class="font-label-md text-on-surface uppercase">Total</span>
<span class="font-headline-md text-primary">Rp <?= number_format($total * 16000, 0, ',', '.') ?></span>
</div>

<button type="submit" class="w-full bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Buat Pesanan</button>
</form>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
