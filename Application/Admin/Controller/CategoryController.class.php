<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CategoryController extends CommonController {

		public function index () {
			$model = M('Category');
			//分页
			$count = $model -> count();
			$page = new \Think\Page($count,20);
			$show = $page->show();

			$category = $model->field('id,catname,pid,status,type,sort')->order('sort ASC') -> limit($page->firstRow.','.$page->listRows)->select();
			//p($category);die;
			$this -> categories = reorgnCates($category);
			$this -> page = $show;// 赋值分页输出
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
				$this -> pid = I('get.pid',0,intval);
				$this -> display();
			}
		}

		//删除栏目
		public function del() {
			$id = I('get.id');
			$model = M('Category');
			$cates = $model->field('id,pid')->select();
			$cates = getChildsById($cates,$id);
			foreach ($cates as $v) {
				$model -> delete($v['id']);
			}
			$model -> delete($id);
			$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));
		}

		public function edit() {
			if(IS_POST){
				$post = I('post.');
				if(!isset($post['status'])){
					$post['status'] = 2;
				}
				$result = M('Category') -> save($post);
				if($result != false){
					$this -> ajaxReturn(array('status'=>'1','msg'=>'修改成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>'0','msg'=>'修改失败!'));
				}
			}else{
				$id = I('get.id');
				$this -> cate = M('Category') -> find($id);
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> display();
			}
		}

		//更新排序
		public function updateSort() {
			$post = I('post.');
			unset($post['status']);
			$category = M('Category');
			foreach ($post as $id => $value) {
				$category -> where(array('id'=>$id)) -> setField('sort',$value);
			}
			$this -> success('更新排序成功!',U('Category/index'));
		}

	}
?>