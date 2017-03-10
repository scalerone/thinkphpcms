<?php 
	namespace Home\Controller;
	use Think\Controller;

	class IpController extends Controller {
		public function index() {
			$ip = new \Org\Net\IpLocation('qqwry.dat');

			$result = $ip -> getlocation($_GET['ip']);

			header("Content-Type: text/html; charset=utf-8");
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			echo $result['ip'] . '<br/>';
			echo $result['beginip'] . '<br/>';
			echo $result['endip'] . '<br/>';
			echo $result['country'] . '<br/>';
			echo $result['area'] . '<br/>';
		}
	}

 ?>