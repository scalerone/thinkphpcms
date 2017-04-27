<?php  
	namespace Home\Controller;
	use Think\Controller;

	class UserController extends Controller {
		public function index() {
			$this -> redirect('User/login');
		}

		public function login() {
			//验证码
			if(IS_POST){
				$model = M('Member');
				$where = array(
						'name' => I('name'),
						'pass' => I('pass','',md5),
					);
				//用户名密码验证
				$result = $model ->where($where)-> find();
				if($result){
					if($result['status'] == 0){
						$this -> ajaxReturn(array('status'=>0,'msg'=>'用户被禁止登录!'));	
					}else{
						session('member_name',$result['name']);

						$result['lastlogintime'] = time();
						$result['lastloginip'] = get_client_ip();
						$model->save($result);
						
						$this -> ajaxReturn(array('status'=>1,'msg'=>'登陆成功!'));
					}
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'用户名或者密码不正确!'));
				}
			}
		}

		public function register() {
			if(IS_POST){
				$model = M('Member');
				$msg = array('status'=>0,'msg'=>'注册失败!');
				$code = I('code');
				$verify = new \Think\Verify();
				if(!$verify->check($code)){
					$msg = array('status'=>0,'msg'=>'验证码输入错误!');
					$this -> ajaxReturn($msg);
					die;
				}
				$data = array();
				//注册
				//验证用户名
				if(($this -> preg_check('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',I('telphone')) || $this -> preg_check('/^[1][3|5|8|7][0-9]{9}$/',I('telphone')))){

					if($model->where(array('name'=>I('telphone')))->select()){
						$msg = array('status'=>0,'msg'=>'用户名已经被注册!');
						$this -> ajaxReturn($msg);
						die;
					}

					if($this -> preg_check('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',I('telphone'))){
						$data['email'] = I('telphone');
					}
					if($this -> preg_check('/^[1][3|5|8|7][0-9]{9}$/',I('telphone'))){
						$data['phone'] = I('telphone');
					}
					$data['name'] = I('telphone');

				}else{
					$msg = array('status'=>0,'msg'=>'用户名格式不正确!');
					$this -> ajaxReturn($msg);
					die;
				}
				
				//验证密码
				$len = strlen(I('pass'));
				if($len < 6){
					$msg = array('status'=>0,'msg'=>'密码长度必须大于6位数!');
					$this -> ajaxReturn($msg);
					die;
				}else{
					$data['pass'] = I('pass','','md5');
				}
				$data['registertime'] = time();
				$user = $model ->add($data);
				if($user){
					//加入session
					$msg = array('status'=>1,'msg'=>'注册成功!');
				}
				$this -> ajaxReturn($msg);
			}
		}

		//退出登录
		public function logout(){
			if(session('member_name')){
				session('member_name',null);
				$this->success('退出成功!',U('Home/index'));
			}else{
				$this -> redirect('Home/index');
			}
			
		}
		//正则验证码
		private function preg_check($pattern,$str)
		{
		    return preg_match($pattern,$str)?true:false;
		}

		//验证码
		public function verify() {
			$config = array(
				'useImgBg'  =>  false,           // 使用背景图片 
		        'fontSize'  =>  25,              // 验证码字体大小(px)
		        'useCurve'  =>  true,            // 是否画混淆曲线
		        'useNoise'  =>  false,            // 是否添加杂点	
		        'imageH'    =>  0,               // 验证码图片高度
		        'imageW'    =>  0,               // 验证码图片宽度
		        'length'    =>  4,               // 验证码位数
		        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
		        'bg'        =>  array(243, 251, 254),  // 背景颜色
			);
			$verify = new \Think\Verify($config);
			$verify -> entry();
		}

	}
?>