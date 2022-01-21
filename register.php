<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Admin | Register</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">PHP</h1>
            </div>
            <?php if( isset($_REQUEST['msg']) && $_REQUEST['msg'] != ''){ ?>
            <p style="color:red;"><?php echo $_REQUEST['msg']; ?></p>
            <?php } ?>
            <h3>Register to PHP admin</h3>
            <form class="m-t" role="form"method="post" action="registeraction.php">
                <div class="form-group">
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" id="confirm_password"class="form-control" placeholder="Confirm Password" value="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Register</button>
                
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.html">Login</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
