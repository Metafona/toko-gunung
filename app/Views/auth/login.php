<?= $this->include('layout/header') ?>

<section class="min-h-[80vh] flex items-center justify-center py-xl">
<div class="w-full max-w-md px-margin-mobile md:px-xl">
<div class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<div class="text-center space-y-xs">
<h2 class="font-headline-lg text-headline-lg">LOGIN</h2>
<p class="text-on-surface-variant font-body-md">Masuk ke akun SummitPeak Anda</p>
</div>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border-3 border-red-500 text-red-400 p-md font-label-sm">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="/login<?= isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : '' ?>" method="POST" class="space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Email</label>
<input type="email" name="email" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Password</label>
<input type="password" name="password" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" required/>
</div>
<button type="submit" class="w-full bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Login</button>
</form>

<p class="text-center text-on-surface-variant font-body-md">
Belum punya akun? <a href="/register" class="text-primary hover:underline border-2 border-primary px-sm py-xs">Daftar</a>
</p>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
