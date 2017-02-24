<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class ArticleController extends CommonController {
		public function index() {
			$this -> display();
		}

		public function add() {
			if(IS_POST){
				p($_POST);die;
			}
			$this -> display();
		}

		public function del() {
			
		}

		public function edit() {
			$this -> display();
		}

		public function select() {
			$this -> display();
		}

		public function upload() {
			$upload = new \Think\Upload();// 实例化上传类 
			$upload->maxSize = 3145728 ;// 设置附件上传大小 
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录 // 上传单个文件
			$info = $upload->uploadOne($_FILES['_thumb']); 
			if(!$info) {// 上传错误提示错误信息 
				$res = $upload->getError();
			}else{// 上传成功 获取上传文件信息 
				$res['status'] = '1';
				$res['src'] = './Uploads/' . $info['savepath'].$info['savename'];
			}
			$this -> ajaxReturn($res);
		}
	}
?>