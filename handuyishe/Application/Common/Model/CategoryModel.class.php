<?php
	/**
	 * 类型模块
	 */
	 class CategoryModel extends Model{
	 	public $table = 'category';
		public $validate = array(
			array('cname','nonull','分类名不能为空',1,3),
			array('type_id','nonull','类型名不能为空',1,3),
			array('sort','nonull','类型名不能为空',1,3),
			array('fid','nonull','类型名不能为空',1,3)
			
		);
		public function addTopCate(){
			if(!$this->create()) return FALSE;
			$this->add();
			return TRUE;
		}
		public function sortC(){
			$info =	Q('post.');
			foreach($info as $k=>$v){
					$data = array(
						'cid'=>$k,
						'sort'=>$v
					);
					$this->save($data);
				}
			return true;
		}
		public function addSonCate(){
			if(!$this->create()) return false;
			if(IS_POST){
				$this->add();
			}
			return true;
		}
		public function getSons($cid){
			$data = $this->all();
			$cids = $this->getSonCids($data,$cid);
			$cids[] = $cid;
			return $cids;
		}
		public function getSonCids($data,$cid){
			$temp = array();
			foreach ($data as $v){
				if($v['fid'] == $cid){
					$temp[] = $v['cid'];
					$temp = array_merge($temp,$this->getSonCids($data, $v['cid']));
				}
				
			}
			return $temp;
		}
		public function edit(){
			if(!$this->create()) return FALSE;
			$this->save();
			return true;
		}
	 }



















	