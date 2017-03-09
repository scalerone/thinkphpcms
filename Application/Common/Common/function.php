<?php
	//格式化输出
	function p($var) {
	    dump($var, true, null, 0);
	}	
	
	//递归重组栏目
	/**
	 * @param $cates 需要进行重组的栏目数组
	 * @param $pid   上级栏目的ID,默认为0
	 * @param $html  添加的html
	 * @param $level 栏目等级
	 */
	function reorgnCates($cates, $ext = '├─',$pid = 0, $html = "&nbsp;&nbsp;&nbsp;", $level = 0){
		$arr = array();
		foreach($cates as $v){
			if($v['pid'] == $pid){
				$v['level'] = $level + 1;
				$v['html']	= str_repeat($html, $level);
				if($v['level'] > 1) $v['html'] = $v['html'] . $ext;
				//$v['end']   = str_repeat('├─', $level);
				$arr[] = $v;
				$arr = array_merge($arr, reorgnCates($cates,$ext,$v['id'],$html,$level + 1));
			}	
		}
		return $arr;
	}

	//递归重组栏目获取子栏目
	/**
	 * [cateSort2Child description]
	 * @param  [type]  $cates [栏目数组]
	 * @param  integer $pid   [上级栏目ID]
	 * @return [type]         [从组后的栏目数组]
	 */
	function cateSort2Child($cates, $pid = 0) {
		$arr = array();

		foreach ($cates as $v) {
			if($v['pid'] == $pid){
				$v['child'] = cateSort2Child($cates,$v['id']);
				$arr[] = $v;
			}
		}
		return $arr;
	}


	/**
	 * 通过ID获取所有的子栏目
	 * @param  [array] $cates [所有栏目]
	 * @param  [id]   $id    [栏目ID]
	 * @return [array]        [返回栏目数组]
	 */
	function getChildsById($cates, $pid = 0) {
		$arr = array();

		foreach ($cates as $v) {
			if($v['pid'] == $pid){
				$arr[] = $v;
				$arr = array_merge($arr, getChildsById($cates,$v['id']));
			}
		}
		return $arr;
	}

	/**
	 * 文件上传方法
	 * @param  [array] $config [上传配置信息]
	 * @return [array]         [返回值]
	 */
	function upload($config) {
		$_config = array(
				'size' 		=> '2097152',
				'type'		=> 	array('jpg','jpeg','png','gif','bmp'),
				'rootPath'	=>	'./Uploads/', 
				'file'		=>	'file',
				'autoSub'	=>  true,
			);

		$_config = array_merge($_config,$config);

		$upload = new \Think\Upload();	//实例化上传类 
		
		$upload->maxSize = $_config['size'];// 设置附件上传大小 

		$upload->exts = $_config['type'];// 设置附件上传类型 

		$upload->autoSub = $_config['autoSub'];// 设置附件上传类型 

		$upload->rootPath = $_config['rootPath']; // 设置附件上传根目录 // 上传单个文件

		$info = $upload->uploadOne($_FILES[$_config['file']]); 

		if(!$info) {// 上传错误提示错误信息 
			$res = $upload->getError();
			$res['status'] = '0';
		}else{// 上传成功 获取上传文件信息 
			$res['status'] = '1';
			$res['src'] = $_config['rootPath'] . $info['savepath'].$info['savename'];
		}

		return $res;
	}

	/**
	 * 删除指定目录下的所有文件和文件夹
	 * @param  [str] $dir [目录路径]
	 * @return [boolean]      [删除成功或失败]
	 */
	function del_dir($dir) {
		$dh = opendir($dir);
		while($file = readdir($dh)) {
			if($file != "." && $file != "..") {
				$fullpath = $dir."/".$file;
				if(!is_dir($fullpath)) {
					@unlink($fullpath);
				}else{
					del_dir($fullpath);
				}
			}
		}
		closedir($dh);
		if(rmdir($dir)) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * 格式化字节大小
	 * @param  number $size      字节数
	 * @param  string $delimiter 数字和单位分隔符
	 * @return string            格式化后的带单位的大小
	 */
	
	function format_bytes($size, $delimiter = '') {
		$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
		for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
		return round($size, 2) . $delimiter . $units[$i];
	}
?>