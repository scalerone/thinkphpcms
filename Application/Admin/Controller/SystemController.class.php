<?php  
	namespace Admin\Controller;
	use Think\Controller;
	use Org\Db\MySQLReback;

	class SystemController extends CommonController {
		
		public function index() {
			$this -> display();
		}

		//设置
		public function set() {
			$siteinfo_file = CONF_PATH . 'system.config.php';
	        if(file_exists($siteinfo_file)){
	            if(IS_POST){
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

		//数据备份
		public function backup() {
			//备份数据库
			$DataDir = C('DB_BACKUP_PATH');
	        mkdir($DataDir);//创建目录
	        $action = I('get.action');
	        $file = I('get.file');//获取文件名
	        if (!empty($action)) {
	            $config = array(
	                'host' => C('DB_HOST'),
	                'port' => C('DB_PORT'),
	                'userName' => C('DB_USER'),
	                'userPassword' => C('DB_PWD'),
	                'dbprefix' => C('DB_PREFIX'),
	                'charset' => 'UTF8',
	                'path' => $DataDir,
	                'isCompress' => 0, //是否开启gzip压缩
	                'isDownload' => 0
	            );
	            $mr = new MySQLReback($config);
	            $mr->setDBName(C('DB_NAME'));

	            if ($action == 'backup') {
	                $mr->backup();//备份
	                $this -> ajaxReturn(array('status'=>1,'msg'=>'备份成功!'));
	            } elseif ($action == 'RL') {
	                $mr->recover($file);//还原
	               	$this -> ajaxReturn(array('status'=>1,'msg'=>'数据库还原成功！'));
	            } elseif ($action == 'Del') {//删除
	                if (@unlink($DataDir . $file)) {
	                    $this -> ajaxReturn(array('status'=>1,'msg'=>'删除成功！'));
	                } else {
	                    $this -> ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
	                }
	            } elseif ($action == 'download'){
	            	//下载
	            	function DownloadFile($fileName) {
	                    ob_end_clean();
	                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	                    header('Content-Description: File Transfer');
	                    header('Content-Type: application/octet-stream');
	                    header('Content-Length: ' . filesize($fileName));
	                    header('Content-Disposition: attachment; filename=' . basename($fileName));
	                    readfile($fileName);
	                }
	                DownloadFile($DataDir . $file);
	                exit();
	            } else {
	            	$this -> ajaxReturn(array('status'=>0,'msg'=>'非法操作！'));
	            }
	        }else{
	        	//显示已经备份的数据列表
				$lists = $this->MyScandir(C('DB_BACKUP_PATH'));
		        $this->assign("datadir",$DataDir);
		        $this->assign("lists", $lists);
		        $this->display();
	        }
		}

		//获取数据库文件目录
		private function MyScandir($FilePath = './', $Order = 0) {
	        $FilePath = opendir($FilePath);
	        while (false !== ($filename = readdir($FilePath))) {
	            $FileAndFolderAyy[] = $filename;
	        }
	        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
	        return $FileAndFolderAyy;
	    }

	}
?>