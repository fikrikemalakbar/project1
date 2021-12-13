<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Meta Description</h2>
                <form action="/dashboardmetadescription/save" method="post">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <label for="metadescription" class="col-sm-2 col-form-label">Meta Description</label>
                            <textarea name="metadescription" id="metadescription" class="form-control <?=($validation->hasError('metadescription')) ? 'is-invalid' : '';?>"style="height:100px;">
                                     <?=old('metadescription');?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('metadescription');?>
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