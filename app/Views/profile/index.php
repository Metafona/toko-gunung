<?= $this->include('layout/header') ?>

<section class="py-xl max-w-container-max mx-auto px-margin-mobile md:px-xl">
<div class="max-w-lg mx-auto">
<div class="bg-surface-container border-3 border-on-surface p-lg space-y-md shadow-neubrutal">
<h2 class="font-headline-lg text-headline-lg text-center">PROFIL SAYA</h2>

<?php if (session()->getFlashdata('errors')): ?>
<div class="bg-red-900/20 border-3 border-red-500 text-red-400 p-md font-label-sm">
<?php foreach (session()->getFlashdata('errors') as $e): ?>
<p><?= $e ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="flex flex-col items-center gap-md py-md">
  <div class="w-24 h-24 overflow-hidden bg-primary/20 border-3 border-on-surface">
    <?php if (session()->get('avatar')): ?>
      <img class="w-full h-full object-cover" src="<?= session()->get('avatar') ?>" alt="<?= session()->get('username') ?>"/>
    <?php else: ?>
      <div class="w-full h-full flex items-center justify-center bg-accent-cta text-on-accent-cta font-display-lg text-display-lg-mobile font-bold uppercase">
        <?= substr(session()->get('username'), 0, 1) ?>
      </div>
    <?php endif; ?>
  </div>
  <span class="font-body-lg text-on-surface-variant"><?= session()->get('email') ?></span>
</div>

<form action="/profile/update" method="POST" enctype="multipart/form-data" class="space-y-md">
<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Username</label>
<input type="text" name="username" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md focus:border-primary focus:ring-0" value="<?= old('username', session()->get('username')) ?>" required/>
</div>

<div class="space-y-xs">
<label class="font-label-sm text-primary uppercase">Foto Profil</label>
<input type="file" name="avatar" accept="image/*" class="w-full bg-surface border-3 border-on-surface text-on-surface px-md py-md font-body-md file:bg-accent-cta file:text-on-accent-cta file:border-3 file:border-on-surface file:px-md file:py-sm file:font-label-md file:uppercase file:tracking-wider file:cursor-pointer hover:file:brightness-90 focus:border-primary focus:ring-0"/>
</div>

<button type="submit" class="w-full bg-accent-cta text-on-accent-cta border-3 border-on-surface font-label-md px-lg py-md hover:brightness-90 transition-all uppercase tracking-widest shadow-neubrutal">Simpan Perubahan</button>
</form>

<a href="/" class="block text-center text-on-surface-variant font-label-md hover:text-primary transition-colors uppercase mt-md">&larr; Kembali</a>
</div>
</div>
</section>

<?= $this->include('layout/footer') ?>
