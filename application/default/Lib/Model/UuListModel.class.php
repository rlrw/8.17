<?php 
	class UuListmodel extends  ViewModel{
		public $viewFields =array(
			'user'=>array('id','name','cash_points','userid','ejmm'),
			'ulist'=>array('money','datetime','act','remark','cid','_on'=>'user.id=ulist.uid'),
			);
	}