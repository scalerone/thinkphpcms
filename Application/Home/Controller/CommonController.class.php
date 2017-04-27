<?php 
 	namespace Home\Controller;
	use Think\Controller;

	class CommonController extends Controller {
		public function _initialize(){
			
		} 

		//验证登陆
		public function check_login(){
			if(IS_POST){
				//验证用户是否登录
				$member_name = session('member_name'); 
				if( !($member_name && !empty($member_name)) ){
					$this->ajaxReturn(array('status'=>0,'msg'=>'请先登录后再操作！!'));
					die;
				}else{
					$this->ajaxReturn(array('status'=>1,'msg'=>'success!'));
					die;
				}
			}
			
		}

	}

 ?>