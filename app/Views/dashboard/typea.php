<?=$this->extend('dashboard/layouts');?>
<?=$this->section('dashboard');?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Type A</h1>
        </div>
    </div>
    <a href="/dashboardtypea/create" class="btn btn-primary mb-3">Create Type A</a>
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
                    <th scope="col">Hero Image</th>
                    <th scope="col">caption Hero</th>
                    <th scope="col">Child Image 1</th>
                    <th scope="col">caption Child 1</th>
                    <th scope="col">Child Image 2</th>
                    <th scope="col">caption Child 2</th>
                    <th scope="col">Text</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Detail</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($typea as $ta) : ?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><img class="aroundImage" src="<?=base_url()?>/assets/img/uploadtypea/<?=$ta['heroimage'];?>" alt="<?=$ta['captionheroimagea']?>">
                    </td>
                    <td><?=$ta['captionheroimagea'];?></td>
                    <td><img class="aroundImage" src="<?=base_url()?>/assets/img/uploadtypea/<?=$ta['childimagesatu'];?>" alt="<?=$ta['captionchildimagesatua']?>">
                    </td>
                    <td><?=$ta['captionchildimagesatua']?></td>
                    <td><img class="aroundImage" src="<?=base_url()?>/assets/img/uploadtypea/<?=$ta['childimagedua'];?>" alt="<?=$ta['captionchildimageduaa']?>">
                    </td>
                    <td><?=$ta['captionchildimageduaa']?></td>
                    <td><?=$ta['texttypea']?></td>
                    <td>
                        <a href="/dashboardtypea/edit/<?=$ta['slugtypea'];?>" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="/dashboardtypea/delete/<?=$ta['id'];?>" method="post">
                        <?=csrf_field();?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin')">Delete</button>
                        </form>
                    </td>
                    <td><a href="/dashboardtypea/<?=$ta['slugtypea'];?>" class="btn btn-primary">Detail</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>
<?=$this->endSection();?>