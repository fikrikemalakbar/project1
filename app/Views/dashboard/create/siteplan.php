<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Site Plan</h2>
                <form action="/dashboardsiteplan/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="imagesite" class="col-sm-2 col-form-label">Image Site Plan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imagesite-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagesite')) ? 'is-invalid' : '';?>"
                                        id="imagesite" name="imagesite" onchange="imagesitePreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imagesite');?>
                                    </div>
                                    <label style="display:none;" for="imagesite" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionsite" class="col-sm-2 col-form-label">Caption Image Site</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionsite')) ? 'is-invalid' : '';?>" name="captionsite"
                                id="captionsite" value="<?=old('captionsite');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionsite');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="imagemaps" class="col-sm-2 col-form-label">Image Maps</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imagemaps-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagemaps')) ? 'is-invalid' : '';?>"
                                        id="imagemaps" name="imagemaps" onchange="imagemapsPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imagemaps');?>
                                    </div>
                                    <label style="display:none;" for="imagemaps" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionmaps" class="col-sm-2 col-form-label">Caption Image Maps</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionmaps')) ? 'is-invalid' : '';?>" name="captionmaps"
                                id="captionmaps" value="<?=old('captionmaps');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionmaps');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Link Maps</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('title')) ? 'is-invalid' : '';?>" name="title"
                                id="title" value="<?=old('title');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('title');?>
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