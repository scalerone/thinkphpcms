<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class CacheController extends CommonController {
		//清空缓存
		public function index() {
			$path = __ROOT__ . APP_PATH . 'Runtime';
			$flag = del_dir($path);
			if($flag){
				$this -> ajaxReturn(array('status'=>1,'msg'=>'已清空所有的缓存文件!'));
			}else{
				$this -> ajaxReturn(array('status'=>0,'msg'=>'清空缓存失败!'));
			}
		}
	}
?>