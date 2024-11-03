<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i-S.M.A.R.T | Login</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url("assets/images/favicon.ico"); ?>"/>
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url("assets/images/apple-icon-57x57.png"); ?>" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url("assets/images/apple-icon-72x72.png"); ?>" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url("assets/images/apple-icon-114x114.png"); ?>" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url("assets/images/apple-icon-144x144.png"); ?>" />
    <link href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/design-login.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!--  <script src='https://www.google.com/recaptcha/api.js'></script> -->
</head>

<body>
<div class="overly"></div>

<div class="loginbox ">
    <div class="box container">
        <div class="logo">
            <a href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" class="img" alt="img">
            </a>
        </div>
        <br />
        <h2>Credentials Required </h2>
        <form action="/Login/index" method="POST">
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
            </div>
            <div id="msg" class="error-msg" >

            </div>

            <button type="submit" class="btn btn-default btn-lg" id="submit">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<script>
    $( "#pwd" ).keyup(function() {
        $('#pwd').css({"border": "none"});
        $('#msg').html("");
    });

    $( "#submit" ).click(function() {

        var password  = $('#pwd').val();

        if(password === ''){
            $('#pwd').css({"border": "solid 1px red"});
            $('#msg').css({"color": "red"});
            $('#msg').html("Please Enter Password.");
            return false;
        }

    });

    <?php if(isset($error) && !empty($error)) : ?>
        $('#msg').css({"color": "red"});
        $('#msg').html("<?= $error;  ?>");
    <?php endif; ?>
</script>


</body>
</html>