<?php
	/**
	 * 列表页控制器
	 */
	class ListController extends Controller{
		public function index(){
			//1.获得顶级分类
			$topCate = K('Category')->where('fid=0')->all();
			$this->assign('topCate',$topCate);
			//通过cid获得所有商品gid
			$cid = Q('get.cid');
			$bid = Q('get.bid');
			//如果通过cid和bid组合进入列表页
			if(isset($cid)&&isset($bid)){
				$gids = $this->_bcidGetGid($cid,$bid);
				
			}
			//如果通过bid进入列表页
			if(!isset($cid)&&isset($bid)){
				$gids = K('Goods')->where("bid={$bid} AND is_index=1")->getField('gid',true);
			}
			//如果通过cid进入列表页
			if(isset($cid)&&!isset($bid)){
				$gids = $this->_cidGetGid($cid);
				
			}
			
			//如果有商品
			if(!empty($gids)){
				//2.通过gid找到所有对应的商品属性
				$attr = $this->_getAttr($gids);;
				$this->assign('attr',$attr);
				//3.获得筛选的param数组
				//param参数(数组)，最后拿到这个数组进行筛选
				$param = isset($_GET['param'])?explode('_', $_GET['param']): array_fill(0, count($attr), 0);
                echo '<pre>';
                print_r($param);
                echo '</pre>';
				$this->assign('param',$param);
				//4.通过param里面的id，要筛选交集，获得最终gid
				$finalGids = $this->_filterGid($param,$gids);			
				//商品筛选有gids
				if($finalGids){
					$finalGids = implode(',', $finalGids);
					
					$hotGoods = $goods = K('Goods')->where("gid in({$finalGids})")->order('pur_num DESC')->limit(3)->all();
					//分页类的使用
		    		//1.总数 2.每页显示的文章数 3.显示的页面数量
		    		$total = $goods = K('Goods')->where("gid in({$finalGids})")->count();
		    		$pageObj = new Page($total,10,3);
					//显示分页
					$page = $pageObj->show(2);
					$page2 = $pageObj->show(4);
					$this->assign('page',$page);
					$this->assign('page2',$page2);
					//处理数据
					//判断销量排序
					if(isset($_GET['num'])){
						//销量升序
						if(empty($_GET['num'])){
							$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('pur_num ASC')->all();
						}else{
							//销量降序
							$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('pur_num DESC')->all();
						}
					//判断价格排序
					}elseif(isset($_GET['price'])){
						//判断价格升序
						if(empty($_GET['price'])){
						$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('shopprice ASC')->all();
						}else{
							//判断价格降序
							$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('shopprice DESC')->all();
						}
					}elseif(isset($_GET['shelvestime'])){
						//判断上架时间
						if(empty($_GET['shelvestime'])){
							//上架时间升序
							$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('shelvestime ASC')->all();
						}else{
							//上架时间降序
							$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->order('shelvestime DESC')->all();
						}
					}else{
						$goods = K('Goods')->where("gid in({$finalGids})")->limit($pageObj->limit())->all();
					}
					$this->assign('goods',$goods);
					$this->assign('hotGoods',$hotGoods);
				}else{
					//商品筛选无gids
					$goods = array();
				}
				
				
			}else{
				$goods=array();
			}
			$this->assign('goods',$goods);
			
			
			//左侧toggle分类
			$nv = M()->join('__category__ c JOIN __goods__ g ON c.cid=g.cid JOIN __brand__ b ON b.bid=g.bid ')->all();
			$temp = array();
			
			foreach($nv as $v){
				$temp[$v['bid']][] = $v;
			}
			
			$leftBrand = array();
			foreach($temp as $k=> $v){
				//cid去重
				$this->assoc_unique(&$v,'cid');
				$bname = K('Brand')->where("bid={$k}")->getField('bname');
				$leftBrand[$k] =array(
					'bname'=>$bname,
					'bid'=>$k,
					'bvalue'=>$v
				);
			}
			$this->assign('leftBrand',$leftBrand);
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
			
			//面包屑导航
			if(isset($cid)){
				$cateDate = K('Category')->all();
				$fid = K('Category')->where("cid = {$cid}")->getField('fid');
				$cate = K('Category')->where("cid = {$cid}")->all();
				$fatherCate = $this->_getFather($cateDate,$fid);
				$temp = $cate;
				foreach($fatherCate as $v){
					$cate[] = $v; 
				}
				
				$cate = Data::tree($cate,'cname','cid','fid');
				$this->assign('cate',$cate);
			}
			//取得品牌
			if(isset($bid)&& !isset($cid)){
				$bInfo = K('Brand')->where("bid={$bid}")->find();
				$this->assign('bInfo',$bInfo);
			}
			$this->display('list');
		}
		/**
		 * 找父类
		 */
		private function _getFather($cateDate,$fid){
			$temp = array();
			foreach($cateDate as $v){
				if($v['cid'] == $fid){
					$temp[] = $v;
					$temp = array_merge($temp,$this->_getFather($cateDate, $v['fid']));
				}
			}
			return $temp;
		}
		/**
		 * 去重
		 */
		private function assoc_unique(&$arr, $key){
		$rAr=array();
		for($i=0;$i<count($arr);$i++){
			if(!isset($rAr[$arr[$i][$key]]) ){
				$rAr[$arr[$i][$key]]=$arr[$i];
			}
		}
		$arr=array_values($rAr);
	}
		/**
		 * 通过param，获得商品gids
		 */
		public function _filterGid($param,$gids){
			$temp = array();
			foreach($param as $gaid){
				//如果不是‘不限’时，进行筛选
				if($gaid){
					$temp[] = M()->join('__goodattr__ ga1 JOIN __goodattr__ ga2 ON ga1.gavalue=ga2.gavalue')->where('ga1.gaid='.$gaid)->getField('ga2.goods_id',true);	
				}
			}
			//如果不是全部‘不限’
			if($temp){
				//取交集
				$first = $temp[0];
				foreach($temp as $k=>$v){
					$first = array_intersect($first, $v);
				}
				//因为filterGids有可能不是当前分类，当前分类找到的gids和filterGids交集
				$finalGids = array_intersect($first, $gids);
				return $finalGids;
			}else{
				//全部是‘不限时’
				return $gids;
			}
			
		} 
		/**
		 * 通过gids找到商品属性
		 */
		private function _getAttr($gids){
			
			$gids = implode(',', $gids);
			$attr = K('GoodsAttr')->where("goods_id in($gids)")->group('gavalue')->all();
			$attrFirst = array();
			//把相同的类型归结到一起
			foreach ($attr as $v) {
			$attrFirst[$v['attr_id']][] = $v;
			}
			//获得对应的类型属性名，然后把对应的值也压入
			$attrSecond = array();
			foreach($attrFirst as $attr_id =>$value){
				$name = K('TypeAttr')->where("aid={$attr_id}")->getField('aname');
				$attrSecond[] = array(
					'name'=>$name,
					'value'=>$value
				);
			}
			return $attrSecond;
			
			
		}
		/**
		 * 通过分类的cid获得对应的所有商品的gid
		 */
		 private function _cidGetGid($cid){
		 	//1.根据当前的cid，获得所有的子集cid
		 	$cids = K('Category')->all();
		 	$sonCids = $this->_getSonCid($cids,$cid);
			$sonCids[] = $cid;
			if(!$sonCids){
				return false;
			}
			//根据cid获得所有商品的gid
			$cids = implode(',', $sonCids);
			$gids = K('Goods')->where("cid in($cids) AND is_index=1")->getField('gid',true);
			return $gids;
		 }
		 /**
		 * 通过分类的cid和bid获得对应的所有商品的gid
		 */
		 private function _bcidGetGid($cid,$bid){
		 	//1.根据当前的cid，获得所有的子集cid
		 	$cids = K('Category')->all();
		 	$sonCids = $this->_getSonCid($cids,$cid);
			$sonCids[] = $cid;
			if(!$sonCids){
				return false;
			}
			//根据cid获得所有商品的gid
			$cids = implode(',', $sonCids);
			$gids = K('Goods')->where("cid in($cids) AND bid={$bid} AND is_index=1")->getField('gid',true);
			return $gids;
		 }
		private function _getSonCid($cids,$cid){
			$temp = array();
			foreach ($cids as $cate) {
				if($cate['fid'] == $cid){
					$temp[] = $cate['cid'];
					$temp = array_merge($temp,$this->_getSonCid($cids, $cate['cid']));
				}
			}
			return $temp;
		}
		public function search(){
			if(IS_POST){
				$searchWord = Q('post.words','');
				$goods = K('Goods')->where("gname like '%$searchWord%'")->all();
				$this->assign('goods',$goods);
			}
			//1.获得顶级分类
			$topCate = K('Category')->where('fid=0')->all();
			$this->assign('topCate',$topCate);
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
			$this->display();
		}
		  
	}
	
		
		
	
	