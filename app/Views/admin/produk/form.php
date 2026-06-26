<?= $this->include('admin/layout/header') ?>

<div class="max-w-2xl">
<h2 class="font-headline-lg text-headline-lg mb-lg"><?= isset($produk) ? 'Edit Produk' : 'Tambah Produk' ?></h2>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border-2 border-red-500 text-red-400 p-md font-label-sm mb-md">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="<?= isset($produk) ? '/admin/produk/update/' . $produk['id'] : '/admin/produk/simpan' ?>" method="POST" enctype="multipart/form-data" class="bg-surface-container border-2 border-on-surface p-lg space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Nama Produk</label>
<input type="text" name="name" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" value="<?= old('name', $produk['name'] ?? '') ?>" required/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Kategori</label>
<select name="category_id" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" required>
<option value="">-- Pilih Kategori --</option>
<?php foreach ($kategoris as $k): ?>
<option value="<?= $k['id'] ?>" <?= old('category_id', $produk['category_id'] ?? '') == $k['id'] ? 'selected' : '' ?>><?= $k['name'] ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Deskripsi</label>
<textarea name="description" rows="4" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" required><?= old('description', $produk['description'] ?? '') ?></textarea>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Harga ($)</label>
<input type="number" name="price" step="0.01" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" value="<?= old('price', $produk['price'] ?? '') ?>" required/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Gambar Produk</label>
<?php if (isset($produk) && $produk['image']): ?>
<div class="mb-xs">
  <img class="w-32 h-32 object-cover border-2 border-on-surface" alt="Preview" src="<?= $produk['image'] ?>"/>
</div>
<?php endif; ?>
<input type="file" name="image" accept="image/*" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-2 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:rounded-none file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0 rounded-none"/>
<span class="font-label-sm text-on-surface-variant">Atau masukkan URL:</span>
<input type="url" name="image_url" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" value="<?= old('image_url', $produk['image'] ?? '') ?>" placeholder="https://..."/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Badge (Label)</label>
<input type="text" name="badge" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" value="<?= old('badge', $produk['badge'] ?? '') ?>" placeholder="New Arrival, Best Seller, Elite Series"/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Spesifikasi (pisahkan dengan koma)</label>
<input type="text" name="specs" class="w-full bg-surface border-2 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-none" value="<?= old('specs', $produk['specs'] ?? '') ?>" placeholder="Dyneema®,Ultralight,Waterproof"/>
</div>

<div class="flex gap-sm pt-md">
<button type="submit" class="bg-accent-cta text-on-accent-cta border-2 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-none"><?= isset($produk) ? 'Update' : 'Simpan' ?></button>
<a href="/admin/produk" class="border-2 border-on-surface text-on-surface font-label-md px-lg py-md hover:bg-surface-container-highest transition-all uppercase tracking-widest rounded-none">Batal</a>
</div>
</form>

<?php if (isset($produk)): ?>
<div class="mt-lg p-md bg-surface-container border-2 border-accent-cta">
<h3 class="font-label-md text-accent-cta uppercase mb-sm">Varian Produk</h3>
<p class="text-on-surface-variant font-body-md mb-sm">Atur varian warna, ukuran, dan lainnya untuk produk ini.</p>
<a href="/admin/produk/variant/<?= $produk['id'] ?>" class="inline-block bg-accent-cta text-on-accent-cta border-2 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-none">Kelola Varian</a>
</div>
<?php endif; ?>

</div>

<?= $this->include('admin/layout/footer') ?>
