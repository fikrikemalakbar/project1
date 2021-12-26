<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Create Meta keyword</h2>
                <form action="/dashboardmetakeyword/save" method="post">
                    <?=csrf_field();?>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <label for="metakeyword" class="col-sm-2 col-form-label">Meta keyword</label>
                            <textarea  name="metakeyword" id="metakeyword" class="form-control <?=($validation->hasError('metakeyword')) ? 'is-invalid' : '';?>"style="height:100px;">
                                     <?=old('metakeyword');?>
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
<script>

</script>
<?=$this->endSection();?>