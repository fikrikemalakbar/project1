<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create feature</h2>
                <form action="/dashboardfeature/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail feature-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('namefeature')) ? 'is-invalid' : '';?>"
                                        id="namefeature" name="namefeature" onchange="featureImgPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('namefeature');?>
                                    </div>
                                    <label style="display:none;" for="namefeature" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('altfeature')) ? 'is-invalid' : '';?>" name="altfeature"
                                id="altfeature" value="<?=old('altfeature');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('altfeature');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="featuretext" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="featuretext" id="ckeditor" class="ckeditor <?=($validation->hasError('featuretext')) ? 'is-invalid' : '';?>" ></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('featuretext');?>
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