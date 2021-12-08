<?=$this->extend('register/layouts');?>

<?=$this->section('register')?>


 
<main class="form-signin">
  <?php if(isset($validation)) : ?>
    <div class="alert alert-danger">
    <?=$validation->listErrors()?>
    </div>
  <?php endif;?>

  <?php if(session()->getTempdata('error')) : ?>
    <div class="alert alert-danger">
      <?=session()->getTempdata('error');?>
    </div>
  <?php endif; ?>
  <?=form_open();?>
   <?=csrf_field();?>
    <h1 class="h3 mb-3 fw-normal">Please Login</h1>
    <div class="form-floating mt-2">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mt-2">
      <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    <p><small class="text-center"><a href="<?=base_url()?>/login/forgotpassword">Forgot Password</a></small></p>
    <small class="text-center">if have not account please <a href="/register">Register</a></small>
    <p class="mt-5 mb-3 text-muted">&copy; Root-Test 2021</p>
  <?=form_close();?>
</main>


    
<?=$this->endSection();?>