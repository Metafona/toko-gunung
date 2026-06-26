<?= $this->include('layout/header') ?>

<section class="min-h-[80vh] flex items-center justify-center py-xl">
<div class="w-full max-w-md px-margin-mobile md:px-xl">
<div class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<div class="text-center space-y-xs">
<h2 class="font-headline-lg text-headline-lg">DAFTAR</h2>
<p class="text-on-surface-variant font-body-md">Buat akun SummitPeak baru</p>
</div>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border-3 border-red-500 text-red-400 p-md font-label-sm">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="/register" method="POST" enctype="multipart/form-data" class="space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Username</label>
<input type="text" name="username" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('username') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Email</label>
<input type="email" name="email" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('email') ?>" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Password</label>
<input type="password" name="password" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Konfirmasi Password</label>
<input type="password" name="confirm_password" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" required/>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Foto Profil (Opsional)</label>
<input type="file" name="avatar" accept="image/*" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-3 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0"/>
</div>
<button type="submit" class="w-full bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Daftar</button>
</form>

<p class="text-center text-on-surface-variant font-body-md">
Sudah punya akun? <a href="/login" class="text-primary hover:underline border-2 border-primary px-sm py-xs">Login</a>
</p>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
