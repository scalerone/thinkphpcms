<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class RuleController extends CommonController {
		//显示权限列表
		public function index() {
			$model = M('auth_rule');
			$rules = $model -> order('id ASC')->select();
			$this -> topRule = $model ->field('id,title')->where('pid=0')->select();
			$this -> rules = reorgnCates($rules);
			$this -> display();
		}

		//添加权限
		public function add() {
			if(IS_POST){
				$msg = array('status'=>0,'msg'=>'添加失败,未知错误!');

				$b = $this->check_add_rule(array(
						'name' => I('name'),
						'title' => I('title')
					));
				if($b){
					$msg = array('status'=>0,'msg'=>'该权限已经存在,请勿重复添加!');
				}else{
					$post = I('post.');
					$post['createtime'] = time();
					if(!isset($post['status'])) $post['status'] = 0;
					$result = M('auth_rule')->add($post);

					if($result){
						$msg = array('status'=>1,'msg'=>'添加成功!');
					}else{
						$msg = array('status'=>0,'msg'=>'添加失败!');
					}
				}
				
				$this -> ajaxReturn($msg);
			}
		}

		//验证规则是否重复
		private function check_add_rule($arr){
			return M('auth_rule')->where($arr)->find();
		}

		//删除权限
		public function del() {
			if(IS_POST){
				$id = I('post.id');
				$result = M('auth_rule')->where("id=%d or pid='%d'",array($id,$id))-> delete();
				if($result !== false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败!'));
				}
			}
		}

		//更新状态
		public function updateStatus() {
			if(IS_POST){
				$result = M('auth_rule')
				->where(array('id'=>I('post.id')))
				->setField('status',I('post.status'));

				if($result !== false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'更新成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'更新失败!'));
				}
			}
		}
	}
?>