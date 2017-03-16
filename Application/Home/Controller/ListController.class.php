<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ListController extends Controller {
		public function index() {
			//获取当前栏目ID
			$catid = I('get.id');
			//获取当前栏目信息
			$cate = M('category')->find($catid);
			
			$this -> cate = $cate;//显示栏目
			if('' == $cate['template']) $template = 'list';
			$this->display('Template:'.$template);
		}
	}

?>