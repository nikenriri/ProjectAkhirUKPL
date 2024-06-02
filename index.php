<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Enkripsi dan Dekripsi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="dashboard/assets/css/login.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Aplikasi Daftar Ulang Siswa Baru</h1>
        </div>
        <div class="login-box">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i> Silakan Login</h3>
            <form class="login-form" action="auth.php" method="post">

                <label>Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>

                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required>

                <button class="btn btn-primary btn-block" name="login"> Login <i class="fa fa-sign-in fa-lg"></i></button><br>
                <p style="font-size:10pt; text-align:center">Copyright 2017 - Niken Riri (123200091)</p>
            </form>
        </div>
    </section>
</body>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/essential-plugins.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/pace.min.js"></script>
<script src="assets/js/main.js"></script>

</html>