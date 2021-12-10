<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type B</h2>
                <form action="/dashboardtypeb/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="heroimagetypeb" class="col-sm-2 col-form-label">Hero image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/blank.png" alt="blank"
                                    class="img-thumbnail hero-typeb-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('heroimagetypeb')) ? 'is-invalid' : '';?>"
                                        id="heroimagetypeb" name="heroimagetypeb" onchange="heroImgBPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('heroimagetypeb');?>
                                    </div>
                                    <label style="display:none;" for="heroimagetypeb" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheroimageb')) ? 'is-invalid' : '';?>" name="captionheroimageb"
                                id="captionheroimageb" value="<?=old('captionheroimageb');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheroimageb');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Child image satu</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/blank.png" alt="blank"
                                    class="img-thumbnail childsatu-typeb-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagesatutypeb')) ? 'is-invalid' : '';?>"
                                        id="childimagesatutypeb" name="childimagesatutypeb" onchange="childImgSatuBPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('childimagesatutypeb');?>
                                    </div>
                                    <label style="display:none;" for="childimagesatutypeb" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child Image satu</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildsatuimageb')) ? 'is-invalid' : '';?>" name="captionchildsatuimageb"
                                id="captionchildsatuimageb" value="<?=old('captionchildsatuimageb');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildsatuimageb');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namefeature" class="col-sm-2 col-form-label">Child image dua</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/blank.png" alt="blank"
                                    class="img-thumbnail childdua-typeb-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimageduatypeb')) ? 'is-invalid' : '';?>"
                                        id="childimageduatypeb" name="childimageduatypeb" onchange="childImgDuaBPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('childimageduatypeb');?>
                                    </div>
                                    <label style="display:none;" for="childimageduatypeb" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child Image dua</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildduaimageb')) ? 'is-invalid' : '';?>" name="captionchildduaimageb"
                                id="captionchildduaimageb" value="<?=old('captionchildduaimageb');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildduaimageb');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="texttypeb" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="texttypeb" id="ckeditor" class="ckeditor <?=($validation->hasError('texttypeb')) ? 'is-invalid' : '';?>" ></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('texttypeb');?>
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