<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ContactController extends Controller {
		public function index() {
			
		}

		public function cont() {
			if(IS_POST){
				$ip = get_client_ip();
				$model = M('contact');
				$msg = $model->where(array('ip'=>$ip))->find();
				if($msg){
					$time = time() - $msg['addtime'];
					if($time<600000){
						$this -> ajaxReturn(array('status'=>0,'msg'=>'10分钟内不能重复提交!'));
						die;
					}
				}
				$post = I('post.');
				if(isset($post)){
					$post['addtime'] = time();
					$post['ip'] = $ip;
					$result = $model->add($post);
					if($result){
						$this -> ajaxReturn(array('status'=>1,'msg'=>'留言成功!'));
					}
				}
			}else{
				$this -> ajaxReturn(array('status'=>0,'msg'=>'非法请求!'));
			}
		}

	}

?>