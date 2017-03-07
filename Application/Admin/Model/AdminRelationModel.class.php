<?php  
	namespace Admin\Model;
	use Think\Model\RelationModel;

	class AdminRelationModel extends RelationModel {
		protected $tableName = 'admin';

		protected $_link = array(
			'auth_group' => array( 
				'mapping_type' => self::MANY_TO_MANY, 
				'foreign_key' => 'uid',
				'relation_foreign_key' => 'group_id', 
				'relation_table' => 'cms_auth_group_access' //此处应显式定义中间表名称，且不能使用C函数读取表前缀 
			),
		);
		
	}
?>