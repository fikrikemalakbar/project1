<?php foreach ($feature as $f) : ?>
<div class="featureDesktop">
    <div class="container">
        <div class="row">
            <div class="col m6">
                <div class="row">
                    <div class="col l12">
                        <img style="width:100%;height:300px;" src="<?=base_url()?>/assets/img/uploadfeature/<?=$f['namefeature']?>" alt="<?=$f['altfeature']?>">
                    </div>
                    <br>
                    <div class="col l12">
                        <a class="btnWa">08546546546544</a>
                    </div>
                    <div class="col l12">
                        <br>
                        <a style="width:100%;"
                            class="btnPhone">08546546546544</a>
                    </div>
                    <div class="col l12">
                        <br>
                        <a href="<?=base_url()?>/assets/img/4.jpg" download style="width:100%;"
                        class="btnCatalog">Download
                        Catalogue</a>
                    </div>
                </div>
            </div>
            <div class="col m6">
               <?=$f['featuretext']?>
            </div>
        </div>
    </div>
</div>
<div class="featureMobile">
    <div class="row">
        <div class="col s12">
            <?=$f['featuretext']?>
        </div>
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <br>
                    <img style="width:100%;height:300px;" src="<?=base_url()?>/assets/img/uploadfeature/<?=$f['namefeature']?>" alt="<?=$f['altfeature']?>">
                </div>
                <div class="col s12">
                    <a  class="btnWa">08546546546544</a>
                </div>
                <div class="col s12">
                    <br>
                    <a style="width:100%;" class="waves-effect waves-light cyan accent-4 btn-large">08546546546544</a>
                </div>
                <div class="col s12">
                    <br>
                    <a href="<?=base_url()?>/assets/img/4.jpg" download style="width:100%;"
                        class="waves-effect waves-light red darken-4 btn-large">Download
                        Catalogue</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>