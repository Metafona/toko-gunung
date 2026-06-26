<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">ALAMAT SAYA</h2>

<div class="flex flex-col lg:flex-row gap-lg">
<!-- Address List -->
<div class="lg:w-1/2 space-y-sm">
<?php if (empty($addresses)): ?>
<div class="bg-surface-container border-3 border-on-surface p-md text-center shadow-neubrutal-sm">
<p class="text-on-surface-variant font-body-md">Belum ada alamat tersimpan</p>
</div>
<?php else: ?>
<?php foreach ($addresses as $addr): ?>
<div class="bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm <?= $addr['is_default'] ? 'border-accent-cta' : '' ?>">
<div class="flex justify-between items-start">
<div>
<h4 class="font-label-md text-on-surface"><?= $addr['label'] ?: 'Alamat' ?></h4>
<?php if ($addr['is_default']): ?><span class="bg-accent-cta text-on-accent-cta font-label-sm px-xs py-[1px] border-2 border-on-surface">Utama</span><?php endif; ?>
</div>
<div class="flex gap-sm">
<a href="/address/set-default/<?= $addr['id'] ?>" class="font-label-sm text-primary hover:underline">Jadikan Utama</a>
<a href="/address/hapus/<?= $addr['id'] ?>" class="font-label-sm text-red-400 hover:underline" onclick="return confirm('Hapus alamat ini?')">Hapus</a>
</div>
</div>
<p class="text-on-surface font-body-md mt-sm"><?= $addr['recipient'] ?> - <?= $addr['phone'] ?></p>
<p class="text-on-surface-variant font-body-md"><?= $addr['address'] ?></p>
<p class="text-on-surface-variant font-body-md"><?= $addr['city'] ?>, <?= $addr['province'] ?> <?= $addr['postal_code'] ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

<!-- Add Address Form -->
<div class="lg:w-1/2">
<form action="/address/simpan" method="POST" class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<h3 class="font-label-md text-primary uppercase">Tambah Alamat Baru</h3>

<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Label (contoh: Rumah, Kantor)</label>
<input type="text" name="label" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" placeholder="Rumah"/>
</div>

<div class="grid grid-cols-2 gap-sm">
<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Nama Penerima *</label>
<input type="text" name="recipient" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('recipient') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">No. Telepon *</label>
<input type="text" name="phone" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('phone') ?>" required/>
</div>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Alamat *</label>
<textarea name="address" rows="2" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" required><?= old('address') ?></textarea>
</div>

<div class="grid grid-cols-3 gap-sm">
<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Kota *</label>
<input type="text" name="city" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('city') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Provinsi *</label>
<input type="text" name="province" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('province') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-on-surface-variant">Kode Pos *</label>
<input type="text" name="postal_code" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('postal_code') ?>" required/>
</div>
</div>

<label class="flex items-center gap-sm cursor-pointer">
<input type="checkbox" name="is_default" value="1" class="accent-accent-cta"/>
<span class="font-label-sm text-on-surface-variant">Jadikan alamat utama</span>
</label>

<button type="submit" class="w-full bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Simpan Alamat</button>
</form>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
