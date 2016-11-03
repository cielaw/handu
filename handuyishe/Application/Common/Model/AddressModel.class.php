<?php
	/**
	 * 地址模型
	 */
	class AddressModel extends Model{
		public $table = 'address';
		
		//添加地址信息
		public function addAddress(){
			if(!$this->create()) return false;
			$this->data['user_id'] = Q('session.uid');
			$this->add();
		}
		//修改地址
		public function editAddr(){
			if(!$this->create()) return false;
			$this->save();
			return true;
		}
	}
	