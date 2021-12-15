<?php foreach ($feature as $f) : ?>
<div class="featureDesktop">
    <div class="container">
        <div class="row">
            <div class="col m6">
                <div class="row">
                    <div class="col l12">
                        <img style="width:100%;height:300px;"
                            src="<?=base_url()?>/assets/img/uploadfeature/<?=$f['namefeature']?>"
                            alt="<?=$f['altfeature']?>">
                    </div>
                    <br>
                    <?php foreach($contactperson as $cpf) : ?>
                    <div class="col s12 l12 m12">
                        <a href="https://api.whatsapp.com/send?phone=<?=$cpf['wa']?>&text=Hallo%20ada%20yang%20bisa%20dibantu" class="btnWa">
                            <div class="bitzarz">
                                <i class="fab fa-whatsapp"></i>
                                <div class="bordeux">
                                    <?=$cpf['wa']?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col l12">
                        <br>
                        <a href="tel:<?=$cpf['ph']?>" class="btnPhone">
                            <div class="bitzarz">
                            <i class="fas fa-phone-square-alt"></i>
                                <div class="bordeux">
                                    <?=$cpf['ph']?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach;?>
                    <div class="col s12 m12 l12">
                        <br>
                        <a href="<?=base_url()?>/assets/img/4.jpg" download style="width:100%;"
                            class="btnCatalog">
                            <div class="bitzarz">
                            <i class="fas fa-file-pdf"></i>
                                <div class="bordeux">
                                    Download Catalog
                                </div>
                            </div>
                        </a>
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
                    <img style="width:100%;height:300px;"
                        src="<?=base_url()?>/assets/img/uploadfeature/<?=$f['namefeature']?>"
                        alt="<?=$f['altfeature']?>">
                </div>
                <?php foreach($contactperson as $cpfm) : ?>
                    <div class="col s12 l12 m12">
                        <a href="https://api.whatsapp.com/send?phone=<?=$cpfm['wa']?>&text=Hallo%20ada%20yang%20bisa%20dibantu" class="btnWa">
                            <div class="bitzarz">
                                <i class="fab fa-whatsapp"></i>
                                <div class="bordeux">
                                    <?=$cpfm['wa']?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 l12 m12">
                        <br>
                        <a href="tel:<?=$cpfm['ph']?>" class="btnPhone">
                            <div class="bitzarz">
                            <i class="fas fa-phone-square-alt"></i>
                                <div class="bordeux">
                                    <?=$cpfm['ph']?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
                <div class="col s12 m12 l12">
                        <br>
                        <a href="<?=base_url()?>/assets/img/4.jpg" download style="width:100%;"
                            class="btnCatalog">
                            <div class="bitzarz">
                            <i class="fas fa-file-pdf"></i>
                                <div class="bordeux">
                                    Download Catalog
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>