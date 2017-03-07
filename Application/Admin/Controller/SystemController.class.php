<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class SystemController extends CommonController {
		public function index() {
			$this -> display();
		}

		//设置
		public function set() {
			p($_POST);die;
		}


	}
?>