<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Meta Description</h1>
        </div>
    </div>
    <a href="/dashboardmetadescription/create" class="btn btn-primary mb-3">Create Meta Description</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
            <div class="container">
                <div class="row">
                    <?php foreach($metadescription as $md) : ?>
                    <div class="col-lg-12">
                        <?=$md['metadescription']?>
                    </div>
                    <div class="col-lg-12">
                    <a class="btn btn-success" href="/dashboardmetadescription/edit/<?=$md['id'];?>"
                            class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardmetadescription/delete/<?=$md['id'];?>" method="post">
                            <?=csrf_field();?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
</main>
<?=$this->endSection();?>