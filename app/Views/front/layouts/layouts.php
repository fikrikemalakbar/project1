<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($metadescription as $metd) : ?>
    <meta name="description" content="<?=$metd['metadescription'];?>">
    <?php endforeach;?>
    <?php foreach ($metakeyword as $metk) : ?>
  <meta name="keywords" content="<?=$metk['metakeyword']?>">
  <?php endforeach;?>
  <meta name="author" content="fanzy" />
<meta image="<?=base_url()?>/assets/img/1.jpg">
<meta property="og:type" content="article">
<meta property="og:image" content="<?=base_url()?>/assets/img/1.jpg">

<meta property="og:title" content="<?=$title;?>">

<meta property="og:site_name" content="Ardena residence">
<meta property="og:url" content="https://buildwithangga.com/">
<?php foreach($metadescription as $mettd) : ?>
<meta property="og:description" content="<?=$mettd['metadescription']?>">
<?php endforeach;?>
    <link rel="stylesheet" href="<?=base_url()?>/assets/fontawesome/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>/assets/css/mainfront.css" />
    <link rel="icon" type="image/png/ico" href="<?=base_url()?>/assets/img/icon/favicon.ico" />
<link rel="apple-touch-icon" href="<?=base_url()?>/assets/img/icon/favicon.ico">
    <title><?=$title?></title>
    <style>
        
<?php foreach($header as $hid) : ?>
.bgimgHeader {
  position: relative;
  opacity: 1;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url(/assets/img/upload/<?=$hid['imageheader']?>);
  height: 100vh;
  max-width: 100%;
  
}

<?php endforeach;?>

    </style>
</head>

<body>
    <header>
        <div class="bgimgHeader">
        <div class="headerMain">
            <div class="row">
              <?php foreach ($header as $hlo) : ?>
                <div  class="col l12">
                  <div class="titleheader">  
                    <?=$hlo['titleheader']?>
                  </div>
                <?php endforeach;?>
            </div>
            <div class="col s12">
              <div class="truehaderimg">
                <img style="max-width:100%" src="/assets/img/1.jpg" alt="header background">
              </div>
            </div>
            <div class="col s12">
              <div class="mengapaheader">
              <a href="#mengapa" class="btnkenapa">Lihat Selengkapnya</a>
              </div>
            </div>
        </div>
        </div>
       
        <div class="headerButton">
            <div class="container">
                <div class="row">
                    <div class="col l4 offset-l2 col m12 col sm12">
                        <div class="headerbuttonava">
                        Segera Dapatkan Informasi Lebih Lengkap
                        </div>
                    </div>
                    <div class="col l6 col m12 col sm12">
                   <a href="#kontakkami" class="btnLight" href="">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?=$this->renderSection('front')?>
    </main>
    <footer>
      <?=$this->include('front/main/home/footer');?>
    </footer>
    
    <script type="text/javascript" src="<?=base_url()?>/assets/js/mainfront.js"></script>
</body>

</html>