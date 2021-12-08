<?=$this->extend('register/layouts');?>

<?=$this->section('register');?>
<div class="container">
    <div class="row">
        <h1>Forgot Password</h1>
    </div>
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
   <?=form_open()?>
   <?=csrf_field()?>
   <div class="form-group">
       <label for="email">Email</label>
       <input type="email" class="form-control" name="email">
   </div>
   <div class="form-group mt-2">
       <button type="submit" class="btn btn-primary">send</button>
   </div>
   <?=form_close()?>
</div>
<?=$this->endSection();?>