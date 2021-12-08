<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create gallery</h2>
                <form action="/dashboardgallery/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail gallery-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('name')) ? 'is-invalid' : '';?>"
                                        id="name" name="name" onchange="galleryImgPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('name');?>
                                    </div>
                                    <label style="display:none;" for="nameGallery" class="custom-file-label">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alt" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="alt"
                                class="form-control <?=($validation->hasError('alt')) ? 'is-invalid' : '';?>" name="alt"
                                id="alt" value="<?=old('alt');?>">
                            <div class="ivalid-feedback">
                                <?=$validation->getError('alt');?>
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