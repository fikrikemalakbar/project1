<?=$this->extend('dashboard/layouts')?>

<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if($userdata->profil_pic !='') : ?>
                        <img class="rounded-circle" src='<?=$userdata->profil_pic;?>' width="100" height="100" alt="">
                        <?php else:?>
                            <img class="rounded-circle" src="<?=base_url()?>/assets/img/blank.png" height="100" width="100" alt="">
                    <?php endif;?>
                </div>
                <div class="col-sm-12">
                    Name : <?=$userdata->name;?>
                </div>
                <div class="col-sm-12">
                    Email : <?=$userdata->email?>
                </div>
                <div class="col-sm-12">
                  <a href="<?=base_url()?>/dashboard/editprofil" style="text-decoration:none;" class="btn btn-primary mt-2">Edit Profile</a>
                </div>
            </div>
        </div>
      </div>


    
    </main>

<?=$this->endSection();?>
