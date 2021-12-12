<div class="image-row">
    <?php $i = 1; ?>
    <?php foreach ($typeachild as $o) : ?>
    <div class="image-column">
        <img src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$o['achildimage']?>" style="width:100%;height:200px;" onclick="openModal();currentSlide(<?=$i++;?>)"
            class="image-hover-shadow image-cursor">
    </div>
    <?php endforeach;?>
</div>

<div id="image-myModal" class="image-modal">
    <span class="image-close image-cursor" onclick="closeModal()">&times;</span>
        
        <?php $k = 1;?>
        <?php foreach ($typeachild as $s) : ?>
        <div class="image-mySlides">
            <div class="numbertext"><?=$k++;?> / 4</div>
            <img src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$s['achildimage']?>" style="width:300px;height:300px;" >
        </div>
        <?php endforeach;?>

        <?php $z = 1;?>
        <a class="image-prev" onclick="plusSlides(-<?=$z;?>)">&#10094;</a>
        <a class="image-next" onclick="plusSlides(<?=$z;?>)">&#10095;</a>

        <div class="image-caption-container">
            <p id="image-caption"></p>
        </div>
        
        <?php $v = 1;?>
        <?php foreach($typeachild as $t) : ?>
        <div class="image-column">
            <img style="display:none;" class="image-demo image-cursor" src="<?=base_url()?>/assets/img/uploadtypeachild/<?=$t['achildimage']?>"
                style="width:100%" onclick="currentSlide(<?=$v++;?>)" alt="<?=$t['acaptionchild']?>">
        </div>
        <?php endforeach;?>
        
 
</div>