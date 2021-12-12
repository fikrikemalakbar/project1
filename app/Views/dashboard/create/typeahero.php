<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type A Hero</h2>
                <form action="/dashboardtypeahero/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="aheroimage" class="col-sm-2 col-form-label">Image Type A Hero</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeahero/blank.png" alt="blank"
                                    class="img-thumbnail typeahero-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('aheroimage')) ? 'is-invalid' : '';?>"
                                        id="aheroimage" name="aheroimage" onchange="typeaheroPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('aheroimage');?>
                                    </div>
                                    <label style="display:none;" for="aheroimage" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="acaptionhero" class="col-sm-2 col-form-label">Caption Hero Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('acaptionhero')) ? 'is-invalid' : '';?>" name="acaptionhero"
                                id="acaptionhero" value="<?=old('acaptionhero');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('acaptionhero');?>
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