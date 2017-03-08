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
 				$post = I('post.');
 				$post['registertime'] = time();
 				$result = M('Member') -> add($post);
 				if($result){
 					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加成功!'));
 				}else{
 					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加失败!'));
 				}
 			}
 		}

 		//删除会员
 		public function del() {
 			if(IS_POST){
 				$result = M('Member') -> delete(I('post.id'));
 				if($result != false){
 					$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功！'));
 				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败！'));
 				}
 			}
 		}

 		//修改会员资料
 		public function edit() {
 			if(IS_POST){
 				$result = M('Member') -> save(I('post.'));
 				if($result != false){
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