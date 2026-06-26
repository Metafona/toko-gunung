<?= $this->include('admin/layout/header') ?>

<div class="space-y-md">
<h2 class="font-headline-lg text-headline-lg">KELOLA VARIAN PRODUK</h2>
<p class="text-on-surface-variant font-body-md">Tambahkan varian seperti warna, ukuran, atau kombinasi keduanya.</p>

<form action="/admin/produk/variant/simpan/<?= $product_id ?>" method="POST" enctype="multipart/form-data">
<div id="variantList" class="space-y-md">
<?php if (!empty($variants)): $i = 0; ?>
<?php foreach ($variants as $v): ?>
<div class="variant-item bg-surface-container border-3 border-on-surface p-md space-y-sm">
  <div class="flex justify-between items-center">
    <span class="font-label-md text-primary uppercase">Varian #<?= $i + 1 ?></span>
    <button type="button" class="hapus-variant font-label-sm bg-red-600 text-white border-2 border-on-surface px-sm py-xs hover:brightness-90 uppercase">Hapus</button>
  </div>
  <div class="grid grid-cols-2 gap-sm">
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Nama (contoh: Color: Red, Size: L)</label>
      <input type="text" name="name[]" value="<?= $v['name'] ?>" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="Color: Red, Size: L" required/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">SKU</label>
      <input type="text" name="sku[]" value="<?= $v['sku'] ?>" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="SKU-001"/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Penyesuaian Harga (+/- $)</label>
      <input type="number" name="price_adjustment[]" step="0.01" value="<?= $v['price_adjustment'] ?>" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0"/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Stok</label>
      <input type="number" name="stock[]" value="<?= $v['stock'] ?>" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" required/>
    </div>
  </div>
  <div class="space-y-xs">
    <label class="font-label-sm text-on-surface-variant">Gambar Varian (opsional)</label>
    <input type="file" name="variant_images[]" accept="image/*" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-3 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0"/>
    <?php if ($v['image']): ?>
    <img src="<?= $v['image'] ?>" class="w-16 h-16 object-cover border-3 border-on-surface mt-xs"/>
    <?php endif; ?>
  </div>
</div>
<?php $i++; endforeach; ?>
<?php else: ?>
<!-- Initial empty row for new variants -->
<div class="variant-item bg-surface-container border-3 border-on-surface p-md space-y-sm">
  <div class="flex justify-between items-center">
    <span class="font-label-md text-primary uppercase">Varian #1</span>
    <button type="button" class="hapus-variant font-label-sm bg-red-600 text-white border-2 border-on-surface px-sm py-xs hover:brightness-90 uppercase">Hapus</button>
  </div>
  <div class="grid grid-cols-2 gap-sm">
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Nama (contoh: Color: Red, Size: L)</label>
      <input type="text" name="name[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="Color: Red, Size: L" required/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">SKU</label>
      <input type="text" name="sku[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="SKU-001"/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Penyesuaian Harga (+/- $)</label>
      <input type="number" name="price_adjustment[]" step="0.01" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0"/>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Stok</label>
      <input type="number" name="stock[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" required/>
    </div>
  </div>
  <div class="space-y-xs">
    <label class="font-label-sm text-on-surface-variant">Gambar Varian (opsional)</label>
    <input type="file" name="variant_images[]" accept="image/*" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-3 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0"/>
  </div>
</div>
<?php endif; ?>
</div>

<button type="button" id="tambahVariant" class="mt-md border-3 border-on-surface text-on-surface font-label-md px-lg py-md hover:bg-surface-container-highest transition-all uppercase tracking-widest shadow-neubrutal-sm">+ Tambah Varian</button>

<div class="mt-lg flex gap-sm">
<button type="submit" class="bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Simpan Varian</button>
<a href="/admin/produk/edit/<?= $product_id ?>" class="border-3 border-on-surface text-on-surface font-label-md px-lg py-md hover:bg-surface-container-highest transition-all uppercase tracking-widest shadow-neubrutal-sm">Kembali ke Produk</a>
</div>
</form>
</div>

<script>
document.getElementById('tambahVariant').addEventListener('click', function() {
  const list = document.getElementById('variantList');
  const idx = list.children.length + 1;
  const div = document.createElement('div');
  div.className = 'variant-item bg-surface-container border-3 border-on-surface p-md space-y-sm';
  div.innerHTML = `
    <div class="flex justify-between items-center">
      <span class="font-label-md text-primary uppercase">Varian #${idx}</span>
      <button type="button" class="hapus-variant font-label-sm bg-red-600 text-white border-2 border-on-surface px-sm py-xs hover:brightness-90 uppercase">Hapus</button>
    </div>
    <div class="grid grid-cols-2 gap-sm">
      <div class="space-y-xs">
        <label class="font-label-sm text-on-surface-variant">Nama (contoh: Color: Red, Size: L)</label>
        <input type="text" name="name[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="Color: Red, Size: L" required/>
      </div>
      <div class="space-y-xs">
        <label class="font-label-sm text-on-surface-variant">SKU</label>
        <input type="text" name="sku[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" placeholder="SKU-001"/>
      </div>
      <div class="space-y-xs">
        <label class="font-label-sm text-on-surface-variant">Penyesuaian Harga (+/- $)</label>
        <input type="number" name="price_adjustment[]" step="0.01" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0"/>
      </div>
      <div class="space-y-xs">
        <label class="font-label-sm text-on-surface-variant">Stok</label>
        <input type="number" name="stock[]" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md focus:border-primary focus:ring-0" required/>
      </div>
    </div>
    <div class="space-y-xs">
      <label class="font-label-sm text-on-surface-variant">Gambar Varian (opsional)</label>
      <input type="file" name="variant_images[]" accept="image/*" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-sm font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-3 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0"/>
    </div>
  `;
  list.appendChild(div);
  attachHapusListeners();
});

function attachHapusListeners() {
  document.querySelectorAll('.hapus-variant').forEach(btn => {
    btn.removeEventListener('click', hapusVariant);
    btn.addEventListener('click', hapusVariant);
  });
}

function hapusVariant(e) {
  e.target.closest('.variant-item').remove();
}

attachHapusListeners();
</script>

<?= $this->include('admin/layout/footer') ?>
