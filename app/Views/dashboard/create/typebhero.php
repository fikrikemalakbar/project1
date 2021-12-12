<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type B Hero</h2>
                <form action="/dashboardtypebhero/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="bheroimage" class="col-sm-2 col-form-label">Image Type B Hero</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypebhero/blank.png" alt="blank"
                                    class="img-thumbnail typebhero-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('bheroimage')) ? 'is-invalid' : '';?>"
                                        id="bheroimage" name="bheroimage" onchange="typebheroPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('bheroimage');?>
                                    </div>
                                    <label style="display:none;" for="bheroimage" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bcaptionhero" class="col-sm-2 col-form-label">Caption Hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('bcaptionhero')) ? 'is-invalid' : '';?>" name="bcaptionhero"
                                id="bcaptionhero" value="<?=old('bcaptionhero');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('bcaptionhero');?>
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