<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

  	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Product = 'products';
	
 	
	public function AddProduct($data)
	{  
 		$res = $this->db->insert($this->Product, $data ); 
		if($res == 1)
			return true;
		else
			return false;
 	}
	
	
	public function UpdateProductByID($data,$product_id)
	{  
 
 		$res = $this->db->update($this->Product, $data ,['id' => $product_id ] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}
	public function TrashProductByID($product_id)
	{  
 
 		$res = $this->db->delete($this->Product,['id' => $product_id ] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}
  	public function DropDownProducts()
	{  
 		$this->db->select('*');
		$this->db->from($this->Product);
   		$query = $this->db->get(); 
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
	   }
	   
	public function homeList($from=0,$searchData=array()){  
		$currentPage=$from;
		if($from > 0){
		$from = (20 * ($from-1))+1 ;
		}
		if($currentPage == 0){
			$currentPage=1;
		}
		$this->db->select('*');
		$this->db->from($this->Product);
		$this->db->limit(20 ,$from)->where('Available_qty >',0);
		
		
		$return =array();
		$return['products'] = array();
		$return['products_count'] = 0;
		if(count($searchData) > 0){
			$this->db->where($searchData);
		}
		$query = $this->db->get();
		if ($query) {
			$return['products'] = $query->result_array() ;

			$this->db->select('id');
			if(count($searchData)>0){
				$this->db->where($searchData);
			}
			$count=$this->db->from($this->Product)->where('Available_qty >',0)->count_all_results();
			$return['products_count'] = ceil($count/20);
			$return['products_total'] = $count;
			$return['current_page'] = $currentPage ;
			//   $query->result_array();
		} else {
			$return['products'] =array() ;
			$return['products_count'] = 0;
			$return['current_page'] = 0;
		}
		return $return;
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
