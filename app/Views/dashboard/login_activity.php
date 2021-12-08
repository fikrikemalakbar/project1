<?=$this->extend('dashboard/layouts');?>
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
        </div>
        <div class="col-sm-12">
          Name : <?=$userdata->name;?>
        </div>
        <div class="col-sm-12">
          Email : <?=$userdata->email?>
        </div>
      </div>
    </div>
  </div>


  <h2>Login Activity</h2>
  <?php $i = 1;?>
  <?php if (count($login_info)>0) : ?>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">id</th>
          <th scope="col">login time</th>
          <th scope="col">logout time</th>
          <th scope="col">user agent</th>
          <th scope="col">ip address</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($login_info as $info) : ?>
        <tr>
          <td><?=$i++;?></td>
          <td><?= $info->id;?></td>
          <td><?=date("l ds M Y h:i:s a", strtotime($info->login_time));?></td>
          <td><?= $info->logout_time;?></td>
          <td><?= $info->agent;?></td>
          <td><?= $info->ip;?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <?php else : ?>
  <h5>No information form</h5>
  <?php endif;?>
</main>
<?=$this->endSection();?>