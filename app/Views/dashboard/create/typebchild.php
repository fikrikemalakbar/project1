<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type B Child</h2>
                <form action="/dashboardtypebchild/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="bchildimage" class="col-sm-2 col-form-label">Image Type B Child</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypebchild/blank.png" alt="blank"
                                    class="img-thumbnail typebchild-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('bchildimage')) ? 'is-invalid' : '';?>"
                                        id="bchildimage" name="bchildimage" onchange="typebchildPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('bchildimage');?>
                                    </div>
                                    <label style="display:none;" for="bchildimage" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bcaptionchild" class="col-sm-2 col-form-label">Caption child Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('bcaptionchild')) ? 'is-invalid' : '';?>" name="bcaptionchild"
                                id="bcaptionchild" value="<?=old('bcaptionchild');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('bcaptionchild');?>
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