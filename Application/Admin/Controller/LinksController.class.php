<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class LinksController extends CommonController {
		//显示友情链接列表
		public function index() {
			$this -> links = M('Links')-> order('sort ASC')->select();
			$this -> display();
		}

		//添加友情链接
		public function add() {
			if(IS_POST){
				$result = M('Links') -> add(I('post.'));
				if($result){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加链接成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加链接失败!'));
				}
			}else{
				$this -> display();
			}
		}

		//删除友情链接
		public function del() {

		}

		//修改友情链接
		public function edit() {
			
			$this -> display();
		}
	}
?>