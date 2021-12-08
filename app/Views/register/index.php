<?php $page_session = \Config\Services::session() ?>

<?=$this->extend('register/layouts');?>
<?=$this->section('register');?>

<main class="form-signin">
  <?php if($page_session->getTempdata('success')) : ?>
    <div class="alert alert-success"><?=$page_session->getTempdata('success');?></div>
  <?php endif;?>

  <?php if($page_session->getTempdata('error')) : ?>
    <div class="alert alert-alert"><?=$page_session->getTempdata('error');?></div>
  <?php endif;?>
  
  <?=form_open()?>
   <?=csrf_field()?>
    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
  	<div class="form-floating">
      <input type="name" name="name" class="form-control" id="floatingInput" placeholder="name" value='<?= set_value('name')?>'>
      <span class="text-danger"><?=display_error($validation, 'name')?></span>
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating mt-2">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value='<?= set_value('email')?>'>
      <span class="text-danger"><?=display_error($validation, 'email')?></span>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mt-2">
      <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" value='<?= set_value('pass')?>'>
      <span class="text-danger"><?=display_error($validation, 'pass')?></span>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" name="cpass" class="form-control" id="floatingPassword" placeholder="Password" value='<?= set_value('cpass')?>'>
      <span class="text-danger"><?=display_error($validation, 'cpass')?></span>
      <label for="floatingPassword">Confirm Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <small class="text-center">if already account move to <a href="/login">Login</a></small>
   
  <?=form_close()?>
</main>

<?=$this->endSection()?>