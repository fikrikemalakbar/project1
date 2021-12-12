<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Background Floor</h2>
                <form action="/dashboardbgfloor/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="titlebg" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                           <textarea name="titlebg" id="ckeditor" class="ckeditor <?=($validation->hasError('titlebg')) ? 'is-invalid' : '';?>" >
                           <?=old('titlebg');?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('titlebg');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadbgfloor/blank.png" alt="blank"
                                    class="img-thumbnail bgfloor-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagebg')) ? 'is-invalid' : '';?>"
                                        id="imagebg" name="imagebg" onchange="bgfloorPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('imagebg');?>
                                    </div>
                                    <label style="display:none;" for="imagebg" class="custom-file-label">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionbg" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="captionbg"
                                class="form-control <?=($validation->hasError('captionbg')) ? 'is-invalid' : '';?>" name="captionbg"
                                id="captionbg" value="<?=old('captionbg');?>">
                            <div class="ivalid-feedback">
                                <?=$validation->getError('captionbg');?>
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