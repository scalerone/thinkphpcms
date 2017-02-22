<?php  
	namespace Admin\Model;
	use Think\Model;

	class AdminModel extends Model {

		public function check(){
			//验证码
			$code = I('post.code');
			$verify = new \Think\Verify();
			$data = array();
			if(!$verify -> check($code)){
				$data['status'] = 1;
				$data['msg'] = "验证码错误!";
				return $data;
			}
			//用户名或密码不正确
			$where = array(
				'username' => I('post.username'),
				'password' => I('post.password','',md5)
			);
			
			$user = $this -> where($where)->find();
			if($user){
				if($user['status'] == 0){
					$data['status'] = 2;
					$data['msg'] = "用户被禁止登录!";
					return $data;
				}else{
					$data['status'] = 0;
					$data['msg'] = "登入成功!";
					$data['user'] = $user;
					//更新用户信息
					$user['lastlogintime'] = time();
					$user['lastloginip'] = get_client_ip();
					$this -> save($user);
					return $data;
				}
			}else{
				$data['status'] = 3;
				$data['msg'] = "用户名或密码不正确!";
				return $data;
			}
		}
	}
?>