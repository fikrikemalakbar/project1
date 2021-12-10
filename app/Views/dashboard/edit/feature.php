<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah feature</h2>
                <form action="/dashboardfeature/update/<?=$feature['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugfeature" value="<?=$feature['slugfeature'];?>">
                    <input type="hidden" name="imagefeaturelama" value="<?=$feature['namefeature'];?>">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadfeature/<?=$feature['namefeature'];?>"
                                    alt="<?=$feature['altfeature']?>" class="img-thumbnail feature-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('namefeature')) ? 'is-invalid' : '';?>"
                                        id="namefeature" name="namefeature" onchange="featureImgPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('namefeature');?>
                                    </div>
                                    <label for="namefeature"
                                        class="custom-file-label"><?=$feature['namefeature'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption Image</label>
                        <div class="col-sm-10">
                            <input type="altfeature"
                                class="form-control <?=($validation->hasError('altfeature')) ? 'is-invalid' : '';?>"
                                name="altfeature" id="altfeature"
                                value="<?=(old('altfeature')) ? old('altfeature') : $feature['altfeature']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('altfeature');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="featuretext" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="featuretext" id="ckeditor" class="ckeditor <?=($validation->hasError('featuretext')) ? 'is-invalid' : '';?>">
                                <?=(old('featuretext')) ? old('featuretext') : $feature['featuretext']?>
                            </textarea>
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