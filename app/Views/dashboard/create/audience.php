<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Audience</h2>
                <form action="/dashboardaudience/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="audience" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imageaudience-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imageaudience')) ? 'is-invalid' : '';?>"
                                        id="imageaudience" name="imageaudience" onchange="imageaudiencePreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imageaudience');?>
                                    </div>
                                    <label style="display:none;" for="imageaudience" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="altaudience" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('altaudience')) ? 'is-invalid' : '';?>" name="altaudience"
                                id="altaudience" value="<?=old('altaudience');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('altaudience');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nameaudience" class="col-sm-2 col-form-label">Name Audience</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('nameaudience')) ? 'is-invalid' : '';?>" name="nameaudience"
                                id="nameaudience" value="<?=old('nameaudience');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('nameaudience');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="textaudience" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="textaudience" id="ckeditor" class="ckeditor <?=($validation->hasError('textaudience')) ? 'is-invalid' : '';?>" ><?=old('textaudience');?></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('textaudience');?>
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