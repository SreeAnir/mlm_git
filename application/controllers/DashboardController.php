<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
 	public function __construct()
        {
                parent::__construct();
				$this->load->model(['OrderModel','MemberModel']);
                $this->SessionModel->not_logged_in();
        }

	public function Month(){

	}

	public function index()
	{

		if($this->session->userdata['Admin']['role'] == 'Admin'){
			 $sum =0;
			 $this->db->select('SUM(profit) AS profit_amount', FALSE);
			 $this->db->where('clear_status <>',1);
			 $query = $this->db->get('profit_share');

			$data['orders']=$this->db->count_all_results('orders');
			$data['members']=$this->OveModel->TotalMembers();
			$data['products']=$this->db->count_all_results('products');
			$data['profit_share_pending']=$query->row()->profit_amount;

			$sales = $this->OrderModel->MonthWiseSale();

			/*echo date('F',strtotime('2018-02'));
			echo date('m',strtotime('February'));

					echo '<pre>';
			print_r($sales); die;*/

 			$this->parser->parse('dashboard/dashboard_template',$data);


		}else{
			$id=$this->session->userdata['Admin']['id'];



			$data['members']=$this->Parent();

			$this->parser->parse('dashboard/dashboard_customer_template',$data);
		}

	 }


	public function profit_share_update(){
		$data =$_REQUEST ;
		$this->db->where('id', $data['id']);
		$update = $this->db->update('profit_share', array("clear_status" => $data['clear_status']));
		$msg="Failed to Update";
		$err=1;
		if($update){
		$msg="Updated the status" ;
		$err=0;
		}
		$json_data = array(

			"id"  => $data['id'],
			"status" => $data['clear_status'] , // total number of records after searching,
			"message"            => $msg   ,  // total data array
			"error"            => $err   // total data array
			);

 	   echo json_encode($json_data);
	}
  /* Function to save the PO COde for new order  */
	public function member_post_po(){
	   $this->OuthModel->CSRFVerify();
     $data = $_REQUEST ;
     $res = $this->OrderModel->insertPOForUser( $data );


  }
	public function pocode_grid_data(){

		$this->OuthModel->CSRFVerify();

		$requestData = $_REQUEST;

  		$table = "pocode";

		$fields = "*";

 		$id = '';

		$where = " ";

 		$sql = "SELECT ".$fields;

		$sql.=" FROM ".$table. $where;

 		//echo $sql;

 		$query = $this->db->query($sql);

		$queryqResults = $query->result();

 		$totalData = $query->num_rows(); // rules datatable

		$totalFiltered = $totalData; // rules datatable


		$where = " ";

 		$sql = "SELECT ".$fields;

 		$sql.=" FROM ".$table . $where ;


		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter

			$searchValue = $requestData['search']['value'];

			 $sql.=" WHERE `po_code` LIKE '%".$searchValue."%' ";

 			  $sql.=" OR `user_id` IN ( SELECT id from users Where  name LIKE '%".$searchValue."%' )";

		}


 		$query = $this->db->query($sql);

 		$totalFiltered = $query->num_rows(); // rules datatable

 		//ORDER BY id DESC

 		$sql.=" ORDER BY create_date DESC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

 		$query = $this->db->query($sql);

 		//echo $sql;

 		$SearchResults = $query->result();



  		$data = array();
		  $order_id= '';
		foreach($SearchResults as $row){


			$nestedData=array();

			$id = $row->id;


			 $nestedData[] = '<span class="profildShare_'.$id.'">'.$row->id.'</span>';
			$nestedData[] = '<span class="profildShare_'.$id.'">'.$row->po_code.'</span>';

			$nestedData[] = '<span class="profildShare_'.$id.'">'.$this->UserModel->GetMemberNameById($row->user_id).'</span>';


			$nestedData[] =  $action;

  			$data[] = $nestedData;

		}

 		$json_data = array(

					"draw"            => intval( $requestData['draw'] ),

					"recordsTotal"    => intval( $totalData ),  // total number of records

					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching,

					"data"            => $data   // total data array

					);

 		echo json_encode($json_data);  // send data as json format



	}
	public function profit_share_grid_data(){

		$this->OuthModel->CSRFVerify();

		$requestData = $_REQUEST;

  		$table = "profit_share";

		$fields = "id, order_id, member_id, parent_id, product_id,clear_status,cleared_on,profit,level,profit_percentage ";

 		$id = '';

		$where = " ";

 		$sql = "SELECT ".$fields;

		$sql.=" FROM ".$table. $where;

 		//echo $sql;

 		$query = $this->db->query($sql);

		$queryqResults = $query->result();

 		$totalData = $query->num_rows(); // rules datatable

		$totalFiltered = $totalData; // rules datatable


		$where = " ";

 		$sql = "SELECT ".$fields;

 		$sql.=" FROM ".$table . $where ;


		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter

			$searchValue = $requestData['search']['value'];

			$sql.=" WHERE `order_id` LIKE '%".$searchValue."%' ";

 			$sql.=" OR `product_id` LIKE '%".$searchValue."%' ";

		}


 		$query = $this->db->query($sql);

 		$totalFiltered = $query->num_rows(); // rules datatable

 		//ORDER BY id DESC

 		$sql.=" ORDER BY create_date DESC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

 		$query = $this->db->query($sql);

 		//echo $sql;

 		$SearchResults = $query->result();



  		$data = array();
		  $order_id= '';
		foreach($SearchResults as $row){
			if($order_id!= $row->order_id ){
				$order_id=  $row->order_id ;
			}

			$nestedData=array();

			$id = $row->id;



			$url_id=$this->OuthModel->Encryptor('encrypt',$row->order_id);



			$tableCheckTD = "<label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>";
 			$action =  '<div class="action-buttons"><a target="_blank" href="'.base_url('v3/invoice/print-view?id='.$url_id).'" class="green">
																	<i class="ace-icon fa fa-print bigger-130"></i>
																</a>&nbsp;&nbsp;&nbsp;
 				<a onclick="trash('.$id.')"  class="red trashID" href="javascript:void(0);">
																	<i class="ace-icon fa fa-trash bigger-130"></i>
																</a>
 															</div>';

 			$nestedData[] = '<span class="nameID_'.$id.'">'.$row->order_id.'</span>';

			$nestedData[] = '<span class="profildShare_'.$id.'">'.$row->product_id.'</span>';

			$nestedData[] = '<span class="profildShare_'.$id.'">'.$this->UserModel->GetMemberNameById($row->parent_id).'</span>';

			$nestedData[] = '<span class="profildShare_'.$id.'">'.$row->profit.'</span>';
			$nestedData[] = '<span class="profildShare_'.$id.'">'.$row->profit_percentage.'</span>';
			$status='';
			if( $row->clear_status =='1' ){
				$status='checked="checked"';
			}
			$nestedData[] = '<span class="profileShare_'.$id.'"><input data-attr="'.$id.'" class="profile_share_change" type="checkbox"  '.$status.'></span>';


			$nestedData[] = $row->cleared_on;

			$nestedData[] =  $action;

  			$data[] = $nestedData;

		}

 		$json_data = array(

					"draw"            => intval( $requestData['draw'] ),

					"recordsTotal"    => intval( $totalData ),  // total number of records

					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching,

					"data"            => $data   // total data array

					);

 		echo json_encode($json_data);  // send data as json format



	}

	public function order_po_code(){
		$this->parser->parse('dashboard/order_po_code',[]);
	}
	public function profit_share_list(){
		$this->parser->parse('dashboard/profit_share_list',[]);
	}
	public function Parent(){


			$id=$this->session->userdata['Admin']['id'];


		$member = $this->UserModel->GetUserDataById($id);

 		$getChildMember = $this->MemberModel->GetChildMemberById($id);

 		$arr=[];

		foreach($getChildMember as $row){///level 2
						$NetSaleVolume3=$this->MemberModel->NetSaleVolume($row['id']);
					$arr[] = [
						 'ibo' => $row['name'].' ['.$row['id'].']',
						 'imgUrl' => $this->UserModel->MemberPictureUrl($row['id']),
 						'bv' => $NetSaleVolume3,
 						'children' => $this->Children($row['id']),
 					 ];
		}
		$NetSaleVolume1=$this->MemberModel->NetSaleVolume($id);
		$json = [	'ibo' => $member['name'].' ['.$member['id'].']',
					'imgUrl' => $this->UserModel->MemberPictureUrl($member['id']),
					'bv' => $NetSaleVolume1,
					'children' => $arr
				];
				return ($json['ibo']);

		//return count($json['ibo']);


	}

	public function Children($id){

  		$getChildMember = $this->MemberModel->GetChildMemberById($id);

 		$arr=[];

		foreach($getChildMember as $row){///level 2
						$NetSaleVolume3=$this->MemberModel->NetSaleVolume($row['id']);
					$arr[] = [
						 'ibo' => $row['name'].' ['.$row['id'].']',
						 'imgUrl' => $this->UserModel->MemberPictureUrl($row['id']),
 						'bv' => $NetSaleVolume3,
 						'children' => $this->Children($row['id']),
 					 ];
		}
 		return $arr;
 	}



}
