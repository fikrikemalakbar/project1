<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type A Hero</h2>
                <form action="/dashboardtypeahero/update/<?=$typeahero['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugahero" value="<?=$typeahero['slugahero'];?>">
                    <input type="hidden" name="oldahero" value="<?=$typeahero['aheroimage'];?>">
                    <div class="row mb-3">
                        <label for="aheroimage" class="col-sm-2 col-form-label">Name Hero Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeahero/<?=$typeahero['aheroimage'];?>"
                                    alt="<?=$typeahero['acaptionhero']?>" class="img-thumbnail typeahero-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('aheroimage')) ? 'is-invalid' : '';?>"
                                        id="aheroimage" name="aheroimage" onchange="typeaheroPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('aheroimage');?>
                                    </div>
                                    <label for="aheroimage"
                                        class="custom-file-label"><?=$typeahero['aheroimage'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="acaptionhero" class="col-sm-2 col-form-label">Caption Type A Hero Image</label>
                        <div class="col-sm-10">
                            <input type="altfeature"
                                class="form-control <?=($validation->hasError('acaptionhero')) ? 'is-invalid' : '';?>"
                                name="acaptionhero" id="acaptionhero"
                                value="<?=(old('acaptionhero')) ? old('acaptionhero') : $typeahero['acaptionhero']?>">
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