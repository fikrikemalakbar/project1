<?=$this->extend('dashboard/layouts')?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card mb-3" style="max-width: 950px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?=base_url()?>/assets/img/<?=$gallery['name']?>" class="img-fluid rounded-start" alt="<?=$gallery['alt']?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <p class="card-text">Name : <?=$gallery['name']?></p>
                    <p class="card-text">Caption : <?=$gallery['alt']?></p>
                    <a href="" class="btn btn-success">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                    <br>
                    <a href="/dashboard/gallery">Kembali ke Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection();?>