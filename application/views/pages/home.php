<h1><?= $title ?></h1>
<div class="row" id="image_app">
    <div class="col-sm-4 col-md-2" v-for="image in images" :key="image.id">
        <a href="#" class="thumbnail">
            <img rel="icon" :src="'<?php echo base_url() ?>'+ 'assets/upload/' + image.img_src">
        </a>
    </div>
</div>