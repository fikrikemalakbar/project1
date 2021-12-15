<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Background Floor & Gallery</h1>
        </div>
    </div>
    <a href="/dashboardbgfloor/create" class="btn btn-primary mb-3">Create Background Floor & Gallery</a>
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('pesan');?>
    </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Text A</th>
                    <th scope="col">Text B</th>
                    <th scope="col">Image</th>
                    <th scope="col">Caption</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Detail</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($bgfloor as $bgf) : ?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><?= $bgf['titlebg']?></td>
                    <td><?= $bgf['textb']?></td>
                    <td><img class="aroundImage" src="<?=base_url()?>/assets/img/uploadbgfloor/<?=$bgf['imagebg'];?>" alt="<?=$bgf['captionbg'];?>"></td>
                    <td><?=$bgf['captionbg'];?></td>
                    <td>
                        <a href="/dashboardbgfloor/edit/<?=$bgf['slugbg'];?>" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardbgfloor/delete/<?=$bgf['id'];?>" method="post">
                        <?=csrf_field();?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
                    </td>
                    <td><a href="/dashboardbgfloor/<?=$bgf['slugbg'];?>" class="btn btn-primary">Detail</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>
<?=$this->endSection();?>