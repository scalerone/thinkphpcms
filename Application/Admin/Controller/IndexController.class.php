<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class IndexController extends CommonController {
		public function index() {
			$system = array();
			$system['name'] = php_uname('s');
			$system['hj'] = $_SERVER["SERVER_SOFTWARE"];
			$system['uploadSize'] = ini_get('upload_max_filesize');
			$system['siteUrl'] = $_SERVER['SERVER_NAME'];
			$system['host'] = gethostbyname($_SERVER['SERVER_NAME']);
			$this -> system = $system;
			$this -> display();
		}

		public function logout() {
			//清除session
			session_unset();
			session_destroy();
		}
	}
?>