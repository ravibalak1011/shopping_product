<?php 
	class user_model extends CI_model{
		public function productData(){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			if ($query) {
				return $query->result_array();
			}else{
				return false;
			}
		}

		public function insertProduct($postdata){
			// echo "<pre>";print_r($postdata);die;
			$insertArray['product_name'] = $postdata['product_name'];
			$insertArray['product_price'] = $postdata['product_price'];
			$insertArray['product_desccription'] = $postdata['product_desccription'];
			if (isset($postdata['product_images'])) {
				$insertArray['product_image'] = $postdata['product_images']; 
			}
			$insertArray['added_date'] = date('Y-m-d H:i:s');
			
			// echo "<pre>";print($insertArray);die();
			$this->db->insert('products',$insertArray);
		}

		public function edit_product($id){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('id',$id);
			$query = $this->db->get();
			if ($query) {
				return $query->row_array();
			}else{
				return false;
			}	
		}

		public function update_product($postdata){
			// echo "<pre>";print_r($postdata);die();
			$updateArray['product_name'] = $postdata['product_name'];
			$updateArray['product_price'] = $postdata['product_price']; 
			$updateArray['product_desccription'] = $postdata['product_desccription'];
			if (isset($postdata['product_images'])) {
				$updateArray['product_image'] = $postdata['product_images']; 
			}
			$updateArray['updated_date'] = date('Y-m-d H:i:s');
			
			$this->db->where('id',$postdata['id']);
			$this->db->update('products',$updateArray);
		}

		public function rowFieldUpdate($postdata){
			// echo "<pre>";print_r($postdata);die();
			$updateArray = array(
						'product_image' => $postdata['getRowImage']
					);
			$this->db->where('id',$postdata['id']);
			$this->db->update('products',$updateArray);
		} 

		public function deleteData($id){
			$this->db->where('id',$id);
			$this->db->delete('products');
			

		}
		public function selectDataForImages($postdata){
			$this->db->select('id,product_image');
			$this->db->from('products');
			$this->db->where('id',$postdata['id']);
			$query = $this->db->get();
			if ($query) {
				return $query->row_array();
			}else{
				return false;
			}	
		}
	}
 ?>