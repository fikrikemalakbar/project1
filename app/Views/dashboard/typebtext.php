<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Type B text</h1>
        </div>
    </div>
    <a href="/dashboardtypebtext/create" class="btn btn-primary mb-3">Create Type B Text</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <?php foreach($typebtext as $tat) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?=$tat['texttypeb']?>
            </div>
            <div class="col-lg-12">
                <a href="/dashboardtypebtext/edit/<?=$tat['id'];?>" class="btn btn-success">Edit</a>
                <form class="d-inline" action="/dashboardtypebtext/delete/<?=$tat['id'];?>" method="post">
                    <?=csrf_field();?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('apakah anda yakin')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</main>
<?=$this->endSection();?>