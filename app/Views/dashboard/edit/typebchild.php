<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type B Child</h2>
                <form action="/dashboardtypebchild/update/<?=$typebchild['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugbchild" value="<?=$typebchild['slugbchild'];?>">
                    <input type="hidden" name="oldbchild" value="<?=$typebchild['bchildimage'];?>">
                    <div class="row mb-3">
                        <label for="bchildimage" class="col-sm-2 col-form-label">Name child Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypebchild/<?=$typebchild['bchildimage'];?>"
                                    alt="<?=$typebchild['bcaptionchild']?>" class="img-thumbnail typebchild-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('bchildimage')) ? 'is-invalid' : '';?>"
                                        id="bchildimage" name="bchildimage" onchange="typebchildPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('bchildimage');?>
                                    </div>
                                    <label for="bchildimage"
                                        class="custom-file-label"><?=$typebchild['bchildimage'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bcaptionchild" class="col-sm-2 col-form-label">Caption Type A child Image</label>
                        <div class="col-sm-10">
                            <input type="altfeature"
                                class="form-control <?=($validation->hasError('bcaptionchild')) ? 'is-invalid' : '';?>"
                                name="bcaptionchild" id="bcaptionchild"
                                value="<?=(old('bcaptionchild')) ? old('bcaptionchild') : $typebchild['bcaptionchild']?>">
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