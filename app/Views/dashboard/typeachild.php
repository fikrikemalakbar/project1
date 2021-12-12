<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Type A Child</h1>
        </div>
    </div>
    <a href="/dashboardtypeachild/create" class="btn btn-primary mb-3">Create Type A Child</a>
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
                    <th scope="col">image</th>
                    <th scope="col">Image Caption</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Detail</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($typeachild as $tac) : ?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><img class="aroundImage" src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$tac['achildimage'];?>" alt="<?=$tac['acaptionchild']?>"></td>
                    <td><?=$tac['acaptionchild'];?></td>
                    <td>
                        <a href="/dashboardtypeachild/edit/<?=$tac['slugachild'];?>" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardtypeachild/delete/<?=$tac['id'];?>" method="post">
                            <?=csrf_field();?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
                    </td>
                    <td><a href="/dashboardtypeachild/<?=$tac['slugachild'];?>" class="btn btn-primary">Detail</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>
<?=$this->endSection();?>