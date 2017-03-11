<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class ArticleController extends CommonController {
		//文章列表
		public function index() {
			$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
			//分页
			$model = M('Article');
			$count = $model -> count();
			$Page = new \Think\Page($count,10);
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$show = $Page -> show();

			$this -> articles = $model->field('id,sort,thumb,title,hits,author,addtime,is_top,is_rec,is_hot')->order('sort ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this -> page = $show;
			$this -> categories = reorgnCates($category,'├');
			$this -> display();
		}

		//添加文章
		public function add() {
			if(IS_POST){
				$post = I('post.');
				$post['addtime'] = strtotime(I('post.addtime'));
				$article = M('Article');
				if($article -> add($post)){
					$this -> success('添加成功!',U('Article/index'));
				}else{
					$this -> error('添加失败!');
				}
			}else{
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> display();	
			}
		}

		//删除文章
		public function del() {
			$result = M('Article') -> delete(I('get.id'));
			if($result){
				$this -> ajaxReturn(array('status'=>1));
			}else{
				$this -> ajaxReturn(array('status'=>0));
			}
		}

		//修改文章
		public function edit() {
			if(IS_POST){
				$post = I('post.');
				if(!isset($post['is_hot'])){
					$post['is_hot'] = 0;
				}
				if(!isset($post['is_rec'])){
					$post['is_rec'] = 0;
				}
				if(!isset($post['is_top'])){
					$post['is_top'] = 0;
				}
				$post['addtime'] = strtotime(I('post.addtime'));
				$result = M('Article')->save($post);
				if($result != false){
					$this -> success('修改成功!',U('Article/index'));
				}else{
					$this -> error('修改失败!');
				}
			}else{
				$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
				$this -> categories = reorgnCates($category,'├');
				$this -> article = M('Article')->find(I('get.id'));
				$this -> display();
			}
		}

		//移动文章到指定栏目
		public function remove() {
			$ids = I('get.ids');
			$catid = I('get.catid');
			$article = M('Article');
			foreach ($ids as $id) {
				$article->where(array('id'=>$id)) -> setField('catid',$catid);
			}
			$this -> ajaxReturn(array('status'=>1,'msg'=>'移动成功!'));
		}

		//根据关键字查询文章
		public function search(){
			$post = I('post.');
			$cates = M('Category')->field('id,pid')->select();
			//获取所有子栏目
			$cates = getChildsById($cates,$post['catid']);
			$str = implode(',',$cates[0]);
			if(empty($str)) $str = I('post.catid');

			if($post['catid'] == 0){
				$this -> articles = M('Article')
				->field('id,sort,thumb,title,hits,author,addtime,is_top,is_rec,is_hot')
				->where("title LIKE '%".$post['keywords']."%'")
				->order('sort ASC')
				->select();
			}else if(!isset($post['keywords'])){
				$this -> articles = M('Article')
				->field('id,sort,thumb,title,hits,author,addtime,is_top,is_rec,is_hot')
				->where("catid in (".$str.")")
				->order('sort ASC')
				->select();
			}else{
				$this -> articles = M('Article')
				->field('id,sort,thumb,title,hits,author,addtime,is_top,is_rec,is_hot')
				->where("catid in (".$str.") AND title LIKE '%".$post['keywords']."%'")
				->order('sort ASC')
				->select();
			}
			
			$category = M('Category')->field('id,catname,pid')->order('sort ASC')-> select();
			$this -> categories = reorgnCates($category,'├');
			$this -> post = $post;
			$this -> display('Article/index');
			
		}

		//更新排序
		public function updateSort() {
			$post = I('post.');
			$model = M('Article');
			foreach ($post as $id => $sort) {
				$model -> where(array('id' => $id))->setField('sort',$sort);
			}
			$this -> success('更新排序成功!',U('Article/index'));
		}
		
		//上传文章缩略图
		public function upload() {
			$upload = new \Think\Upload();// 实例化上传类 
			$upload->maxSize = 2097152;// 设置附件上传大小 
			$upload->exts = array('jpg','jpeg','png','gif','bmp');// 设置附件上传类型 
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录 // 上传单个文件
			$info = $upload->uploadOne($_FILES['file']); 
			if(!$info) {// 上传错误提示错误信息 
				$res = $upload->getError();
			}else{// 上传成功 获取上传文件信息 
				$res['status'] = '1';
				$res['src'] = '/Uploads/' . $info['savepath'].$info['savename'];
			}
			$this -> ajaxReturn($res);
		}
		
		//编辑器图片上传
		public function editImgUpload(){
			$upload = new \Think\Upload();// 实例化上传类 
			$upload->maxSize = 2097152 ;// 设置附件上传大小 
			$upload->exts = array('jpg','jpeg','png','gif','bmp');// 设置附件上传类型 
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录 // 上传单个文件
			$info = $upload->uploadOne($_FILES['file']); 
			if(!$info) {// 上传错误提示错误信息 
				$res = array(
						'code' => '1',
						'msg'  => $upload->getError(),
						"data" => '上传失败!'
					);
			}else{// 上传成功 获取上传文件信息 
				$res = array(
						'code' => '0',
						'msg'  => $upload->getError(),
						"data" => array(
								"src" => '/Uploads/' . $info['savepath'].$info['savename'],
    							"title" => $info['savename'],
							)
					);
			}
			$this -> ajaxReturn($res);
		}
	}
?>