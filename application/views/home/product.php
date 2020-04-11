

 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/front/header');?>
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
 