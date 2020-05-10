<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class HomeController extends CI_Controller {

 	public function __construct()

        {

                parent::__construct();

				$this->load->model(['ProductModel','CategoryModel','OrderModel','SettingModel']);

        }


	public function index() 

	{

		// $this->SessionModel->is_logged_in();
		$this->load->view('home/product');

	}
	public function user_order(){
		$order_id_enc = $this->uri->segment(2); 
		$dec = $this->encrypt->decode( $order_id_enc )  ;
		$res = $this->OrderModel->SearchOrderByID($dec);
		$data['order_found'] = 0 ;
		if($res != false){
			$data['order_found'] =1 ;
			$data['order_data'] = $res;

			$data['user_data'] = $this->UserModel->GetUserDataById($res['member_id']);

			$data['product_data'] = $this->ProductModel->GetProductById($res['product_id']);

			$data['tax_data'] = $this->SettingModel->SettingsByID('tax');
			$this->load->view('home/user_order' ,$data);
			}else{
				$this->load->view('home/user_order' , $data);
			}
      
	}
	// $this->parser->parse('product/product_list_template',[]);
	public function view(){
		$product_id = $this->uri->segment(2);
		$product_id = $this->encrypt->decode( $product_id)  ;
		$query = $this->db->select('products.*, COUNT( orders.id) as products_sold')->
		join('orders','products.id =orders.product_id ','Left')->group_by('products.id')->get_where('products', array('products.id' => $product_id) )
		;
		 $data=array();
		 $data['details']=array();
		foreach ($query->result() as $row){	
			$data['details']=$row;		 
		}
		 $breadcrumb         = array(
            "Home" => "home",
            $data['details']->ProductCategory => '' ,
            $data['details']->ProductName => ""
		);
        $data['breadcrumb'] = $breadcrumb;
		 $this->load->view('product/view',$data);
	}
	public function payment_confirmation(){
				$obj=&get_instance();

				$obj->load->model('UserModel');
				$product_id_enc = $this->uri->segment(2);
				$quanity =( $this->uri->segment(3)  ? $this->uri->segment(3) : 1 );
				$product_id = $this->encrypt->decode( $product_id_enc)  ;
				
				$user=$obj->UserModel->GetUserData(); 
				 
				if($user['id']==""){

					$this->load->helper('cookie');
					// $this->encrypt->encode( $details->id);
					$cookie= array(
						'name'   => 'product_in_cart',
						'value'  =>  $product_id_enc  ,
						'expire' => '3600',
					);
					$cookie= array(
						'name'   => 'quanity_in_cart',
						'value'  =>  $productquanity_id_enc  ,
						'expire' => '3600',
					);
					$this->input->set_cookie($cookie);
					
					redirect(base_url()."?session+false&redirect_login_true=payment-confirmation/".$product_id_enc.'/'.$quanity );
				}
			 
				$product_id = $this->uri->segment(2);
				$product_id = $this->encrypt->decode( $product_id)  ;
				$query = $this->db->select('products.*, COUNT( orders.id) as products_sold')->
				join('orders','products.id =orders.product_id ','Left')->group_by('products.id')->get_where('products', array('products.id' => $product_id) )
				;
				 $data=array();
				 $data['details']=array();
				foreach ($query->result() as $row){	
					$data['details']=$row;		 
				}
				//  $breadcrumb         = array(
				// 	"Home" => "home",
				// 	$data['details']->ProductCategory => '' ,
				// 	$data['details']->ProductName => ""
				// );
				// $data['breadcrumb'] = $breadcrumb;
				$data['qty'] = $quanity ;
				 $this->load->view('home/payment_confirmation',$data);		
}	

public function update_user_address(){
			$obj=&get_instance();
			$post = $this->input->post();

			$obj->load->model('UserModel');
			$address = [ 	
				'address' => trim($post['address']),
				'pincode' => trim($post['pincode']),
			];
			$user=$obj->UserModel->GetUserData(); 
			$user_update=$obj->UserModel->UpdateUserData($address,$user['id']); 
		if($user_update == true){
		$response = ['status' => 1 ,'message' => "Address Updated" ];

		}else{

			$response = ['status' => 1 ,'message' => "Failed to Updat" ];
		}

		 echo json_encode($response );
		}


	public function buy_now(){
			$obj=&get_instance();

			$obj->load->model('UserModel');
			$product_id_enc = $this->uri->segment(2);
			$product_id = $this->encrypt->decode( $product_id_enc)  ;
			$quantity =(  $this->uri->segment(3) ?  $this->uri->segment(3) : 1) ;
			//  $profile_url = $obj->UserModel->PictureUrl();
			$user=$obj->UserModel->GetUserData(); 
			$product= $this->OrderModel->GetProductById($product_id);
			if($user['id']==""){

				$this->load->helper('cookie');
				// $this->encrypt->encode( $details->id);
				$cookie= array(
					'name'   => 'product_in_cart',
					'value'  =>  $product_id_enc  ,
					'quantity'  =>  $quantity  ,
					'expire' => '3600',
				);
				$this->input->set_cookie($cookie);
				
				redirect(base_url()."?session+false&redirect_login_true=payment-confirmation/".$product_id_enc.'/'.$quantity );
			}

		// 	$order_data = [ 	

		// 		'order_id' => '0'.$user['id'].time(),

		// 		'member_id' => $user['id'] ,

		// 		'member_name' => $user['first_name'] ,

		// 		'qty' => 1 ,

		// 		'product_id' => $product_id ,

		// 		'is_igst' => 0 ,

		// 		'unit_price' => $product['SalePrice'],
			
		// 		'create_date' => date('Y-m-d H:i:s'),

		// 	];


		// $query = $this->OrderModel->AddOrder($this->OuthModel->xss_clean($order_data));

		// $response='';

		// if($query == true){
		// $param=$order_data['order_id'];
		// $response = ['status' => 1 ,'message' => $order_data['order_id'] ,'order_data' => $order_data];

		// }else{

		// $response = ['status' => 0 ,'message' =>"",'order_data' => $order_data];
		// $param='failed';
		// }
		// $this->session->set_flashdata('order_status', $response);

		redirect(base_url()."payment-confirmation/".$product_id_enc.'/'.$quantity );
	}
	public function product_grid(){
		$from=0;
		$searchData=array();
		if(isset($_REQUEST['from'])){
			$from=$_REQUEST['from'];
		}
		if(isset($_REQUEST['type'])){
			if($_REQUEST['type'] == 'related'){
				$product_id =$_REQUEST['id'] ;
				$category = $this->db->select('ProductCategory')->get_where('products', array('id' => $product_id))->row();
				
				$searchData['ProductCategory'] =$category->ProductCategory;
			} 
			 
		}
		$products=$this->ProductModel->homeList($from,$searchData);

		// $products=$this->ProductModel->homeList($from);
		$data=array();
		$data['products']=$products['products'];
		$data['products_count']=$products['products_count'];
		$data['products_total']=$products['products_total'];
		$data['current_page']=$products['current_page'];
		// $this->SessionModel->is_logged_in();

		$this->load->view('home/product_grid',$data);

	}

}

