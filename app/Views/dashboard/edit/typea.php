<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type A</h2>
                <form action="/dashboardtypea/update/<?=$typea['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugtypea" value="<?=$typea['slugtypea'];?>">
                    <input type="hidden" name="heroimagelama" value="<?=$typea['heroimage'];?>">
                    <input type="hidden" name="childimagesatulama" value="<?=$typea['childimagesatu'];?>">
                    <input type="hidden" name="childimagedualama" value="<?=$typea['childimagedua'];?>">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Hero Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['heroimage'];?>"
                                    alt="<?=$typea['captionheroimagea']?>" class="img-thumbnail hero-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('heroimage')) ? 'is-invalid' : '';?>"
                                        id="heroimage" name="heroimage" onchange="heroImgAPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('heroimage');?>
                                    </div>
                                    <label for="heroimage"
                                        class="custom-file-label"><?=$typea['heroimage'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheroimagea')) ? 'is-invalid' : '';?>"
                                name="captionheroimagea" id="captionheroimagea"
                                value="<?=(old('captionheroimagea')) ? old('captionheroimagea') : $typea['captionheroimagea']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheroimagea');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Child Image Satu</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['childimagesatu'];?>"
                                    alt="<?=$typea['captionchildimagesatua']?>" class="img-thumbnail childsatu-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagesatu')) ? 'is-invalid' : '';?>"
                                        id="childimagesatu" name="childimagesatu" onchange="childImgSatuAPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('childimagesatu');?>
                                    </div>
                                    <label for="childimagesatu"
                                        class="custom-file-label"><?=$typea['childimagesatu'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child image satu</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildimagesatua')) ? 'is-invalid' : '';?>"
                                name="captionchildimagesatua" id="captionchildimagesatua"
                                value="<?=(old('captionchildimagesatua')) ? old('captionchildimagesatua') : $typea['captionchildimagesatua']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildimagesatua');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Child Image Dua</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['childimagedua'];?>"
                                    alt="<?=$typea['captionchildimageduaa']?>" class="img-thumbnail childdua-typea-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('childimagedua')) ? 'is-invalid' : '';?>"
                                        id="childimagedua" name="childimagedua" onchange="childImgduaAPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('childimagedua');?>
                                    </div>
                                    <label for="childimagedua"
                                        class="custom-file-label"><?=$typea['childimagedua'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Child image dua</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionchildimageduaa')) ? 'is-invalid' : '';?>"
                                name="captionchildimageduaa" id="captionchildimageduaa"
                                value="<?=(old('captionchildimageduaa')) ? old('captionchildimageduaa') : $typea['captionchildimageduaa']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionchildimageduaa');?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="texttypea" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="texttypea" id="ckeditor" class="ckeditor <?=($validation->hasError('texttypea')) ? 'is-invalid' : '';?>">
                                <?=(old('texttypea')) ? old('texttypea') : $typea['texttypea']?>
                            </textarea>
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