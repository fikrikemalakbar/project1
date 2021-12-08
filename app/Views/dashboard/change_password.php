<?=$this->extend('dashboard/layouts');?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Change Password</h1>
    <?php if(isset($validation)) : ?>
       <div class="alert alert-danger">
            <?=$validation->listErrors();?>
       </div>
    <?php endif; ?>
   <?=form_open()?>
   <?=csrf_field()?>
   <div class="form-group">
        <label>Old Password</label>
        <input type="password" name="opwd" class="form-control">
    </div>
    <div class="form-group">
        <label>New Password</label>
        <input type="password" name="npwd" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="cnpwd" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Send</button>
    </div>
   <?=form_close()?>
</main>
<?=$this->endSection();?>