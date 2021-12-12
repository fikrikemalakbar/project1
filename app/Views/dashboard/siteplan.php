<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Site Plan</h1>
        </div>
    </div>
    <a href="/dashboardsiteplan/create" class="btn btn-primary mb-3">Create Site Plan</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <div class="container">
        <?php foreach ($siteplan as $st) : ?>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-12">
                <img style="max-width:100%"src="<?=base_url()?>/assets/img/upload/<?=$st['imagesite']?>" alt="<?=$st['captionsite']?>">
                <p>Caption Site : <?=$st['captionsite']?></p>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12">
                <img style="max-width:100%" src="<?=base_url()?>/assets/img/upload/<?=$st['imagemaps']?>" alt="<?=$st['captionmaps']?>">
                <p>Caption image maps : <?=$st['captionmaps']?></p>
                <p>Link Maps : <?=$st['title']?></p>
            </div>
            <div class="col-lg-12">
            <a href="/dashboardsiteplan/edit/<?=$st['id'];?>" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardsiteplan/delete/<?=$st['id'];?>" method="post">
                            <?=csrf_field();?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</main>
<?=$this->endSection();?>