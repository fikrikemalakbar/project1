<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type A Child</h2>
                <form action="/dashboardtypeachild/update/<?=$typeachild['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="slugachild" value="<?=$typeachild['slugachild'];?>">
                    <input type="hidden" name="oldachild" value="<?=$typeachild['achildimage'];?>">
                    <div class="row mb-3">
                        <label for="achildimage" class="col-sm-2 col-form-label">Name child Image</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$typeachild['achildimage'];?>"
                                    alt="<?=$typeachild['acaptionchild']?>" class="img-thumbnail typeachild-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control <?=($validation->hasError('achildimage')) ? 'is-invalid' : '';?>"
                                        id="achildimage" name="achildimage" onchange="typeachildPreview()">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('achildimage');?>
                                    </div>
                                    <label for="achildimage"
                                        class="custom-file-label"><?=$typeachild['achildimage'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="acaptionchild" class="col-sm-2 col-form-label">Caption Type A child Image</label>
                        <div class="col-sm-10">
                            <input type="altfeature"
                                class="form-control <?=($validation->hasError('acaptionchild')) ? 'is-invalid' : '';?>"
                                name="acaptionchild" id="acaptionchild"
                                value="<?=(old('acaptionchild')) ? old('acaptionchild') : $typeachild['acaptionchild']?>">
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