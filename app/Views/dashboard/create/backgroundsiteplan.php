<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create backgroundsiteplan</h2>
                <form action="/dashboardbackgroundsiteplan/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="backgroundsiteplan" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imagebackgroundsiteplan-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imagebackgroundsiteplan')) ? 'is-invalid' : '';?>"
                                        id="imagebackgroundsiteplan" name="imagebackgroundsiteplan" onchange="imagebackgroundsiteplanPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imagebackgroundsiteplan');?>
                                    </div>
                                    <label style="display:none;" for="imagebackgroundsiteplan" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionbackgroundsiteplan" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionbackgroundsiteplan')) ? 'is-invalid' : '';?>" name="captionbackgroundsiteplan"
                                id="captionbackgroundsiteplan" value="<?=old('captionbackgroundsiteplan');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionbackgroundsiteplan');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="titlebackgroundsiteplan" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="titlebackgroundsiteplan" id="ckeditor" class="ckeditor <?=($validation->hasError('titlebackgroundsiteplan')) ? 'is-invalid' : '';?>" ><?=old('titlebackgroundsiteplan');?></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('titlebackgroundsiteplan');?>
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