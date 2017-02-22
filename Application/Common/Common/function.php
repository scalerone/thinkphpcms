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
	function reorgnCates($cates, $pid = 0, $html = "&nbsp;&nbsp;&nbsp;", $level = 0){
		$arr = array();
		foreach($cates as $v){
			if($v['pid'] == $pid){
				$v['level'] = $level + 1;
				$v['html']	= str_repeat($html, $level);
				//$v['end']   = str_repeat('├─', $level);
				$arr[] = $v;
				$arr = array_merge($arr, reorgnCates($cates,$v['id'],$html,$level + 1));
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
?>