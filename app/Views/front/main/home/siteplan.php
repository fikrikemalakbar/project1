<?php foreach ($bgfloor as $sbg) : ?>
<style>
    .siteplanbackground {
        position: relative;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    .siteplanbackground {
        background-image: url(/assets/img/uploadbgfloor/<?=$sbg['imagebg']?>);
        max-height: 100%;
        max-width: 100%;
    }


    .containersite {
        display: flex;
        max-width: 100%;
        height: 100%;
    }

    .siteheader {
        width: 100%;
        min-height: 100%;
        padding: 30px;
    }

    .siteheader.site {
        background-color: rgba(66, 100, 149, 0.8);

    }

    .siteheader.maps {
        background-color: #F2F2F2;

    }

    .sitetitle {
        display: flex;
        justify-content: center;
        font-weight: 700;
        color: white;
        font-size: 22px;
        margin-top: 100px;
    }

    .mapstitle {
        display: flex;
        justify-content: center;
        font-weight: 700;
        color: blue;
        font-size: 22px;
        margin-top: 100px;
    }
</style>
<?php endforeach;?>

<div class="siteplanbackground">
    <div class="sitedesktop">
        <div class="containersite">
            <div class="siteheader site">
                <div class="sitetitle">
                    <div class="container">
                        <div class="row">
                            <div class="col l12">
                                Site Plan
                            </div>
                        </div>
                        <div class="row">
                            <?php $q=1;?>
                            <?php foreach($siteplan as $po) : ?>
                            <div class="col l12">
                                <img src="<?=base_url()?>/assets/img/upload/<?=$po['imagesite']?>"
                                    style="max-width:100%" onclick="openModalsite();currentSlidesite(<?=$q++?>)"
                                    alt="<?=$po['captionsite']?>">
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div id="myModalsite" class="modalsite">
                            <span class="closesite cursorsite" onclick="closeModalsite()">&times;</span>
                            <div class="modalsite-content">
                                <?php $r=1;?>
                                <?php foreach ($siteplan as $poo) : ?>
                                <div class="mySlidessite">
                                    <div class="numbertextsite"><?=$r++?> / 4</div>
                                    <img src="<?=base_url()?>/assets/img/upload/<?=$poo['imagesite']?>"
                                        style="max-width:600px;max-height:300px" alt="<?=$poo['captionsite']?>">
                                </div>
                                <?php endforeach;?>

                                <?php $s=1;?>
                                <a class="prevsite" onclick="plusSlidessite(-<?=$s;?>)">&#10094;</a>
                                <a class="nextsite" onclick="plusSlidessite(<?=$s;?>)">&#10095;</a>

                                <div class="captionsite-container">
                                    <p id="captionsite"></p>
                                </div>
                                <?php $t=1;?>
                                <?php foreach($siteplan as $pooo) : ?>
                                <div class="columnsite">
                                    <img class="demosite cursorsite"
                                        src="<?=base_url()?>/assets/img/upload/<?=$pooo['imagesite']?>"
                                        style="display:none" onclick="currentSlidesite(<?=$t++?>)"
                                        alt="<?=$pooo['captionsite']?>">
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="siteheader maps">
                <div class="mapstitle">
                    <div class="container">
                        <div class="row">
                            <div class="col l12">
                                Locations
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($siteplan as $stp) : ?>
                            <div class="col l12">
                                <a href="<?=$stp['title']?>">
                                    <img style="max-width:100%" src="/assets/img/upload/<?=$stp['imagemaps']?>"
                                        alt="<?=$stp['captionmaps']?>">
                                </a>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sitemobile">
        <div class="sitemobileheader">
            <div class="sitemobiletitle">
                <div class="row">
                    <div class="col s12">
                        Site Plan
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php $u=1;?>
                    <?php foreach($siteplan as $pmo) : ?>
                    <div class="col s12">
                        <img src="<?=base_url()?>/assets/img/upload/<?=$pmo['imagesite']?>" style="width:100%"
                            onclick="openModalsitemobile();currentSlidesitemobile(<?=$u++?>)"
                            alt="<?=$pmo['captionsite']?>">
                    </div>
                    <?php endforeach;?>
                </div>
                <div id="myModalsitemobile" class="modalsitemobile">
                    <span class="closesitemobile cursorsitemobile" onclick="closeModalsitemobile()">&times;</span>
                    <div class="modalsitemobile-content">
                        <?php $v=1;?>
                        <?php foreach ($siteplan as $pmoo) : ?>
                        <div class="mySlidessitemobile">
                            <div class="numbertextsitemobile"><?=$v++?> / 4</div>
                            <img src="<?=base_url()?>/assets/img/upload/<?=$pmoo['imagesite']?>"
                                style="max-width:600px;max-height:300px" alt="<?=$pmoo['captionsite']?>">
                        </div>
                        <?php endforeach;?>

                        <?php $w=1;?>
                        <a class="prevsitemobile" onclick="plusSlidessitemobile(-<?=$w;?>)">&#10094;</a>
                        <a class="nextsitemobile" onclick="plusSlidessitemobile(<?=$w;?>)">&#10095;</a>

                        <div class="captionsitemobile-container">
                            <p id="captionsitemobile"></p>
                        </div>
                        <?php $x=1;?>
                        <?php foreach($siteplan as $pmooo) : ?>
                        <div class="columnsitemobile">
                            <img class="demositemobile cursorsitemobile"
                                src="<?=base_url()?>/assets/img/upload/<?=$pmooo['imagesite']?>" style="display:none"
                                onclick="currentSlidesitemobile(<?=$x++?>)" alt="<?=$pmooo['captionsite']?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mapsmobileheader">
            <div class="mapsmobiletitle">
                <div class="row">
                    <div class="col s12">
                        Locations
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($siteplan as $mmo) : ?>
                <div class="col s12">
                    <img style="max-width:100%" src="/assets/img/upload/<?=$mmo['imagemaps']?>" alt="<?=$mmo['captionmaps']?>">
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>