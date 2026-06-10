<?= $this->include('layout/header') ?>

<section class="min-h-[80vh] flex items-center justify-center py-xl">
<div class="w-full max-w-md px-margin-mobile md:px-xl">
<div class="bg-surface-container border border-outline-variant p-lg space-y-md">
<div class="text-center space-y-xs">
<h2 class="font-headline-lg text-headline-lg">DAFTAR</h2>
<p class="text-on-surface-variant font-body-md">Buat akun SummitPeak baru</p>
</div>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border border-red-500 text-red-400 p-md font-label-sm">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="/register" method="POST" class="space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Username</label>
<input type="text" name="username" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('username') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Email</label>
<input type="email" name="email" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" value="<?= old('email') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Password</label>
<input type="password" name="password" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Konfirmasi Password</label>
<input type="password" name="confirm_password" class="w-full bg-surface border border-outline text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0 rounded-DEFAULT" required/>
</div>
<button type="submit" class="w-full bg-primary text-on-primary font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest rounded-DEFAULT">Daftar</button>
</form>

<p class="text-center text-on-surface-variant font-body-md">
Sudah punya akun? <a href="/login" class="text-primary hover:underline">Login</a>
</p>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
