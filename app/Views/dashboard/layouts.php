<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title><?=$title;?></title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>/assets/bootstrap-5.1.3-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .sidebar{
      overflow-y: scroll;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .aroundImage {
      width: 50px;
    }

    .table>tbody>tr>* {
      vertical-align: middle;
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>/assets/bootstrap-5.1.3-examples/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Control Panel</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <!-- <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div> -->
    <ul>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
          aria-expanded="false">Settings</a>
        <ul class="dropdown-menu" aria-labelledby="dropdown01">
          <li><a class="dropdown-item" href="<?=base_url()?>/dashboard/changepassword">Change Password</a></li>
        </ul>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboard/editprofil">
                <span data-feather="user"></span>
                Edit Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboard/loginactivity">
                <span data-feather="activity"></span>
                Login Activity
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardmetadescription">
                <span data-feather="codesandbox"></span>
                Meta Description
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardaudience">
                <span data-feather="users"></span>
                Audience
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardcontactperson">
                <span data-feather="book-open"></span>
                Contact Company
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardfeature">
                <span data-feather="briefcase"></span>
                Features
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardgallery">
                <span data-feather="image"></span>
                Gallery
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>/dashboardmarketing">
                  <span data-feather="image"></span>
                  Marketing Gallerty
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>/dashboardbank">
                  <span data-feather="dollar-sign"></span>
                  Bank
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>/dashboardbgfloor">
                <span data-feather="crop"></span>
                Background FloorGallery
              </a>
            </li>
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="nav-item">
                      <div style="font-size:15px;" class="nav-link">Type A</div>
                    </div>
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                  <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypeahero">
                    <span data-feather="corner-down-right"></span>
                    Type A Hero
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypeachild">
                    <span data-feather="corner-down-right"></span>
                    Type A Child
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypeatext">
                    <span data-feather="corner-down-right"></span>
                    Type A Text
                  </a>
                </li>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="nav-item">
                      <div style="font-size:15px;" class="nav-link">Type B</div>
                    </div>
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                  <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypebhero">
                    <span data-feather="corner-down-right"></span>
                    Type B Hero
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypebchild">
                    <span data-feather="corner-down-right"></span>
                    Type B Child
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>/dashboardtypebtext">
                    <span data-feather="corner-down-right"></span>
                    Type B Text
                  </a>
                </li>
                  </div>
                </div>
              </div>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>/dashboardsiteplan">
                  <span data-feather="layout"></span>
                  Site Plan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>/dashboard/logout">
                  <span data-feather="log-out"></span>
                  sign-out
                </a>
              </li>
          </ul>
        </div>
      </nav>
      <?=$this->renderSection('dashboard');?>
    </div>
  </div>
  <script src="<?=base_url()?>/assets/bootstrap-5.1.3-examples/assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
  </script> -->
  <script src="<?=base_url()?>/assets/bootstrap-5.1.3-examples/dashboard/dashboard.js"></script>
  <script src="<?=base_url()?>/assets/ckeditor/ckeditor.js"></script>
  <script>
    function galleryImgPreview() {
      const nameGallery = document.querySelector('#name');
      const namaGalleryLabel = document.querySelector('.custom-file-label');
      const imgGalleryPreview = document.querySelector('.gallery-preview');
      namaGalleryLabel.textContent = nameGallery.files[0].name;
      const fileNameGallery = new FileReader();
      fileNameGallery.readAsDataURL(nameGallery.files[0]);
      fileNameGallery.onload = function (e) {
        imgGalleryPreview.src = e.target.result;
      }
    }

    function featureImgPreview() {
      const nameFeature = document.querySelector('#namefeature');
      const namaFeatureLabel = document.querySelector('.custom-file-label');
      const imgFeaturePreview = document.querySelector('.feature-preview');
      namaFeatureLabel.textContent = nameFeature.files[0].name;
      const fileNameFeature = new FileReader();
      fileNameFeature.readAsDataURL(nameFeature.files[0]);
      fileNameFeature.onload = function (e) {
        imgFeaturePreview.src = e.target.result;
      }
    }

    function typeaheroPreview() {
      const nametypeahero = document.querySelector('#aheroimage');
      const namalabelahero = document.querySelector('.custom-file-label');
      const imgaheropreview = document.querySelector('.typeahero-preview');
      namalabelahero.textContent = nametypeahero.files[0].name;
      const filenamatypeahero = new FileReader();
      filenamatypeahero.readAsDataURL(nametypeahero.files[0]);
      filenamatypeahero.onload = function (e) {
        imgaheropreview.src = e.target.result;
      }
    }

    function typeachildPreview() {
      const nametypeachild = document.querySelector('#achildimage');
      const namalabelachild = document.querySelector('.custom-file-label');
      const imgachildpreview = document.querySelector('.typeachild-preview');
      namalabelachild.textContent = nametypeachild.files[0].name;
      const filenamatypeachild = new FileReader();
      filenamatypeachild.readAsDataURL(nametypeachild.files[0]);
      filenamatypeachild.onload = function (e) {
        imgachildpreview.src = e.target.result;
      }
    }

    function typebheroPreview() {
      const nametypebhero = document.querySelector('#bheroimage');
      const namalabelbhero = document.querySelector('.custom-file-label');
      const imgbheropreview = document.querySelector('.typebhero-preview');
      namalabelbhero.textContent = nametypebhero.files[0].name;
      const filenamatypebhero = new FileReader();
      filenamatypebhero.readAsDataURL(nametypebhero.files[0]);
      filenamatypebhero.onload = function (e) {
        imgbheropreview.src = e.target.result;
      }
    }

    function typebchildPreview() {
      const nametypebchild = document.querySelector('#bchildimage');
      const namalabelbchild = document.querySelector('.custom-file-label');
      const imgbchildpreview = document.querySelector('.typebchild-preview');
      namalabelbchild.textContent = nametypebchild.files[0].name;
      const filenamatypebchild = new FileReader();
      filenamatypebchild.readAsDataURL(nametypebchild.files[0]);
      filenamatypebchild.onload = function (e) {
        imgbchildpreview.src = e.target.result;
      }
    }
    function bgfloorPreview() {
      const namebgfloor = document.querySelector('#imagebg');
      const namalabelbgfloor = document.querySelector('.custom-file-label');
      const imgbgfloorpreview = document.querySelector('.bgfloor-preview');
      namalabelbgfloor.textContent = namebgfloor.files[0].name;
      const filenamabgfloor = new FileReader();
      filenamabgfloor.readAsDataURL(namebgfloor.files[0]);
      filenamabgfloor.onload = function (e) {
        imgbgfloorpreview.src = e.target.result;
      }
    }

    function imagesitePreview() {
      const nameimagesite = document.querySelector('#imagesite');
      const namalabelimagesite = document.querySelector('.custom-file-label');
      const imgimagesitepreview = document.querySelector('.imagesite-preview');
      namalabelimagesite.textContent = nameimagesite.files[0].name;
      const filenamaimagesite = new FileReader();
      filenamaimagesite.readAsDataURL(nameimagesite.files[0]);
      filenamaimagesite.onload = function (e) {
        imgimagesitepreview.src = e.target.result;
      }
    }

    function imagemapsPreview() {
      const nameimagemaps = document.querySelector('#imagemaps');
      const namalabelimagemaps = document.querySelector('.custom-file-label');
      const imgimagemapspreview = document.querySelector('.imagemaps-preview');
      namalabelimagemaps.textContent = nameimagemaps.files[0].name;
      const filenamaimagemaps = new FileReader();
      filenamaimagemaps.readAsDataURL(nameimagemaps.files[0]);
      filenamaimagemaps.onload = function (e) {
        imgimagemapspreview.src = e.target.result;
      }
    }

    function imagemarketingPreview() {
      const nameimagemarketing = document.querySelector('#imagemarketing');
      const namalabelimagemarketing = document.querySelector('.custom-file-label');
      const imgimagemarketingpreview = document.querySelector('.imagemarketing-preview');
      namalabelimagemarketing.textContent = nameimagemarketing.files[0].name;
      const filenamaimagemarketing = new FileReader();
      filenamaimagemarketing.readAsDataURL(nameimagemarketing.files[0]);
      filenamaimagemarketing.onload = function (e) {
        imgimagemarketingpreview.src = e.target.result;
      }
    }

    
    function imagebankPreview() {
      const nameimagebank = document.querySelector('#imagebank');
      const namalabelimagebank = document.querySelector('.custom-file-label');
      const imgimagebankpreview = document.querySelector('.imagebank-preview');
      namalabelimagebank.textContent = nameimagebank.files[0].name;
      const filenamaimagebank = new FileReader();
      filenamaimagebank.readAsDataURL(nameimagebank.files[0]);
      filenamaimagebank.onload = function (e) {
        imgimagebankpreview.src = e.target.result;
      }
    }

    function imageaudiencePreview() {
      const nameimageaudience = document.querySelector('#imageaudience');
      const namalabelimageaudience = document.querySelector('.custom-file-label');
      const imgimageaudiencepreview = document.querySelector('.imageaudience-preview');
      namalabelimageaudience.textContent = nameimageaudience.files[0].name;
      const filenamaimageaudience = new FileReader();
      filenamaimageaudience.readAsDataURL(nameimageaudience.files[0]);
      filenamaimageaudience.onload = function (e) {
        imgimageaudiencepreview.src = e.target.result;
      }
    }
  </script>
</body>

</html>