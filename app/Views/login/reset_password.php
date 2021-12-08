<?=$this->extend('register/layouts');?>

<?=$this->section('register');?>

<div class="container">
    <div class="row">
        <h1>Reset Password</h1>

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

    <?php if(session()->getTempdata('success')) : ?>
        <div class="alert alert-success">
            <?=session()->getTempdata('success');?>
        </div>
    <?php endif; ?> 

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error;?>
        </div>
        <?php else: ?>
            <?= form_open();?>
            <?=csrf_field();?>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="form-group mt-2">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" name="cpwd">
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            <?= form_close();?>
    <?php endif; ?>
    </div>
</div>


 <?=$this->endSection();?>

