 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/front/header');?>
<?php $product_id =$details->id ; ?>
 <!-- DataTables -->
   <div  id="product-wrapper" >
   <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4">
  <!-- First product box start here-->
  <div class="product-image-detail">
  <!-- stdClass Object ( [id] => 234262 [user_id] => 133 [type] =>
  [ProductName] => iphone 7 [ProductCategory] => Category 4 [Tax] => [sgst] => 5 [cgst] => 2 [igst] => 1 [Available_qty] => 10 [SKU] => KJO8755 [Price] => 20000 [hsn] => [sac] => [SalePrice] => 20500 [description] => product desctrion [productImage] => images1.jpg [company_name] => [company_email] => [company_phone] => [City] =>
   [State] => [Pincode] => [company_address] => [ip_address] => ::1 [create_date] => 2020-01-11 06:11:01 [products_sold] => 1 ) -->

            <img src="<?php echo    base_url('uploads/products/'.$details->productImage ) ;?>" alt="194x228" class="img-responsive">

          </div>

  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <!-- First product box start here-->
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <h3 class="product_name"> <?php echo $details->ProductName ; ?> </h3>
  <label class="product_price">
  <?php
  echo $this->config->item('currency');
 ?>
 <?php echo $details->SalePrice ; ?> </label>
   <p >  <label class="product_category"> <?php echo $details->ProductCategory ; ?></label> </p>
   <?php if($details->Available_qty < 9) { ?>
  <p> <label class="product_number_left"><?php echo $details->Available_qty ; ?>  Left, Hurry up!! </label>     </p>
<?php } ?>
  <p >  <label class=""> Quantity </label>
  <select id="quanity_choosen"  class="product_quanity">
<option value="1">1</option>
<?php for($cn=2; $cn<= $details->Available_qty ; $cn++){ ?>
  <option  value="<?php echo $cn ; ?>"><?php echo $cn ; ?></option>
<?php } ?>
  </select>
  <a id="buyNNow" data-rel="<?php echo base_url();?>buy-now/<?php echo $this->encrypt->encode( $details->id); ?>"  class="btn btn-danger">Buy Now</a>
  <p class="product_text">  <?php echo $details->description ; ?>    </p>
  </div>
  </div>
  <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12">

  <?php $this->load->view('home/related_products',array('product_id'=> $product_id));?>
  </div>
   </div>
 <?php $this->load->view('include/front/footer');?>
