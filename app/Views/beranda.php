<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="relative h-[600px] md:h-[921px] min-h-[600px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover brightness-50" alt="Mountain peaks" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBw6smKM5oCVIQYOV3VSJI_u16KAz4xwldP2Flgzv-loZvXipsBZLia2QGDW065KrtGQ6bjQq3FmVhlKA-WSAlPI8ui_WNk4fnJSV_ySQPexPY_yAlKevcxQ_b5zxApj54zbUtczqWwRpMsFDeowVgntqqKDBKO0AfzxplbO14tfudeOXfCl0DBgI9JYFqLaqMx28BsOlZRlihfhSDzmmvkul-KCTGVpvVfGKmZtM_7fyZ3tsB2ggGIfKwP94jb3emibQG1H2Xszgs"/>
</div>
<div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-xl w-full">
<div class="max-w-2xl space-y-md">
<span class="inline-block px-sm py-xs bg-primary/20 border border-primary text-primary font-label-md uppercase tracking-widest rounded-sm">Perlengkapan Kelas Teknis</span>
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface leading-tight">LENGKAPI PERALATAN PENDAKIANMU</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">Rekayasa untuk lingkungan paling berat di Bumi. Perlengkapan presisi bagi mereka yang merasa nyaman di atas batas pepohonan.</p>
<div class="pt-base flex flex-col sm:flex-row gap-base">
<a href="/produk" class="inline-block bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT text-center">Belanja Sekarang</a>
<a href="/produk" class="inline-block border border-outline text-on-surface font-label-md px-lg py-md hover:bg-surface-container-highest transition-all uppercase tracking-widest rounded-DEFAULT text-center">Lihat Koleksi</a>
</div>
</div>
</div>
<div class="absolute bottom-base left-1/2 -translate-x-1/2 flex flex-col items-center gap-xs opacity-50">
<span class="font-label-sm uppercase tracking-widest">Scroll</span>
<div class="w-[1px] h-lg bg-on-surface animate-bounce"></div>
</div>
</section>

<!-- Category Grid (Bento Style) -->
<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 h-auto md:h-[800px] gap-gutter">
<?php
$bgs = [
  ['label' => 'Tenda', 'desc' => 'Perlengkapan Shelter 4 Musim', 'icon' => 'tent', 'slug' => 'tents', 'span' => 'md:col-span-2 md:row-span-2', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDf8mmID6JKC9oYsOMaoTHskJaxFJl1uxFpVJRX0CDYSCXCfNw6-rDl8z_J5q-5kr6_VfJXkg48FimJ_J3oyRDXeCM6FrULOJpdqN8u4XVXQkgs5YDaeeMlyrZb4GcBddnMyPAo_gntVUXx1CRrPZ5vbQ4gOssAnTt9yv5KVd8RobJjNKidGDLgcxYiNcG7ohJFPfHVaRuT2xV2aOhlhlLUdB4pjsRHV_GHMAh2u2hd4ALUaiBznHzUvnUxshL_B1oohVRAhiiTBFU'],
  ['label' => 'Ransel', 'desc' => '', 'icon' => 'backpack', 'slug' => 'backpacks', 'span' => 'md:col-span-2 md:row-span-1', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA1zHlOfQF07875R1l3TqNNIYZBUXKwTTavIExsAQFCLSy-ccXXU3KHBtvdWWQbcBSHKufgrRxPLLQ0y3r-E-ech0EdivOxEIKLevVTTmAXcXZwrP5hTyaCn-yC5ZVFtvJkFFe5l5iw1QLTNYW361pn9YSp72-qffyVsyau5IT1NQc70TJJaLttF-4cEYUhgpX8L0vnaD5Kh8ktOzH5pY1Tc7NkznAKZ5CZdyiYTxxr3SfpOff7Th_FJsQ3a3X1rHdyZfIQy-dBusQ'],
  ['label' => 'Sepatu', 'desc' => '', 'icon' => 'hiking', 'slug' => 'footwear', 'span' => 'md:col-span-1 md:row-span-1', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCk7P3vPRCgG-Dmjd08SAYS_n_DXcA4UayA_7E0R6UNaXd1ewlDuEvlEs3GM_OGuekD9tY3z9gn0HvUYeMELQIQwm6dDTYVbH8LIQ4MsZ54VAhvmS1kcOhaF3vELjr8qOAUmknbDaTl-ZPAEKYbrhkhITSK0NgEkw0J-vdM_azTmZEjxi9SgZdNuqmRBkHpmJhGkCNlUW8H0OvBk_sWyWpJRVV9Mu2tl0_v7K0cj8LbHY32bB88nhkeZDaw3Kr-89yiwIkigU0DfZ0'],
  ['label' => 'Pakaian', 'desc' => '', 'icon' => 'apparel', 'slug' => 'clothing', 'span' => 'md:col-span-1 md:row-span-1', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAXZQ0yRAWs68OBSGMIiDzXxXDUcej2GWG8Ipt-Q0l3nhiJD-3QinVrOOM1yr1XHYgvE7pT3SQXBxUZmpxIlDSLkNSVhcB5cpxB6d6yBpqqXyril1X6g90AW8RwnIu89kC3bDGMLHLRWQrfC-M9vhGJpTa2FsTIJ8H_SJoGRy9Fs36cPpDMmJyPe5hX4Xr8Q44_O2f7946okel-j15y9YNCrxoSCU4NAlhcR3amYl6Wzw3JV-0xXJ3te4VluBzt_IKnoMUDz1hAidU'],
];
foreach ($bgs as $bg):
?>
<div class="<?= $bg['span'] ?> relative group overflow-hidden cursor-pointer border border-outline-variant">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="<?= $bg['label'] ?>" src="<?= $bg['img'] ?>"/>
<div class="absolute inset-0 bg-gradient-to-t from-background/90 via-transparent to-transparent"></div>
<div class="absolute bottom-0 left-0 p-lg w-full flex justify-between items-end">
<div>
  <h3 class="font-headline-lg text-headline-lg mb-xs"><?= $bg['label'] ?></h3>
  <?php if ($bg['desc']): ?><p class="text-on-surface-variant"><?= $bg['desc'] ?></p><?php endif; ?>
</div>
<span class="material-symbols-outlined text-primary text-[40px]"><?= $bg['icon'] ?></span>
</div>
<a href="/produk/kategori/<?= $bg['slug'] ?>" class="absolute inset-0 z-10"></a>
</div>
<?php endforeach; ?>
</div>
</section>

<!-- Featured Products -->
<section class="py-xl bg-surface-container-low">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-xl mb-lg flex justify-between items-end">
<div>
<span class="text-primary font-label-md uppercase tracking-widest mb-xs inline-block">Produk Unggulan</span>
<h2 class="font-headline-lg text-headline-lg">PERLENGKAPAN PREMIUM</h2>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-mobile md:px-xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
<?php foreach ($produkKatalog as $p): ?>
<div class="group cursor-pointer border border-outline-variant bg-surface-container">
<div class="aspect-[4/5] overflow-hidden relative">
<?php if ($p['image']): ?>
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?= $p['name'] ?>" src="<?= $p['image'] ?>"/>
<?php else: ?>
<div class="w-full h-full flex items-center justify-center bg-surface-container-high"><span class="material-symbols-outlined text-6xl text-outline"><?= $p['category_name'] === 'Tenda' ? 'tent' : ($p['category_name'] === 'Ransel' ? 'backpack' : ($p['category_name'] === 'Sepatu' ? 'hiking' : 'apparel')) ?></span></div>
<?php endif; ?>
<?php if ($p['badge']): ?>
<div class="absolute top-md left-md"><span class="bg-primary text-on-primary px-sm py-xs font-label-sm uppercase tracking-tighter"><?= $p['badge'] ?></span></div>
<?php endif; ?>
</div>
<div class="p-md space-y-xs">
<?php if ($p['brand']): ?>
<p class="font-label-sm text-accent-cta uppercase tracking-wider"><?= $p['brand'] ?></p>
<?php endif; ?>
<div class="flex justify-between items-start">
<h4 class="font-headline-md text-headline-md"><?= $p['name'] ?></h4>
<span class="font-label-md text-primary">Rp <?= number_format($p['price'] * 16000, 0, ',', '.') ?></span>
</div>
<p class="text-on-surface-variant font-label-sm uppercase"><?= $p['category_name'] ?></p>
<?php if ($p['specs']): $specs = explode(',', $p['specs']); ?>
<div class="flex gap-xs pt-sm flex-wrap">
<?php foreach ($specs as $s): ?>
<span class="px-xs py-[2px] bg-outline-variant text-on-surface font-label-sm border border-outline"><?= trim($s) ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
<a href="/produk/<?= $p['slug'] ?>" class="absolute inset-0 z-10"></a>
</div>
<?php endforeach; ?>
</div>
</section>

<!-- Built for the Wild -->
<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="flex flex-col lg:flex-row gap-lg items-center">
<div class="lg:w-1/2 space-y-md">
<span class="text-primary font-label-md uppercase tracking-widest">Laporan Inovasi</span>
<h2 class="font-display-lg-mobile md:font-headline-lg text-on-surface uppercase">DIBUAT UNTUK ALAM LIAR.</h2>
<p class="text-body-lg text-on-surface-variant">Kami tidak hanya menguji di laboratorium. Kami menguji di Eiger, Denali, dan di Cascades yang diguyur hujan. Setiap jahitan adalah komitmen untuk keselamatan dan performa Anda di lingkungan paling keras di dunia.</p>
<div class="spec-grid border border-outline-variant">
<div class="spec-item space-y-xs">
<span class="font-label-sm text-primary uppercase">Ketahanan Cuaca</span>
<p class="font-headline-md">10.000mm+</p>
</div>
<div class="spec-item space-y-xs">
<span class="font-label-sm text-primary uppercase">Daya Tahan</span>
<p class="font-headline-md">600D Cordura</p>
</div>
<div class="spec-item space-y-xs">
<span class="font-label-sm text-primary uppercase">Kelas Berat</span>
<p class="font-headline-md">Ultralight</p>
</div>
<div class="spec-item space-y-xs">
<span class="font-label-sm text-primary uppercase">Iklim</span>
<p class="font-headline-md">-40&deg;C Active</p>
</div>
</div>
</div>
<div class="lg:w-1/2 relative group">
<div class="absolute -inset-4 border border-primary/20 -z-10 group-hover:inset-0 transition-all duration-500"></div>
<img class="w-full h-[500px] object-cover grayscale brightness-75 hover:grayscale-0 hover:brightness-100 transition-all duration-700 border border-outline-variant" alt="Pendaki" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJbrVFfGVu0TWxnO2C4kst_b6sj7GZq66kTiKKCYZympdtRmzdSmqwD21lpQgMnRQ_FlvrEoayOlqGLZe1eoVX-5bYpRVaRNg83GT6QSGoLs4Ms8w-rmW73uPgcW06gx4Se9-i24GL8-o_NrhggN2oNteEVslX4ID1kvsGPrkKFNXH9RuNxxXhlU-WuvkBU9gaMh5CX6lRDUG8jB58YaniCCgaq3LT5QNP0mWzmJcYcfPlQXm5wNzxGzI0KyKO3whGqZlYR55pkNg"/>
</div>
</div>
</section>

<!-- Newsletter -->
<section class="py-xl border-y border-outline-variant bg-surface-container-highest/20">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-xl text-center space-y-md">
<h3 class="font-headline-lg text-headline-lg">GABUNG DALAM EKSPEDISI SUMMITPEAK</h3>
<p class="text-body-lg text-on-surface-variant max-w-xl mx-auto">Dapatkan akses eksklusif ke panduan teknis, rilis produk, dan laporan ekspedisi.</p>
<form class="flex flex-col sm:flex-row gap-xs max-w-lg mx-auto pt-md">
<input class="flex-grow bg-surface-container border border-outline text-on-surface px-md py-md font-label-md focus:border-primary focus:ring-0 rounded-DEFAULT" placeholder="MASUKKAN EMAIL" type="email"/>
<button class="bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT" type="submit">Berlangganan</button>
</form>
</div>
</section>

<?= $this->include('layout/footer') ?>
