<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Contact Person</h2>
                <form action="/dashboardcontactperson/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="wa" class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="wa"
                                class="form-control <?=($validation->hasError('wa')) ? 'is-invalid' : '';?>" name="wa"
                                id="wa" value="<?=old('wa');?>">
                            <div class="ivalid-feedback">
                                <?=$validation->getError('wa');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ph" class="col-sm-2 col-form-label">Nomor Telephone</label>
                        <div class="col-sm-10">
                            <input type="ph"
                                class="form-control <?=($validation->hasError('ph')) ? 'is-invalid' : '';?>" name="ph"
                                id="ph" value="<?=old('ph');?>">
                            <div class="ivalid-feedback">
                                <?=$validation->getError('ph');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                           <textarea name="alamat" id="ckeditor" class="ckeditor <?=($validation->hasError('alamat')) ? 'is-invalid' : '';?>"><?=old('alamat');?></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('alamat');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email"
                                class="form-control <?=($validation->hasError('email')) ? 'is-invalid' : '';?>" name="email"
                                id="email" value="<?=old('email');?>">
                            <div class="ivalid-feedback">
                                <?=$validation->getError('email');?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection();?>