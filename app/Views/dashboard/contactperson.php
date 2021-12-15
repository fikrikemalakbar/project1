<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Contact Person</h1>
        </div>
    </div>
    <a href="/dashboardcontactperson/create" class="btn btn-primary mb-3">Create Contact Person</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <?php foreach($contactperson as $cp) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                Nomor Whatsapp : <?=$cp['wa']?>
            </div>
            <div class="col-lg-12">
                Nomor Telephone : <?=$cp['ph']?>
            </div>
            <div class="col-lg-12">
                Alamat : <?=$cp['alamat']?>
            </div>
            <div class="col-lg-12">
                Email : <?=$cp['email']?>
            </div>
            <div class="col-lg-12">
                <a href="/dashboardcontactperson/edit/<?=$cp['id'];?>" class="btn btn-success">Edit</a>
                <form class="d-inline" action="/dashboardcontactperson/delete/<?=$cp['id'];?>" method="post">
                    <?=csrf_field();?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('apakah anda yakin')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</main>
<?=$this->endSection();?>