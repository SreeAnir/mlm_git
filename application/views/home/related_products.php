

 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <h3 class="alert alert-info"> More Recommendations </h3>
<div  id="wrapper-related">
</div>

<script type="text/javascript">
var product_id ='<?=$product_id;?>' ;
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
      dataSend={from:from,type:'related',id:product_id  };
      $('#wrapper-related').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
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
                  $('#wrapper-related').html(data.error);  
                }else{
                  $('#wrapper-related').html(data);
                }
            },
            error: function (jqXHR, status, err) {
              $('#tableData').html("Local error callback. Please try again !");
            }
        
          });
   }
</script>
 