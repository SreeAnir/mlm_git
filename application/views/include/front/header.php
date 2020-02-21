<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url('public')?>/dist/css/front.css">
<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>

</head>
<body>
  <div class="header">
  <a href="#default" class="logo">MLM Buy Now</a>
  <div class="header-right">
  <?php

$obj=&get_instance();
$obj->load->model('UserModel');

if( isset( $this->session->userdata['Admin']) ){
   $profile_url = $obj->UserModel->PictureUrl();
   $user=$obj->UserModel->GetUserData();
}else{
   $profile_url  = base_url().'public/dist/img/avatar5.png'; ;
}
 

?>
    <a class="active" href="<?= base_url(); ?>/home">Home</a>
    <a  href="<?= base_url(); ?>v3/dashboard" ><img src="<?=$profile_url;?>" class="top-user-image" alt="User Image"> </a>
  </div>
</div>
<div class="container" >
<div class="container-fluid">
         <?php
            if(isset($breadcrumb)&&  !is_null($breadcrumb)){
            ?>   
         <div class="row-fluid">
            <div class="span12">
               <div class="span2">
               </div>
               <div class="span10" style="margin-left:5px;">
                  <div>
                     <ul class="breadcrumb">
                        <?php
                           foreach ($breadcrumb as $key=>$value) {
                            if($value!=''){
                           ?>
                        <li><a href="<?= base_url().$value; ?>"><?=$key; ?></a> <span class="divider"></span></li>
                        <?php }else{?>
                        <li class="active"><?=$key; ?></li>
                        <?php }
                           }
                           ?>     
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            }
            ?>    
      </div>