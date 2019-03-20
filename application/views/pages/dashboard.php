<!--<h1>--><? //= $title ?><!--</h1>-->
<div class="row" id="image_app" style="margin-top: 20px">
    <div class="card-columns cards">
        <div v-for="image in images" :key="image.id">
            <a href="#">
                <img class="img-thumbnail"
                     :src="'<?php echo base_url() ?>'+ 'assets/upload/' + image.img_src"/>
            </a>
        </div>
    </div>
</div>