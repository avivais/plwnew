<?php
	class Plw_Suppliers_Model_Suppliers extends Mage_Core_Model_Abstract
	{
		public function _construct()
     		{
         		parent::_construct();
         		$this->_init('suppliers/suppliers');
     		}
	}

