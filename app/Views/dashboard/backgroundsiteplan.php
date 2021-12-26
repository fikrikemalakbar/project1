<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>backgroundsiteplan</h1>
        </div>
    </div>
    <a href="/dashboardbackgroundsiteplan/create" class="btn btn-primary mb-3">Create backgroundsiteplan</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <?php foreach ($backgroundsiteplan as $hd) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <img style="max-width:100%" src="<?=base_url()?>/assets/img/upload/<?=$hd['imagebackgroundsiteplan']?>"
                        class="card-img-top" alt="<?=$hd['captionbackgroundsiteplan']?>">
                    <div class="card-body">
                        <p class="card-text">
                            caption Image : <?=$hd['captionbackgroundsiteplan']?>
                        </p>
                        <p class="card-text">
                            <?=$hd['titlebackgroundsiteplan']?>
                        </p>
                        <a class="btn btn-success" href="/dashboardbackgroundsiteplan/edit/<?=$hd['id'];?>"
                            class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardbackgroundsiteplan/delete/<?=$hd['id'];?>" method="post">
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