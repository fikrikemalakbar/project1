<?=$this->extend('dashboard/layouts');?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <p>EDIT PROFIL</p>
    <?php if(isset($validation)) : ?>
       <div class="alert alert-danger">
            <?=$validation->listErrors();?>
       </div>
    <?php endif; ?>

    <?php if(session()->getTempdata('success')) : ?>
        <div class="alert alert-success">
            <?=session()->getTempdata('success');?>
        </div>
    <?php endif;?>

    <?php if(session()->getTempdata('error')) : ?>
        <div class="alert alert-danger">
            <?=session()->getTempdata('error');?>
        </div>
    <?php endif;?>
    <?=form_open_multipart();?>
    <?=csrf_field()?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="upload">Upload</label>
                <input type="file" class="form-control" name="avatar">
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
    <?=form_close();?>
</main>
<?=$this->endSection();?>