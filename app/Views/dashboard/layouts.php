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
            <li class="nav-item dropdown">
              <a class="nav-link item dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                aria-expanded="false"><span data-feather="image"></span>Floor plann</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li class="nav-item"><a class="dropdown-item" href="/dashboardtypea">Type A</a></li>
                <hr>
                <li class="nav-item"><a class="dropdown-item" href="/dashboardtypeb">Type B</a></li>
              </ul>
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

    function heroImgAPreview() {
      const heroAImage = document.querySelector('#heroimage');
      const namaHeroALabel = document.querySelector('.custom-file-label');
      const imgHeroAPreview = document.querySelector('.hero-typea-preview');
      namaHeroALabel.textContent = heroAImage.files[0].name;
      const fileHeroAImage = new FileReader();
      fileHeroAImage.readAsDataURL(heroAImage.files[0]);
      fileHeroAImage.onload = function (e) {
        imgHeroAPreview.src = e.target.result;
      }
    }
    function childImgSatuAPreview() {
      const childsatuAImage = document.querySelector('#childimagesatu');
      const namaChildsatuALabel = document.querySelector('.custom-file-label');
      const imgChildsatuAPreview = document.querySelector('.childsatu-typea-preview');
      namaChildsatuALabel.textContent = childsatuAImage.files[0].name;
      const fileChildsatuAImage = new FileReader();
     fileChildsatuAImage.readAsDataURL(childsatuAImage.files[0]);
     fileChildsatuAImage.onload = function (e) {
      imgChildsatuAPreview.src = e.target.result;
      }
    }
    function childImgDuaAPreview() {
      const childduaAImage = document.querySelector('#childimagedua');
      const namaChildduaALabel = document.querySelector('.custom-file-label');
      const imgChildduaAPreview = document.querySelector('.childdua-typea-preview');
      namaChildduaALabel.textContent = childduaAImage.files[0].name;
      const fileChildduaAImage = new FileReader();
     fileChildduaAImage.readAsDataURL(childduaAImage.files[0]);
     fileChildduaAImage.onload = function (e) {
      imgChildduaAPreview.src = e.target.result;
      }
    }
  </script>
</body>

</html>