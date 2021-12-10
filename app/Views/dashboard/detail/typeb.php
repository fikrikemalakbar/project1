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
                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['heroimagetypeb']?>"
                                alt="<?=$typeb['captionheroimageb']?>">
                        </div>
                        <div class="col-lg-12">
                            Caption : <?=$typeb['captionheroimageb']?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?=$typeb['texttypeb']?>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['childimagesatutypeb']?>"
                                                alt="<?=$typeb['captionchildsatuimageb']?>">
                                        </div>
                                        <div class="col-sm-12">
                                            Caption : <?=$typeb['captionchildsatuimageb']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img style="max-width:100%" src="<?=base_url()?>/assets/img/uploadtypeb/<?=$typeb['childimageduatypeb']?>"
                                                alt="<?=$typeb['captionchildduaimageb']?>">
                                        </div>
                                        <div class="col-sm-12">
                                            Caption : <?=$typeb['captionchildduaimageb']?>
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
                    <a href="/dashboardtypeb">Kembali</a>
                </div>
            </div>
        </div>
</main>
<?=$this->endSection();?>