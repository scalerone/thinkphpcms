<?php 
	namespace Home\Controller;
	use Think\Controller;

	class FileController extends CommonController {
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
				//下载文件
				$this -> put_file($filesavepath,$files['filename']);
			}
		}

		//文件下载
		private function put_file($file,$filename) {

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.$filename);
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
		}
	}
 ?>