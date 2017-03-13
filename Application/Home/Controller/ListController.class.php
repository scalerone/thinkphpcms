<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ListController extends Controller {
		public function index() {
			p($_GET);die;
			$this->display();
		}
	}

?>