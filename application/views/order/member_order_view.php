 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/header');?>
 <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('public');?>/components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style>
.imgcls {
    height: 70px;
    width: 120px;
}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('include/topbar');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('include/sidebar');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User's Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('v3/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?=$this->uri->segment(2).'/'.$this->uri->segment(3);?></li>
      </ol>
    </section>
    <!-- Main content -->
     	<section class="content">
        <div class="row">
          <div class="col-xs-12 po-class">
             <!-- <input type="text" value=""> -->
              <div class="box">
               <div class="box-header">
                 <p>Generate PO Code for New order.User will recieve a Code that will  be used for new order placement.</p>
                 <input type="hidden" value="<?php echo $user_id; ?>" id="user_id"/>
                 <input onclick="generatePO()"  class="btn btn-sm btn-primary" type="button" value="Generate PO Code" >
               </div>
                  </div>
                </div>
        </div>
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body" id="element_overlapT">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order No.</th>
                  <th>Product Name/ID</th>
                  <th>Member Name</th>
                  <th>QTY</th>
                  <th>Unit Price</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                   <th>Order No.</th>
                  <th>Product Name/ID</th>
                  <th>Member Name</th>
                   <th>QTY</th>
                  <th>Unit Price</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order-Deatils</h4>
        </div>
        <div class="modal-body">

                <div id="tableData">
                    <div class="progress">
                     <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            Please wait.....
                        </div>
                      </div>
                </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="document_name">document name</h4>
        </div>
        <div class="modal-body">
                 <div id="tableDataDocument">
                    <div class="progress">
                     <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            Please wait..... loading doucment
                        </div>
                      </div>
                </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

<?php $this->load->view('include/footer');?>

<script src="<?=base_url('public');?>/loadingoverlap/loadingoverlay.min.js"></script>
<script src="<?=base_url('public');?>/loadingoverlap/loadingoverlay_progress.min.js"></script>

<script src="<?=base_url('public');?>/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('public');?>/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  function pocode_string(user_id){
    var numbers = "0123456789";
    var chars = "acdefhiklmnoqrstuvwxyz";
    var string_length = 3;
    var randomstring = '';
    var randomstring2 = '';
    for (var x = 0; x < string_length; x++) {
     var letterOrNumber = Math.floor(Math.random() * 2);
     var rnum = Math.floor(Math.random() * chars.length);
     randomstring += chars.substring(rnum, rnum + 1);
    }
    for (var y = 0; y < string_length; y++) {
     var letterOrNumber2 = Math.floor(Math.random() * 2);
     var rnum2 = Math.floor(Math.random() * numbers.length);
     randomstring2 += numbers.substring(rnum2, rnum2 + 1);
    }
    var code = ( user_id+randomstring + randomstring2).substring(0, 6);
    return code;
  }
   function generatePO(){
      var conf;
      var r = confirm("This will generate PO code for User.Click OK to proceed");
      var po_code =pocode_string(user_id);
      var user_id =$('#user_id').val();
      var dataJson = {
          user_id : user_id ,
          po_code : po_code ,
        };
      if (r == true) {
        $.ajax("<?=base_url('member-post-po')?>",
            {
                dataType: 'json', // type of response data
                timeout: 500,     // timeout milliseconds
                data:dataJson ,
                success: function (data,status,xhr) {   // success callback function

                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback

                }
            });

      } else {
       return false ;
      }
  }
  $(function () {
     $('#example1').DataTable({
	 					"processing": true,
						"serverSide": true,
						"ajax":{
							url :"<?=base_url('order-grid-data')?>",
							type: "post",
              data: {user_id:<?php echo $user_id ?>},
							headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
							error: function(){
								$(".contacts-grid-error").html("");
								$("#contacts-grid").append('<tbody class="contacts-grid-error"><tr><th align="center" colspan="5">No data found in the server</th></tr></tbody>');
								$("#contacts-grid_processing").css("display","none");
							}
						},
	 });
  });

 function view(id){
	$('#myModal').modal({ backdrop: 'static' });

			$.ajax({
					headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
  					url: '<?=base_url('fleet-details?id=');?>'+id,
							success:function(data)
							{
 								if(data.code == 400)
								{
 									$('#tableData').html(data.error);
 								}else{
									$('#tableData').html(data);
								}
 					  },
					  error: function (jqXHR, status, err) {
						  $('#tableData').html("Local error callback. Please try again !");
 					  }

					});
}
function ViewDoc(fleet_Id,document_name,documentUrl){
	//alert(document_name+fleet_Id+documentUrl);

	$('#document_name').html(document_name);
	$('#myModal2').modal({ backdrop: 'static' });
	if(documentUrl != ''){
		$.ajax({ headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
				url: '<?=base_url('fleet-view-document?fleet_id=');?>'+fleet_Id+'&doc_type='+document_name,
				success:function(data)
				{
					if(data.code == 400)
					{
						$('#tableDataDocument').html(data.error);
					}else{
						$('#tableDataDocument').html(data);
					}
				},
				error: function (jqXHR, status, err) {
					$('#tableDataDocument').html("Local error callback. Please try again !");
				}

		});
	}else{
		$('#tableDataDocument').html("<b>No Doucment Uploaded !</b>");
	}
}

function trash(id){
   	$("#element_overlapT").LoadingOverlay("show");
 				$.ajax({
						  dataType : "json",
 						  headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
						  url: '<?=base_url('trash-order?id=')?>'+id,
						  success:function(data)
								{
  									$("#element_overlapT").LoadingOverlay("hide", true);
									if(data.code == 400)
									{
									  alert(data.error);
									}
									if(data.status == 0)
									{
									  alert(data.message);
									}
									if(data.status == 1)
									{
 										alert(data.message);
										 var table = $('#example1').DataTable();
					 						table.ajax.reload(null, false);
 									}
						  },
						  error: function (jqXHR, status, err) {
							  $("#element_overlapT").LoadingOverlay("hide", true);
							  alert('Local error callback');
						  }
 					});
}


</script>

</body>
</html>
