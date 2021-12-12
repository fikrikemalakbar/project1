<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Bank</h2>
                <form action="/dashboardbank/update/<?=$bank['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="idbanklama" value="<?=$bank['id'];?>">
                    <input type="hidden" name="oldimagebank" value="<?=$bank['imagebank'];?>">
                    <div class="row mb-3">
                        <label for="bchildimage" class="col-sm-2 col-form-label">Image Site</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/<?=$bank['imagebank'];?>"
                                    alt="<?=$bank['captionbank']?>" class="img-thumbnail imagebank-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagebank')) ? 'is-invalid' : '';?>"
                                        id="imagebank" name="imagebank" onchange="imagebankPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imagebank');?>
                                    </div>
                                    <label for="imagebank"
                                        class="custom-file-label"><?=$bank['imagebank'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionbank" class="col-sm-2 col-form-label">Caption Bank</label>
                        <div class="col-sm-10">
                            <input type="altfeature"
                                class="form-control <?=($validation->hasError('captionbank')) ? 'is-invalid' : '';?>"
                                name="captionbank" id="captionbank"
                                value="<?=(old('captionbank')) ? old('captionbank') : $bank['captionbank']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionbank');?>
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