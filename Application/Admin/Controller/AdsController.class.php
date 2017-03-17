<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class AdsController extends CommonController {

		public function index() {
			$this -> plate = M('ads_plate')->select();
			$this -> display();
		}

		public function addPlate() {
			if(IS_POST){
				//添加
				$post = I('post.');
				$post['addtime'] = time();
				$result = M('ads_plate')->add($post);
				if($result){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加板块成功!'));					
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加板块失败!'));					
				}
			}else{
				//修改
				if('edit' == I('get.type')){
					$json = M('ads_plate')->find(I('get.id'));
					$this -> ajaxReturn(array('status'=>1,'data'=>$json));
				}else{
					$this -> error('错误请求!');					
				}
			}
		}

		public function editPlate() {
			if(IS_POST){
				$post = I('post.');
				$result = M('ads_plate')->save($post);
				if($result != false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'修改板块成功!'));					
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'修改板块失败!'));					
				}
			}else{
				$plate = M('ads_plate')->find(I('get.id'));
				$this -> plate = $plate;
				$this->display();
			}
		}

		public function delPlate() {
			if(IS_POST){
				M('ads_plate')->delete(I('id'));
				$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));	
			}else{
				$this -> error('错误请求!');
			}
		}

	}

?>