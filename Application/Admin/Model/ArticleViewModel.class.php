<?php 
	namespace Admin\Model;
	use Think\Model\ViewModel;

	class ArticleViewModel extends ViewModel {
		public $viewFields = array(
			'article' => array('id','sort','thumb','title','hits','is_top','is_rec','is_hot'),
			'category' => array('catname'=>'cate_name', '_on'=>'article.catid=category.id'),
			'article_files' => array('_on'=>'article.id=article_files.article_id'),
		);
	}
?>