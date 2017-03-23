<?php  
	namespace Home\Controller;
	use Think\Controller;

	class UserController extends Controller {
		public function index() {
			$this -> display('Template:login');
		}

		public function login() {
			//验证码
			if(IS_POST){
				$code = I('post.verify');
				$verify = new \Think\Verify();
				if(!$verify->check($code)){
					$this -> ajaxReturn(array('status'=>0,'msg'=>'验证码不正确!'));
					die;
				}
				$model = M('Member');
				$where = array(
						'name' => I('name'),
						'pass' => I('pass','',md5),
					);
				//用户名密码验证
				$result = $model ->where($where)-> find();
				if($result){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'登陆成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'用户名或者密码不正确!'));
				}
			}
		}

		public function register() {
			
		}


		//验证码
		public function verify() {
			$config = array(
				'useImgBg'  =>  false,           // 使用背景图片 
		        'fontSize'  =>  25,              // 验证码字体大小(px)
		        'useCurve'  =>  false,            // 是否画混淆曲线
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