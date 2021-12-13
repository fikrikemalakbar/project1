<?php foreach($bgfloor as $flr) : ?>
<style>
    .floorBackground {
        position: relative;
        opacity: 0.4;
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

    .floorOne {
        background-color: rgba(21, 3, 49, 0.5);
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
                        <div class="col l12">
                            <img  style="max-width:100%;max-height:100%;padding-bottom:10px;" src="<?=base_url()?>/assets/img/uploadtypeahero/<?=$tp['aheroimage']?>" alt="<?=$tp['acaptionhero']?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>