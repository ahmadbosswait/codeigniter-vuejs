<h1><?= $title ?></h1>
<div class="row" id="image_app">
    <div class="card-columns cards">
        <div class="p-4" v-for="image in images" :key="image.id">
            <a href="#">
                <img class="img-thumbnail" rel="icon" alt="Lights"
                     :src="'<?php echo base_url() ?>'+ 'assets/upload/' + image.img_src"/>
            </a>
        </div>
    </div>
</div>