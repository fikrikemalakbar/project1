<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Keyword</h2>
                <form action="/dashboardmetakeyword/update/<?=$metakeyword['id'];?>" method="post"
                    enctype="multipart/form-data">
                    <?=csrf_field();?>
                    <input type="hidden" name="idlama" value="<?=$metakeyword['id'];?>">
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Meta Keyword</label>
                        <div class="col-sm-10">
                           <textarea name="metakeyword" id="metakeyword" class="form-control <?=($validation->hasError('metakeyword')) ? 'is-invalid' : '';?>">
                                <?=(old('metakeyword')) ? old('metakeyword') : $metakeyword['metakeyword']?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?=$validation->getError('metakeyword');?>
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