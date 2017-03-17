<?php  
	namespace Home\Controller;
	use Think\Controller;

	class PageController extends Controller {
		public function index() {
			$id = I('get.id');
			$cate = M('Category')->find($id);
			$tmp = getTemplateName($cate['template']);
			if('' == $tmp){
				$tmp = 'page';
			}
			
			$this -> cate = $cate;
			$this->display('Template:'.$tmp);
		}


	}

?>