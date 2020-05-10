 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

  <!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>MLM | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?=base_url('public')?>/plugins/iCheck/square/blue.css">



 



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">

    <a href="<?=base_url();?>"><b>MLM</b></a>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Sign in to start your session</p>



    <!--<form action="<?=base_url('authlogincheck');?>" method="post">-->

    <?php echo form_open('authlogincheck');?>

    

      <div class="form-group has-feedback">

        <input type="email" name="username" required class="form-control" placeholder="Email">

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" name="password" required class="form-control" placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      

      <p class="help-block" style="color:red;"><?=$this->session->flashdata('message');?></p>

      <div class="row">

        <div class="col-xs-8">

          <div class="checkbox icheck">

           <!-- <label>

              <input type="checkbox"> Remember Me

            </label>-->

          </div>

        </div>

        

        <!-- /.col -->

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

        <!-- /.col -->

      </div>

    </form>



    <!--<div class="social-auth-links text-center">

      <p>- OR -</p>

      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using

        Facebook</a>

      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using

        Google+</a>

    </div>-->

    <!-- /.social-auth-links -->

  <a style="width:50%;"   href="<?=base_url('i-forgot-my-password');?>">I forgot my password</a>

  <a style="width: 50%; float: right;text-align: right;"  href="<?=base_url('register');?>" >Register</a>


  </div>

  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->



<!-- jQuery 3 -->

<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- iCheck -->

<script src="<?=base_url('public')?>/plugins/iCheck/icheck.min.js"></script>

<script>

  $(function () {

    $('input').iCheck({

      checkboxClass: 'icheckbox_square-blue',

      radioClass: 'iradio_square-blue',

      increaseArea: '20%' // optional

    });

  });

</script>

</body>

</html>

