<h1><?= $title ?></h1>
<div>
    <div class="row">
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</div>

<div class="row" id="image_app">
    <div class="col-xs-6 col-md-3" v-for="image in images" :key="image.id">
        <a href="#" class="thumbnail">
            <img rel="icon" :src="'<?php echo base_url() ?>'+ 'assets/upload/' + image.img_src">
        </a>
    </div>
</div>
<script>
    // var image = new Vue({
    //     el: '#image',
    //     data: {
    //         file_data: '',
    //         images: {},
    //     },
    //     mounted() {
    //         this.fetchData();
    //     },
    //     methods: {
    //         fetchData() {
    //             let url = "http://localhost/civuejs/user/showAll";
    //             var self = this
    //             axios.get(url).then((res) => {
    //                 this.images = res.data.users;
    //             });
    //         }
    //     }
    // });
</script>