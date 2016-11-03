<?php
	/**
	 * 详细购买页面
	 */
	class DetailsController extends  Controller{
		public function index(){
			//获得顶级分类
			$topCate = K('Category')->where('fid=0')->all();
			$this->assign('topCate',$topCate);
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
			$catenv = K('Category')->where("fid=44")->all();
			$this->assign('catenv',$catenv);
			$gid = Q('get.gid',0,'intval');
			$info = M()->join('__goods__ g  JOIN __goodsdetail__ gdl ON g.gid=gdl.gid')->where("g.gid={$gid}")->find();
			$spec = M()->join('__typeattr__ t JOIN __goodattr__ ga ON ga.attr_id=t.aid')->where("goods_id={$gid} AND atype=1")->all();
			$temp = array();
			foreach($spec as $v){
				$id = $v['aid'];
				$temp[$id][]=$v;
			}
			$shop_pic = unserialize($info['shoppic']);
			$info['shoppic'] = $shop_pic;
			foreach($shop_pic as $v){
				$style = strstr($v, '.');
				$shop_pics = str_replace($style, '_small'.$style,$v);
				$info['shop_pic_s'][] = $shop_pics;
				
			}
			$info['viewpic'] = unserialize($info['viewpic']);
			
			foreach($shop_pic as $k=>$v){
				$style = strstr($v, '.');
				$shop_pics_m = str_replace($style, '_mid'.$style,$v);
				$shop_pics_b = str_replace($style, '_big'.$style,$v);
				$info['shop_pic'][$k][] = $shop_pics_m;
				$info['shop_pic'][$k][] = $shop_pics_b;
				
			}
			
			$discount = round($info['shopprice']/$info['marketprice']*10,1);
			$info['discount'] = $discount;
			$this->assign('info',$info);
			//规格
			$spec = M()->join('__goodattr__ g JOIN __typeattr__ t ON g.attr_id =t.aid')->where("goods_id={$gid} and atype=1")->order('t.aid ASC')->all();
			$shuai = array();
			foreach($spec as $k =>$v){
				$shuai[$v['attr_id']][] =$v;
			}
			
			$specs = array();
			foreach($shuai as $k =>$v){
				$kuai = K('TypeAttr')->where("aid={$k}")->getField('aname');
				$specs[] = array(
					'specName'=>$kuai,
					'specValue'=>$v
				);
			} 
			$this->assign('specs',$specs);
			//属性
			$attr = M()->join('__goodattr__ g JOIN __typeattr__ t ON g.attr_id =t.aid')->where("goods_id={$gid} and atype=0")->all();
			$this->assign('attr',$attr);
			
			//面包屑导航
			$cateDate = K('Category')->all();
			$cid = K('Goods')->where("gid={$gid}")->getField('cid');
			$fid = K('Category')->where("cid = {$cid}")->getField('fid');
			$cate = K('Category')->where("cid = {$cid}")->all();
			$fatherCate = $this->_getFather($cateDate,$fid);
			$temp = $cate;
			foreach($fatherCate as $v){
				$cate[] = $v; 
			}
			
			$cate = Data::tree($cate,'cname','cid','fid');
			$this->assign('cate',$cate);
			//新品上市
			$newGoods = K('Goods')->where("is_index=1")->order('shelvestime DESC')->limit(5)->all();
			$this->assign('newGoods',$newGoods);
			$this->display('details');
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
		public function goodsCount(){
			$combine = Q('post.combine');
			$gid = Q('post.gid');
			$combine = rtrim($combine,',');
			$goodList = K('GoodsList')->where("gid={$gid} AND combine='{$combine}'")->find();
			if(!$goodList){
				$goodList['stock'] = 0;
				$goodList['artno'] = '无此货品';
			}
			$combine = explode(',', $combine);
			$price = intval(K('Goods')->where("gid={$gid}")->getField('shopprice'));
			foreach($combine as $v){
				$addvalue = intval(K('GoodsAttr')->WHERE("gaid={$v}")->getField('gaaddvalue'));
				$price +=$addvalue;
			}
			$goodList['price'] = $price;
			echo json_encode($goodList);
			die;
		}
	}
	