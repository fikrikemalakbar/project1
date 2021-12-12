<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Bank</h1>
        </div>
    </div>
    <a href="/dashboardbank/create" class="btn btn-primary mb-3">Create Bank</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <?php foreach ($bank as $b) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <img style="max-width:100%" src="<?=base_url()?>/assets/img/upload/<?=$b['imagebank']?>"
                        class="card-img-top" alt="<?=$b['captionbank']?>">
                    <div class="card-body">
                        <p class="card-text">
                            caption : <?=$b['captionbank']?>
                        </p>
                        <a class="btn btn-success" href="/dashboardbank/edit/<?=$b['id'];?>"
                            class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardbank/delete/<?=$b['id'];?>" method="post">
                            <?=csrf_field();?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>

</main>
<?=$this->endSection();?>