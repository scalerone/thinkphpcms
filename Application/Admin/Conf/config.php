<?php 
 	return array(
 		//'配置项'=>'配置值'
		'TMPL_PARSE_STRING' => array(
				'__PUBLIC__' => __ROOT__.'/'.APP_PATH.MODULE_NAME .'/Public',
			),
		'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
		'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
 	);
 ?>