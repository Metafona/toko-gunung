<?= $this->include('admin/layout/header') ?>

<div class="max-w-2xl">
<h2 class="font-headline-lg text-headline-lg mb-lg"><?= isset($produk) ? 'Edit Produk' : 'Tambah Produk' ?></h2>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border border-red-500 text-red-400 p-md font-label-sm mb-md">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="<?= isset($produk) ? '/admin/produk/update/' . $produk['id'] : '/admin/produk/simpan' ?>" method="POST" class="bg-surface-container border border-outline-variant p-lg space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Nama Produk</label>
<input type="text" name="name" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('name', $produk['name'] ?? '') ?>" required/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Kategori</label>
<select name="category_id" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" required>
<option value="">-- Pilih Kategori --</option>
<?php foreach ($kategoris as $k): ?>
<option value="<?= $k['id'] ?>" <?= old('category_id', $produk['category_id'] ?? '') == $k['id'] ? 'selected' : '' ?>><?= $k['name'] ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Deskripsi</label>
<textarea name="description" rows="4" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" required><?= old('description', $produk['description'] ?? '') ?></textarea>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Harga ($)</label>
<input type="number" name="price" step="0.01" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('price', $produk['price'] ?? '') ?>" required/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">URL Gambar</label>
<input type="url" name="image" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('image', $produk['image'] ?? '') ?>" placeholder="https://..."/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Badge (Label)</label>
<input type="text" name="badge" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('badge', $produk['badge'] ?? '') ?>" placeholder="New Arrival, Best Seller, Elite Series"/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Spesifikasi (pisahkan dengan koma)</label>
<input type="text" name="specs" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('specs', $produk['specs'] ?? '') ?>" placeholder="Dyneema®,Ultralight,Waterproof"/>
</div>

<div class="flex gap-sm pt-md">
<button type="submit" class="bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT"><?= isset($produk) ? 'Update' : 'Simpan' ?></button>
<a href="/admin/produk" class="border border-outline text-on-surface font-label-md px-lg py-md hover:bg-surface-container-highest transition-all uppercase tracking-widest rounded-DEFAULT">Batal</a>
</div>
</form>
</div>

<?= $this->include('admin/layout/footer') ?>
