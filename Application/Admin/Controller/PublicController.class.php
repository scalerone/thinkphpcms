<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class PublicController extends CommonController {
		public function uploadLogo() {
			$config = array(
				'size' 		=> C('FILE_SIZE'),
				'type'		=> 	array('jpg','jpeg','png','gif'),
				'rootPath'	=>	'./Uploads/System/Logo/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
				'outPath'	=>	'/Uploads/System/Logo/', 
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadIco() {
			$config = array(
				'size' 		=> C('FILE_SIZE'),
				'type'		=> 	array('ico'),
				'rootPath'	=>	'./Uploads/System/Ico/', 
				'file'		=>	'file',
				'autoSub'	=>  false,
				'outPath'	=>	'/Uploads/System/Ico/', 	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadWateThumb() {
			$config = array(
				'size' 		=> C('FILE_SIZE'),
				'type'		=> 	array('gif','png'),
				'rootPath'	=>	'./Uploads/System/Wate/', 
				'file'		=>	'file',
				'autoSub'	=>  false,	
				'outPath'	=>	'/Uploads/System/Wate/', 
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadWateContent() {
			$config = array(
				'size' 		=> C('FILE_SIZE'),
				'type'		=> 	array('gif','png'),
				'rootPath'	=>	'./Uploads/System/Wate/', 
				'file'		=>	'file',
				'autoSub'	=>  false,
				'outPath'	=>	'/Uploads/System/Wate/',	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}

		public function uploadThumb() {
			$config = array(
				'size' 		=> C('FILE_SIZE'),
				'type'		=> 	array('gif','png','jpg','jpeg'),
				'rootPath'	=>	'./Uploads/', 
				'file'		=>	'file',
				'autoSub'	=>  true,
				'outPath'	=>	'/Uploads/',	
			);
			$result = upload($config);
			$this -> ajaxReturn($result);
		}
	}

?>