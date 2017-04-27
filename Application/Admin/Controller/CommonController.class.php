<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CommonController extends Controller {
		public function _initialize(){
			if(!session('uid')){
				$this -> redirect('Login/index');
			}
			//权限认证
			$auth = new \Think\Auth();
			//不需要权限的rule
			$rule_arr = C('AUTH_NOT_ACTION');
			//当前rule
			$rule = CONTROLLER_NAME .'/'. ACTION_NAME;

			//开始验证权限
			if(in_array($rule,$rule_arr)){
				return true;
			}else{
				if(!$auth->check(CONTROLLER_NAME .'/'. ACTION_NAME,session('uid'))){
		            $this->error('没有权限!');
		       	}
			}
		}
	}
?>