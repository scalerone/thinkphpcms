<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class AdminController extends CommonController {
		//显示管理员列表
		public function index() {
			$this -> display();
		}

		//修改管理员信息
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

		//添加管理员
		public function add() {
			$this -> display();
		}

		//删除管理员
		public function del() {

		}

		//显示用户组列表
		public function group() {
			$this -> groups = M('auth_group') -> select();
			$this -> display();
		}

		//添加用户组
		public function addGroup() {
			if(IS_POST){
				$result = M('auth_group')->add(I('post.'));
				if($result){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加失败!'));
				}
			}
		}

		//删除分组
		public function delGroup() {
			$this -> display();
		}

		//配置权限
		public function setRules(){
			if(IS_POST){
				$post = I('post.id');
				$post = implode(',',$post);
				if(count($post)>0){
					$result = M('auth_group')
					->where(array('id'=>I('post.group_id')))
					->setField('rules',$post);
					if($result != false){
						$this -> ajaxReturn(array('status'=>0,'msg'=>'设置权限成功！'));
					}else{
						$this -> ajaxReturn(array('status'=>0,'msg'=>'设置权限失败！'));
					}
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'未选中权限！'));
				}
			}else{
				$this -> group = M('auth_group')->field('title,id')-> find(I('get.id'));
				$rules = M('auth_rule')->field('id,title,status,pid')->select();
				$this -> rules = cateSort2Child($rules);
				$this -> display();
			}
			
		}
	}
?>