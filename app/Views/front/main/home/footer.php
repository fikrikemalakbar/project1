<div class="footer">
    <div class="row">
        <div class="col l12 s12 m12">
            <div class="footertitle">
                <strong>Bank Support</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col l12">
                <div class="row">
              
                    <div class="col l3">
                    <?php foreach($bank as $bank) : ?>
                        <div class="mySlides fade">
                            <img style="width:600px;height:300px;"
                                src="<?=base_url()?>/assets/img/upload/<?=$bank['imagebank']?>"
                                alt="<?=$bank['captionbank']?>" style="width:100%">
                        </div>
                        
                    <?php endforeach;?>
                    </div>
                </div>
                <br>
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>

            </div>
        </div>
    </div>
</div>