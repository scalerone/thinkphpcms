<?php  
	namespace Admin\Model;
	use Think\Model;

	class AuthGroupModel extends Model {

		public function doDelete(){
			$group_id = I('post.id');

			$data = M('auth_group_access')
				->where(array('group_id'=>$group_id))
				->select();
			$uids = array();
			foreach ($data as $v) {
					$uids[] = $v['uid'];
				}
			$uids = implode(',',$uids);

			$result = $this->delete($group_id);

			if($result != false){
				//删除关联的表auth_group_access信息
				M('auth_group_access')->where(array('group_id'=>$group_id))->delete();
				//删除关联表admin信息
				if(!empty($uids)) M('admin')->delete($uids);

				$msg = array('status'=>1,'msg'=>'删除成功!');
			}else{
				$msg = array('status'=>0,'msg'=>'删除失败!');
			}

			return $msg;
		}
		
	}
?>