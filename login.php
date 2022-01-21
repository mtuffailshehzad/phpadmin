<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Admin | Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">PHP</h1>
            </div>
            <?php if( isset($_REQUEST['msg']) && $_REQUEST['msg'] != ''){ ?>
            <p style="color:red;"><?php echo $_REQUEST['msg']; ?></p>
            <?php } ?>
            <h3>Welcome to PHP Admin Panel</h3>
            <form class="m-t" role="form" method="post" action="loginaction.php">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="jassets/s/jquery-3.1.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>

</html>
