<!DOCTYPE html>
<html>
<head>
    <title>Admin - Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="login col-md-4 mx-auto text-center">
    <h1>Admin Login</h1>
    <form method="post" action="<?php echo site_url('admin/login/verify')?>">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </div>

    </form>
</div>
</body>
</html>