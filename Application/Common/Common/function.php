<?php
	//格式化输出
	function p($var) {
	    dump($var, true, null, 0);
	}	

	function getTemplateName($template=''){
		if('' == $template) return '';
		return current(explode('.', $template));
	}
	/**
	 * 通过自定id获取文章信息
	 * @param  [type] $catid [文章ID]
	 * @return [type]        [文章信息]
	 */
	function getArticleById($id=''){
		if('' == $id) return '';
		return M('Article')->find($id);
	}

	/**
	 * 通过自定id获取栏目信息
	 * @param  [type] $catid [栏目ID]
	 * @return [type]        [栏目信息]
	 */
	function getCateById($catid=''){
		if('' == $catid) return '';
		return M('Category')->find($catid);
	}
	/**
	 * 获取文章列表可设置分页
	 * @param  string  $catid    [栏目ID为空时则获取所有文章]
	 * @param  string  $fields   [获取文章的字段]
	 * @param  string  $limit    [获取文章的数量设置分页后则该值无效]
	 * @param  string  $order    [排序]
	 * @param  boolean $page     [分页为true则启动，默认为false]
	 * @param  string  $pageSize [每页显示的数量默认为10]
	 * @return [type]            [返回文章列表和分页(如果设置了分页)]
	 */
	function get_article($catid='',$fields='*',$limit='10',$order='sort ASC',$page=false,$pageSize='10'){
		$model = M('Article');
		//需要分页
		if($page){
			if('' !== $catid){
				//获取子栏目ID
				$cates = M('Category')->field('id,pid')->select();
				$cates = getChildsById($cates,$catid);
				$ids = implode(',',$cates[0]);
				if(empty($ids)) $ids = $catid;
				$map['_string'] = 'status<>0 AND catid in('.$ids.')'; 

				$count = $model->field($fields)->order($order)->where($map) -> count();
				$Page = new \Think\Page($count,$pageSize);
				$Page -> setConfig('prev','上一页');
				$Page -> setConfig('next','下一页');
				$show = $Page -> show();
				$content['page']=$show;
				$news=$model->field($fields)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
				$content['list']=$news;
			}else{

				$count = $model->field($fields)->order($order)-> count();
				$Page = new \Think\Page($count,$pageSize);
				$Page -> setConfig('prev','上一页');
				$Page -> setConfig('next','下一页');
				$show = $Page -> show();
				$content['page']=$show;
				$news=$model->field($fields)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
				$content['list']=$news;
			}

			
		}else{
			//不需要分页
			if('' !== $catid){
				//获取子栏目ID
				$cates = M('Category')->field('id,pid')->select();
				$cates = getChildsById($cates,$catid);
				$ids = implode(',',$cates[0]);

				if(empty($ids)) $ids = $catid;
				$map['_string'] = 'status<>0 AND catid in('.$ids.')'; 
				$content['list'] = $model->field($fields)->order($order)->where($map)->limit($limit)->select();
			}else{
				//获取子栏目ID
				$cates = M('Category')->field('id,pid')->select();
				$cates = getChildsById($cates,$catid);
				$ids = implode(',',$cates[0]);

				if(empty($ids)) $ids = $catid;

				$content['list'] = $model->field($fields)->order($order)->limit($limit)->select();
			}
		}
		return $content;
	}
	
	/**
	 * 获取模版文件
	 * @param  [type] $dir [description]
	 * @return [type]      [description]
	 */
	function getTemplates($dir){
		$arr = array();
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					$ex = end(explode('.', $file));
					$tmp = current(explode('.', $file));
					if(('html' == $ex || 'htm' == $ex) && $tmp !== 'index'){
						$arr[] = $file;
					}
				}
				closedir($dh);
			}
		}
		return $arr;
	}

	//通过栏目ID获取上级栏目
	function getParentsById($catid,$cates) {
		$arr = array();

		foreach ($cates as $v) {
			if($v['id'] == $catid){
				$arr[] = $v;
				$tem = getParentsById($v['pid'],$cates);
				if(count($tem)==0){
					return $arr;
				}else{
					$arr = array_merge($tem,$arr);
				}
			}
		}
		return $arr;
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
				'outPath'	=>	'/Uploads/'
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
			$res['src'] = $_config['outPath'] . $info['savepath'].$info['savename'];
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

	//处理方法
	function rmdirr($dirname) {
	    if (!file_exists($dirname)) {
	        return false;
	    }
	    if (is_file($dirname) || is_link($dirname)) {
	        return unlink($dirname);
	    }
	    $dir = dir($dirname);
	    if ($dir) {
	        while (false !== $entry = $dir->read()) {
	            if ($entry == '.' || $entry == '..') {
	                continue;
	            }
	            //递归
	            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
	        }
	    }
	}

	//公共函数
	//获取文件修改时间
	function getfiletime($file, $DataDir) {
	    $a = filemtime($DataDir . $file);
	    $time = date("Y-m-d H:i:s", $a);
	    return $time;
	}

	//获取文件的大小
	function getfilesize($file, $DataDir) {
	    $perms = stat($DataDir . $file);
	    $size = $perms['size'];
	    // 单位自动转换函数
	    $kb = 1024;         // Kilobyte
	    $mb = 1024 * $kb;   // Megabyte
	    $gb = 1024 * $mb;   // Gigabyte
	    $tb = 1024 * $gb;   // Terabyte

	    if ($size < $kb) {
	        return $size . " B";
	    } else if ($size < $mb) {
	        return round($size / $kb, 2) . " KB";
	    } else if ($size < $gb) {
	        return round($size / $mb, 2) . " MB";
	    } else if ($size < $tb) {
	        return round($size / $gb, 2) . " GB";
	    } else {
	        return round($size / $tb, 2) . " TB";
	    }
	}
?>