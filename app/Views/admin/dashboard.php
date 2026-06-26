<?= $this->include('admin/layout/header') ?>

<div class="space-y-md">
<h2 class="font-headline-lg text-headline-lg">Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm">
<h4 class="font-label-sm text-primary uppercase">Total Produk</h4>
<p class="font-headline-lg text-headline-lg mt-sm"><?= $totalProduk ?></p>
</div>
<div class="bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm">
<h4 class="font-label-sm text-primary uppercase">Total Pesanan</h4>
<p class="font-headline-lg text-headline-lg mt-sm"><?= $totalPesanan ?></p>
</div>
<div class="bg-surface-container border-3 border-on-surface p-md shadow-neubrutal-sm">
<h4 class="font-label-sm text-primary uppercase">Total User</h4>
<p class="font-headline-lg text-headline-lg mt-sm"><?= $totalUser ?></p>
</div>
</div>

<div class="mt-lg">
<a href="/admin/produk" class="inline-block bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Kelola Produk</a>
</div>
</div>

<?= $this->include('admin/layout/footer') ?>
