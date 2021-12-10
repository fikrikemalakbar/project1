<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type A</h2>
                <form action="/dashboardtypea/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Hero image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/blank.png" alt="blank"
                                    class="img-thumbnail hero-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('heroimage')) ? 'is-invalid' : '';?>"
                                        id="heroimage" name="heroimage" onchange="heroImgAPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('heroimage');?>
                                    </div>
                                    <label style="display:none;" for="heroimage" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheroimagea')) ? 'is-invalid' : '';?>" name="captionheroimagea"
                                id="captionheroimagea" value="<?=old('captionheroimagea');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheroimagea');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Child image satu</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/blank.png" alt="blank"
                                    class="img-thumbnail childsatu-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagesatu')) ? 'is-invalid' : '';?>"
                                        id="childimagesatu" name="childimagesatu" onchange="childImgSatuAPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('childimagesatu');?>
                                    </div>
                                    <label style="display:none;" for="childimagesatu" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child Image satu</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildimagesatua')) ? 'is-invalid' : '';?>" name="captionchildimagesatua"
                                id="captionchildimagesatua" value="<?=old('captionchildimagesatua');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildimagesatua');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Child image dua</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/blank.png" alt="blank"
                                    class="img-thumbnail childdua-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagedua')) ? 'is-invalid' : '';?>"
                                        id="childimagedua" name="childimagedua" onchange="childImgDuaAPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('childimagedua');?>
                                    </div>
                                    <label style="display:none;" for="childimagedua" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child Image dua</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildimageduaa')) ? 'is-invalid' : '';?>" name="captionchildimageduaa"
                                id="captionchildimageduaa" value="<?=old('captionchildimageduaa');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildimageduaa');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="texttypea" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="texttypea" id="ckeditor" class="ckeditor <?=($validation->hasError('texttypea')) ? 'is-invalid' : '';?>" ></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('texttypea');?>
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