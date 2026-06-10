<?= $this->include('admin/layout/header') ?>

<div class="space-y-md">
<div class="flex justify-between items-center">
<h2 class="font-headline-lg text-headline-lg">Kelola Produk</h2>
<a href="/admin/produk/tambah" class="bg-primary text-on-primary font-label-md px-md py-sm hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">+ Tambah Produk</a>
</div>

<div class="overflow-x-auto bg-surface-container border border-outline-variant">
<table class="w-full text-left font-body-md">
<thead>
<tr class="border-b border-outline-variant">
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
<tr class="border-b border-outline-variant hover:bg-surface-container-high/50">
<td class="p-md"><?= $p['id'] ?></td>
<td class="p-md font-medium"><?= $p['name'] ?></td>
<td class="p-md"><?= $p['category_name'] ?? '-' ?></td>
<td class="p-md">$<?= number_format($p['price'], 2) ?></td>
<td class="p-md">
<div class="flex gap-sm">
<a href="/admin/produk/edit/<?= $p['id'] ?>" class="font-label-sm text-primary hover:underline">Edit</a>
<a href="/admin/produk/hapus/<?= $p['id'] ?>" class="font-label-sm text-red-400 hover:underline" onclick="return confirm('Yakin hapus <?= $p['name'] ?>?')">Hapus</a>
</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?= $this->include('admin/layout/footer') ?>
