<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class AdminController extends CommonController {
		public function index() {
			$this -> display();
		}

		public function edit() {
			if(IS_POST){
				$admin = M('Admin');
				$data['password'] = I('post.password','',md5);
				$result = $admin->where(array('id'=>I('id')))->save($data); 
				$msg = array('status'=>'1','msg'=>'修改成功!');
				if($result == false){
					$msg['status'] = "0";
					$msg['msg'] = "修改失败!";
				}
				$this -> ajaxReturn($msg);
			}else{
				$this -> admin = M('Admin')->field('username,id') ->where(array('id'=>I('get.id'))) -> find();
				$this -> display();
			}
		}

		public function add() {
			$this -> display();
		}

		public function del() {

		}
	}
?>