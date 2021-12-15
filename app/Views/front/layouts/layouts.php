<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fontawesome/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>/assets/css/mainfront.css" />
    <title>cluster</title>
    <style>
        
<?php foreach($bgfloor as $bgfl) : ?>
.bgimgHeader {
  position: relative;
  opacity: 0.4;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}
.bgimgHeader {
  background-image: url(/assets/img/uploadbgfloor/<?=$bgfl['imagebg']?>);
  height: 100vh;
  max-width: 100%;
  
}
.captionHeader {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
  overflow-y: hidden;
}
.headerMain{
    position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
  overflow-y: hidden;
  display: flex;
  justify-content: center;
}
.headerButton{
  position: absolute;
  left: 0;
  top: 99%;
  width: 100%;
  text-align: center;
  color: #000;
  overflow-y: hidden!important;
  background-color:#0F3C7C;
  padding-top:10px;
}
.btnLight{
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


<?php endforeach;?>

    </style>
</head>

<body>
    <header>
        <div class="bgimgHeader">
        </div>
        <div class="headerMain">
            <div class="row">
                <div style="font-size:18px;font-weight:700;color:#4054B2;" class="col l12">
                Miliki Rumah Idaman dengan Proses Cepat & Mudah. Uang Muka Ringan dan Jangka Waktu Kredit hingga 30 Tahun
                </div>
            </div>
        </div>
        <div class="headerButton">
            <div class="container">
                <div class="row">
                    <div class="col l4 offset-l2 col m12 col sm12">
                    Segera Dapatkan Informasi Lebih Lengkap
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