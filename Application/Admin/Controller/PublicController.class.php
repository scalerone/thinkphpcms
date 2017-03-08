<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class PublicController extends CommonController {
		public function uploadLogo() {
			$config = array(
				'size' 		=> '2097152',
				'type'		=> 	array('jpg','jpeg','png','gif'),
				'rootPath'	=>	'./Uploads/System/Logo/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadIco() {
			$config = array(
				'size' 		=> '2097152',
				'type'		=> 	array('ico'),
				'rootPath'	=>	'./Uploads/System/Ico/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadWateThumb() {
			$config = array(
				'size' 		=> '2097152',
				'type'		=> 	array('gif','png'),
				'rootPath'	=>	'./Uploads/System/Wate/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadWateContent() {
			$config = array(
				'size' 		=> '2097152',
				'type'		=> 	array('gif','png'),
				'rootPath'	=>	'./Uploads/System/Wate/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}
	}

?>