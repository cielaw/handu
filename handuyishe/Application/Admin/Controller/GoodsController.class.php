<?php
/**
 * 商品控制器
 */
 class GoodsController extends AuthController{
 	private $model;
	public function __auto(){
		$this->model=K('Goods');
	}
 	public function goods(){
 		$result = $this->model->all();
		$this->assign('result',$result);
 		$this->display();
 	}
	public function add(){
		if(IS_POST){
			if(!$this->model->addGoods()) p(($this->model->error));
			
			$this->success('添加成功');
		}
		$cate = K('Category')->all();
		$cate = Data::tree($cate,'cname','cid','fid') ;
		$brand = K('Brand')->all();
		$this->assign('brand',$brand);
		$this->assign('cate',$cate);
		$this->display();
	}
	public function getTypeAttr(){
		if(!IS_AJAX) return ;
		$cid = Q('post.cid',0,'intval');
		$data = M()->join('__category__ c JOIN __typeattr__ t ON c.type_id=t.type_id')->where("cid='$cid'")->all();
		foreach($data as $k=> $v){
			$data[$k]['avalue']=explode(',', $v['avalue']);
		}
		echo json_encode($data);
		die;
		
	}
	/**
	 * 列表图上传
	 */
	 public function uploadList(){
	    $upload = new Upload('Upload/listPic/' . date('y/m'));
	    $file = $upload->upload();
	    if (empty($file)) {
	        $this->ajax('上传失败');
	    } else {
	        $data = $file[0];
	        $this->ajax($data);
	    }
			
	}
	 /**
	  * 首页图片上传
	  */
	 public function uploadIndex(){
	    $upload = new Upload('Upload/indexPic/' . date('y/m'));
	    $file = $upload->upload();
	    if (empty($file)) {
	        $this->ajax('上传失败');
	    } else {
	        $data = $file[0];
	        $this->ajax($data);
	    }
			
	}
	 
	 /**
	  * 图集上传
	  */
	 public function pic(){
	    $upload = new Upload('Upload/picThree/' . date('y/m'));
	    $file = $upload->upload();
	    if (empty($file)) {
	        $this->ajax('上传失败');
	    } else {
	      //上传成功
	        $style = strchr($file[0]['path'], '.');
			//缩略
			$img = new Image();
			$smallPath = str_replace($style, '_small'.$style, $file[0]['path']);
			$small = $img->thumb($file[0]['path'],$smallPath,280,280,2);
			$midPath = str_replace($style, '_mid'.$style, $file[0]['path']);
			$mid = $img->thumb($file[0]['path'],$midPath,480,480,2);
			$bigPath = str_replace($style, '_big'.$style, $file[0]['path']);
			$big = $img->thumb($file[0]['path'],$bigPath,800,800,2);
			$data = $file[0];
	        $this->ajax($data);
	        }
	    }
	 /**
	  * 删除
	  */
	  public function delete(){
		$gid = Q('get.gid',0,'intval');
		$this->delListImg($gid);
		$this->delImgs($gid);
		$this->model->where("gid='$gid'")->del();
		$modelDetail = K('GoodsDetail');
		$modelDetail->where("gid='$gid'")->del();
		$modelGoodsAttr =K('GoodsAttr')->where("goods_id='$gid'")->del();
		$this->success('删除成功',U('goods'));
	  }
	  /**
	   * 删除列表图
	   */
	  public function delListImg($gid){
	  	$picPath = $this->model->field('listpic')->where("gid='$gid'")->find();
		if(is_file($picPath['listpic'])){
			unlink($picPath['listpic']);
		}
	  }
	  /**
	   * 删除图集
	   */
	  public function delImgs($gid){
	  	$originalImg = K('GoodsDetail')->field('shoppic')->where("gid='$gid'")->find();
		$originalImg = unserialize($originalImg['shoppic']);
		foreach($originalImg as $originalPath){
			$style = strstr($originalPath, '.');
			$originalPathSmall = str_replace($style, '_small'.$style, $originalPath);
			$originalPathMid = str_replace($style, '_mid'.$style, $originalPath);
			$originalPathBig = str_replace($style, '_big'.$style, $originalPath);
			if(is_file($originalPath)){
				unlink($originalPath);
			}
			if(is_file($originalPathSmall)){
				unlink($originalPathSmall);
			}
			if(is_file($originalPathMid)){
				unlink($originalPathMid);
			}
			if(is_file($originalPathBig)){
				unlink($originalPathBig);
			}
		}
	  }
	  /**
	   * 货品列表
	   */
	  public function goodsList(){
	  	if(IS_POST){
	  		$modelList = K('GoodsList');
			if(!$modelList->addList()) $this->error($modelList->error);
			$this->success('添加成功');
	  	}
	  	$model = K('GoodsAttr');
	  	$gid = Q('get.gid',0,'intval');
		$tid = Q('get.tid',0,'intval');
		
		//商品规格
		$spec = K('TypeAttr')->field('aid,aname')->where( "type_id='$tid' and atype=1")->select();
		//规格选择
		$db = K('GoodsAttr');
		foreach ($spec as $k => $v)
		{
			$aid = $v['aid'];
			$spec[$k]['opt'] = $db->field('gavalue,gaid')->where("attr_id='$aid' AND goods_id='{$gid}'")->all();
			
		}
		$this->assign('spec',$spec);
		$goodsList = K('goodsList')->where("gid='{$gid}'")->all();
		foreach($goodsList as $k =>$v){
			$combine = $v['combine'];
			$combine = K('GoodsAttr')->field('gavalue')->where("gaid in ($combine)")->all();
			foreach($combine as $kk=>$vv){
				$goodsList[$k]['unite'][]=$vv;
			}
		}
		$this->assign('goodsList',$goodsList);
	  	$this->display();
	  }
	public function editList(){
		if(IS_POST){
			$modelList = K('GoodsList');
			if(!$modelList->editList()) $this->error($modelList->error);;
			$this->success('编辑成功');
		}
		$glid = Q('get.glid',0,'intval');
		$combine = K('GoodsList')->field('combine')->where("glid='{$glid}'")->find();
		
		$combine = explode(',', $combine['combine']);
		$this->assign('combine',$combine);
		$result = K('goodsList')->where("glid = '{$glid}'")->find();
		$gaids = $result['combine'];
		$results = K('GoodsAttr')->field('attr_id')->where("gaid in($gaids)")->all();
		$temp = array();
		$gav = array();
		foreach($results as $k =>$v){
			$attr_id = $v['attr_id'];
			$aname = K('TypeAttr')->field("aname")->where("aid='{$attr_id}'")->find();
			$temp[] = $aname;
			$gavalue =K('GoodsAttr')->field('gaid,gavalue')->where("attr_id='{$attr_id}'")->all();
			foreach($gavalue as $kk => $vv){
				$gaids = $vv['gaid'];
				$gav[$k]['gavalue'][$gaids] = $vv['gavalue'];
			}	
		}
		$result['combine'] = $gav;
		$result['id'] = $combine;
		$this->assign('temp',$temp);
		$this->assign('result',$result);
		$this->display();
	}
	public function delList(){
		$glid = Q('get.glid',0,'intval');
		if(!K('GoodsList')->where("glid='{$glid}'")->del()) $this->error('删除货品失败');
		$this->error('删除货品成功');
	}
	/**
	 * 商品编辑
	 */
	public function edit(){
		if(IS_POST){
			if(!$this->model->edit())	$this->error($this->model->error);
			$this->success('修改成功');
		}
		$gid = Q('get.gid',0,'intval');
		//读取缓存
		$selected = S('select_'.$gid);
		$this->assign('selected',$selected);
		$cate = K('Category')->all();
		$cate = Data::tree($cate,'cname','cid','fid') ;
		$brand = K('Brand')->all();
		$this->assign('brand',$brand);
		$this->assign('cate',$cate);
		
		$info = M()->join('__goods__ g JOIN __goodsdetail__ gd ON g.gid=gd.gid')->where("g.gid='{$gid}'")->find();
		$shopPic = unserialize($info['shoppic']);
		$viewpic = unserialize($info['viewpic']);
		$info['shoppic']=$shopPic;
		$info['viewpic']=$viewpic;
		$this->assign('info',$info);
		$this->display();
	}
	//异步编辑删图片
	public function delListImgAjax(){
		if(IS_AJAX){
			$path = Q('post.path');
			$gid = Q('post.gid');
			$path = strstr($path,'Upload');
			if(is_file($path)){
				unlink($path);
			}
		}	
	}
	//异步删图集
	public function delImgsAjax(){
		$path = Q('post.path');
		$path = strstr($path,'Upload');
		$style = strstr($path, '.');
			$originalPathSmall = str_replace($style, '_small'.$style, $path);
			$originalPathMid = str_replace($style, '_mid'.$style, $path);
			$originalPathBig = str_replace($style, '_big'.$style, $path);
			if(is_file($path)){
				unlink($path);
			}
			if(is_file($originalPathSmall)){
				unlink($originalPathSmall);
			}
			if(is_file($originalPathMid)){
				unlink($originalPathMid);
			}
			if(is_file($originalPathBig)){
				unlink($originalPathBig);
			}
	}
	//异步删图集
	public function delViewImgsAjax(){
		$path = Q('post.path');
		$path = strstr($path,'Upload');
			if(is_file($path)){
				unlink($path);
			}
	}
	 
 }

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 