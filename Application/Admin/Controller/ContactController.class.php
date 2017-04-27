<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class ContactController extends CommonController {
		//显示所有的留言
		public function index() {
			$this -> contacts = M('contact')->select();
			$this -> display();
		}

		//查看留言
		public function look() {
			$contact = M('Contact')->find(I('get.id'));
			$this -> contact = $contact;
			$this -> display();
		}

		//编辑留言
		/*public function edit() {
			$this -> display();
		}
*/
		//删除留言
		public function del() {
			if(IS_POST){
				$ids = I('id');
				if(!empty($ids)){
					$result = M('Contact')->delete($ids);
					if($result){
						$this -> ajaxReturn(array('status'=>1,'msg'=>'删除留言成功!'));
					}else{
						$this -> ajaxReturn(array('status'=>0,'msg'=>'删除留言出错!'));
					}
				}
			}
		}

	}

?>