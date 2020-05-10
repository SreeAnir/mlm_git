</div>

<script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
</script>

<footer class="main-footer">

    <div class="pull-right hidden-xs">

      <b>Version</b> 2.4.0

    </div>



     <strong>  Copyright © MLM Pvt. Ltd. 2018 <!--Powered by--></strong>

<!--<a rel="nofollow" href="#" target="_blank">Hiten Pingolia</a>-->





  </footer>





    <!-- Control Sidebar -->

   <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->











  <!-- jQuery 3 -->


<!-- Bootstrap 3.3.7 -->

<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>



<script src="<?=base_url('public')?>/components/PACE/pace.min.js"></script>

<!-- SlimScroll -->

<script src="<?=base_url('public')?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="<?=base_url('public')?>/components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?=base_url('public')?>/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?=base_url('public')?>/dist/js/demo.js"></script>

<script>

  $(document).ready(function () {
    $('.poCodeDivLabel').hide();
    $('#buyNNow').click(function(){
       let quanity_choosen = $('#quanity_choosen').val();
       let link_redirect =  $(this).attr('data-rel')+"/"+quanity_choosen;
       window.location = link_redirect ;
    });
    $('#edit-address').click(function(){
      $('#edit-address,#check-payment').hide();
      $('.save-address-buttons').fadeIn();
      $('#address_textarea,#pincode').removeAttr('readonly');

    });
    $('#save-address-btn').click(function(){
      $('.address_fields').attr('readonly','readonly');
      pincode=  $('#pincode').val();
      address=$('#address_textarea').val();
      if(pincode==""){
        alert("Please enter Pincode");
        return false;
      }
      if(address==""){
        alert("Please enter Address");
        return false;
      }
           $.ajax({
          url:'../update-address',
          method: 'post',
          data: {address: $('#address_textarea').val(),pincode: $('#pincode').val()},
          dataType: 'json',
          success: function(response){
            var len = response.length;
          }
        });

      $('#edit-address,#check-payment').fadeIn();
      $('.save-address-buttons').fadeOut();
    });
    //code to procees with payment
    $('#check-payment').click(function(){
      $('#address_textarea').attr('readonly','readonly');
      $('.poCodeDiv').removeClass('has-error');
      $('.poCodeDivLabel').hide();

      poCode=  $('#poCode').val();

      pincode=  $('#pincode').val();

      address=$('#address_textarea').val();

      product_id= $('#product_id').val();

      user_id= $('#user_id').val();

      user_name= $('#user_name').val();

      qty= $('#qty').val();

      is_igst= $('#is_igst').val();

      unit_price= $('#unit_price').val();

      post_data ={poCode: poCode ,user_name :user_name , product_id : product_id ,address :address ,pincode:pincode,
        is_igst:is_igst, qty: qty , user_id :user_id ,unit_price :unit_price }

      if(poCode==""){
        $('.poCodeDiv').addClass('has-error');
        $('.poCodeDivLabel').show();
       // alert("Please enter PO Code");
        return false;
      }
      if(pincode==""){
        alert("Please enter Pincode");
        return false;
      }
      if(address==""){
        alert("Please enter Address");
        return false;
      }
          $.ajax({
          url:'../../process-payment',
          method: 'post',
          data: post_data,
          dataType: 'json',
          success: function(response){
            var len = response.length;
            console.log("response",response);
            if(response.status == 1){
              alert("Thank you for Purchasing with Us");
              window.location=BASE_URL+"orders-status/"+response.order_id;
            }
            if(response.status == 2){
               alert( response.message );
            }
            if(response.status == 0){
              alert("Failed to Order your Item");
               window.location=BASE_URL+"order_failed/"+response.order_id
            }

          }
        });


      $('.save-address-buttons').fadeOut();
    });
    $('#cancel-address-btn').click(function(){
      $('#address_textarea').attr('readonly','readonly');
      $('#edit-address').fadeIn();
      $('.save-address-buttons').fadeOut();
    });


    $('.sidebar-menu').tree()

  })

  $(document).ajaxStart(function () {

    Pace.restart();

  });

</script>

</body></html>
