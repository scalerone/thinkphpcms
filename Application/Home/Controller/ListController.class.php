<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ListController extends Controller {
		public function index() {
			//获取当前栏目ID
			$catid = I('get.id');
			//获取当前栏目信息
			$cate = M('category')->find($catid);
			//获取子栏目ID
			$cates = M('Category')->field('id,pid')->select();
			$cates = getChildsById($cates,$catid);
			$ids = implode(',',$cates[0]);
			if(empty($ids)) $ids = $catid;
			//分页
			$model = M('Article');
			$count = $model -> count();
			$Page = new \Think\Page($count,10);
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$show = $Page -> show();
			//赋值
			$this -> articles = $model->query("select * from cms_article where (catid in(".$ids.") and status<>0) limit ".$Page->firstRow.",".$Page->listRows);//显示文章
			$this -> page = $show;//显示分页
			$this -> cate = $cate;//显示栏目
			$this->display('Template:list');
		}
	}

?>