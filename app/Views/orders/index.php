<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">PESANAN SAYA</h2>

<?php if (empty($orders)): ?>
<div class="text-center py-xl border-3 border-on-surface bg-surface-container shadow-neubrutal-sm">
<span class="material-symbols-outlined text-6xl text-outline">receipt_long</span>
<p class="text-on-surface-variant font-body-lg mt-md">Belum ada pesanan</p>
<a href="/produk" class="inline-block mt-md bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Belanja Sekarang</a>
</div>
<?php else: ?>
<div class="space-y-md">
<?php foreach ($orders as $order): ?>
<a href="/orders/<?= $order['id'] ?>" class="block bg-surface-container border-3 border-on-surface p-md hover:bg-surface-container-highest transition-all shadow-neubrutal-sm">
<div class="flex justify-between items-start">
<div>
<span class="font-label-md text-on-surface">Pesanan #<?= $order['id'] ?></span>
<span class="font-label-sm text-on-surface-variant ml-sm"><?= date('d M Y H:i', strtotime($order['created_at'])) ?></span>
</div>
<span class="font-label-md px-sm py-xs uppercase border-3 border-on-surface 
<?= $order['status'] === 'pending' ? 'bg-accent-cta text-on-accent-cta' : ($order['status'] === 'shipped' ? 'bg-primary text-on-primary' : 'bg-surface text-on-surface') ?>">
<?= $order['status'] ?>
</span>
</div>
<p class="text-on-surface-variant font-body-md mt-sm">Total: <span class="text-primary font-label-md">Rp <?= number_format($order['total'] * 16000, 0, ',', '.') ?></span></p>
</a>
<?php endforeach; ?>
</div>
<?php endif; ?>
</section>

<?= $this->include('layout/footer') ?>
