<?php

	class BaseAction extends Action
	{
		public function _initialize()
		{
		
		if ($_GET['act']) {
			$act=$_GET['act'];
			$this->assign("act",$act);
		}



	}
}

?>