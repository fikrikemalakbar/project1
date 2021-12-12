<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Type A Child</h2>
                <form action="/dashboardtypeachild/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="achildimage" class="col-sm-2 col-form-label">Image Type A Child</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeachild/blank.png" alt="blank"
                                    class="img-thumbnail typeachild-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('achildimage')) ? 'is-invalid' : '';?>"
                                        id="achildimage" name="achildimage" onchange="typeachildPreview()">
                                    <div class="ivalid-feedback">
                                        <?=$validation->getError('achildimage');?>
                                    </div>
                                    <label style="display:none;" for="achildimage" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="acaptionchild" class="col-sm-2 col-form-label">Caption child Image</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('acaptionchild')) ? 'is-invalid' : '';?>" name="acaptionchild"
                                id="acaptionchild" value="<?=old('acaptionchild');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('acaptionchild');?>
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