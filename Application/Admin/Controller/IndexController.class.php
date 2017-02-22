<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class IndexController extends CommonController {
		public function index() {
			$system = array();
			$system['name'] = php_uname('s');
			$system['hj'] = apache_get_version();
			$system['uploadSize'] = 2;
			$system['siteUrl'] = "localhost";
			$system['host'] = "127.0.0.1";
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