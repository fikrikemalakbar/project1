<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>/assets/css/front.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>/assets/css/mainfront.css" />
    <title>cluster</title>
</head>

<body>
    <header>
        <div style="height:600px;"class="parallax-container">
            <div class="parallax">
                <img src="<?=base_url()?>/assets/img/5.jpg" alt="cluster">
            </div>
            <div class="banner-text">
                <div class="row center">
                    <div class="container">
                        <div class="col s12">
                            Miliki Rumah Idaman dengan Proses Cepat & Mudah. Uang Muka Ringan dan Jangka Waktu Kredit
                            hingga 30
                            Tahun
                        </div>
                        <div class="col s12">
                            <a class="waves-effect waves-light indigo btn">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section indigo">
                <div class="row container">
                    <div class="col l6 s12">
                        Segera Dapatkan Informasi Lebih Lengkap
                    </div>
                    <div class="col l3 offset-l3 s12">
                        <a class="waves-effect waves-light white btn-large">Hubungi Kami</a>
                    </div>
                </div>
            </div>
    </header>
    <main>
        <?=$this->renderSection('front')?>
    </main>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/front.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/mainfront.js"></script>
</body>

</html>



