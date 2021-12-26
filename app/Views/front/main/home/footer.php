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
                <div id="categories" class="section">
                    <div class="slider-wrapper">
                        <div class="slider items">
                            <div class="wrapper">
                                <?php foreach ($bank as $bnk) : ?>
                                <div class="item slide category">
                                    <figure>
                                        <img style="max-width:100%" src="<?=base_url()?>/assets/img/upload/<?=$bnk['imagebank']?>"
                                            alt="<?=$bnk['captionbank']?>" />
                                    </figure>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <nav>
                            <div class="left disabled">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="right"><i class="fas fa-chevron-right"></i></div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        copyright &copy; 2021 Ardena Residence
    </div>
</div>