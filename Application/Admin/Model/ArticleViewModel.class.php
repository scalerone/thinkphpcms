<?php 
	namespace Admin\Model;
	use Think\Model\ViewModel;

	class ArticleViewModel extends ViewModel {
		public $viewFields = array(
			'Article' => array('id','sort','thumb','addtime','title','hits','is_top','is_rec','is_hot'),
			'Category' => array('catname'=>'cate_name', '_on'=>'Article.catid=Category.id'),
		);
	}
?>