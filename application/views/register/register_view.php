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

  <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/login_page.css">


 



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>

<body class="hold-transition login-page">

<div class="register-wraper">

  <div class="login-logo">

    <a href="<?=base_url();?>"><b>MLM</b></a>

  </div>
  <p class="help-block" style="color:red;"><?=$this->session->flashdata('message');?></p>
<?php if($this->session->flashdata('message_register') ) {  ?>
  <div class="message_box_wrapper" >
   <?php echo $this->session->flashdata('message_register') ; ?>
</div>
<?php } ?>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Fill the Details</p>



    <form enctype="multipart/form-data" action="<?=base_url('new-registration');?>" method="POST">

    <?php //echo form_open('new-registration');?>

    
  <?php 
      if(isset($_GET['return'])){ ?> 
               <input type="hidden" name="redirect_url" required class="form-control" value ="<?php echo $_GET['return'] ; ?>">
          <?php     
          }
          ?> 

      <p class="help-block" style="color:red;"><?=$this->session->flashdata('message');?></p>

      <div class="row">

        

      <div class="member" style="display:none;">

<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">Registerd Member ID</label>

  <input type="text" class="form-control" id="MembershipID" name="MembershipID" placeholder="Enter Membership ID">

  

</div> 

</div>



<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">&nbsp; </label>

    <button style="margin-top: 25px;" type="button" class="btn btn-primary CheckMember">Check Member Details</button>

  <p class="help-block" id="membererror" style="color:red;"></p>

</div>



</div>

</div>


<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">Customer Name</label>

  <input type="text" class="form-control" required id="CustomerName"  name="CustomerName" placeholder="Enter Customer Name">

  <input type="hidden" name="id" id="member_ID" style="display:none;">

  <p class="help-block"></p>

</div> 

</div>



<div class="col-md-6" id="ReferenceMemberIdDiv">









 <div class="form-group">

  <label for="inputSuccess">Reference Member Id</label>

  

   <div class="mId1">

    <span class="input-group-addon mId2" style="display:none;">

        

    </span>

    

     <input type="number" class="form-control numcls" id="ReferenceMemberId" name="ReferenceMemberId" placeholder="Enter Reference Member Id">

  </div>

     <p class="help-block mName">

    

   </p>

</div> 

</div>



<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">Mobile No.</label>

  <input type="number" class="form-control numcls" required id="Mobile"  name="Mobile" placeholder="Enter Mobile No.">

  <p class="help-block"></p>

</div> 

</div>



<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">Email Address</label>

  <input type="email" class="form-control" required id="Email"  name="Email" placeholder="Enter Mobile No.">

  <p class="help-block"></p>

</div> 

</div>



<div class="col-md-6">

 <div class="form-group">

  <label for="exampleInputPassword1">Pincode No.</label>

  <input type="number" class="form-control numcls" required id="Pincode" name="Pincode" placeholder="Enter Mobile No.">

  <p class="help-block"></p>

</div> 

</div>

<div class="col-md-6 bankDiv">

 <div class="form-group">

  <label for="exampleInputPassword1">Photo</label>

  <input type="file" class="form-control"  name="c_Image">

  <p class="help-block"></p>

</div> 

</div>



<div class="col-md-12"> 

 <div class="form-group">

  <label for="exampleInputPassword1">Address </label>

  <textarea class="form-control" required id="Address" name="Address"></textarea>

  <p class="help-block"></p>

</div> 

</div>

     

</div>





<!-- /.box-body -->

</div>





<div class="box box-primary">

<div class="box-header with-border bankDiv">

<h3 class="box-title">Enter Customer Bank Details</h3>

</div>

<div class="box-body">



<div class="col-md-6 bankDiv">

<div class="form-group">

<label for="exampleInputPassword1">Account Number</label>

<input type="text" class="form-control" id="AccountNumber" value="" name="AccountNumber" placeholder="Enter Account Number">



<p class="help-block"></p>

</div> 

</div>



<div class="col-md-6 bankDiv">



<div class="form-group">

<label for="inputSuccess">IFSC Code</label>

   <input type="text" class="form-control" id="IFSCCode" placeholder="Enter IFSC Code">

  <p class="help-block"> </p>

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


          <p class="box-header with-border text-center "> 
    <a  href="<?=base_url();?>" >Back To Login</a>

        </p>



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

