<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ListController extends Controller {
		public function index() {
			//获取当前栏目ID
			$catid = I('get.id');
			//获取当前栏目信息
			$cate = M('category')->find($catid);
			$tmp = getTemplateName($cate['template']);
			if('' == $tmp) $tmp = 'list';
			
			$this -> cate = $cate;//显示栏目
			
			$this->display('Template:'.$tmp);
		}
	}

?>