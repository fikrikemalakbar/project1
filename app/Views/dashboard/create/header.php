<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Header</h2>
                <form action="/dashboardheader/save" method="post" enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <label for="header" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/blank.png" alt="blank"
                                    class="img-thumbnail imageheader-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imageheader')) ? 'is-invalid' : '';?>"
                                        id="imageheader" name="imageheader" onchange="imageheaderPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imageheader');?>
                                    </div>
                                    <label style="display:none;" for="imageheader" class="custom-file-label">Pilih
                                        Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionheader" class="col-sm-2 col-form-label">Caption</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheader')) ? 'is-invalid' : '';?>" name="captionheader"
                                id="captionheader" value="<?=old('captionheader');?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheader');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="titleheader" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="titleheader" id="ckeditor" class="ckeditor <?=($validation->hasError('titleheader')) ? 'is-invalid' : '';?>" ><?=old('titleheader');?></textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('titleheader');?>
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