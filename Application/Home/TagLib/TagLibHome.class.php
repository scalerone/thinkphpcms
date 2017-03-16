<?php  
	namespace Home\TagLib;
	use Think\Template\TagLib;

	class TagLibHome extends TagLib {
		protected $tags = array(
			'category' => array(
					'attr' => 'catid,order,length,empty',
				),
			'getCate'	=>array(
					'attr' => 'catid',
				),
			'list'	=> array(
					'attr'	=> 'catid,order,length,empty',
				),
			'position' => array(
					'close' => '0',
				),
		);

		//定位
		public function _position($attr,$content) {
			$catid = I('get.id');
			
			$uri = $_SERVER['REQUEST_URI'];
			$flag = strpos($uri,'show');
			
			if($flag){
				$article = M('Article')->field('id,catid')->find($catid);

				$catid = $article['catid'];
			}
			if(empty($catid)) return '';
			$cates = M('category')->field('id,pid,catname,type,summary,sort')->where('status=1')->select();
			$cates = getParentsById($catid,$cates);
			$count = count($cates);
			if($count==0) return '';
			$str = '';

			foreach ($cates as $key => $val) {
				switch ($val['type']) {
					case '1':
						$url = U('/list/'.$val['id']);
						break;
					case '2':
						$url = U('/page/'.$val['id']);
						break;
					case '3':
						$url = $val['url'];
						break;
				}
				if($key == $count){
					$str .= '<a href="'.$url.'">'.$val['catname'].'</a>';
				}else{
					$str .= '<a href="'.$url.'">'.$val['catname'].'</a>&gt;';
				}
			}
			return $str;
		}

		//文章列表循环
		public function _list($attr,$content) {
			//获取栏目catid
			$id = $attr['catid'];
			if('' == $id) $id = I('get.id');
			//获取子栏目ID
			$cates = M('Category')->field('id,pid')->select();
			$cates = getChildsById($cates,$id);
			$ids = implode(',',$cates[0]);
			if(empty($ids)) $ids = $id;
			//设置属性的默认值
			$length = !empty($attr['length'])?$attr['length']:'60';
			$empty = !empty($attr['empty'])?$attr['empty']:'';
			$order = !empty($attr['order'])?$attr['order']:'sort ASC';

			$sql = 'M("article")->query("select * from cms_article where (catid in('.$ids.') and status<>0)");';

			$str = '<?php ';
			$str .= '$list='.$sql;
			$str .= '$list=array_slice($list,0,'.$length.');';

			$str .= 'if(count($list)==0) : echo "'.$empty.'" ;';
			$str .= 'else: ';
			$str .= 'foreach($list as $key=>$list_val): ';
			$str .= 'extract($list_val);';
			$str .= '$index=$key+1;';
			$str .= '$url=U("/show/".$id);?>';
			$str .= $content;
			$str .='<?php endforeach;endif;?>';
			
			//p($str);die;

			return $str;
		}

		//栏目导航
		public function _category($attr,$content) {
			$id = $attr['catid'];
			if('' == $id) $id = I('get.id');

			$order = !empty($attr['order'])?$attr['order']:'sort ASC';

			$str = '<?php ';
			$str .= '$cates= M("category")->where("status=1")->order("'.$order.'")->select();';
			$str .= '$cates=cateSort2Child($cates,'.$id.');';
			if(isset($attr['length']) && '' !=$attr['length'] ) {
				$str .= '$cates=array_slice($cates,0,'.$attr['length'].');';
			}
			$str .= 'foreach($cates as $key=>$cate_val): ';
			$str .= 'extract($cate_val);';
			$str .= '$index=$key+1;';
			$str .= 'if($type==1) $url=U("/list/".$id);';
			$str .= 'if($type==2) $url=U("/page/".$id);';
			$str .= '?>';
			$str .= $content;
			$str .='<?php endforeach;?>';
			return $str;
		}

		//通过ID获取指定栏目信息
		public function _getCate($attr,$content) {
			if(empty($attr['catid'])) return '';
			
			$str = <<<str
<?php
			\$cate = M('category')->where("status=1")->find(intval({$attr['catid']}));
			extract(\$cate);
			\$url = U('/cate/'.\$id);	
?>
str;
			$str .= $content;
			return $str;
		}
	}
?>