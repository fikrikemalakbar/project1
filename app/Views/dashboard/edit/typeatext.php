<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Type A Text</h2>
                <form action="/dashboardtypeatext/update/<?=$typeatext['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                   
                    <div class="row mb-3">
                        <label for="texttypea" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                           <textarea name="texttypea" id="ckeditor" class="ckeditor <?=($validation->hasError('texttypea')) ? 'is-invalid' : '';?>">
                                <?=(old('texttypea')) ? old('texttypea') : $typeatext['texttypea']?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('texttypea');?>
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