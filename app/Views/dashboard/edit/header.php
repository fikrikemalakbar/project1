<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah header</h2>
                <form action="/dashboardheader/update/<?=$header['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="idheaderlama" value="<?=$header['id'];?>">
                    <input type="hidden" name="oldimageheader" value="<?=$header['imageheader'];?>">
                    <div class="row mb-3">
                        <label for="bchildimage" class="col-sm-2 col-form-label">Image Site</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/upload/<?=$header['imageheader'];?>"
                                    alt="<?=$header['captionheader']?>" class="img-thumbnail imageheader-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('imageheader')) ? 'is-invalid' : '';?>"
                                        id="imageheader" name="imageheader" onchange="imageheaderPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('imageheader');?>
                                    </div>
                                    <label for="imageheader"
                                        class="custom-file-label"><?=$header['imageheader'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="captionheader" class="col-sm-2 col-form-label">Caption header</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?=($validation->hasError('captionheader')) ? 'is-invalid' : '';?>"
                                name="captionheader" id="captionheader"
                                value="<?=(old('captionheader')) ? old('captionheader') : $header['captionheader']?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('captionheader');?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="titleheader" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="titleheader" id="ckeditor" class="ckeditor <?=($validation->hasError('titleheader')) ? 'is-invalid' : '';?>">
                                <?=(old('titleheader')) ? old('titleheader') : $header['titleheader']?>
                            </textarea>
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