<?=$this->extend('dashboard/layouts')?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['heroimage']?>"
                                alt="<?=$typea['captionheroimagea']?>">
                        </div>
                        <div class="col-lg-12">
                            Caption : <?=$typea['captionheroimagea']?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?=$typea['texttypea']?>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['childimagesatu']?>"
                                                alt="<?=$typea['captionchildimagesatua']?>">
                                        </div>
                                        <div class="col-sm-12">
                                            Caption : <?=$typea['captionchildimagesatua']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypea/<?=$typea['childimagedua']?>"
                                                alt="<?=$typea['captionchildimageduaa']?>">
                                        </div>
                                        <div class="col-sm-12">
                                            Caption : <?=$typea['captionchildimageduaa']?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="/dashboardtypea">Kembali</a>
                </div>
            </div>
        </div>
</main>
<?=$this->endSection();?>