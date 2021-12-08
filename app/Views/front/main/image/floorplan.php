<div class="image-row">
    <div class="image-column">
        <img src="<?=base_url()?>/assets/img/1.jpg" style="width:100%;height:200px;" onclick="openModal();currentSlide(1)"
            class="image-hover-shadow image-cursor">
    </div>
    <div class="image-column">
        <img src="<?=base_url()?>/assets/img/2.jpg" style="width:200%;height:200px;" onclick="openModal();currentSlide(2)"
            class="image-hover-shadow image-cursor">
    </div>
    <div class="image-column">
        <img src="<?=base_url()?>/assets/img/3.jpg" style="width:100%;height:200px;" onclick="openModal();currentSlide(3)"
            class="hover-shadow cursor">
    </div>
    <div class="image-column">
        <img src="<?=base_url()?>/assets/img/4.jpg" style="width:100%;height:200px;" onclick="openModal();currentSlide(4)"
            class="image-hover-shadow image-cursor">
    </div>
</div>

<div id="image-myModal" class="image-modal">
    <span class="image-close image-cursor" onclick="closeModal()">&times;</span>
   

        <div class="image-mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="<?=base_url()?>/assets/img/1.jpg" style="width:300px;height:300px;" >
        </div>

        <div class="image-mySlides">
            <div class="numbertext">2 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/2.jpg" >
        </div>

        <div class="image-mySlides">
            <div class="numbertext">3 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/3.jpg" >
        </div>

        <div class="image-mySlides">
            <div class="numbertext">4 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/4.jpg" >
        </div>

        <a class="image-prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="image-next" onclick="plusSlides(1)">&#10095;</a>

        <div class="image-caption-container">
            <p id="image-caption"></p>
        </div>


        <div class="image-column">
            <img style="display:none;" class="image-demo image-cursor" src="i<?=base_url()?>/assets/img/1.jpg"
                style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
        </div>
        <div class="image-column">
            <img style="display:none;" class="image-demo image-cursor" src="<?=base_url()?>/assets/img/2.jpg"
                style="width:100%" onclick="currentSlide(2)" alt="Snow">
        </div>
        <div class="image-column">
            <img style="display:none;" class="image-demo image-cursor" src="<?=base_url()?>/assets/img/3.jpg"
                style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
        </div>
        <div class="image-column">
            <img style="display:none;" class="image-demo image-cursor" src="<?=base_url()?>/assets/img/4.jpg"
                style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
 
</div>