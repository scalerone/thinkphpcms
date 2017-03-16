<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ShowController extends Controller {
		public function index() {
			$id = I('get.id');
			$article = M('Article')->find($id);
			if('' == $cate['template']) $template = 'show';
			$this -> article = $article;
			$this->display('Template:'.$template);
		}
	}

?>