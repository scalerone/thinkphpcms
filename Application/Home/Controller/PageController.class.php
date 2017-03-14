<?php  
	namespace Home\Controller;
	use Think\Controller;

	class PageController extends Controller {
		public function index() {
			$cate = M('category')->find(I('get.id'));
			$this -> cate = $cate;
			$this->display();
		}
	}

?>