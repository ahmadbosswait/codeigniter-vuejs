<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>


    <link rel="icon" href="<?php echo base_url() ?>assets/img/civue.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

    <script src="<?php echo base_url() ?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>

        </head>
<script src="https://npmcdn.com/vue/dist/vue.js"></script>
<script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>

<body>
<div id="main_app">
<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Navbar</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <!--                        <a class="nav-link" href="-->
                        <?php //echo base_url(); ?><!--">Home <span-->
                        <!--                                    class="sr-only">(current)</span></a>-->
                        <router-link to="/civuejs/" class="nav-link">
                            <p>Home</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/civuejs/users" class="nav-link">
                            <p>User</p>
                        </router-link>
                        <!--                        <a class="nav-link" href="-->
                        <?php //echo base_url(); ?><!--user">User</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="container">

