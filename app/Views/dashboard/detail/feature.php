<?=$this->extend('dashboard/layouts')?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <img style="max-width:100%;max-height:100%;" src="<?=base_url()?>/assets/img/uploadfeature/<?=$feature['namefeature']?>" alt="<?=$feature['altfeature']?>">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <?=$feature['featuretext']?>
            </div>
          </div>
          <br>
          <a href="/dashboardfeature"style="text-decoration:none">Kembali</a>
      </div>
    </div>
</main>
<?=$this->endSection();?>