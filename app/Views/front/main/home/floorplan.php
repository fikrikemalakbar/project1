<div style="height:100%;" class="parallax-container">
    <div class="parallax">
        <img class="imageFloor" src="<?=base_url()?>/assets/img/10.jpg" alt="cluster">
        <!-- <div class="filter">
        </div> -->
    </div>
    <div class="floorplanMain">
        <div class="floorBuai">
            <div class="floorplanHeader">
                <div class="row">
                    <div class="floorplanHTitle">
                        <div class="col l12 s12 m12">
                            FLOOR PLAN
                        </div>
                    </div>
                    <div class="floorplanHText">
                        <div class="col l12 s12 m12">
                            Setiap hunian Trevista Hills memiliki ruang yang lega dan memiliki inner garden dengan
                            interior minimalis yang elegan dan artistik.
                        </div>
                    </div>
                    <div class="floorplanHType">
                        <div class="col l12 s12 m12">
                            Type A (75/84) - Harga ± Rp 900 Juta-an
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col l6 m12 s12">
                        <div class="row">
                            <div class="col l12 s12 m12">
                                <img style="width:100%;height:300px;" src="<?=base_url()?>/assets/img/1.jpg" alt="1">
                            </div>
                            <div class="col l12 s12 m12">
                                <br>
                                <img style="width:100%;height:300px;" src="<?=base_url()?>/assets/img/2.jpg" alt="2">
                            </div>
                        </div>
                    </div>
                    <div class="col l6 m12 s12">
                        <!-- <div class="floorDetail">
                            Detail
                        </div> -->
                        <div class="row">
                            <?php foreach($typeatext as $txt) : ?>
                            <div class="col l12 s12 m12">
                                <!-- <div class="floorUDText"> -->
                                   <?=$txt['texttypea']?>
                                <!-- </div> -->
                                <?php endforeach;?>
                            </div>
                            <div class="col l12 s12 m12">
                                <div class="row">
                                    <div class="col l12 s12 m12">
                                       <?=$this->include('front/main/image/floorplan')?>
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
    <?=$this->include('front/main/home/third')?>
    <?=$this->include('front/main/home/gallery')?>
</div>