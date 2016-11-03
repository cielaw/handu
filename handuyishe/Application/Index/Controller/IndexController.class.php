<?php
//首页控制器类
class IndexController extends Controller{
    //动作方法
    public function index(){
    	//获得顶级分类
			$topCate = K('Category')->where('fid=0')->all();
			$this->assign('topCate',$topCate);
			//品牌
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
			//二级菜单
			$cate = M()->join('__category__ c JOIN __goods__ g ON c.cid=g.cid JOIN __brand__ b ON b.bid=g.bid ')->where('g.is_index=1')->all();
			$secondView = array();
			foreach($topCate as $k=>$v){
				$second = K('Category')->where("fid={$v['cid']}")->all(); 
				$secondView[$k] = array(
					'cateTopName'=>$v['cname'],
					'cateTopId'=>$v['cid'],
					'second'=>$second,
					'brand'=>$Brand
				);
			}
			$this->assign('secondView',$secondView);
			//新品上市
			$newGoods = K('Goods')->where("is_index=1")->order('shelvestime DESC')->all();
			$newShelves = array();
			foreach($newGoods as $k=>$v){
				$newShelves[$v['bid']][] = $v;
			}
			$this->assign('newShelves',$newShelves);
			
			//品牌下的分类和商品
			$goods = K('Goods')->where("is_index=1")->all();
			$goodsBrand = array();
			foreach($goods as $k=>$v){
				$goodsBrand[$v['bid']]['goods'][] = $v;
			}
			
			foreach($goodsBrand as $k=>$v){
				$cate = M()->join('__category__ c JOIN __goods__ g ON c.cid=g.cid JOIN __brand__ b ON b.bid=g.bid ')->where("b.bid={$k}")->all();
				$cid = 'cid';
				//$this->assoc_unique(&$cate,$cid);
				$goodsBrand[$k]['cate'] = $cate;
			}
			$goodHstyleRank = K('Goods')->where("is_index=1 AND bid=19")->order('pur_num desc')->all();
			$goodsBrand[19]['goodHstyleRank'] = $goodHstyleRank;
			$this->assign('goodsBrand',$goodsBrand);
			$this->display('handu');	
			
			
  	  	}
	//去重
	private function assoc_unique($arr, $key){
		$rAr=array();
		for($i=0;$i<count($arr);$i++){
			if(!isset($rAr[$arr[$i][$key]]) ){
				$rAr[$arr[$i][$key]]=$arr[$i];
			}
		}
		$arr=array_values($rAr);
	}
	//得到子类
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
	//发送ajax确定购物车中的商品
	public function ajaxGetCart(){
		if(IS_AJAX){
			$num = Q('post.num',0,'intval');
			if($num == 1){
				if(isset($_SESSION['cart'])){
					$cart = $_SESSION['cart'];
					foreach($cart['goods'] as $k=>$v){
						$cart['goods'][$k]['name'] = mb_substr($v['name'], 0,15,'utf-8');
					
					}
					echo json_encode($cart);
					die;
				}else{
					return false;
				}
				
			}
		}
	}
	
}
