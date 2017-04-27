<?php  
 	namespace Admin\Controller;
 	use Admin\Controller;

 	class MemberController extends CommonController {
 		//显示会员列表
 		public function index() {
 			$this -> members = M('Member') -> select();
 			$this -> display();
 		}

 		//添加会员
 		public function add(){
 			if(IS_POST){
 				$msg = array('status'=>0,'msg'=>'未知错误!');
 				//验证码用户名是否存在
 				if($this -> check_name(I('post.name'))){
 					$msg = array('status'=>0,'msg'=>'该用户已经存在，请勿重复添加!');
 				}else{
 					$post = I('post.');
	 				$post['registertime'] = time();
	 				$post['pass'] = I('post.pass','','md5');
	 				$result = M('Member') -> add($post);
	 				if($result){
	 					$msg = array('status'=>1,'msg'=>'添加成功!');
	 				}else{
	 					$msg = array('status'=>0,'msg'=>'添加失败!');
	 				}
 				}

 				$this -> ajaxReturn($msg);
 			}
 		}

 		//验证码用户名是否存在
 		private function check_name($uname){
 			return M('Member')->where(array('name'=>$uname))->find();
 		}

 		//删除会员
 		public function del() {
 			if(IS_POST){

 				$result = M('Member') -> delete(I('post.id'));
 				if($result !== false){
 					$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功！'));
 				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败！'));
 				}
 			}
 		}

 		//修改会员资料
 		public function edit() {
 			if(IS_POST){

 				$post = I('post.');
 				if(!isset($post['status'])){
 					 $post['status'] = 0;
 				}else{
 					 $post['status'] = 1;
 				}
 				if(!empty($post['pass'])){
 					$post['pass'] = I('post.pass','','md5');
 				}else{
 					unset($post['pass']);
 				}
 				$result = M('Member') -> save($post);
 				if($result !== false){
 					$this -> success('修改成功!',U('Member/index'));
 				}else{
 					$this -> error('修改失败!');
 				}
 			}else{
 				$this -> member = M('Member')->find(I('get.id'));
 				$this -> display();	
 			}
 		}

 	}
?>