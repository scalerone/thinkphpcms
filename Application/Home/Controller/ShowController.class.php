<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ShowController extends CommonController {
		//显示页面详情
		public function index() {
			if(session('member_name') && !empty(session('member_name'))){
				
				$id = I('get.id');
				$model = M('Article');
				
				$article = $model->find($id);
				$files = M('Article_files')->field('id,filename,fileurl,article_id,filesize,filetype,addtime,filesavepath')->where(array('article_id'=>$id))->find();
				
				$filesavepath = $files['filesavepath'];
				
				//增加点击数
				$model ->where(array('id'=>$id))-> setInc('hits');

				unset($files['filesavepath']);
				$article['files'] = $files;
				$this -> put_movie($filesavepath);
				
				//$this -> article = $article;

			}
			
		}

		//获取点击数
		public function getHits() {

			$id = I('get.id');
			$model = M('Article');
			if(isset($id)){
				$model ->where(array('id'=>$id))-> setInc('hits');
				$result = $model->field('hits')->where(array('id'=>$id))->find($id);
				echo $result['hits'];
			}
		}


		//输出视频文件
		private function put_movie($file) {
			ob_clean();
			$video = file_get_contents($file);
			header("Content-type:video/mp4");
			print_r($video);
		}

		
	}

?>