<?php
/**
 * 用户模型
 */
class UserModel extends Model{
	//指定表名
	public $table = 'user';
	//指定验证规则
	public $validate = array(
		array('email','nonull','邮箱不能为空',1,3),
		array('email','email','填写必须为邮箱',1,3),
		array('password','nonull','密码不能为空',1,3),
		array('rePassword','nonull','请填确认密码',1,3),
		array('rePassword','confirm:password','两次密码不一致',1,1),
		array('verify','verify','验证码不正确',1,3),
		array('agree','nonull','请确认用户协议后提交',1,3),
		array('oldPassword','nonull','邮箱不能为空',1,3),
	);
	/**
	 * 验证验证码自定义方法
	 */
	public function verify($name, $value, $msg, $arg){
		$value = strtoupper($value);
		if($value != $_SESSION['code']){
			return $msg;
		} 
		return true;	
	}
	//前台注册
	public function register(){
		if(!$this->create()) return false;
		$email = Q('post.email');
		//验证邮箱是否被注册
		if($this->where("email='{$email}'")->find()){
			$this->error = '邮箱已被注册';
			return false;
		}
		$password = md5($_POST['password']);
		$data = array(
			'email'=>$email,
			'password'=>$password
		);
		if($this->add($data)){
			return true;
		}
	}
	//前台登陆
	public function login(){
		if(!$this->create()) return false;
		$email = Q('post.email');
		$password = md5(Q('post.password'));
		$result = $this->where("email='{$email}'")->find();
		if($result['is_lock'] == 1){
			$this->error = '你已被锁定';
			return false;
		}
		if(!$result || $result['password'] != $password){
			$this->error = '邮箱或密码错误';
			return false;
		}
		$_SESSION['email'] = $email;
		$_SESSION['uid'] = $result['uid'];
		return true;
	}
	//后台登陆
	public function aLogin(){
		if(!$this->create()) return false;
		$email = Q('post.email');
		$password = md5(Q('post.password'));
		$result = $this->where("email='{$email}'")->find();
		if(!$result){
			$this->error = '用户不存在';
		}
		if(!$result['is_admin']){
			$this->error = '不是后台用户';
			return false;
		}
		if($result['password'] != $password){
			$this->error = '密码错误';
			return false;
		}
		$_SESSION['aemail'] =$email;
		$_SESSION['aid'] = $result['uid'];
		return true;
	}
	//会员中心修改密码
	public function modifyPassword(){
		if(!$this->create()) return false;
		$uid = Q('session.uid');
		$oldPassword = md5(Q('post.oldPassword'));
		$password = $this->where("uid={$uid}")->getField('password');
		if($oldPassword != $password){
			$this->error ='输入正确的原密码';
			return false;
		}
		$data = array(
			'uid'=>$uid,
			'password'=>md5(Q('post.password'))
		);
		
		$this->save($data);
		return true;		
				
	}
	//修改个人资料
	public function profile(){
		if(!$this->create()) return false;
		$this->data['birthday']=Q('post.year').'-'.Q('post.month').'-'.Q('post.month');
		$this->save();
	}
	
}
