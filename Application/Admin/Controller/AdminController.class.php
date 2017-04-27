<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class AdminController extends CommonController {
		//显示管理员列表
		public function index() {
			$admins = D('AdminRelation')->field('id,username,status')->relation(true)->select();
			$this -> admins = $admins;
			$this -> groups = M('auth_group')->field('id,title,status') -> select();
			$this -> display();
		}

		//修改管理员信息
		public function edit() {
			if(IS_POST){
				$admin = M('Admin');
				$access = M('Auth_group_access');

				$pass = I('password');
				$uid = I('id');
				$group_id = I('group_id');
				//p($_POST);die;
				if(!empty($pass)){
					$data['password'] = md5($pass);
					$data['id'] = $uid;
					$access->where(array('uid'=>$uid))->setField('group_id',$group_id);
					
					$result = $admin->save($data); 

					$msg = array('status'=>'1','msg'=>'修改成功!');
					if($result === false){
						$msg['status'] = "0";
						$msg['msg'] = "修改失败!";
					}
				}else{
					$msg = array('status'=>'1','msg'=>'修改失败!');
				}

				$this -> ajaxReturn($msg);
			}else{
				$admin = D('AdminRelation')->field('username,id')->relation(true)->where(array('id'=>I('get.id'))) -> find();
				$admin['group_id'] = $admin['auth_group'][0]['id'];
				$admin['group_title'] = $admin['auth_group'][0]['title'];

				$this -> admin = $admin;
				$this -> groups = M('auth_group')->field('id,title,status') -> select();
				$this -> display();
			}
		}

		//添加管理员
		public function add() {
			if(IS_POST){
				$group_id = I('post.group_id');
				$post = I('post.');
				unset($post['password2']);
				$post['password'] = I('post.password','',md5);
				$result = M('Admin')->add($post);

				if($result){
					$data = array(
							'uid' => $result,
							'group_id' => $group_id 
						);
					M('auth_group_access') -> add($data);
					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加成功！'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加失败!'));
				}
			}
		}

		//验证用户名是否存在
		public function checkUname(){
			$result = M('Admin')->where(array('username'=>I('post.uname')))->select();
			if($result){
				$this -> ajaxReturn(array('status'=>0,'msg'=>'用户已经存在！'));
			}else{
				$this -> ajaxReturn(array('status'=>1,'msg'=>'用户输入正确!'));
			}
		}

		//删除管理员并删除关联表信息
		public function del() {
			if(I('post.id') == '1'){
				$this -> ajaxReturn(array('status'=>0,'msg'=>'默认管理员禁止删除!'));	
				die;
			}
			$result = D('AdminRelation')->relation(true)->delete(I('post.id'));
			if($result !== false){
				$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));
			}else{
				$this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败!'));
			}
		}

		//更新管理员状态
		public function updateStatus(){
			if(IS_POST){
				M('Admin')->where(array('id'=>I('post.id')))->setField('status',I('post.status'));
				$this -> ajaxReturn(array('status'=>1,'msg'=>'操作成功!'));
			}
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
			if(IS_POST){

				$result = D('AuthGroup') -> doDelete();
				$this -> ajaxReturn($result);
			}
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
					if($result !== false){
						$this -> ajaxReturn(array('status'=>1,'msg'=>'设置权限成功！'));
					}else{
						$this -> ajaxReturn(array('status'=>0,'msg'=>'设置权限失败！'));
					}
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'未选中权限！'));
				}
			}else{
				$rules = M('auth_rule')->field('id,title,status,pid')->select();
				$group = M('auth_group')->field('title,id,rules')->find(I('get.id'));
				$has_rules = explode(',',$group['rules']);
				
				//标记存在的规则
				foreach ($rules as $id => $rule) {
					if(in_array($rule['id'],$has_rules)){
						$rules[$id]['_has'] = '1';
					}
				}

				$this -> rules = cateSort2Child($rules);
				$this -> group = $group;
				$this -> display();
			}
			
		}
	}
?>