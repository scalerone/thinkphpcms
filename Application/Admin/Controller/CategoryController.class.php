<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CategoryController extends CommonController {

		//栏目列表
		public function index () {
			$category = M('Category')->field('id,pid,catname,status,type,sort')->order('sort ASC')->select();
			$this -> categories = reorgnCates($category);
			$this -> display();
		}

		//添加栏目
		public function add () {
			if(IS_POST){
				$post = I('post.');
				$category = M('Category');
				$post['addtime'] = time();
				$post['content'] = htmlspecialchars_decode(I('post.content'));
				if(!isset($post['app_sub'])) $post['app_sub'] = 0;
				
				if($category -> add($post)){
					$this -> ajaxReturn(array('status'=>'1','msg'=>'添加成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>'0','msg'=>'添加失败,请重新添加!'));
				}
			}else{
				//获取模版文件
				$path = APP_PATH . 'Home/View/Template';
				$templates = getTemplates($path);
				
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> pid = I('get.pid',0,intval);
				$this -> templates = $templates;
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

		//修改栏目
		public function edit() {
			if(IS_POST){
				$post = I('post.');
				if(!isset($post['status'])){
					$post['status'] = 2;
				}
				$post['content'] = htmlspecialchars_decode(I('post.content'));
				$result = M('Category') -> save($post);
				//p($result);die;
				if($result !== false){
					$this -> ajaxReturn(array('status'=>'1','msg'=>'修改成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>'0','msg'=>'修改失败!'));
				}
			}else{
				//获取模版文件
				$path = APP_PATH . 'Home/View/Template';
				$templates = getTemplates($path);

				$id = I('get.id');
				$this -> cate = M('Category') -> find($id);
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> templates = $templates;
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

		//更新栏目状态
		public function updateStatus() {
			$result = M('Category') -> save(I('get.'));
			if($result !== false){
				$this -> ajaxReturn(array('status'=>1,'msg'=>'操作成功!'));
			}else{
				$this -> ajaxReturn(array('status'=>0,'msg'=>'操作失败!'));
			}
		}

	}
?>