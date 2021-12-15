<?php foreach($bgfloor as $flr) : ?>
<style>
    .floorBackground {
        position: relative;
        /* opacity: 0.6; */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    .floorBackground {
        background-image: url(/assets/img/uploadbgfloor/<?=$flr['imagebg']?>);
        min-height: 100vh;
        max-width: 100%;
    }
</style>
<?php endforeach;?>
<div class="floorBackground">
    <div class="floorOne">
        <div class="floorOneHeader">
            <div class="row">
                <?php foreach($bgfloor as $fh) : ?>
                <div class="col s12">
                    <?=$fh['titlebg']?>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col l6 m6 s12">
                    <div class="row">
                        <?php foreach($typeahero as $tp) : ?>
                        <div class="col s12">
                            <img style="max-width:100%;max-height:100%;padding-bottom:10px;"
                                src="<?=base_url()?>/assets/img/uploadtypeahero/<?=$tp['aheroimage']?>"
                                alt="<?=$tp['acaptionhero']?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col l6 m6 s12">
                    <div class="row">
                        <?php foreach($typeatext as $txta): ?>
                        <div class="col s12">
                            <?=$txta['texttypea']?>
                        </div>
                        <?php endforeach;?>
                        <div class="col s12">
                            <div class="row">
                                <?php $a=1;?>
                                <?php foreach ($typeachild as $tpaf) : ?>
                                <div class="col s6 l6 m6">
                                    <img src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$tpaf['achildimage']?>"
                                        style="width:100%" onclick="openModalfloor();currentSlidefloor(<?=$a++?>)"
                                        alt="<?=$tpaf['acaptionchild']?>">
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div id="myModalfloor" class="modalfloor">
                                <span class="closefloor cursorfloor" onclick="closeModalfloor()">&times;</span>
                                <div class="modalfloor-content">
                                    <?php $b=1;?>
                                    <?php foreach ($typeachild as $tpaff) : ?>
                                    <div class="mySlidesfloor">
                                        <div class="numbertextfloor"><?=$b++?> / 4</div>
                                        <img src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$tpaff['achildimage']?>"
                                            style="max-width:600px;max-height:300px"
                                            alt="<?=$tpaff['acaptionchild']?>">
                                    </div>
                                    <?php endforeach;?>

                                    <?php $c=1;?>
                                    <a class="prevfloor" onclick="plusSlidesfloor(-<?=$c;?>)">&#10094;</a>
                                    <a class="nextfloor" onclick="plusSlidesfloor(<?=$c;?>)">&#10095;</a>

                                    <div class="captionfloor-container">
                                        <p id="captionfloor"></p>
                                    </div>
                                    <?php $d=1;?>
                                    <?php foreach($typeachild as $tpafff) : ?>
                                    <div class="columnfloor">
                                        <img class="demofloor cursorfloor"
                                            src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$tpafff['achildimage']?>"
                                            style="display:none" onclick="currentSlidefloor(<?=$d++?>)"
                                            alt="<?=$tpafff['acaptionchild']?>">
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="floorTwo">
        <div class="floorTwoheader">
            <div class="row">
                <?php foreach($bgfloor as $Ts) : ?>
                <div class="col l12">
                    <?=$Ts['textb']?>
                </div>
                <?php endforeach;?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col l6 m6 s12">
                        <div class="row">
                            <?php foreach($typebhero as $tpb) : ?>
                            <div class="col l12">
                                <img style="max-width:100%;" src="/assets/img/uploadtypebhero/<?=$tpb['bheroimage']?>"
                                    alt="<?=$tpb['bcaptionhero']?>">
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="row">
                            <?php foreach($typebtext as $txtb) : ?>
                            <div class="col l12">
                                <?=$txtb['texttypeb']?>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <?php $e=1;?>
                                <?php foreach ($typebchild as $tpbf) : ?>
                                <div class="col s6 l6 m6">
                                    <img src="<?=base_url()?>/assets/img/uploadtypebchild/<?=$tpbf['bchildimage']?>"
                                        style="width:100%" onclick="openModalfloortwo();currentSlidefloortwo(<?=$e++?>)"
                                        alt="<?=$tpbf['bcaptionchild']?>">
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div id="myModalfloortwo" class="modalfloortwo">
                                <span class="closefloortwo cursorfloortwo" onclick="closeModalfloortwo()">&times;</span>
                                <div class="modalfloortwo-content">
                                    <?php $f=1;?>
                                    <?php foreach ($typebchild as $tpbff) : ?>
                                    <div class="mySlidesfloortwo">
                                        <div class="numbertextfloortwo"><?=$f++?> / 4</div>
                                        <img src="<?=base_url()?>/assets/img/uploadtypebchild/<?=$tpbff['bchildimage']?>"
                                            style="max-width:600px;max-height:300px"
                                            alt="<?=$tpbff['bcaptionchild']?>">
                                    </div>
                                    <?php endforeach;?>

                                    <?php $g=1;?>
                                    <a class="prevfloortwo" onclick="plusSlidesfloortwo(-<?=$g;?>)">&#10094;</a>
                                    <a class="nextfloortwo" onclick="plusSlidesfloortwo(<?=$g;?>)">&#10095;</a>

                                    <div class="captionfloortwo-container">
                                        <p id="captionfloortwo"></p>
                                    </div>
                                    <?php $h=1;?>
                                    <?php foreach($typebchild as $tpbfff) : ?>
                                    <div class="columnfloortwo">
                                        <img class="demofloortwo cursorfloortwo"
                                            src="<?=base_url()?>/assets/img/uploadtypebchild/<?=$tpbfff['bchildimage']?>"
                                            style="display:none" onclick="currentSlidefloortwo(<?=$h++?>)"
                                            alt="<?=$tpbfff['bcaptionchild']?>">
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="floorthree">
        <div class="floorthreeheader">
            <div class="container">
                <div class="row">
                    <div class="col l12">
                        Gallery dan Fasilitas
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php $j=1;?>
                <?php foreach ($gallery as $gl) : ?>
                <div class="col l2 m3 s4">
                    <img src="<?=base_url()?>/assets/img/upload/<?=$gl['name']?>" style="width:100%"
                        onclick="openModalgallery();currentSlidegallery(<?=$j++?>)" alt="<?=$gl['alt']?>">
                </div>
                <?php endforeach;?>
                <div id="myModalgallery" class="modalgallery">
                    <span class="closegallery cursorgallery" onclick="closeModalgallery()">&times;</span>
                    <div class="modalgallery-content">
                        <?php $k=1;?>
                        <?php foreach ($gallery as $gll) : ?>
                        <div class="mySlidesgallery">
                            <div class="numbertextgallery"><?=$k++?> / 4</div>
                            <img src="<?=base_url()?>/assets/img/upload/<?=$gll['name']?>"
                                style="max-width:600px;max-height:300px" alt="<?=$gll['alt']?>">
                        </div>
                        <?php endforeach;?>

                        <?php $l=1;?>
                        <a class="prevgallery" onclick="plusSlidesgallery(-<?=$l;?>)">&#10094;</a>
                        <a class="nextgallery" onclick="plusSlidesgallery(<?=$l;?>)">&#10095;</a>

                        <div class="captiongallery-container">
                            <p id="captiongallery"></p>
                        </div>
                        <?php $m=1;?>
                        <?php foreach($gallery as $glll) : ?>
                        <div class="columngallery">
                            <img class="demogallery cursorgallery"
                                src="<?=base_url()?>/assets/img/upload/<?=$glll['name']?>" style="display:none"
                                onclick="currentSlidegallery(<?=$m++?>)" alt="<?=$glll['alt']?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>