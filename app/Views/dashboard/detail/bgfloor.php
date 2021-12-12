<?=$this->extend('dashboard/layouts')?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card mb-3" style="max-width: 950px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?=base_url()?>/assets/img/uploadbgfloor/<?=$bgfloor['imagebg']?>" class="img-fluid rounded-start" alt="<?=$bgfloor['captionbg']?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <p class="card-text">Title : <?=$bgfloor['titlebg']?></p>
                    <p class="card-text">Name Image : <?=$bgfloor['imagebg']?></p>
                    <p class="card-text">Caption : <?=$bgfloor['captionbg']?></p>
                    <br>
                    <a href="/dashboardbgfloor">Kembali ke Dashboard Bg Floor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection();?>