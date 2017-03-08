<?php  
	namespace Admin\Controller;
	use Think\Controller;

	class SystemController extends CommonController {
		public function index() {
			$this -> display();
		}

		//设置
		public function set() {
			$siteinfo_file = CONF_PATH . 'system.config.php';
	        if(file_exists($siteinfo_file)){
	            if(IS_POST){
	            	//p($_POST);die;
	                // 写入文件，这里是关键
	                // I() 方法获取提交的数据
	                // var_export() 处理数组
	                $post = I('post.');

	                if(isset($post['WATE_ADD_WAY_1'])){
	                	unset($post['WATE_ADD_WAY_1']);
	                	if($post['WATE_ADD_WAY_2']){
	                		unset($post['WATE_ADD_WAY_2']);
	                		$post['WATE_ADD_WAY'] = '3';
	                	}else{
	                		$post['WATE_ADD_WAY'] = '1';
	                	}
	                }

	                if(isset($post['WATE_ADD_WAY_2'])){
	                	unset($post['WATE_ADD_WAY_2']);
	                	if($post['WATE_ADD_WAY_1']){
	                		unset($post['WATE_ADD_WAY_1']);
	                		$post['WATE_ADD_WAY'] = '3';
	                	}else{
	                		$post['WATE_ADD_WAY'] = '2';
	                	}
	                }
	                $result = file_put_contents($siteinfo_file, "<?php\r\nreturn " . var_export($post, true).';');
	                if($result){
	                    $this -> success('保存成功',U('System/index'));
	                }else{
	                    $this -> error('保存失败');
	                }
	            }else{
	                $this -> error('非法操作');
	            }
	        }else{
	            $this -> error('配置文件不存在！');
	        }
		}


	}
?>