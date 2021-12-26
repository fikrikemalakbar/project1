<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Contact Person</h2>
                <form action="/dashboardmetadescription/update/<?=$metadescription['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="text" name="idlama" value="<?=$metadescription['id'];?>">
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                           <textarea name="metadescription" id="ckeditor" class="ckeditor <?=($validation->hasError('metadescription')) ? 'is-invalid' : '';?>">
                                <?=(old('metadescription')) ? old('metadescription') : $metadescription['metadescription']?>
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