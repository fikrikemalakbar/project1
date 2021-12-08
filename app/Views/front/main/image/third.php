<div class="third-row">
    <div class="third-column">
        <img src="<?=base_url()?>/assets/img/1.jpg" style="width:100%;height:200px;" onclick="thirdopenModal();thirdcurrentSlide(1)"
            class="third-hover-shadow third-cursor">
    </div>
    <div class="third-column">
        <img src="<?=base_url()?>/assets/img/2.jpg" style="width:200%;height:200px;" onclick="thirdopenModal();thirdcurrentSlide(2)"
            class="third-hover-shadow third-cursor">
    </div>
    <div class="third-column">
        <img src="<?=base_url()?>/assets/img/3.jpg" style="width:100%;height:200px;" onclick="thirdopenModal();thirdcurrentSlide(3)"
            class="hover-shadow cursor">
    </div>
    <div class="third-column">
        <img src="<?=base_url()?>/assets/img/4.jpg" style="width:100%;height:200px;" onclick="thirdopenModal();thirdcurrentSlide(4)"
            class="third-hover-shadow third-cursor">
    </div>
</div>

<div id="third-myModal" class="third-modal">
    <span class="third-close third-cursor" onclick="thirdcloseModal()">&times;</span>
   

        <div class="third-mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="<?=base_url()?>/assets/img/1.jpg" style="width:300px;height:300px;" >
        </div>

        <div class="third-mySlides">
            <div class="numbertext">2 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/2.jpg" >
        </div>

        <div class="third-mySlides">
            <div class="numbertext">3 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/3.jpg" >
        </div>

        <div class="third-mySlides">
            <div class="numbertext">4 / 4</div>
            <img style="width:300px;height:300px;" src="<?=base_url()?>/assets/img/4.jpg" >
        </div>

        <a class="third-prev" onclick="thirdplusSlides(-1)">&#10094;</a>
        <a class="third-next" onclick="thirdplusSlides(1)">&#10095;</a>

        <div class="third-caption-container">
            <p id="third-caption"></p>
        </div>


        <div class="third-column">
            <img style="display:none;" class="third-demo third-cursor" src="i<?=base_url()?>/assets/img/1.jpg"
                style="width:100%" onclick="thirdcurrentSlide(1)" alt="Nature and sunrise">
        </div>
        <div class="third-column">
            <img style="display:none;" class="third-demo third-cursor" src="<?=base_url()?>/assets/img/2.jpg"
                style="width:100%" onclick="thirdcurrentSlide(2)" alt="Snow">
        </div>
        <div class="third-column">
            <img style="display:none;" class="third-demo third-cursor" src="<?=base_url()?>/assets/img/3.jpg"
                style="width:100%" onclick="thirdcurrentSlide(3)" alt="Mountains and fjords">
        </div>
        <div class="third-column">
            <img style="display:none;" class="third-demo third-cursor" src="<?=base_url()?>/assets/img/4.jpg"
                style="width:100%" onclick="thirdcurrentSlide(4)" alt="Northern Lights">
        </div>
 
</div>