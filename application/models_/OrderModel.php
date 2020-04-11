<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

  	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Order = 'orders';
	private $Member = 'member_log';
	private $ProfitShare = 'profit_share';
	private $Product = 'products';
	private $CompanyUser = 2;
 	
	public function AddOrder($data)
	{  
		 $res = $this->db->insert($this->Order, $data ); 
		 $this->updateProfitForParents($data );
		if($res == 1)
			return true;
		else
			return false;
 	}
	 public function manualOrder(){
		$data=array();
		$data['order_id'] = '03451578720656' ;
		$data['member_id'] = 346 ;
		$data['member_name'] = 'Pintu' ;
		$data['product_id'] = '234260' ;
		$data['qty'] =1 ;
		$data['is_igst'] ='undefined' ;
		$data['unit_price'] =10000 ;
		$this->updateProfitForParents($data );
	 }
	 public AddOrderUser
	 public function getProductProfit($data){
		$product_id =  $data['product_id'] ;
		$qty = $data['qty'];

		$this->db->select('Price,SalePrice');

		$this->db->from($this->Product);

		$this->db->where("id",$product_id);
		$query = $this->db->get(); 

		if ($query->num_rows() > 0) {
			$Price = $query->row()->Price;
			$SalePrice = $query->row()->SalePrice;
			$profit_price = ( $SalePrice - $Price) * $qty ;
			return $profit_price;
		} else {
			return 0;
		}

	 }
	 public function updateProfitForParents($data=array()){
		 
		$member_id = $data['member_id'] ; 
		$find_my_parent= $data['member_id'] ;
		$order_id =   $data['order_id'] ;
		$product_id =  $data['product_id'] ;
		$profit_total = $this->getProductProfit($data); 
		$levels=1  ;
		while( $levels <= 8 ){
			// echo $levels ;
			
			$find_my_parent = $this->getHigherLevel($find_my_parent) ;
			//ProfitShare , insert data 
				if( $find_my_parent == 0 ){
					$find_my_parent= $this->CompanyUser;
				}
				$data_profit = array();
				$data_profit['order_id'] = $order_id ;
				$data_profit['member_id'] = $member_id ;
				$data_profit['parent_id'] = $find_my_parent ;
				
				if($levels==1){
					$profit_percentage=35;
				}
				else if($levels==2){
					$profit_percentage=20;
				}
				else if($levels==3){
					$profit_percentage=15;
				}
				else if($levels==4){
					$profit_percentage=10;
				}
				else {
					$profit_percentage=5;
				}
				$data_profit['profit'] = $profit_total * ($profit_percentage/ 100 )  ;
				$data_profit['level'] = $levels ;
				$data_profit['profit_percentage'] =$profit_percentage;
				$data_profit['product_id'] = $product_id ;
				$update_profie = $this->db->insert($this->ProfitShare, $data_profit );  
				$levels++;

		}
		 
	}
 	public function getHigherLevel($parent_id) 

	{  

 		$this->db->select('parent_id');

		$this->db->from($this->Member);

		$this->db->where("id",$parent_id);

		$query = $this->db->get(); 

 		if ($query->num_rows() > 0) {
			 return $query->row()->parent_id;
		 } else {
			 return 0;
		 }

   	}

	public function UpdateProductByID($data,$product_id)
	{  
 
 		$res = $this->db->update($this->Product, $data ,['id' => $product_id ] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}
	
  	public function SearchOrderByID($order_id)
	{  
 		$this->db->select('*');
		$this->db->from($this->Order);
		$this->db->where("order_id",$order_id);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}
	
	
	public function MonthWiseSale()
	{  
 		$this->db->select('unit_price,create_date');
		$this->db->from($this->Order);
   		$query = $this->db->get();
 		return $query->result_array();
		 
   	}

	
  	public function GetUserData()
	{  
 		$this->db->select('id,mobile_no,address,city,country,vat_number,picture_url,pincode');
		$this->db->from($this->User);
		$this->db->where("id",$this->session->userdata('id'));
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}
	
	public function PictureUrl()
	{  
 		$this->db->select('id,picture_url');
		$this->db->from($this->User);
		$this->db->where("id",$this->session->userdata('id'));
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
		return $res['picture_url'];
   	}
	
	
	
	 public function GetProductById($id) 
	{  
 		$this->db->select('*');
		$this->db->from($this->Product);
		$this->db->where("id",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}

 
 }
