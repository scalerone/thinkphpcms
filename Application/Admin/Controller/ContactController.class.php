<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class ContactController extends CommonController {

		public function index() {
			$this -> display();
		}

		public function add() {
			$this -> display();
		}

		public function edit() {
			$this -> display();
		}

		public function del() {
			p($_GET);die;
			$this -> display();
		}

		

	}

?>