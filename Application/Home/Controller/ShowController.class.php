<?php  
	namespace Home\Controller;
	use Think\Controller;

	class ShowController extends Controller {
		public function index() {
			$id = I('get.id');
			$model = M('Article');
			$article = $model->find($id);
			//增加点击数
			$model ->where(array('id'=>$id))-> setInc('hits');
			$this -> article = $article;
			$this->display('Template:show');
		}

		public function getHits() {
			$id = I('get.id');
			$model = M('Article');
			if(isset($id)){
				$model ->where(array('id'=>$id))-> setInc('hits');
				$result = $model->field('hits')->where(array('id'=>$id))->find($id);
				echo $result['hits'];
			}
		}
	}

?>