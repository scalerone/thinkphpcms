<?php  
	namespace Admin\Controller;
	use Admin\Controller;

	class ArticleController extends CommonController {
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

		public function del() {
			$result = M('Article') -> delete(I('get.id'));
			if($result){
				$this -> ajaxReturn(array('status'=>1));
			}else{
				$this -> ajaxReturn(array('status'=>0));
			}
		}

		public function edit() {
			
		}

		public function select() {
			$this -> display();
		}

		public function remove() {

		}

		public function search(){
			
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
				$res['src'] = './Uploads/' . $info['savepath'].$info['savename'];
			}
			$this -> ajaxReturn($res);
		}
		
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
								"src" => './Uploads/' . $info['savepath'].$info['savename'],
    							"title" => $info['savename'],
							)
					);
			}
			$this -> ajaxReturn($res);
		}
	}
?>