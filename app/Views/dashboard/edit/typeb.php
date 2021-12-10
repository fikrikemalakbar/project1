<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type B</h2>
                <form action="/dashboardtypeb/update/<?=$typeb['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugtypeb" value="<?=$typeb['slugtypeb'];?>">
                    <input type="hidden" name="hlm" value="<?=$typeb['heroimagetypeb'];?>">
                    <input type="hidden" name="clsdb" value="<?=$typeb['childimagesatutypeb'];?>">
                    <input type="hidden" name="clssb" value="<?=$typeb['childimageduatypeb'];?>">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Hero Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['heroimagetypeb'];?>"
                                    alt="<?=$typeb['captionheroimageb']?>" class="img-thumbnail hero-typeb-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('heroimagetypeb')) ? 'is-invalid' : '';?>"
                                        id="heroimagetypeb" name="heroimagetypeb" onchange="heroImgBPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('heroimagetypeb');?>
                                    </div>
                                    <label for="heroimagetypeb"
                                        class="custom-file-label"><?=$typeb['heroimagetypeb'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheroimageb')) ? 'is-invalid' : '';?>"
                                name="captionheroimageb" id="captionheroimageb"
                                value="<?=(old('captionheroimageb')) ? old('captionheroimageb') : $typeb['captionheroimageb']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheroimageb');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Child Image Satu</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['childimagesatutypeb'];?>"
                                    alt="<?=$typeb['captionchildsatuimageb']?>" class="img-thumbnail childsatu-typeb-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagesatutypeb')) ? 'is-invalid' : '';?>"
                                        id="childimagesatutypeb" name="childimagesatutypeb" onchange="childImgSatuBPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('childimagesatutypeb');?>
                                    </div>
                                    <label for="childimagesatutypeb"
                                        class="custom-file-label"><?=$typeb['childimagesatutypeb'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child image satu</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildsatuimageb')) ? 'is-invalid' : '';?>"
                                name="captionchildsatuimageb" id="captionchildsatuimageb"
                                value="<?=(old('captionchildsatuimageb')) ? old('captionchildsatuimageb') : $typeb['captionchildsatuimageb']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildsatuimageb');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Child Image Dua</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['childimageduatypeb'];?>"
                                    alt="<?=$typeb['captionchildduaimageb']?>" class="img-thumbnail childdua-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimageduatypeb')) ? 'is-invalid' : '';?>"
                                        id="childimageduatypeb" name="childimageduatypeb" onchange="childImgduaAPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('childimageduatypeb');?>
                                    </div>
                                    <label for="childimageduatypeb"
                                        class="custom-file-label"><?=$typeb['childimageduatypeb'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child image dua</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildduaimageb')) ? 'is-invalid' : '';?>"
                                name="captionchildduaimageb" id="captionchildduaimageb"
                                value="<?=(old('captionchildduaimageb')) ? old('captionchildduaimageb') : $typeb['captionchildduaimageb']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildduaimageb');?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="texttypeb" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="texttypeb" id="ckeditor" class="ckeditor <?=($validation->hasError('texttypeb')) ? 'is-invalid' : '';?>">
                                <?=(old('texttypeb')) ? old('texttypeb') : $typeb['texttypeb']?>
                            </textarea>
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