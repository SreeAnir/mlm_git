<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/front/header');?>
<?php
   $obj=&get_instance();
   $user=$obj->UserModel->GetUserData(); 
   ?>
<?php $product_id =$details->id ;
      $is_igst = $details->igst ;
      $unit_price =  $details->SalePrice ;
?>
 <!-- DataTables -->
 <!-- <p class="theme-notification">Thank you for shopping with us.</p> -->

   <div  id="product-wrapper" class="payment_confirm_wapper" >
    
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 padding-topbottom">
  <!-- First product box start here-->
  <div class="col-xs-12 padding-topbottom">please confirm your purchase by filling the 
  <b >PO(Purchase Order) Code </b> recieved from the vendor 
  <p class="poCodeDiv"> <input  type="text" id="poCode" class="form-control" placeholder="Egs P82HDJ" > </label></p>
  <label class="poCodeDivLabel control-label" > PO Code is mandatory</label>
</div>
<br />
    <p> <h4> Shipping Address <label id="edit-address" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </label> </h4>
  <div  class="save-address-buttons"  style="display:none;" > 
  <!-- style="display:none;" -->
  <button type="button" id="save-address-btn" class="btn btn-primary">Update Addres</button>
  <button type="button" id="cancel-address-btn"  class="btn btn-secondary">cancel</button>

</div>
</p>
  <div >
  <!-- poCode=  $('#poCode').val();

pincode=  $('#pincode').val();

address=$('#address_textarea').val();

product_id= $('#product_id').val();

user_id= $('#user_id').val();

user_name= $('#user_name').val();
 
qty= $('#qty').val();

is_igst= $('#is_igst').val();

unit_price= $('#unit_price').val();  type="hidden"-->
  <input   type="hidden" id="product_id" value="<?php echo $product_id; ?>" >
  <input  type="hidden"  id="user_id" value="<?php echo $user['id']; ?>" >
  <input  type="hidden" id="user_name" value="<?php echo $user['first_name']." ". $user['last_name']; ?>" >
  <input   type="hidden" id="qty" value="<?php echo $qty; ?>" >
  <input  type="hidden"  id="is_igst" value="<?php echo $is_igst; ?>" >
  <input  type="hidden" id="unit_price" value="<?php echo $unit_price; ?>" >
  </div>
  <div class="theme-address" > 
    <textarea class="form-control address_fields" id="address_textarea" rows="3" readonly="readonly"><?php echo $user['address']; ?>
    </textarea>
  
  </div>
  <div class="theme-address"> 
     Pincode<input readonly="readonly"  type="text" value=" <?php echo $user['pincode']; ?>" id="pincode" class="form-control address_fields" placeholder="Pincode" > </label></div>
  <div> 
  <button type="button" id="check-payment" class="btn btn-primary pull-right ">Confirm Payment</button>
 </div>
 </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 padding-topbottom" id="product_information">
  <p class="theme-heading"> Product Details </p>

   <div class="thumb-payment col-xs-12 col-sm-12 col-md-3 col-lg-3">   
            <img src="<?php echo base_url('uploads/products/'.$details->productImage ) ;?>" alt="194x228"> 
           </div>    
  <div class="thumb-payment col-xs-12 col-sm-12 col-md-9 col-lg-9">          
  <h4> <a target="_blank" href="<?php echo base_url(); ?>view/<?php echo $this->encrypt->encode( $product_id ); ?>/ <?php echo $details->ProductName ; ?>"> <?php echo $details->ProductName ; ?> </a> </h4>
  <label > 
  
  <?php 
  echo $this->config->item('currency');
 ?> 
 <?php echo $details->SalePrice ; ?> </label>
 <br />
</label > Quantity :  <?php echo $qty; ?> 
   <!-- <p >  <label class="product_category"> <?php echo $details->ProductCategory ; ?></label> </p> -->
   <!-- <p >  <label class=""> Quantity </label>  -->
  <!-- <select class="product_quanity">
<option value="1">1</option>
<?php for($cn=2; $cn<= $details->Available_qty ; $cn++){ ?>
  <option  value="<?php echo $cn ; ?>"><?php echo $cn ; ?></option>
<?php } ?>
  </select> -->

  <p class="product_text"> <?php echo substr($details->description,0,300) ; ?>...    </p>
  </div> 
  </div> 
 
   </div>
  
 <?php $this->load->view('include/front/footer');?>
