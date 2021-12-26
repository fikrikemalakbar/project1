<?php foreach($contactperson as $cpw) : ?>
<div class="contactperson">
    <a href="https://api.whatsapp.com/send?phone=<?=$cpw['wa']?>&text=Hallo%20ada%20yang%20bisa%20dibantu"
        class="btnWa">
        <div class="bitzarzo">
            <i class="fab fa-whatsapp"></i>
            <div class="bordeuxo">
                Chat Whatsapp
            </div>
        </div>
    </a>
</div>
<?php endforeach;?>