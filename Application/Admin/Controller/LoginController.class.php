<?php 
	namespace Admin\Controller;
	use Think\Controller;

	class LoginController extends Controller {
		//登录
		public function index() {
			if(IS_POST){
				$admin = D('Admin');
				$result = $admin ->check();
				//登陆成功
				if($result['status'] == 0){
					session('uid',$result['user']['id']);
					session('uname',$result['user']['username']);
					session('logintime',$result['user']['lastlogintime']);
					session('ip',$result['user']['lastloginip']);
				}
				$this -> ajaxReturn($result);
			}else{
				$this -> display();
			}
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