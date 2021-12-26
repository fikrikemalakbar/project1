<div class="container">
    <div class="row">
        <div class="col l6 m6 s12">
            <form action="/" method="post">
                <?=csrf_field()?>
                <iframe title="form contact form"
                src="https://docs.google.com/forms/d/e/1FAIpQLSfdOVX8OdoUKnY0jju_1EQY2IfOOY6l6adrAMGQS8bNkZ9VAg/viewform?embedded=true"
                width="600" height="947" frameborder="0" marginheight="0" marginwidth="0">Loading…
            </iframe>
            </form>
        </div>
        <div class="col l6 s12 m6">
            <div class="hubungiTitle">
                Hubungi Kami
            </div>
            <div class="row">
                <?php $y=1;?>
                <?php foreach($marketing as $maro) : ?>
                <div class="col l6 s6 m6">
                    <img src="<?=base_url()?>/assets/img/upload/<?=$maro['imagemarketing']?>" style="width:100%"
                        onclick="openModalmarketing();currentSlidemarketing(<?=$y++?>)"
                        alt="<?=$maro['captionmarketing']?>">
                </div>
                <?php endforeach;?>
            </div>
            <div id="myModalmarketing" class="modalmarketing">
                <span class="closemarketing cursormarketing" onclick="closeModalmarketing()">&times;</span>
                <div class="modalmarketing-content">
                    <?php $z=1;?>
                    <?php foreach ($marketing as $maroo) : ?>
                    <div class="mySlidesmarketing">
                        <div class="numbertextmarketing"><?=$z++?> / 4</div>
                        <img src="<?=base_url()?>/assets/img/upload/<?=$maroo['imagemarketing']?>"
                            style="max-width:600px;max-height:300px" alt="<?=$maroo['captionmarketing']?>">
                    </div>
                    <?php endforeach;?>

                    <?php $aa=1;?>
                    <a class="prevmarketing" onclick="plusSlidesmarketing(-<?=$aa;?>)">&#10094;</a>
                    <a class="nextmarketing" onclick="plusSlidesmarketing(<?=$aa;?>)">&#10095;</a>

                    <div class="captionmarketing-container">
                        <p id="captionmarketing"></p>
                    </div>
                    <?php $ab=1;?>
                    <?php foreach($marketing as $marooo) : ?>
                    <div class="columnmarketing">
                        <img class="demomarketing cursormarketing"
                            src="<?=base_url()?>/assets/img/upload/<?=$marooo['imagemarketing']?>" style="display:none"
                            onclick="currentSlidemarketing(<?=$ab++?>)" alt="<?=$marooo['captionmarketing']?>">
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col s12 l12 m12">
                <div class="person">
                    Contact Person Marketing : <span class="contact">Tamin Pardede</span>
                </div>
            </div>
            <br>
            <br>
            <br>
            <?php foreach ($contactperson as $cp) : ?>
            <div id="kontakkami" class="col s12 l12 m12">
                Alamat : <?=$cp['alamat']?>
            </div>
            <br>
            <br>
            <div class="col s12 l12 m12">
                <a href="https://api.whatsapp.com/send?phone=<?=$cp['wa']?>&text=Hallo%20ada%20yang%20bisa%20dibantu" class="btnWa">
                    <div class="bitzarz">
                        <i class="fab fa-whatsapp"></i>
                        <div class="bordeux">
                        <?=$cp['wa']?>
                        </div>
                    </div>
                </a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col s12 l12 m12">
                <a href="tel:<?=$cp['ph']?>" class="btnPhone">
                    <div class="bitzarz">
                    <i class="fas fa-phone-square-alt"></i>
                       <div class="bordeux">
                       <?=$cp['ph']?>
                       </div>
                    </div>
                </a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col s12 l12 m12">
                <a href="mailto:<?=$cp['email']?>" class="btnEmail">
                    <div class="bitzarz">
                    <i class="fas fa-envelope"></i>
                       <div class="bordeux">
                       <?=$cp['email']?>
                       </div>
                    </div>
                </a>
            </div>
            
            <?php endforeach;?>
        </div>
    </div>
</div>