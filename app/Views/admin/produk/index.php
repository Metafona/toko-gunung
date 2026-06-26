<?= $this->include('admin/layout/header') ?>

<div class="space-y-md">
<div class="flex justify-between items-center">
<h2 class="font-headline-lg text-headline-lg">Kelola Produk</h2>
<a href="/admin/produk/tambah" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-md py-sm hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">+ Tambah Produk</a>
</div>

<div class="overflow-x-auto bg-surface-container border-3 border-on-surface">
<table class="w-full text-left font-body-md">
<thead>
<tr class="border-b-3 border-on-surface bg-surface-container-high">
<th class="p-md font-label-sm text-primary uppercase">ID</th>
<th class="p-md font-label-sm text-primary uppercase">Nama</th>
<th class="p-md font-label-sm text-primary uppercase">Kategori</th>
<th class="p-md font-label-sm text-primary uppercase">Harga ($)</th>
<th class="p-md font-label-sm text-primary uppercase">Aksi</th>
</tr>
</thead>
<tbody>
<?php if (empty($produks)): ?>
<tr><td colspan="5" class="p-md text-center text-on-surface-variant">Belum ada produk</td></tr>
<?php endif; ?>
<?php foreach ($produks as $p): ?>
<tr class="border-b-3 border-on-surface hover:bg-surface-container-high/50">
<td class="p-md font-bold"><?= $p['id'] ?></td>
<td class="p-md font-medium"><?= $p['name'] ?></td>
<td class="p-md"><?= $p['category_name'] ?? '-' ?></td>
<td class="p-md">$<?= number_format($p['price'], 2) ?></td>
<td class="p-md">
<div class="flex gap-sm">
<a href="/admin/produk/edit/<?= $p['id'] ?>" class="font-label-sm bg-primary text-on-primary border-2 border-on-surface px-sm py-xs hover:brightness-90 transition-all uppercase">Edit</a>
<a href="/admin/produk/variant/<?= $p['id'] ?>" class="font-label-sm bg-accent-cta text-on-accent-cta border-2 border-on-surface px-sm py-xs hover:brightness-90 transition-all uppercase">Varian</a>
<a href="/admin/produk/hapus/<?= $p['id'] ?>" class="font-label-sm bg-red-600 text-white border-2 border-on-surface px-sm py-xs hover:brightness-90 transition-all uppercase" onclick="return confirm('Yakin hapus <?= $p['name'] ?>?')">Hapus</a>
</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?= $this->include('admin/layout/footer') ?>
