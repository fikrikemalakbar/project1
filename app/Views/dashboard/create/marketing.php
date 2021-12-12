<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Marketing Gallery</h2>
                <form action="/dashboardmarketing/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="marketing" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imagemarketing-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagemarketing')) ? 'is-invalid' : '';?>"
                                        id="imagemarketing" name="imagemarketing" onchange="imagemarketingPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imagemarketing');?>
                                    </div>
                                    <label style="display:none;" for="imagemarketing" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionmarketing" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionmarketing')) ? 'is-invalid' : '';?>" name="captionmarketing"
                                id="captionmarketing" value="<?=old('captionmarketing');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionmarketing');?>
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