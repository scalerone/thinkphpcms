<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CategoryController extends CommonController {

		public function index () {
			$category = M('Category')->field('id,catname,pid,status,type,sort')->order('sort ASC')-> select();
			$this -> categories = reorgnCates($category);
			$this -> display();
		}

		public function add () {
			if(IS_POST){
				$post = I('post.');
				$category = M('Category');
				$post['addtime'] = time();
				if($category -> add($post)){
					$this -> ajaxReturn(array('status'=>'1','msg'=>'添加成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>'0','msg'=>'添加失败,请重新添加!'));
				}
			}else{
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> display();
			}
		}

		public function del() {

		}

		public function edit() {
			$this -> display();
		}

	}
?>