<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class AdsController extends CommonController {

		//显示板块
		public function index() {
			$this -> plate = M('ads_plate')->select();
			$this -> display();
		}

		//添加板块
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

		//修改板块
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

		//删除板块
		public function delPlate() {
			if(IS_POST){
				M('ads_plate')->delete(I('id'));
				//删除对应的所有广告
				M('ads_plate_list')->where(array('plate_id'=>I('id')))->delete();
				$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));	
			}else{
				$this -> error('错误请求!');
			}
		}

		//添加广告
		public function addAds() {
			if(IS_POST){
				$post = I('post.');
				$post['createtime'] = time();
				$result = M('ads_plate_list')->add($post);
				if($result){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'添加成功!'));
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'添加失败!'));
				}
			}else{
				$this -> plate_id = I('plate_id');
				$this -> display();
			}
		}

		//删除广告
		public function delAds() {
			if(IS_POST){
				M('ads_plate_list')->delete(I('id'));
				$this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功!'));	
			}else{
				$this -> error('错误请求!');
			}
		}

		//修改广告
		public function editAds() {
			if(IS_POST){
				$post = I('post.');
				$result = M('ads_plate_list')->save($post);
				if($result != false){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'修改广告成功!'));					
				}else{
					$this -> ajaxReturn(array('status'=>0,'msg'=>'修改广告失败!'));					
				}
			}else{
				$ads = M('ads_plate_list')->find(I('get.id'));
				$this -> ads = $ads;
				$this->display();
			}
		}

		//查看广告列表
		public function adsList() {
			$this -> adsList = M('ads_plate_list')->where(array('plate_id'=>I('get.plate_id')))->select();
			$this -> plate_id = I('plate_id');
			$this -> display();
		}
		

	}

?>