<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CacheController extends CommonController {
		//清空缓存
		public function index() {
			$runtime = __ROOT__ . APP_PATH . 'Runtime';
			$html = __ROOT__ . APP_PATH . 'Html';
			if(del_dir($html)){
				if(del_dir($runtime)){
					$this -> ajaxReturn(array('status'=>1,'msg'=>'已清空所有的缓存文件!'));
				}else{
					$this -> ajaxReturn(array('status'=>1,'msg'=>'清空缓存失败!'));
				}
			}else{
				$this -> ajaxReturn(array('status'=>0,'msg'=>'已清空所有的缓存文件!'));
			}
		}

	}
?>