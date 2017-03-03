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
			if(IS_POST){
				$result = M('Links') -> delete(I('post.id'));
				if($result != false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败!'));
				}
			}
		}

		//修改友情链接
		public function edit() {
			if(IS_POST){
				$result = M('Links') -> save(I('post.'));
				if($result != false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'修改成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'修改失败!'));
				}
			}else{
				$this -> link = M('Links')->find(I('get.id'));
				$this -> display();
			}
		}

		//更新排序
		public function updateSort() {
			if(IS_POST){
				$post = I('post.');
				$links = M('Links');
				foreach ($post as $id => $sort) {
					$links->where(array('id'=>$id))-> setField('sort',$sort);
				}
				$this -> success('更新成功！',U('Links/index'));
			}
		}
	}
?>