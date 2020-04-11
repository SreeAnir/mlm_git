

 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/front/header');?>
<?php 
  $data_flash = $this->session->flashdata('order_status');
  ?>

<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12">
<?php if(!$order_found   ){ ?>
  <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Oops!!Nothing Found here.</h4>

</div>
  <?php }else{  ?>

<div class="product-success">
<label class="hightlight-heading"> Your Order Status</label>

  <!-- <h4 class="alert-heading">Well done  <?= $order_data['member_name']  ; ?>  !</h4> -->

  <p>Your order has been placed!</p>
  <p >Please contact for further quries with your Order Id : <b> <?= $order_data['order_id'] ; ?> </b></p>
  <p>Order Details </p>
  <!-- <p> <label>  <?= $order_data['qty'] ; ?>  Items(s)</label> </p> -->
    <!-- <p>Price :</p> -->
    <!-- <p>Total Price : <?= ($order_data['unit_price'])*$order_data['qty'] .   $this->config->item('currency'); ?> </p> -->
  <!-- <p>  On <?= $order_data['create_date'] ; ?> </p> -->
    
<table class="table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quanity</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>  <?= $order_data['unit_price'].' '. $this->config->item('currency') ; ?>  </td>
        <td><?= $order_data['qty'] ; ?></td>
      </tr>
    </tbody>
  </table>
  
  </div>

  <?php } ?>
</div>
<br />
<!-- <h3> Buy More</h3> -->
<p ><label class="hightlight-heading2"> Buy More</label></p>

<div  id="product-wrapper">
</div>

<script type="text/javascript">
    $(function () {
      loadpage(0);
   });
   $(document).ready(function() {
    // This WILL work because we are listening on the 'document', 
    // for a click on an element with an ID of #test-element
    $(document).on("click",".pagination li",function() {
      pagenu=$(this).attr('data-attr');
       
      loadpage(pagenu);
    });

     
    });


   function loadpage(from){
    let dataSend=[];
      dataSend={from:from};
      $('#product-wrapper').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
      console.log(dataSend);
    $.ajax({
         type: "POST",
          // headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
          data: dataSend,
          url: '<?=base_url('home/product_grid');?>',
              success:function(data)
              {
                if(data.code == 400)
                {
                  $('#product-wrapper').html(data.error);  
                }else{
                  $('#product-wrapper').html(data);
                }
            },
            error: function (jqXHR, status, err) {
              $('#tableData').html("Local error callback. Please try again !");
            }
        
          });
   }
</script>
<?php $this->load->view('include/front/footer');?>
 